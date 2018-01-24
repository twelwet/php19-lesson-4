<?php

    $city = 'Reykjavik';
    $appid = '3858b299475c554824bb6d348e24a966';
    $mode = 'html';
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&mode=' . $mode . '&APPID=' . $appid;
    $cacheFile = 'cache.txt';

    if (file_exists($cacheFile) && ((time() - filectime($cacheFile)) <= 10)) {
        echo file_get_contents($cacheFile);
    } else {
        $content = file_get_contents($url);
        file_put_contents($cacheFile, $content);
        echo $content;
    }
