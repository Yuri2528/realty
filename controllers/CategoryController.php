<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;
use app\models\Realty;



class CategoryController extends Controller


{
   	public function actionIndex()
    {
      	
	$category = Category::find()
    ->joinWith('realties')
	// ->where(['realty.active' => 1])
	->orderBy(['id' => SORT_ASC])
	->all();
	
	
        return $this->render('index', [
            'categoryItems' => $category,					
        ]);
    }
	
		public function actionList()
    {
      
	
	$realty = Realty::find()
    ->joinWith('category')
    ->where(['realty.active' => 1])
	->orderBy(['category.id' => SORT_ASC])
    ->all();

		  
        return $this->render('list', [
            'categoryRealty' => $realty,					
        ]);
    }

       	
	
	  public function actionView($id)
    {
        
        $id = intval($id);
        $categoryItem = Category::findOne($id);
		
		        
        if (empty($categoryItem)) {
            throw new \yii\web\NotFoundHttpException('Category with id ' . $id . ' was not found!');
        } else {
            $categoryItem->toArray();
        }
		
		$realtyCategory = Realty::find()
    ->joinWith('category')
    ->where(['realty.category_id' => $categoryItem])
	->orderBy(['category.id' => SORT_ASC])
    ->all();
	
					

        return $this->render('view', [
            'categoryItem' => $categoryItem,
			'realtyCategory' => $realtyCategory,
        ]);
    }

    public function actionNotFound()
    {
        throw new NotFoundHttpException('The requested page was not found from ' . __METHOD__);
    }
}


