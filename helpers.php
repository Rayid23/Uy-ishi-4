<?php
namespace helpers;
function dd(... $data)
{
    echo '<pre>';
    print_r( $data );
    echo '</pre>';
}

function dd1(... $data){
    echo '<pre>';
    var_dump( $data );
    echo '</pre>';
}

?>