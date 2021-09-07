<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Naznacheniya;
use app\modules\admin\models\NaznacheniyaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NaznacheniyaController implements the CRUD actions for Naznacheniya model.
 */
class NaznacheniyaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Naznacheniya models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NaznacheniyaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Naznacheniya model.
     * @param integer $nomer_recepta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nomer_recepta, $nomer_lekarstva)
    {
        return $this->render('view', [
            'model' => $this->findModel($nomer_recepta, $nomer_lekarstva),
        ]);
    }

    /**
     * Creates a new Naznacheniya model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Naznacheniya();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_recepta' => $model->nomer_recepta, 'nomer_lekarstva' => $model->nomer_lekarstva]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Naznacheniya model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $nomer_recepta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nomer_recepta, $nomer_lekarstva)
    {
        $model = $this->findModel($nomer_recepta, $nomer_lekarstva);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_recepta' => $model->nomer_recepta, 'nomer_lekarstva' => $model->nomer_lekarstva]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Naznacheniya model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $nomer_recepta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nomer_recepta, $nomer_lekarstva)
    {
        $this->findModel($nomer_recepta, $nomer_lekarstva)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Naznacheniya model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $nomer_recepta
     * @param integer $nomer_lekarstva
     * @return Naznacheniya the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nomer_recepta, $nomer_lekarstva)
    {
        if (($model = Naznacheniya::findOne(['nomer_recepta' => $nomer_recepta, 'nomer_lekarstva' => $nomer_lekarstva])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
