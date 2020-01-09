<?php

class Config
{
    public $cookie = 'c_user=100044977642818; xs=26%3AroAp-55yVHvroQ%3A2%3A1578277875%3A-1%3A-1';
    public $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36';
    public function getCookie()
    {
        return $this->cookie;
    }
    public function getAgent()
    {
        return $this->user_agent;
    }
    public function LoginFB($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
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
            $fh = fopen('data/pages/html_page_0.html', 'w') or die("can't open file");
                    fwrite($fh, $re);
                    fclose($fh);
            echo 'dang nhap thanh cong';

        }
    }
}