<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Info;
use app\modules\admin\models\InfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller
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
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Info model.
     * @param integer $nomer_klienta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nomer_klienta, $nomer_lekarstva)
    {
        return $this->render('view', [
            'model' => $this->findModel($nomer_klienta, $nomer_lekarstva),
        ]);
    }

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Info();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_klienta' => $model->nomer_klienta, 'nomer_lekarstva' => $model->nomer_lekarstva]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Info model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $nomer_klienta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nomer_klienta, $nomer_lekarstva)
    {
        $model = $this->findModel($nomer_klienta, $nomer_lekarstva);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomer_klienta' => $model->nomer_klienta, 'nomer_lekarstva' => $model->nomer_lekarstva]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Info model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $nomer_klienta
     * @param integer $nomer_lekarstva
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nomer_klienta, $nomer_lekarstva)
    {
        $this->findModel($nomer_klienta, $nomer_lekarstva)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $nomer_klienta
     * @param integer $nomer_lekarstva
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nomer_klienta, $nomer_lekarstva)
    {
        if (($model = Info::findOne(['nomer_klienta' => $nomer_klienta, 'nomer_lekarstva' => $nomer_lekarstva])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
