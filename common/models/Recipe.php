<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $path_img
 * @property int|null $count_portions
 * @property int $time_cook
 * @property int|null $views
 * @property int|null $level
 * @property int|null $rating
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $cat_recipe_id
 * @property int $user_id
 *
 * @property CatRecipe $catRecipe
 * @property CommentRecipe[] $commentRecipes
 * @property Favourite[] $favourites
 * @property ProductRecipe[] $productRecipes
 * @property ReviewRecipe[] $reviewRecipes
 * @property StepRecipe[] $stepRecipes
 * @property User $user
 */
class Recipe extends \yii\db\ActiveRecord
{
    public $file;
    private $imagePath;

    const STATUS_0 = 0;    const STATUS_1 = 1;    const STATUS_2 = 2;
    const LEVEL_0 = 0;    const LEVEL_1 = 1;    const LEVEL_2 = 2;

    public static array $levelLabels = [
        self::LEVEL_0 => 'Легкий',
        self::LEVEL_1 => 'Средний',
        self::LEVEL_2 => 'Сложный',
    ];

    public static array $statusLabels = [
        self::STATUS_0 => 'Удален пользователем',
        self::STATUS_1 => 'Активен',
        self::STATUS_2 => 'Черновик',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    public function behaviors()
    {
        return ['class' => TimestampBehavior::class];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'time_cook', 'cat_recipe_id', 'user_id'], 'required'],
            [['content', 'path_img'], 'string'],
            [['file'], 'image'],
            [['count_portions', 'time_cook', 'views', 'level', 'rating', 'status', 'created_at', 'updated_at', 'cat_recipe_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['cat_recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatRecipe::class, 'targetAttribute' => ['cat_recipe_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Содержание',
            'path_img' => 'Местоположение',
            'file' => 'Картинка',
            'count_portions' => 'Кол-во порций (шт.)',
            'time_cook' => 'Время готовки (мин.)',
            'views' => 'Просмотры',
            'level' => 'Сложность',
            'rating' => 'Рейтинг',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'cat_recipe_id' => 'Категория',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[CatRecipe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatRecipe()
    {
        return $this->hasOne(CatRecipe::class, ['id' => 'cat_recipe_id']);
    }

    /**
     * Gets query for [[CommentRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentRecipes()
    {
        return $this->hasMany(CommentRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[ProductRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductRecipes()
    {
        return $this->hasMany(ProductRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[ReviewRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewRecipes()
    {
        return $this->hasMany(ReviewRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[StepRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStepRecipes()
    {
        return $this->hasMany(StepRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getRecipeList()
    {
        $arrays = self::find()->select(['id', 'title'])->orderBy('id')->all();
        return ArrayHelper::map($arrays, 'id', function ($row){
           return $row['id'] . ' - ' . $row['title'];
        });
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file'))
        {
            $this->imagePath = '/image/recipe/ID - ' . $this->id . '/';
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
                unlink($front_path .$changedAttributes['path_img']);
        }
    }

}
