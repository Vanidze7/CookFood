<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "picture_review".
 *
 * @property int $id
 * @property string $path_img
 * @property int $review_id
 *
 * @property ReviewRecipe $review
 */
class PictureReview extends \yii\db\ActiveRecord
{
    public $file;
    private $imagePath;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_id'], 'required'],
            [['review_id'], 'integer'],
            [['file'], 'image'],
            [['path_img'], 'string'],
            [['review_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewRecipe::class, 'targetAttribute' => ['review_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path_img' => 'Путь к картинке',
            'file' => 'Картинка',
            'review_id' => 'Отзыв',
        ];
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(ReviewRecipe::class, ['id' => 'review_id']);
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file'))
        {
            $this->imagePath = '/image/review/';
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
                FileHelper::unlink(Yii::getAlias($front_path . $changedAttributes['path_img']));
        }
    }
}
