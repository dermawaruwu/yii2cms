<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsPost */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Post',
]) . $model->post_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_id, 'url' => ['view', 'id' => $model->post_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cms-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
