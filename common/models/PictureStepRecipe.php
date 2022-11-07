<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "picture_step_recipe".
 *
 * @property int $id
 * @property string $path_img
 * @property int $step_id
 *
 * @property StepRecipe $step
 */
class PictureStepRecipe extends \yii\db\ActiveRecord
{
    public $file;
    private $imagePath;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture_step_recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['step_id'], 'required'],
            [['step_id'], 'integer'],
            [['file'], 'image'],
            [['path_img'], 'string', 'max' => 255],
            [['step_id'], 'exist', 'skipOnError' => true, 'targetClass' => StepRecipe::class, 'targetAttribute' => ['step_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path_img' => 'Местоположение',
            'file' => 'Картинка',
            'step_id' => 'ID Шага',
        ];
    }

    /**
     * Gets query for [[Step]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStep()
    {
        return $this->hasOne(StepRecipe::class, ['id' => 'step_id']);
    }
    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file'))
        {
            $this->imagePath = '/image/recipe/ID - ' . $this->step->recipe->id . '/steps/';
            $file_name = date("Y-m-d") . '_' . Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $this->path_img = $this->imagePath . $file_name;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($file = UploadedFile::getInstance($this, 'file'))
        {
            $front_path = Yii::getAlias('@frontend') . '/web';
            $dir = $front_path . $this->imagePath;
            if (!file_exists($dir))
                mkdir($dir, 0777, true);

            $file->saveAs($front_path . $this->path_img);

            if ($insert == false)
                unlink($front_path . $changedAttributes['path_img']);
        }

    }
}
