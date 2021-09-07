<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Info */

$this->title = 'Обновить информацию: ' . $model->nomer_klienta;
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomer_klienta, 'url' => ['view', 'nomer_klienta' => $model->nomer_klienta, 'nomer_lekarstva' => $model->nomer_lekarstva]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
