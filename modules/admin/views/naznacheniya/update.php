<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Naznacheniya */

$this->title = 'Обновить назначение: ' . $model->nomer_recepta;
$this->params['breadcrumbs'][] = ['label' => 'Назначения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomer_recepta, 'url' => ['view', 'nomer_recepta' => $model->nomer_recepta, 'nomer_lekarstva' => $model->nomer_lekarstva]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="naznacheniya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
