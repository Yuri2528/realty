
<?php

use yii\helpers\Html;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>

<?php
 
//use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;

if (!empty($categoryItems)) {
    $categoryListHtml = '<div class="categoryCont">';
    foreach ($categoryItems as $ni) {
        $categoryListHtml .= '<div class="categoryItem categoryItem' . $ni['id'] . '">'
            . '
    
    <div class="col-sm-9 col-md-10 post">
	
        <h1>
		<a href="category/view/' . $ni['id'] . '">' . $ni['name'] . '</a>
		</h1>
		<div class="content">
            <p>' . $ni['description'] . '</p>

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

