<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Realty;
use app\models\Images;
use yii\data\Pagination;
use yii\helpers\Html;


class RealtyController extends Controller
{
    public function actionIndex()
    {
        $query = Realty::find()->orderBy('id ASC');
            
			
		$page = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'pageSizeParam' => false,
            'forcePageParam' => false]);
        $realty = $query->offset($page->offset)->limit($page->limit)->all();

        return $this->render('index', [
		    'page' => $page,
            'realtyItems' => $realty
			
        ]);
		
		        		
    }

    public function actionView($id)
    {
        
        $id = intval($id);
        $realtyItem = Realty::findOne($id);

        if (empty($realtyItem)) {
            throw new \yii\web\NotFoundHttpException('realty with id ' . $id . ' was not found!');
        } else {
            $realtyItem->toArray();
        }
		
	
	$realtyGallery = Images::find()
    ->joinWith('realty')
    ->where([ 'images.realty_id' => $realtyItem[id] ]) 
	//->orderBy(['realty.id' => SORT_ASC])
    ->all();
	
         return $this->render('view', [
            'realtyItem' => $realtyItem,
			'realtyGallery' => $realtyGallery,
        ]);
    }

    public function actionNotFound()
    {
        throw new NotFoundHttpException('The requested page was not found from ' . __METHOD__);
    }
}


