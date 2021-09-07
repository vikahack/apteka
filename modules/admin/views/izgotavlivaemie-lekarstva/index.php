<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IzgotavlivaemieLekarstvaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Лекарства';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izgotavlivaemie-lekarstva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить лекарство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'nomer_lekarstva',
            'naimenovanie',
            'nomer_na_sklade',
            'forma',
            'stoimost',
            'sposob_prigotovleniya',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<a href="http://apteka/admin"><button>Назад</button></a>

</div>
