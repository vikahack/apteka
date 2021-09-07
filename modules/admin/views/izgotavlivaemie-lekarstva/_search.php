<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IzgotavlivaemieLekarstvaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izgotavlivaemie-lekarstva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomer_lekarstva') ?>

    <?= $form->field($model, 'naimenovanie') ?>

    <?= $form->field($model, 'nomer_na_sklade') ?>

    <?= $form->field($model, 'forma') ?>

    <?= $form->field($model, 'stoimost') ?>

    <?php // echo $form->field($model, 'sposob_prigotovleniya') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/izgotavlivaemie-lekarstva"><button>Назад</button></a>
</div>
