<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSelect */

$this->title = 'Create Subject Select';
$this->params['breadcrumbs'][] = ['label' => 'Subject Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-select-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
