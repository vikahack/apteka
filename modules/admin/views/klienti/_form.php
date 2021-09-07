<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Klienti;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Klienti */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="klienti-form"> 
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'familia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otchestvo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'data_rozdeniya')->widget(DatePicker::classname(),[

        'language' => 'ru',
        'value' => $model->data_rozdeniya,
        'dateFormat' => 'yyyy-MM-dd',
        'inline' => true,
    ]) ?>
    <?= $form->field($model, 'adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategoriya')->dropDownList(ArrayHelper::map(klienti::find()->all(), 'kategoriya', 'kategoriya'))  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/klienti/index"><button>Назад</button></a>
</div>


