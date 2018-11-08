<?php

use yii\helpers\Html;

$this->title = 'Категория';
$this->params['breadcrumbs'][] = $this->title;


	


if (!empty($categoryItem)){


$categoryItemHTML = <<<EOFN

<div class="categoryItem">

    <div><h1>{$categoryItem['name']}</h1></div>
    <div>{$categoryItem['description']}</div>
</div>

EOFN;

    echo $categoryItemHTML;


} else {
    echo '<p>No category information was added.</p>';
}

if (!empty($realtyCategory)) {
    $categoryListHtml = '<div class="categoryCont">';
    foreach ($realtyCategory as $ni) {
        $categoryListHtml .= '<div class="realtyCategory realtyCategory' . $ni['id'] . '">'
            . '
    
    <div class="col-sm-9 col-md-10 post">
	
        <h1>
		<a href="/web/realty/view/' . $ni['id'] . '">' . $ni['name'] . '</a>
		</h1>
		<div class="content">
            <p>' . $ni['short_content'] . '</p>

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