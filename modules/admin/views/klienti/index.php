<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\KlietntiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klienti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'familia',
            'name',
            'otchestvo',
            'data_rozdeniya',
            'adres',
            'telephone',
            'kategoriya',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<a href="http://apteka/admin"><button>Назад</button></a>
</div>



