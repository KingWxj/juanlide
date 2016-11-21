<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Grade */

$this->title = '新建年级信息';
$this->params['breadcrumbs'][] = ['label' => '年级列表管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
