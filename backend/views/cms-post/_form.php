<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsPost */
/* @var $form yii\widgets\ActiveForm */
?>
<?php


?>

<div class="cms-post-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_content')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>


    <?php
    /*$data = [
        "red" => "red",
        "green" => "green",
        "blue" => "blue",
        "orange" => "orange",
        "white" => "white",
        "black" => "black",
        "purple" => "purple",
        "cyan" => "cyan",
        "teal" => "teal"
    ];*/
    
    echo '<label class="control-label">Tags</label>';
    echo Select2::widget([
        'name' => 'CmsPost[post_tag]',
        'value' => [], // initial value
        'data' => $itemsTag,
        /*'maintainOrder' => true,
        'options' => ['placeholder' => 'Select tags', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ],*/
        'maintainOrder' => true,
        'toggleAllSettings' => [
            'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
            'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
            'selectOptions' => ['class' => 'text-success'],
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'options' => ['placeholder' => 'Select tags ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]);
    ?>

    <?= $form->field($model, 'post_tag')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'post_category')->widget(Select2::classname(), [
            'data' => $itemsCategory,
            //'language' => 'de',
            'options' => ['placeholder' => 'Select a parent category'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>
    <?= $form->field($model, 'post_date')->textInput() ?>

    <?= $form->field($model, 'post_editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'post_headline')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'post_commentable')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'post_comment')->textInput() ?>

    <?= $form->field($model, 'post_picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_picture_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_hits')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>

