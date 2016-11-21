<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = '新建学科';
$this->params['breadcrumbs'][] = ['label' => '学科管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
