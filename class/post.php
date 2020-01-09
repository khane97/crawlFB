<?php
include_once 'config.php';
include_once 'dom/simple_html_dom.php';

class post extends config
{
    public function dataPost($urls)
    {
        $count = 0;
        $multiCurl = array();
        $mh = curl_multi_init();
        $result = array();
        foreach ($urls as $i => $link) {
            $multiCurl[$i] = curl_init();
            // $url[$i] = 'https://mbasic.facebook.com'.$link;
            curl_setopt($multiCurl[$i], CURLOPT_URL,$link);
            curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($multiCurl[$i], CURLOPT_FRESH_CONNECT, true);
            curl_setopt($multiCurl[$i], CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($multiCurl[$i], CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($multiCurl[$i],CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($multiCurl[$i], CURLOPT_COOKIE, $this->getCookie());
            curl_setopt($multiCurl[$i], CURLOPT_USERAGENT, $this->getAgent());
            
            curl_multi_add_handle($mh, $multiCurl[$i]);
            echo '<pre>';
            echo $link.'<br>';
        }

        $index = null;
        do {
           $res = curl_multi_exec($mh, $index);
        } while ($index > 0);
        foreach ($multiCurl as $i=> $as) {
            $result[$i] = curl_multi_getcontent($as);
            curl_multi_remove_handle($mh, $as);
            $fh[$i] = fopen('data/posts/html_content_'.$i.'.html', 'w');
                fwrite($fh[$i],$result[$i]);
                fclose($fh[$i]);
            // echo $res;
        }
        curl_multi_close($mh);
        print_r($result);
    }



















        public function resd ($urls)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urls);
            curl_setopt($ch, CURLOPT_COOKIE, $this->getCookie());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT,$this->getAgent());
            // curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
            $re= curl_exec($ch);
            curl_close($ch);
            if ($re === null) {
                echo " khong dang nhap duoc";
            }
            else
            {
                echo $re;
            }
        }

        
        
   


}








































            // echo '<br>'.$res.'<br>';
            // // $tongURL = count($url);
            // foreach ($url as $num => $value) {
            //     // for ($i = 0; $i <  $tongURL; $i++) {
            //     $ch = curl_init();
            
            //     curl_setopt($ch, CURLOPT_URL, $value);
            //     curl_setopt($ch, CURLOPT_COOKIE, $this->getCookie());
            //     // curl_setopt($ch, CURLOPT_COOKIEJAR,'C:\\xampp\\htdocs\\learnPHP\\learnCURL\\testlogin\\kookie_test.txt');
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($ch, CURLOPT_USERAGENT, $this->getAgent());

            //     $re= curl_exec($ch);
            
            //     if ($re === null) {
            //         echo " khong dang nhap duoc";
            //     } else {
            //         $fh = fopen('data/posts/html_content_'.$num.'.html', 'w');
            //         fwrite($fh, $re);
            //         fclose($fh);
            //     }
            //     curl_close($ch);
            // }




            //cach moi
            // foreach ($urls as $i => $url) {
            //     $multiCurl[$i] = curl_init();
            
            //     // Set all your options for each connection here
            //     curl_setopt($multiCurl[$i], CURLOPT_URL, $url);
            //     curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($multiCurl[$i], CURLOPT_COOKIE, $this->getCookie());
            //     curl_setopt($multiCurl[$i], CURLOPT_USERAGENT, $this->getAgent());
            //     curl_setopt($multiCurl[$i], CURLOPT_CONNECTTIMEOUT, 60);
            // }

            // $mh = curl_multi_init();
            // foreach ($multiCurl as &$mc) {
            //     curl_multi_add_handle($mh,$mc);
            // }
            // $active = null;

            // do{
            //     $mrc = curl_multi_exec($mh, $active);
            //     $mrc2 = curl_exec($mh);
            // }while($active > 0);
            
            // foreach($multiCurl as $i=>$ch)
            // {
            //     $html = curl_multi_getcontent($ch);
            //     $op[$i] = fopen('data/posts/html_content_'.$i.'.html', 'w');
            //     // fwrite($op, $html);
            //     // fclose( $op[$i]);
            //     curl_multi_remove_handle($mh, $ch);
            //     echo $html;
            //     echo $mrc2;
            // }
            // curl_multi_close($mh);    
            // for ($i=0; $i < count($urls) ; $i++) { 
            //     # code...
            //     $ch= curl_init();
            //     curl_setopt($ch, CURLOPT_URL,$urls[$i]);
            //     curl_setopt($ch, CURLOPT_COOKIE, $this->getCookie());
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($ch, CURLOPT_USERAGENT,$this->getAgent());
            //     // curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
            //     $re= curl_exec($ch);
            //     curl_close($ch);
            //     if ($re === null) {
            //         echo " khong lay duoc du lieu nguon";
            //     }
            //     else
            //     {
            //         // $fh[$i] = fopen('data/posts/html_content_'.$i.'.html', 'w');
            //         //         fwrite($fh[$i], $re[$i]);
            //         //         fclose($fh[$i]);
            //         // echo '<pre>'.$urls[$i]. '<br>';
            //         echo '<pre>'.$re. '<br>';
            //     }
                
            // }


        
      
        // function multiRequest($data, $options = array()) {
 
        //     // array of curl handles
        //     $curly = array();
        //     // data to be returned
        //     $result = array();
           
        //     // multi handle
        //     $mh = curl_multi_init();
           
        //     // loop through $data and create curl handles
        //     // then add them to the multi-handle
        //     foreach ($data as $id => $d) {
           
        //       $curly[$id] = curl_init();
           
        //       $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
        //       curl_setopt($curly[$id], CURLOPT_URL,            $url);
        //       curl_setopt($curly[$id], CURLOPT_HEADER,         0);
        //       curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
        //       curl_setopt($curly[$id], CURLOPT_COOKIE, $this->getCookie());
        //       curl_setopt($curly[$id], CURLOPT_USERAGENT,$this->getAgent());
           
        //       // post?
        //     //   if (is_array($d)) {
        //     //     if (!empty($d['post'])) {
        //     //       curl_setopt($curly[$id], CURLOPT_POST,       1);
        //     //       curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
        //     //     }
        //     //   }
           
        //       // extra options?
        //       if (!empty($options)) {
        //         curl_setopt_array($curly[$id], $options);
        //       }
           
        //       curl_multi_add_handle($mh, $curly[$id]);
        //     }
           
        //     // execute the handles
        //     $running = null;
        //     do {
        //       curl_multi_exec($mh, $running);
        //     } while($running > 0);
           
           
        //     // get content and remove handles
        //     foreach($curly as $id => $c) {
        //       $result[$id] = curl_multi_getcontent($c);
        //       $fh[$id] = fopen('data/posts/html_content_'.$id.'.html', 'w');
        //                     fwrite($fh[$id], $result[$id]);
        //                     fclose($fh[$id]);
        //       curl_multi_remove_handle($mh, $c);
        //     }
           
        //     // all done
        //     curl_multi_close($mh);
           
        //     // return $result;
        //   }
    