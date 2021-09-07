<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\KomponentiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponenti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomer_lekarstva') ?>

    <?= $form->field($model, 'nomer_komponenta') ?>

    <?= $form->field($model, 'naimenovanie_kom') ?>

    <?= $form->field($model, 'forma') ?>

    <?= $form->field($model, 'stoimost') ?>

    <?php // echo $form->field($model, 'kolvo') ?>

    <?php // echo $form->field($model, 'data_polycheniya') ?>

    <?php // echo $form->field($model, 'data_isp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/komponenti"><button>Назад</button></a>
</div>
