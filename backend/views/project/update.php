<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = '修改学科信息: ' . $model->project;
$this->params['breadcrumbs'][] = ['label' => '学科管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
