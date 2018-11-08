<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Realty;

/**
 * RealtySearch represents the model behind the search form about `app\models\Realty`.
 */
class RealtySearch extends Realty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'users_id', 'nuber_of_storeys', 'floor', 'gallery_id', 'active'], 'integer'],
            [['name', 'short_content', 'content', 'country', 'city', 'area', 'adress', 'square', 'image_url', 'created_at', 'updated_at', 'phone'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
	
	public function attributeLabels()
    {
        return [
            'id' => 'Номер',
			'name' => 'Имя',
			'short_content' => 'Короткое описание',
            'content' => 'Описание',
            'category_id' => 'Номер категории',
            'users_id' => 'Пользователь_id',
            'country' => 'Страна',
            'city' => 'Город',
            'area' => 'Район',
            'adress' => 'Адрес',
            'square' => 'Площадь',
            'nuber_of_storeys' => 'Этажность',
            'floor' => 'Этаж',
            'price' => 'Цена',
            'image_url' => 'Фото',
            'gallery_id' => 'Номер галлереи',
            'created_at' => 'Дата создания',
            'updated_at' => 'Последнее обновление',
            'phone' => 'Телефон',
            'active' => 'Статус',

			
			
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Realty::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'users_id' => $this->users_id,
            'nuber_of_storeys' => $this->nuber_of_storeys,
            'floor' => $this->floor,
            'price' => $this->price,
            'gallery_id' => $this->gallery_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_content', $this->short_content])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
	
	
}
