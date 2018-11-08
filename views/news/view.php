<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 30.05.2017
 * Time: 20:19
 */

if (!empty($newsItem)) {

$newsItemHTML = <<<EOFN

<div class="newsItem">
    <div>Publication date: {$newsItem['pubDate']}</div>
    <div>by <a href="{$newsItem['avatarUrl']}"> @{$newsItem['author']} </a></div>
    <div><h1>{$newsItem['title']}</h1></div>
    <div>{$newsItem['text']}</div>
    <div>Source URL: <a href="{$newsItem['sourceUrl']}">{$newsItem['sourceUrl']}</a></div>
</div>

EOFN;

    echo $newsItemHTML;


} else {
    echo '<p>No news information was added.</p>';
}