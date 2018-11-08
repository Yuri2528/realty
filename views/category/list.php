
<?php

 

use yii\helpers\Html;

$this->title = 'Категория';
$this->params['breadcrumbs'][] = $this->title;


 
 
if (!empty($categoryRealty)) {
    $categoryListHtml = '<div class="categoryCont">';
    foreach ($categoryRealty as $ni) {
        $categoryListHtml .= '<div class="categoryRealty categoryRealty' . $ni['id'] . '">'
            . '
    
    <div class="col-sm-9 col-md-10 post">
	
        <h1>
		<a href="realty/view/' . $ni['id'] . '">' . $ni['name'] . '</a>
		</h1>
		<div class="content">
            <p>' . $ni['content'] . '</p>

                    </div>
    </div>
'
            . '</div>';
    }
    $categoryListHtml .= '</div>';

	

    echo $categoryListHtml;
} else {
    echo '<p>No category items added yet!<p>';
}