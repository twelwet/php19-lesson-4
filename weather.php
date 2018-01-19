<?php

    $city = 'Deli';
    $appid = '3858b299475c554824bb6d348e24a966';
    $mode = 'html';
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&mode=' . $mode . '&APPID=' . $appid;
    $cacheFile = 'cache.txt';

    if (file_exists($cacheFile)) {
        $lastCacheChange = (time(void) - filectime($cacheFile));
        if ($lastCacheChange > 3600) {
            file_put_contents($cacheFile, file_get_contents($url));
        }
        echo file_get_contents($cacheFile);
    } else {
        file_put_contents($cacheFile, file_get_contents($url));
        echo file_get_contents($cacheFile);
    }
