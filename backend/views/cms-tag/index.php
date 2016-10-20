<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CmsTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?php // echo Html::a(Yii::t('app', 'Create Cms Tag'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                //'contentOptions' => ["style" =>  'width:20px;']
            ],

            //'tag_id',
            'tag_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
