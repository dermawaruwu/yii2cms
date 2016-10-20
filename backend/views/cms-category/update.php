<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cms Category',
]) . $model->category_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cms-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsCategory' => $itemsCategory,
    ]) ?>

</div>
