<?php

    $city = 'Moscow';
    $appid = '3858b299475c554824bb6d348e24a966';
    $mode = 'html';
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&mode=' . $mode . '&APPID=' . $appid;
    $cacheFile = 'cache.txt';

    $showCache = function($filename) {
        echo file_get_contents($filename);
    };

    $updateCache = function($link, $filename) {
        file_put_contents($filename, file_get_contents($link));
    };

    switch(file_exists($cacheFile)) {
        case true:
            $lastCacheChange = (time(void) - filectime($cacheFile));
            if ($lastCacheChange <= 3600) {
                $showCache($cacheFile);
            } else {
                $updateCache($url, $cacheFile);
                $showCache($cacheFile);
            }
            break;
        case false:
            $updateCache($url, $cacheFile);
            $showCache($cacheFile);
            break;
    }