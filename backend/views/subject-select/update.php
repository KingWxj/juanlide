<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSelect */

$this->title = '修改题目';
$this->params['breadcrumbs'][] = ['label' => '选择/判断题', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-select-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
