<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\IzgotavlivaemieLekarstva;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IzgotavlivaemieLekarstva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izgotavlivaemie-lekarstva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naimenovanie')->textInput(['maxlength' => true]) ?>

      <?=$form->field($model,'nomer_na_sklade')->dropDownList(['Прибыло на склад'=>'Прибыло на склад','Не прибыло на склад'=>'Не прибыло на склад']);

?>

     <?= $form->field($model, 'forma')->dropDownList(ArrayHelper::map(izgotavlivaemieLekarstva::find()->all(), 'forma', 'forma'))  ?>

    <?= $form->field($model, 'stoimost')->textInput() ?>

   <?= $form->field($model, 'sposob_prigotovleniya')->dropDownList(['Смешивание'=>'Смешивание','Отстаивание'=>'Отстаивание']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/izgotavlivaemie-lekarstva"><button>Назад</button></a>
</div>
