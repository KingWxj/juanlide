<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = '修改学生账户: ' . $model->stu_name;
$this->params['breadcrumbs'][] = ['label' => '学生账户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
