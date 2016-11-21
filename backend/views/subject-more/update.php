<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectMore */

$this->title = '更新题干信息';
$this->params['breadcrumbs'][] = ['label' => '一对多大题', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-more-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
