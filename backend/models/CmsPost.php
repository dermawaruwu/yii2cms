<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms_post".
 *
 * @property integer $post_id
 * @property string $post_title
 * @property string $post_content
 * @property string $post_tag
 * @property string $post_category
 * @property string $post_date
 * @property string $post_editor
 * @property string $post_active
 * @property string $post_headline
 * @property string $post_commentable
 * @property integer $post_comment
 * @property string $post_picture
 * @property string $post_picture_desc
 * @property integer $post_hits
 */
class CmsPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_title', 'post_content'], 'required'],
            [['post_content', 'post_active', 'post_headline', 'post_commentable'], 'string'],
            [['post_date'], 'safe'],
            [['post_comment', 'post_hits'], 'integer'],
            [['post_title', 'post_editor', 'post_picture', 'post_picture_desc'], 'string', 'max' => 255],
            [['post_tag', 'post_category'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => Yii::t('app', 'Post ID'),
            'post_title' => Yii::t('app', 'Post Title'),
            'post_content' => Yii::t('app', 'Post Content'),
            'post_tag' => Yii::t('app', 'Post Tag'),
            'post_category' => Yii::t('app', 'Post Category'),
            'post_date' => Yii::t('app', 'Post Date'),
            'post_editor' => Yii::t('app', 'Post Editor'),
            'post_active' => Yii::t('app', 'Post Active'),
            'post_headline' => Yii::t('app', 'Post Headline'),
            'post_commentable' => Yii::t('app', 'Post Commentable'),
            'post_comment' => Yii::t('app', 'Post Comment'),
            'post_picture' => Yii::t('app', 'Post Picture'),
            'post_picture_desc' => Yii::t('app', 'Post Picture Desc'),
            'post_hits' => Yii::t('app', 'Post Hits'),
        ];
    }
}
