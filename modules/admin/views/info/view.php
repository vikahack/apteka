<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Info */

$this->title = $model->nomer_klienta;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'nomer_klienta' => $model->nomer_klienta, 'nomer_lekarstva' => $model->nomer_lekarstva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'nomer_klienta' => $model->nomer_klienta, 'nomer_lekarstva' => $model->nomer_lekarstva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
     //       'nomer_klienta',
          //  'nomer_lekarstva',
            'kolvoZ',

              'nomerLekarstva.naimenovanie',
                 'nomerKlienta.familia',
                   'nomerKlienta.name',
        ],
    ]) ?>
<a href="http://apteka/admin/info"><button>Назад</button></a>
</div>
