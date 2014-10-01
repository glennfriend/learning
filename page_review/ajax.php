<?php

    include_once 'library.php'; 

    $callbackFunctionName = 'callback';
    if ( isset($_GET['callback']) ) {
        $callbackFunctionName = preg_replace('#[^a-z]#', '', $_GET['callback']);
    }

    //
    echo $callbackFunctionName . '(';

    //
    echo json_encode(array());

    //
    echo ');';

