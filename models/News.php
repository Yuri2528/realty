<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $announce
 * @property string $text
 * @property string $sourceUrl
 * @property string $pubDate
 * @property string $author
 * @property string $avatarUrl
 * @property string $created_at
 * @property string $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'announce', 'text', 'sourceUrl', 'author', 'avatarUrl'], 'required'],
            [['text'], 'string'],
            [['pubDate', 'created_at', 'updated_at'], 'safe'],
            [['title', 'author'], 'string', 'max' => 128],
            [['announce', 'sourceUrl', 'avatarUrl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'announce' => Yii::t('app', 'Announce'),
            'text' => Yii::t('app', 'Text'),
            'sourceUrl' => Yii::t('app', 'Source Url'),
            'pubDate' => Yii::t('app', 'Pub Date'),
            'author' => Yii::t('app', 'Author'),
            'avatarUrl' => Yii::t('app', 'Avatar Url'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
