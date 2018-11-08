<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 30.05.2017
 * Time: 19:51
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\News;


class NewsController extends Controller
{
    public function actionIndex()
    {
        $news = News::find()
            ->select('*')
            ->orderBy(['pubDate' => SORT_DESC])
            ->asArray()
            ->all();

        return $this->render('index', [
            'newsItems' => $news,
        ]);
    }

    public function actionView($id)
    {
       
        $id = intval($id);
        $newsItem = News::findOne($id);

        if (empty($newsItem)) {
            throw new \yii\web\NotFoundHttpException('News with id ' . $id . ' was not found!');
        } else {
            $newsItem->toArray();
        }

        
        return $this->render('view', [
            'newsItem' => $newsItem,
        ]);
    }

    public function actionNotFound()
    {
        throw new NotFoundHttpException('The requested page was not found from ' . __METHOD__);
    }
}