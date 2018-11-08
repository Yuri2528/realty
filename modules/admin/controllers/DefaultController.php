<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\models\Category;
use app\modules\admin\models\CategorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\loginForm;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
	 
	 public $layout = 'main';
	 
	   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['admin', 'create', 'update', 'delete'],
						'allow' => true,
						'roles' => ['@']
					],
					[
						'actions' => ['index', 'view'],
						'allow' => true,
						'roles' => ['@']
					],
				]
			]
        ];
    }
	 
	 
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionLogin()
{
    $model = new loginForm();

   	
	  if ($model->load(Yii::$app->request->post()) && $model->login()) {
		//if (Yii::$app->user->identity->username == 'admin' ):
		 //return $this->redirect(['admin/default/index']);
        if (Yii::$app->user->identity->is_admin == 1 ) {
        return $this->redirect(['default/index']);
	  } else {
		return $this->redirect(['/site/index']);

	  }
            return $this->goBack();
			
}
	

    return $this->render('login', [
        'model' => $model,
    ]);
 }
}
