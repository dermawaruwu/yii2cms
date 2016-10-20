<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_title')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'category_parent')->widget(Select2::classname(), [
            'data' => $itemsCategory,
            //'language' => 'de',
            'options' => ['placeholder' => 'Select a parent category'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
