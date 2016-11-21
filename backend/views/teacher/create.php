<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Teacher */

$this->title = '创建新账户';
$this->params['breadcrumbs'][] = ['label' => '教师账户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
