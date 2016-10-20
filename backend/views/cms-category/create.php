<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */

$this->title = Yii::t('app', 'Add Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsCategory' => $itemsCategory,
    ]) ?>

</div>
