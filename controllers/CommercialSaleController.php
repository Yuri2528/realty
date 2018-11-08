<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;


class CommercialSaleController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $saleCommercial = Category::find()
    
	->andFilterWhere(['in', 'id', [13]])
   	->orderBy(['id' => SORT_ASC])
	->all();
		  
        return $this->render('index', [
            'categoryItems' => $saleCommercial,					
        ]);
    }


}
