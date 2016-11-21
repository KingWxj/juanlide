<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSelect */

$this->title = '查看题目信息';
$this->params['breadcrumbs'][] = ['label' => '选择/判断题', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-select-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'title',
            'type',
            'content:ntext',
            'result:ntext',
            'level',
            'grade_id',
            'project_id',
        ],
    ]) ?>

</div>
