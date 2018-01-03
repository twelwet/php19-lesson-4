<?php
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=Moscow&mode=html&APPID=3858b299475c554824bb6d348e24a966';
    $json = file_get_contents($url);
    echo $json;
?>