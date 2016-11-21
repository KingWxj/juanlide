<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectSubjectiveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '主观题管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-subjective-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加主观题', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'type',
            'content:ntext',
//            'imgroute:ntext',
             'result:ntext',
            // 'grade_id',
            // 'project_id',
             'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
