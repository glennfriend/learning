<?php

    include_once 'library.php'; 

    $callbackFunctionName = 'callback';
    if ( isset($_GET['callback']) ) {
        $callbackFunctionName = filterCallbackFunctionName($_GET['callback']);
    }

    $page = 1;
    if ( isset($_GET['page']) ) {
        $page = (int) $_GET['page'];
    }

    $reviews = getReviews($page);

    // output
    echo $callbackFunctionName . '(';
    echo json_encode($reviews);
    echo ');';
