<?php

namespace backend\controllers;

use backend\components\BaseController;
use common\models\PictureStepRecipe;
use common\models\ProductRecipe;
use common\models\Recipe;
use common\models\StepRecipe;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends BaseController
{
    /**
     * Lists all Recipe models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recipe::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipe model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $productDataProvider = new ActiveDataProvider(['query' => ProductRecipe::find()->where(['recipe_id' => $id])]);
        $stepDataProvider = new ActiveDataProvider(['query' => StepRecipe::find()->where(['recipe_id' => $id])]);
        $array_step = StepRecipe::find()->where(['recipe_id' => $id])->all();

        $pictureStepDataProvider = new ActiveDataProvider(['query' => PictureStepRecipe::find()->where(['step_id' => ArrayHelper::map($array_step, 'id', 'id')])]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'productDataProvider' => $productDataProvider,
            'stepDataProvider' => $stepDataProvider,
            'pictureStepDataProvider' => $pictureStepDataProvider,
        ]);
    }

    /**
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Recipe();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
