<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NaznacheniyaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Назначения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="naznacheniya-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить назначение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomer_recepta',
       //     'nomer_lekarstva',
            'kolichestvo',
            'naimenivanie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<a href="http://apteka/admin"><button>Назад</button></a>
</div>
