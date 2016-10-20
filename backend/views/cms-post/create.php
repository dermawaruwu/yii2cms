<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CmsPost */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-post-create">
    <div class="body-content">
        <h1><centre>Write down anything</centre></h1>   
        <?= $this->render('_form', [
            'model' => $model,
            'itemsCategory' => $itemsCategory,
            'itemsTag' => $itemsTag,
        ]) ?> 
        
        
    </div>
    

</div>
