<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $path
 * @property string $text
 * @property integer $realty_id
 * @property integer $gallery_id
 *
 * @property Gallery $gallery
 * @property Realty $realty
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'realty_id'], 'required'],
            [['realty_id', 'gallery_id'], 'integer'],
            [['path'], 'string', 'max' => 128],
            [['text'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::className(), 'targetAttribute' => ['realty_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'path' => Yii::t('app', 'Path'),
            'text' => Yii::t('app', 'Text'),
            'realty_id' => Yii::t('app', 'Realty ID'),
            'gallery_id' => Yii::t('app', 'Gallery ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::className(), ['id' => 'realty_id']);
    }
}
