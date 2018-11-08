<?php


use yii\helpers\Html;

$this->title = 'Категория';




if (!empty($realtyItem)) {
	

//$a = yii2_basic_mvc4;

$realtyItemHTML = <<<EOFN

<div class="newsItem">
    <div>Publication date: {$realtyItem['created_at']}</div>
	<div><h1>{$realtyItem['name']}</h1></div>
    <div><p>{$realtyItem['area']}</p></div>
	 <div>{$realtyItem['content']}</div>
	 <br>
	 <div> Цена: $ {$realtyItem['price']}</div>
   
</div>

EOFN;

    echo $realtyItemHTML;

	  } else {
    echo '<p>No realty information was added.</p>';
     }
  
  


/*
if (!empty($realtyGallery)) {
    $categoryListHtml = '<div class="categoryCont">';
    foreach ($realtyGallery as $ni) {
        $categoryListHtml .= '<div class="realtyGallery realtyGallery' . $ni['id'] . '">'
            . '
    
    <div class="col-sm-9 col-md-10 post">
	
        <h1>
		<a href="/yii2_basic_mvc4/web/realty/view/' . $ni['id'] . '">' . $ni['name'] . '</a>
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

*/
if (!empty($realtyGallery)) {
    

                        $pHtml = '';
                        foreach ($realtyGallery as $p1) {
                           // $a = yii2_basic_mvc4;
                            $imgUrl = 'http://placehold.it/800x300';
							 if (strlen($p1['path']) > 0) {
                                $imgUrl = $p1['path'];
                            
                            }
                            $pHtml .= '<div class="thumbnail">
                    <img class="img-responsive" src="' . $imgUrl . '" alt="' . $p1['text'] . '">
                    </div>';
                        }
                        echo $pHtml;
                    }	

					

					
	