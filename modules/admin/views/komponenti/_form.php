<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\IzgotavlivaemieLekarstva;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Komponenti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponenti-form">

    <?php $form = ActiveForm::begin(); ?>

    
<?=$form->field($model,'nomer_lekarstva')->dropDownList(ArrayHelper::map(izgotavlivaemieLekarstva::find()->all(), 'nomer_lekarstva', 'naimenovanie'))->label('Выбрать лекарство:')
 ?>

    <?= $form->field($model, 'naimenovanie_kom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stoimost')->textInput() ?>

    <?= $form->field($model, 'kolvo')->textInput() ?>

    <?= $form->field($model,'data_polycheniya')->widget(DatePicker::classname(),[

        'language' => 'ru',
        'value' => $model->data_polycheniya,
        'dateFormat' => 'yyyy-MM-dd',
        'inline' => true,
    ]) ?>
    <?= $form->field($model,'data_isp')->widget(DatePicker::classname(),[

        'language' => 'ru',
        'value' => $model->data_isp,
        'dateFormat' => 'yyyy-MM-dd',
        'inline' => true,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/komponenti"><button>Назад</button></a>
</div>
