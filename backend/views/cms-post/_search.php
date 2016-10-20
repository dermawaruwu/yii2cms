<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsPostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'post_id') ?>

    <?= $form->field($model, 'post_title') ?>

    <?= $form->field($model, 'post_content') ?>

    <?= $form->field($model, 'post_tag') ?>

    <?= $form->field($model, 'post_category') ?>

    <?php // echo $form->field($model, 'post_date') ?>

    <?php // echo $form->field($model, 'post_editor') ?>

    <?php // echo $form->field($model, 'post_active') ?>

    <?php // echo $form->field($model, 'post_headline') ?>

    <?php // echo $form->field($model, 'post_commentable') ?>

    <?php // echo $form->field($model, 'post_comment') ?>

    <?php // echo $form->field($model, 'post_picture') ?>

    <?php // echo $form->field($model, 'post_picture_desc') ?>

    <?php // echo $form->field($model, 'post_hits') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
