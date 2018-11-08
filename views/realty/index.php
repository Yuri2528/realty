<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;


$this->title = 'Вся недвижимость';
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="col-md-9">

                <?php
                    if (!empty($realtyItems)) {

                        $pHtml = '';
                        foreach ($realtyItems as $p1) {
                           // $a = news2.esy.es;
                           // $imgUrl = 'http://placehold.it/800x300';
							 if (strlen($p1['image_url']) > 0) {
                                $imgUrl = $p1['image_url'];
                            
                            }
                            $pHtml .= '<div class="thumbnail">
                    <img class="img-responsive" src=" '. $imgUrl . '" alt="' . $p1['short_content'] . '">
                    <div class="caption-full">
                        <h4 class="pull-right">' . $p1['created_at'] . '</h4> 
                        <h4><a href="realty/view/' . $p1['id'] . '">' . $p1['name'] . '</a>
                        </h4>
                        <div class="text-right">
                            <p> $ ' . $p1['price'] . '</p>
                        </div>
                        <div>' . $p1['content'] . '</div>
                    </div>
                    </div>';
					
                        }
                        echo $pHtml;
                    }	
					
					
      ?>

	  <?= LinkPager::widget(['pagination' => $page])?>
     </div>	  
