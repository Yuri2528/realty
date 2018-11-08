<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realty".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_content
 * @property string $content
 * @property integer $category_id
 * @property integer $users_id
 * @property string $country
 * @property string $city
 * @property string $area
 * @property string $adress
 * @property string $square
 * @property integer $nuber_of_storeys
 * @property integer $floor
 * @property string $price
 * @property string $image_url
 * @property integer $gallery_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $phone
 * @property integer $active
 *
 * @property Images[] $images
 * @property Category $category
 * @property Gallery $gallery
 */
class Realty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'realty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_content', 'content', 'category_id', 'users_id', 'country', 'city', 'area', 'adress', 'square', 'nuber_of_storeys', 'floor', 'price', 'image_url', 'gallery_id', 'phone', 'active'], 'required'],
            [['short_content', 'content'], 'string'],
            [['category_id', 'users_id', 'nuber_of_storeys', 'floor', 'gallery_id', 'active'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['country', 'city', 'area', 'adress', 'image_url', 'phone'], 'string', 'max' => 128],
            [['square'], 'string', 'max' => 64],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'short_content' => Yii::t('app', 'Short Content'),
            'content' => Yii::t('app', 'Content'),
            'category_id' => Yii::t('app', 'Category ID'),
            'users_id' => Yii::t('app', 'Users ID'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'area' => Yii::t('app', 'Area'),
            'adress' => Yii::t('app', 'Adress'),
            'square' => Yii::t('app', 'Square'),
            'nuber_of_storeys' => Yii::t('app', 'Nuber Of Storeys'),
            'floor' => Yii::t('app', 'Floor'),
            'price' => Yii::t('app', 'Price'),
            'image_url' => Yii::t('app', 'Image Url'),
            'gallery_id' => Yii::t('app', 'Gallery ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'phone' => Yii::t('app', 'Phone'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
	
	
}
