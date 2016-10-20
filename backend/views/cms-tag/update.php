<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsTag */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tag',
]) . $model->tag_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tag_id, 'url' => ['view', 'id' => $model->tag_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cms-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
