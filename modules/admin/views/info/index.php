<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить информацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


        'nomerLekarstva.naimenovanie',
          'nomerKlienta.familia',
            'nomerKlienta.name',
        //    'nomer_klienta',
         //   'nomer_lekarstva',
            'kolvoZ',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<a href="http://apteka/admin"><button>Назад</button></a>
</div>
