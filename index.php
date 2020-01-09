<?php
include_once 'class/config.php';
include_once 'dom/simple_html_dom.php';
include_once 'class/homepage.php';
include_once 'class/post.php';

$login = new config();
$crawl = new HomePage();
$crawlpost = new post();


// $loginfb = $crawl->LoginFB('https://mbasic.facebook.com/truyentranhnhamnhi');
$data = $crawl->getlinkHome();

$filejson = file_get_contents('C:\\xampp\\htdocs\\learnPHP\\learnCURL\\CrawlFacebook\\data\\html_content_test.json');
$arraylink = json_decode($filejson);
echo '<pre>';

$crawlpost->dataPost($arraylink);
