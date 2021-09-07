<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Komponenti */

$this->title = $model->naimenovanie_kom;
$this->params['breadcrumbs'][] = ['label' => 'Компоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="komponenti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->nomer_komponenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->nomer_komponenta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomer_lekarstva',
       //    'nomer_komponenta',
            'naimenovanie_kom',
           'forma',
           'stoimost',
            'kolvo',
          'data_polycheniya',
            'data_isp',
 'IzgotavlivaemieLekarstva.izgotavlivaemieLekarstva.naimenovanie',
    'IzgotavlivaemieLekarstva.izgotavlivaemieLekarstva.forma',
         
        ],
    ]) ?>
<a href="http://apteka/admin/komponenti"><button>Назад</button></a>
</div>
