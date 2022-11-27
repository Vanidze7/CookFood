<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "step_recipe".
 *
 * @property int $id
 * @property int $step_number
 * @property string $content
 * @property int $recipe_id
 *
 * @property PictureStepRecipe[] $pictureStepRecipes
 * @property Recipe $recipe
 */
class StepRecipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'step_recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['step_number', 'content', 'recipe_id'], 'required'],
            [['step_number', 'recipe_id'], 'integer'],
            [['content'], 'string'],
            [['recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::class, 'targetAttribute' => ['recipe_id' => 'id']],
            ['step_number', 'validateStep']
        ];
    }

    public function validateStep($attribute, $params)
    {
        //$step_query = StepRecipe::find()->select('step_number')->where(['recipe_id' => $model->recipe_id, 'step_number' => $model->step_number])->all(); // все
        //$step_query = StepRecipe::find()->select('step_number')->where(['recipe_id' => $model->recipe_id, 'step_number' => $model->step_number])->one(); // один
        //$step_query = StepRecipe::find()->select('step_number')->where(['recipe_id' => $model->recipe_id, 'step_number' => $model->step_number])->exists(); // есть ли записи вообще
        //$step_query = StepRecipe::find()->select('step_number')->where(['recipe_id' => $model->recipe_id, 'step_number' => $model->step_number])->count(); // количество записей
        //$step_query = StepRecipe::find()->select('step_number')->where(['recipe_id' => $model->recipe_id, 'step_number' => $model->step_number])->max('step_number'); // integer значение

        if (StepRecipe::find()->select('step_number')->where(['recipe_id' => $this->recipe_id, 'step_number' => $this->step_number])->exists())
            $this->addError($attribute, 'Такой шаг уже существует');
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'step_number' => 'Шаг рецепта',
            'content' => 'Содержание',
            'recipe_id' => 'Рецепт',
        ];
    }

    /**
     * Gets query for [[PictureStepRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPictureStepRecipes()
    {
        return $this->hasMany(PictureStepRecipe::class, ['step_id' => 'id']);
    }

    /**
     * Gets query for [[Recipe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
    }
    public static function getStepList()
    {
        $arrays = self::find()->select(['id', 'recipe_id'])->orderBy('recipe_id')->all();
        return ArrayHelper::map($arrays, 'id', function ($row){
            return $row['recipe_id'] . ' - (' . $row->recipe->title . ')';
        });
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord){
            $find_step = StepRecipe::find()->select('step_number')->where(['recipe_id' => $this->recipe_id])->max('step_number');
            if ($find_step == null){
                $this->step_number = 1;
            } else {
                $this->step_number = $find_step +1;
            }
        }
        return parent::beforeValidate();
    }
}
