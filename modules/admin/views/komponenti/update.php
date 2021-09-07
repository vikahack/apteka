<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Komponenti */

$this->title = 'Обновить компонент: ' . $model->nomer_komponenta;
$this->params['breadcrumbs'][] = ['label' => 'Компоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomer_komponenta, 'url' => ['view', 'id' => $model->nomer_komponenta]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="komponenti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
