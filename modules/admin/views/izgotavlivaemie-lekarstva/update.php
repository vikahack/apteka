<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IzgotavlivaemieLekarstva */

$this->title = 'Обновить лекарство: ' . $model->nomer_lekarstva;
$this->params['breadcrumbs'][] = ['label' => 'Izgotavlivaemie Lekarstvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomer_lekarstva, 'url' => ['view', 'id' => $model->nomer_lekarstva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izgotavlivaemie-lekarstva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
