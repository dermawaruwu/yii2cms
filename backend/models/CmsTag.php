<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms_tag".
 *
 * @property integer $tag_id
 * @property string $tag_title
 */
class CmsTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_title'], 'required'],
            [['tag_title'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => Yii::t('app', 'Tag ID'),
            'tag_title' => Yii::t('app', 'Tag Title'),
        ];
    }
}
