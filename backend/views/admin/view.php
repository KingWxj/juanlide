<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->admin_name;
$this->params['breadcrumbs'][] = ['label' => '管理员列表','url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

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
            'admin_name',
            'admin_password',
            'description',
            ['label'=>'账号创建时间','value'=>$model->create_date?date('Y-m-d H:i:s',$model->create_date):'无'],
            ['label'=>'最近登陆时间','value'=>$model->login_date?date('Y-m-d H:i:s',$model->login_date):'无'],
            'login_ip',
        ],
    ]) ?>

</div>
