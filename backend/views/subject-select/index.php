<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectSelectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '选择题/判断题';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-select-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加选择题/判断题', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'type',
            'content:ntext',
             'result:ntext',
             'level',
//             'grade_id',
            // 'project_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
