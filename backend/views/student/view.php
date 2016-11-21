<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = $model->stu_name;
$this->params['breadcrumbs'][] = ['label' => '学生账户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

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
            'stu_account',
            'stu_name',
            'stu_password',
            'email',
            'login_date',
        ],
    ]) ?>

</div>
