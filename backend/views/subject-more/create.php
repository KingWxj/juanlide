<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubjectMore */

$this->title = '添加一对多大题(题干)';
$this->params['breadcrumbs'][] = ['label' => '一对多大题管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-more-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
