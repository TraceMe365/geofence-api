<?php

if ($_POST['data'] == "session"){
        getSession();
}
elseif($_POST['data'] == "getGeofenceList"){
        getGeofenceList($_POST['session_id']);
}


function getSession(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params=%7B%22token%22:%2262f92312f08f167f47cbc245ce2202b75E821AA9BEC688F6EBA84820AE72D64B8BCADB8D%22%7D',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Cookie: __ddg1_=DPn8hleZ0rgDgUPghp0J'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

function getGeofenceList($session_id){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/search_items&params=%7B%22spec%22:%7B%22itemsType%22:%22avl_resource%22,%22propName%22:%22zones_library,sys_id%22,%20%20%20%20%22propType%22:%22propitemname%22,%22propValueMask%22:%22*%22,%22sortType%22:%22sys_name%22%7D,%22force%22:4,%22flags%22:4097,%22from%22:0,%22to%22:0%7D&sid='.$session_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
        'Cookie: __ddg1_=DPn8hleZ0rgDgUPghp0J'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

}

