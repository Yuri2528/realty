<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 30.05.2017
 * Time: 19:52
 */

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
            <a href="news/view/' . $ni['id'] . '">' . $ni['title'] . '</a>
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