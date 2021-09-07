<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Naznacheniya */

$this->title = 'Добавить назначение';
$this->params['breadcrumbs'][] = ['label' => 'Назначения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="naznacheniya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
