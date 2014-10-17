<?php

function getViewComponent( $fileName, $keyword )
{
    $fileName = preg_replace('#[^a-zA-Z]#',    '', $fileName );
    $keyword  = preg_replace('#[^a-zA-Z0-9]#', '', $keyword  );
    if ( $fileName && $keyword ) {
        include 'view_component/'. $fileName .'.php';
    }
}

