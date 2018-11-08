<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;
use app\models\Realty;

class HouseSaleController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $houseCategory = Category::find()
    
	->andFilterWhere(['in', 'id', [11]])
   	->orderBy(['id' => SORT_ASC])
	->all();

		  
        return $this->render('index', [
            'categoryItems' => $houseCategory,					
        ]);
    }

}
