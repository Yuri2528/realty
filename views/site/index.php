<?php

/* @var $this yii\web\View */

$this->title = 'Realty';
?>
<div class="site-index">

 
   
	
	 	 	 
	<?php use yii\bootstrap\Dropdown;
	
 use yii\bootstrap\ButtonDropdown;
 
 use  app\controllers\NewsController;
 use app\models\News;
	
 	
echo ButtonDropdown::widget([
	
    'label' => 'Недвижимость',
	
    'options' => [
	
        'class' => 'btn-lg btn-default',
	
        'style' => 'margin:5px'
		
		
	
    ],
	
    'dropdown' => [
	
        'items' => [
	
            [
	
                'label' => 'По категориям',
	
                'url' => '/web/category'
	
            ],
			
			[
	
                'label' => '',
	
                'options' => [
	
                    'role' => 'presentation',
	
                    'class' => 'divider'
	
                ]
	
            ],
	
            [
	
                'label' => 'Все объекты',
	
                'url' => '/web/realty'
	
            ],
	
            	
        ]
	
    ]
	
]);
	
 
	
echo ButtonDropdown::widget([
	
    'label' => 'Аренда',
	
    'options' => [
	
        'class' => 'btn-lg btn-primary',
	
        'style' => 'margin:5px'
	
    ],
	
    'dropdown' => [
	
        'items' => [
	
            [
	
                'label' => 'Квартиры',
	
                'url' => '/web/rent'
	
            ],
	
            [
	
                'label' => 'Дома',
	
                'url' => '/web/renthouse'
	
            ],
	
            [
	
                'label' => '',
	
                'options' => [
	
                    'role' => 'presentation',
	
                    'class' => 'divider'
	
                ]
	
            ],
	
            [
	
                'label' => 'Коммерческая недвижимость',
	
                'url' => '/web/rentcommercial'
	
            ]
	
        ]
	
    ]
	
]);
	
 
	
echo ButtonDropdown::widget([
	
    'label' => 'Продажа',
	
    'options' => [
	
        'class' => 'btn-lg btn-success',
	
        'style' => 'margin:5px'
	
    ],
	
    'dropdown' => [
	
        'items' => [
	
            [
	
                'label' => 'Квартиры',
	
                'url' => '/web/sale'
	
            ],
	
            [
	
                'label' => 'Дома',
	
                'url' => '/web/housesale'
	
            ],
	
            [
	
                'label' => '',
	
                'options' => [
	
                    'role' => 'presentation',
	
                    'class' => 'divider'
	
                ]
	
            ],
	
            [
	
                'label' => 'Земельные участки',
	
                'url' => '/web/saleland'
	
            ],
			
			 [
	
                'label' => 'Коммерческая недвижимость',
	
                'url' => '/web/salecommercial'
	
            ],
	
        ]
	
    ]
	
]);
	
 
	
echo ButtonDropdown::widget([
	
    'label' => 'Сервисы',
	
    'options' => [
	
        'class' => 'btn-lg btn-info',
	
        'style' => 'margin:5px'
	
    ],
	
    'dropdown' => [
	
        'items' => [
	
            [
	
                'label' => 'Владельцам',
	
                'url' => '/web/site/owners'
	
            ],
	
            [
	
                'label' => 'Оценка недвижимости',
	
                'url' => '/web/site/valuation'
	
            ],
	
            [
	
                'label' => '',
	
                'options' => [
	
                    'role' => 'presentation',
	
                    'class' => 'divider'
	
                ]
	
            ],
	
            [
	
                'label' => 'Реклама',
	
                'url' => '/web/site/advertising'
	
            ]
	
        ]
	
    ]
	
]);
	
 
	?>
	
	<br>
	<br>
	<br>
	
	<?php
	
if (!empty($newsItems)) {
    $newsListHtml = '<div class="newsCont">';
    foreach ($newsItems as $ni) {
        $newsListHtml .= '<div class="newsItem newsItem' . $ni['id'] . '">'
            . '
    <div class="col-md-2 col-sm-3 post-meta">
        <p class="time">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
            ' . $ni['pubDate'] . '</p>
                <p class="author">
            <a href=""><img src="' . $ni['avatarUrl'] . '" alt="samdark" height="32" width="32"> @' . $ni['author'] . '</a>        </p>


            </div>
    <div class="col-sm-9 col-md-10 post">
        <h1>
            <a href="view/' . $ni['id'] . '">' . $ni['title'] . '</a>
        </h1>

        <div class="content">
            <p>' . $ni['announce'] . '</p>

                    </div>
    </div>
'
            . '</div>';
    }
    $newsListHtml .= '</div>';

    echo $newsListHtml;
} else {
    echo '<p>No news items added yet!<p>';
}
	 
	
	
	
        