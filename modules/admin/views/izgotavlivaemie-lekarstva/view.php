<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IzgotavlivaemieLekarstva */

$this->title = $model->nomer_lekarstva;
$this->params['breadcrumbs'][] = ['label' => 'Izgotavlivaemie Lekarstvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="izgotavlivaemie-lekarstva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->nomer_lekarstva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->nomer_lekarstva], [
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
            'nomer_lekarstva',
            'naimenovanie',
            'nomer_na_sklade',
            'forma',
            'stoimost',
            'sposob_prigotovleniya',
        ],
    ]) ?>
<a href="http://apteka/admin/izgotavlivaemie-lekarstva"><button>Назад</button></a>
</div>
