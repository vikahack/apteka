<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\KlietntiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klienti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomer_klienta') ?>

    <?= $form->field($model, 'familia') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'otchestvo') ?>

    <?= $form->field($model, 'data_rozdeniya') ?>

    <?php // echo $form->field($model, 'adres') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'kategoriya') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/klienti"><button>Назад</button></a>
</div>
