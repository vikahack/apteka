<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Statistika;
use app\modules\admin\models\StatistikaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StatistikaController implements the CRUD actions for Statistika model.
 */
class StatistikaController extends Controller
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
     * Lists all Statistika models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StatistikaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Statistika model.
     * @param integer $nomer_lekarstva
     * @param string $data
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nomer_lekarstva, $data)
    {
        return $this->render('view', [
            'model' => $this->findModel($nomer_lekarstva, $data),
        ]);
    }

    /**
     * Creates a new Statistika model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Statistika();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_lekarstva' => $model->nomer_lekarstva, 'data' => $model->data]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Statistika model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $nomer_lekarstva
     * @param string $data
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nomer_lekarstva, $data)
    {
        $model = $this->findModel($nomer_lekarstva, $data);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_lekarstva' => $model->nomer_lekarstva, 'data' => $model->data]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Statistika model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $nomer_lekarstva
     * @param string $data
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nomer_lekarstva, $data)
    {
        $this->findModel($nomer_lekarstva, $data)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Statistika model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $nomer_lekarstva
     * @param string $data
     * @return Statistika the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nomer_lekarstva, $data)
    {
        if (($model = Statistika::findOne(['nomer_lekarstva' => $nomer_lekarstva, 'data' => $data])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
