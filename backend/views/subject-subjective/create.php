<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSubjective */

$this->title = '新建主观题';
$this->params['breadcrumbs'][] = ['label' => '主观题', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-subjective-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
