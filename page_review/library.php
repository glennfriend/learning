<?php

function getAllReviews()
{
    return array(
        array('Leanne',   '100', '30/12/2012', 'What a beautiful dress! The fabric is very nice and the tailoring is excellent. Just one issue I found my wedding gown to be a little crumpled up I guess from the packing and all. I would ask my mom to carefully iron it for me.'),
        array('Margo S',   '90', '21/09/2012', 'it fits well on me and I adore each single bit of thing about it._ adore how it overall looks on me.'),
        array('Lady Gaga', '95', '01/01/2014', 'very good'),
        array('Lady Gaga', '95', '01/02/2014', 'very good'),
        array('Lady Gaga', '90', '01/03/2014', 'very good'),
        array('Lady Gaga', '90', '01/04/2014', 'very good'),
        array('Lady Gaga', '90', '01/05/2014', 'very good'),
        array('Lady Gaga', '50', '01/06/2014', 'very good'),
        array('Verda X',   '80', '07/09/2012', 'I just letting you know how pleased I am with my dress, it arrived today and I am delighted with it! The quality is amazing and it fits very well, not to mention it looks gorgeous! Thanks!'),
        array('Verda Y',   '82', '07/09/2012', 'Thanks!'),
        array('Verda Z',   '84', '07/09/2012', 'Very Thanks!'),
    );
}

function getAllReviewCount()
{
    return count(getAllReviews());
}

function getReviews( $page=1 )
{
    $itemPerPage = 3;
    $data = getAllReviews();

    $items = array();
    foreach ( $data as $index => $item ) {
        $items[$index] = array(
            'id'        => $index + 1,
            'name'      => $item[0],
            'rating'    => $item[1],
            'date'      => $item[2],
            'content'   => $item[3],
        );
    }

    // 製做分頁
    $group = array_chunk($items, $itemPerPage);
    // echo '<pre>'; print_r($group); echo '</pre>'; exit;

    if ( isset($group[$page-1] ) ) {
        return $group[$page-1];
    }
    return array();
}

function getTpl( $fileName, $keyword )
{
    $fileName = preg_replace('#[^a-zA-Z]#',    '', $fileName );
    $keyword  = preg_replace('#[^a-zA-Z0-9]#', '', $keyword  );
    if ( $fileName && $keyword ) {
        include 'tpl/'. $fileName .'.tpl.php';
    }
}

function filterCallbackFunctionName( $name )
{
    return preg_replace('#[^a-zA-Z0-9\_]#', '', $name);
}




