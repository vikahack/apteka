<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Naznacheniya */

$this->title = $model->nomer_recepta;
$this->params['breadcrumbs'][] = ['label' => 'Назначения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="naznacheniya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'nomer_recepta' => $model->nomer_recepta, 'nomer_lekarstva' => $model->nomer_lekarstva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'nomer_recepta' => $model->nomer_recepta, 'nomer_lekarstva' => $model->nomer_lekarstva], [
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
            'nomer_recepta',
            'nomer_lekarstva',
            'kolichestvo',
            'naimenivanie',
        ],
    ]) ?>
<a href="http://apteka/admin/naznacheniya"><button>Назад</button></a>
</div>
