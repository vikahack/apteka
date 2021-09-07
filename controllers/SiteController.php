<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;


use app\models\Gotovielekarstva;
use app\models\Izgotavlivaemielekarstva;
use app\models\Klienti;
use app\models\Komponenti;
use app\models\Naznacheniya;
use app\models\Recepti;
use app\models\Sklad;
use app\models\Sostav;
use app\models\Spravochniktehnologii;
use app\models\Statistika;
use app\models\Zakaz;
use app\models\Info;
use app\models\Zapross5;
use app\models\Zaprosi;
use app\models\Zapross13;
use app\models\Zapross1;
use app\models\Zapross2;
use app\models\Zapross9;
use app\models\Zapross11;
use app\models\Zapross10;
use app\models\Zapross6;
use app\models\Zapross12;
use app\models\Zapross4;
use app\models\Zapross100;
use app\models\Zapross3;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello () {
        return $this->render('hello');
        //return 'Hello world!';
    }

     public function actionHello2 () {
        return 'Hello world2!';
    }



public function actionZaprosi () {
        $this->view->title = 'Запросы';
        return $this->render('zaprosi',['zaprosi'=> $zaprosi]);
    }




 public function actionZapros1 () {
        $this->view->title = 'Запросы';
        $model = new Zapross1();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->zabral_v_srok;

       $dataProvider = new ActiveDataProvider([
        'query' => Recepti::find()
        ->JoinWith('nomerKlienta')
        ->JoinWith('zakazs')
        ->where([ 'zabral_v_srok'=> $lekname])
         ->GroupBy('familia')
        ->orderBy('familia'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros1',['lekname' => $lekname, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
        return $this->render('zapros1',['model' => $model,]);
        }

        }     


        public function actionZapros2 () {
        $this->view->title = 'Запросы';
        $model = new Zapross2();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->forma;
       $dataProvider = new ActiveDataProvider([
        'query' => info::find()
        ->JoinWith('izgotavlivaemieLekarstva')
        ->JoinWith('klienti')
        ->where([ 'forma'=> $lekname])
    ->andWhere([ 'nomer_na_sklade'=>"Не прибыло на склад"])
        ->orderBy('name'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros2',['lekname' => $lekname, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
        return $this->render('zapros2',['model' => $model,]);
        }

        }   


public function actionZapros2_2 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => info::find()
        ->JoinWith('izgotavlivaemieLekarstva')
        ->JoinWith('klienti')
        //->GroupBy('name')
       ->where([ 'nomer_na_sklade'=> 'Не прибыло на склад'])
        ->orderBy('nomer_na_sklade'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros2_2',['dataProvider' => $dataProvider,]);
               
    }

public function actionZapros2_2_2 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => info::find()
         ->select(['count(klienti.nomer_klienta) as kolvo'])
        ->JoinWith('izgotavlivaemieLekarstva')
        ->JoinWith('klienti')
       ->where([ 'nomer_na_sklade'=> 'Не прибыло на склад'])
        ->orderBy('nomer_na_sklade'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros2_2_2',['dataProvider' => $dataProvider,]);
               
    }


public function actionZapros3 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => Naznacheniya::find()
         ->select(['max(naimenivanie) as kol','count(nomer_lekarstva) as maxx' ])
        ->GroupBy('naimenivanie')
        ->orderBy('naimenivanie'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros3',['dataProvider' => $dataProvider,]);
               
    }


        public function actionZapros3_2 () {
        $this->view->title = 'Запросы';
        $model = new Zapross3();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->forma;
       $dataProvider = new ActiveDataProvider([
        'query' => Naznacheniya::find()
        ->where([ 'forma'=> $lekname])
        ->orderBy('naimenivanie'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros3_2',['lekname' => $lekname, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
        return $this->render('zapros3_2',['model' => $model,]);
        }

        }   


   public function actionZapros5 () {
        $this->view->title = 'Запросы';
        $model = new Zapross5();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->naimenivanie;
        $dat1 = $model->data_priema;
    $dat2 = $model->data_vidachi;

       $dataProvider = new ActiveDataProvider([
        'query' => Recepti::find()
        ->select(['(naznacheniya.naimenivanie) as ss','klienti.familia as famm', 'klienti.name as namme' ])
        ->JoinWith('nomerRecepta')
        ->JoinWith('nomerKlienta')
     ->JoinWith('zakazs')
             ->andWhere(['>','data_priema', $dat1])
        ->andWhere(['<','data_vidachi', $dat2])

        ->orderBy('familia'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros5',['lekname' => $lekname, 'dat1'=> $dat1, 'dat2' => $dat2, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
        return $this->render('zapros5',['model' => $model,]);
        }

        }       


        public function actionZapros6 () {
                $this->view->title = 'Запросы';

       $dataProvider = new ActiveDataProvider([
        'query' => Sklad::find()
        ->JoinWith('izgotavlivaemieLekarstva')
     ->where(['>', 'kritich_norma', '20' ])
        ->orderBy('kolichestvo'),
        'pagination' => [
        'pageSize' => 10,
        ],    ]);
return $this->render('zapros6',['dataProvider' => $dataProvider,]); } 



public function actionZapros7 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => IzgotavlivaemieLekarstva::find()
        ->select(['min(sklad.kolichestvo) as minimum' ,'forma','naimenovanie','sklad.kolichestvo'])
        ->JoinWith('sklad')
        ->GroupBy('forma')
        ->orderBy('forma'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros7',['dataProvider' => $dataProvider,]);
               
    }


 public function actionZapros8 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => Zakaz::find()
      ->where(['status' => "Производится" ])
        ->orderBy('nomer_recepta'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros8',['dataProvider' => $dataProvider,]);
               
    }



public function actionZapros8_2(){
  $querie = Klienti::find()->with('info')->all();
  //->where(['status' => "Производится"])
  return $this->render('zapros8_2',compact('querie'));
}



 public function actionZapros9 () {
        $this->view->title = 'Запросы';

       $dataProvider = new ActiveDataProvider([
        'query' => Sklad::find()
        ->JoinWith('statistika')
        ->JoinWith('izgotavlivaemieLekarstva')
             ->where(['statusL' => "В производстве" ])
        ->orderBy('statusL'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
           return $this->render('zapros9',['dataProvider' => $dataProvider,]);

}



public function actionZapros10 () {
        $this->view->title = 'Запросы';
        $model = new Zapross10();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->forma;
        $status = $model->statusL;
       $dataProvider = new ActiveDataProvider([
        'query' => Sklad::find()
        ->JoinWith('statistika')
        ->JoinWith('izgotavlivaemieLekarstva')
        ->where([ 'forma'=> $lekname])
        ->orWhere(['statusL' => $status])
        ->andWhere(['statusL' => 'В Производстве'])
        ->orderBy('naimenovanie'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros10',['lekname' => $lekname, 'model' => $model, 'dataProvider' => $dataProvider,]);
      }
        else {
        return $this->render('zapros10',['model' => $model,]);
        }

}



public function actionZapros11 () {
        $this->view->title = 'Запросы';
        $model = new Zapross11();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname = $model->naimenovanie;
       $dataProvider = new ActiveDataProvider([
        'query' => Sklad::find()
        ->JoinWith('komponenti')
        ->JoinWith('izgotavlivaemieLekarstva')
        ->where([ 'naimenovanie'=> $lekname])
        ->orderBy('sposob_prigotovleniya'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros11',['lekname' => $lekname, 'model' => $model, 'dataProvider' => $dataProvider,]);
      }
        else {
        return $this->render('zapros11',['model' => $model,]);
        }

}



public function actionZapros12 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => Info::find()
         ->select(['familia as fam','count(info.nomer_lekarstva) as zakazz','naimenovanie as lek', 'name as nameK' ])
      ->JoinWith('izgotavlivaemieLekarstva')
       ->JoinWith('klienti')
      ->where(['klienti.familia'=> 'Лосев'])
      ->orWhere(['klienti.familia'=> 'Ладова'])
        ->GroupBy('familia')
        ->orderBy('naimenovanie'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros12',['dataProvider' => $dataProvider,]);
               
    }

public function actionZapros12_2 () {
        $this->view->title = 'Запросы';
               $dataProvider = new ActiveDataProvider([
        'query' => Info::find()
         ->select(['familia as fam','count(info.nomer_lekarstva) as kk', 'name as nameK', 'forma as form' ])
      ->JoinWith('izgotavlivaemieLekarstva')
       ->JoinWith('klienti')
        ->GroupBy('forma')
        ->orderBy('naimenovanie'),
        'pagination' => [
        'pageSize' => 10,
        ],
       ]);
        return $this->render('zapros12_2',['dataProvider' => $dataProvider,]);
               
    }



 public function actionZapros13 () {
        $this->view->title = 'Запросы';
        $model = new Zapross13();
        if ($model->load(Yii::$app->request->post()))
        {
        $lekname2 = $model->naimenovanie;
       $dataProvider = new ActiveDataProvider([
        'query' => Sklad::find()
        ->JoinWith('izgotavlivaemieLekarstva')
        ->JoinWith('komponenti')
        ->where([ 'naimenovanie'=> $lekname2])
        ->orderBy('sposob_prigotovleniya'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);
        return $this->render('zapros13',['lekname2' => $lekname2, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
        return $this->render('zapros13',['model' => $model,]);
        }

           }

              
            
public function actionZapros44 () {
        $this->view->title = 'Запросы';
        $model = new Zapross100();
        if ($model->load(Yii::$app->request->post()))
        {
        $name = $model->naimenovanie_kom;
        $dat1 = $model->data_polycheniya;
        $dat2 = $model->data_isp;
       $dataProvider = new ActiveDataProvider([
        'query' => Komponenti::find()
        ->andWhere(['>','data_polycheniya', $dat1])
        ->andWhere(['<','data_isp', $dat2])
        ->orderBy('naimenovanie_kom'),
        'pagination' => [
        'pageSize' => 10,
        ],
        ]);

        return $this->render('zapros44',['name' => $name, 'dat1'=> $dat1, 'dat2' => 'dat2', 'model' => $model, 'dataProvider' => $dataProvider,]);
      }
        else {
        return $this->render('zapros44',['model' => $model,]);
        }

}

      

}


