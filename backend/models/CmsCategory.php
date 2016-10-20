<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms_category".
 *
 * @property integer $category_id
 * @property string $category_title
 * @property integer $category_parent
 * @property integer $category_count
 */
class CmsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_title'], 'required'],
            [['category_parent', 'category_count'], 'integer'],
            [['category_title'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'category_title' => Yii::t('app', 'Category Title'),
            'category_parent' => Yii::t('app', 'Category Parent'),
            'category_count' => Yii::t('app', 'Category Count'),
        ];
    }
}
