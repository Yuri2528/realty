<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;

class RentController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $saleCommercial = Category::find()
    
	->andFilterWhere(['in', 'id', [2, 3, 4]])
   	->orderBy(['id' => SORT_ASC])
	->all();

  
        return $this->render('index', [
            'categoryItems' => $saleCommercial,					
        ]);
    }

}
