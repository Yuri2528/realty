<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;
use app\models\Realty;

class PropertySaleController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $saleCategory = Category::find()
    
	->andFilterWhere(['in', 'id', [7, 8, 9, 10]])
   	->orderBy(['id' => SORT_ASC])
	->all();
		  
        return $this->render('index', [
            'categoryItems' => $saleCategory,					
        ]);
    }

}	
