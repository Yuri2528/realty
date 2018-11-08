<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\ContactForm;
use app\models\News;
use app\models\User;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
			
		];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		 $news = News::find()
            ->select('*')
            ->orderBy(['pubDate' => SORT_DESC])
            ->asArray()
            ->all();
			
        return $this->render('index' , [
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

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
		
		
        if ($model->load(Yii::$app->request->post()) && $model->login()):
		//if (Yii::$app->user->identity->username == 'admin' ):
		 //return $this->redirect(['admin/default/index']);
        if (Yii::$app->user->identity->is_admin == 1 ):
        return $this->redirect(['admin/default/index']);
		else:
		return $this->redirect(['site/index']);

         endif;
         return $this->goBack();
			
        endif;
		
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
	 public function actionReg()
    {
		 $model = new RegForm();
		 
				 
		 if ($model->load(Yii::$app->request->post()) && $model->validate()):
		if ($user = $model->reg()):
		if ($user->status === User::STATUS_ACTIVE):
		if (Yii::$app->getUser()->login($user)):
		return $this->goHome();
		endif;
	endif;
		else:
		Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
		Yii::error('Ошибка при регистрации');
		return $this->refresh();
		
		endif;
	endif;
           			
        return $this->render( 'reg', [  
		     'model' => $model,
			]);
		
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
	 
	 
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionValuation()
    {
        return $this->render('valuation');
    }
	
	public function actionOwners()
    {
        return $this->render('owners');
    }
	
	public function actionAdvertising()
    {
        return $this->render('advertising');
    }
	
}
