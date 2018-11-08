<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\AlertWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Realty',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	
	$menuItems = [
	
	        ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index']],
            ['label' => 'О КОМПАНИИ', 'url' => ['/site/about']],
			['label' => 'Недвижимость', 
			'items' => [
			['label' => 'По категориям',  
			'url' => ['/category']],
			
			'<li class = "divider"></li>',
						
			['label' => 'Все объекты',  
			'url' => ['/realty']],
			]
		 ],
		
		   ['label' => 'КОНТАКТЫ', 'url' => ['/site/contact']],
	
	];
	
	if (Yii::$app->user->isGuest):
	
	$menuItems[] = [
	'label' => 'РЕГИСТРАЦИЯ', 
	'url' => ['/site/reg']
	];
	
	$menuItems[] = [
	'label' => 'ВОЙТИ', 
	'url' => ['/site/login']
	];
	
	else:
	$menuItems[] = [
	 'label' => 'Выйти('.Yii::$app->user->identity['username'].')',
	 'url' => ['/site/logout'],
	 'linkOptions' => ['data-method' => 'post']
	];
	
	endif;
	
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems
          
       ]);
		
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
