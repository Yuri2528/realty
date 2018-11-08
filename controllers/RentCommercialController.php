<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;

class RentCommercialController extends \yii\web\Controller
{
     public function actionIndex()
    {
       $rentCommercial = Category::find()
    
	->andFilterWhere(['in', 'id', [6]])
   	->orderBy(['id' => SORT_ASC])
	->all();

        return $this->render('index', [
            'categoryItems' => $rentCommercial,					
        ]);
    }



}
