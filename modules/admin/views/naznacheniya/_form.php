<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\IzgotavlivaemieLekarstva;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Naznacheniya */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="naznacheniya-form">

    <?php $form = ActiveForm::begin(); ?>

   


<?=$form->field($model,'nomer_lekarstva')->dropDownList(ArrayHelper::map(izgotavlivaemieLekarstva::find()->all(), 'nomer_lekarstva', 'naimenovanie'))->label('Выбрать лекарство:')
 ?>


    <?= $form->field($model, 'kolichestvo')->textInput() ?>

    <?= $form->field($model, 'naimenivanie')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/naznacheniya"><button>Назад</button></a>
</div>
