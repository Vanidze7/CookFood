<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "picture_step_recipe".
 *
 * @property int $id
 * @property string $path
 * @property int $step_id
 *
 * @property StepRecipe $step
 */
class PictureStepRecipe extends \yii\db\ActiveRecord
{
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
            [['path', 'step_id'], 'required'],
            [['step_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
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
            'path' => 'Местоположение',
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
}
