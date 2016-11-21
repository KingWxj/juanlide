<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->admin_name;
$this->params['breadcrumbs'][] = ['label' => '更新管理员信息'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
