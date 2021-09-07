<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\KomponentiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Компоненты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponenti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить компонент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'nomer_lekarstva',
          //  'nomer_komponenta',
             'nomerLekarstva.izgotavlivaemieLekarstva.naimenovanie', 'nomerLekarstva.izgotavlivaemieLekarstva.forma',
           'naimenovanie_kom',
         'forma',
            'stoimost',
            'kolvo',
            'data_polycheniya',
            'data_isp',

                  
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<a href="http://apteka/admin"><button>Назад</button></a>
</div>
