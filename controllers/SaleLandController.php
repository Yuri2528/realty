<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;


class SaleLandController extends \yii\web\Controller
{
    public function actionIndex()
    {
       $saleLand = Category::find()
    
	->andFilterWhere(['in', 'id', [12]])
   	->orderBy(['id' => SORT_ASC])
	->all();


        return $this->render('index', [
            'categoryItems' => $saleLand,					
        ]);
    }

}
