<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;

class RentHouseController extends \yii\web\Controller
{
     public function actionIndex()
    {
       $rentHouse = Category::find()
    
	->andFilterWhere(['in', 'id', [5]])
   	->orderBy(['id' => SORT_ASC])
	->all();
		  
        return $this->render('index', [
            'categoryItems' => $rentHouse,					
        ]);
    }


}
