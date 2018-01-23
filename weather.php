<?php

    $city = 'Saigon';
    $appid = '3858b299475c554824bb6d348e24a966';
    $mode = 'html';
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&mode=' . $mode . '&APPID=' . $appid;
    $cacheFile = 'cache.txt';

    if (file_exists($cacheFile) && ((time() - filectime($cacheFile)) <= 10)) {
        echo file_get_contents($cacheFile);
    } else {
        file_put_contents($cacheFile, file_get_contents($url));
        echo file_get_contents($cacheFile);
    }
