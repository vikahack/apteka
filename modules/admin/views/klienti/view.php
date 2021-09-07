<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Klienti */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="klienti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->nomer_klienta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->nomer_klienta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что готовы удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomer_klienta',
            'familia',
            'name',
            'otchestvo',
            'data_rozdeniya',
            'adres',
            'telephone',
            'kategoriya',
        ],
    ]) ?>
<a href="http://apteka/admin/klienti/index"><button>Назад</button></a>
</div>
