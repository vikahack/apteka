<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\IzgotavlivaemieLekarstva;
use app\modules\admin\models\Klienti;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <?php $form = ActiveForm::begin(); ?>

<?=$form->field($model,'nomer_klienta')->dropDownList(ArrayHelper::map(Klienti::find()->all(), 'nomer_klienta', 'familia'))->label('Выбрать фамилию клиента:')
 ?>
 
<?=$form->field($model,'nomer_lekarstva')->dropDownList(ArrayHelper::map(izgotavlivaemieLekarstva::find()->all(), 'nomer_lekarstva', 'naimenovanie'))->label('Выбрать лекарство:')
 ?>
    <?= $form->field($model, 'kolvoZ')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<a href="http://apteka/admin/info"><button>Назад</button></a>
</div>
