<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Grade */

$this->title = '查看:'.$model->stage.$model->grade.$model->grade_type;
$this->params['breadcrumbs'][] = ['label' => '年级列表管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-view">

    <h1><?= Html::encode($model->stage.' '.$model->grade.' '.$model->grade_type) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'stage',
            'grade',
            'grade_type',
        ],
    ]) ?>

</div>
