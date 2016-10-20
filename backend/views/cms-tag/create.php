<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CmsTag */

$this->title = Yii::t('app', 'Add Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
