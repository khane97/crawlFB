<?php

include_once 'config.php';
include_once 'dom/simple_html_dom.php';
error_log(0);
class HomePage extends config
{
    # lấy link toàn bộ tin
    public function getlinkHome()
    {
        $chuoilink =array();
        $html = file_get_html('C:\\xampp\\htdocs\\learnPHP\\learnCURL\\CrawlFacebook\\data\\pages\\html_page_0.html');
        $links = $html->find('a');
        foreach( $links as $link)
        { 
            $label = $link->plaintext;
            if($label == 'Toàn bộ tin')
            {
                $tenlink = 'https:/mbasic.facebook.com'.$link->href;
                $chuoilink[] =  $tenlink;
                $myjson = json_encode($chuoilink);
                $save = fopen('data/html_post.json', 'w');
                fwrite($save, $myjson);
                fclose($save);
            }  
           
            
        }
        
        // return $tenlink;
        echo '<pre>';
        print_r( $chuoilink);
        //         echo  $myjson;
    }
    # lấy thông tin số like, số cmt
    public function getdataHome()
    {
        $html = file_get_html('C:\\xampp\\htdocs\\learnPHP\\learnCURL\\CrawlFacebook\\data\\pages\\html_page_0.html');
        $like = $html->find('a.fz');
        $cmt = $html->find('a.ga');
        foreach( $like as $l)
        { 
            echo $l->plaintext.'<br>';
        //   if ()
        //   {

        //   }
        //   else
        }
        $cmt2 = $html->find('a.ga',1);
        $cmt3 = $html->find('a.ga',4);
        $cmt4 = $html->find('a.ga',7);
        $cmt5 = $html->find('a.ga',10);
        $cmt6 = $html->find('a.ga',13);
        echo $cmt2->plaintext. '<br>';
        echo $cmt3->plaintext. '<br>';
        echo $cmt4->plaintext. '<br>';
        echo $cmt5->plaintext. '<br>';
        echo $cmt6->plaintext. '<br>';
        
        //     foreach ($cmt as $c) {
        //     //     # code...
        //     //     $te = $c->plaintext;
        //     //     // if($te== 'bình luận'){
        //             echo $c->children(1)->plaintext.'<br>';
        //     //     // break;
        //     //     //}   
        //     //     // for ($i=1; $i <= count($cmt) ; $i+3) { 
        //     //     //     # code...
        //     //     //     echo $c[$i]->outertext.'<br>';
        //     //     }
            
        // for ($i=1; $i< 15 ; $i++) { 
        //   # code...
        //   echo $html->find('a.ga',[$i]). '<br>';
        // }
    }
}