<?php

/*$la = [1, 12, 34, 99, 42, "la_array"]; // first array to be sorted (the string "la_array" is to differentiate it from the second array)*/
/*$lb = [101, 13, 8, 69, 12, "lb_array"]; // second array to be sorted (the string "lb_array" is to differentiate it from the first array)*/

    $la = $argv;
    array_shift($la);
    $lb = array();
    $argc;

// Take into account that when executing the script, the first print_r's are
// the default arrays and not the arrays after the sort, so please don't be confused :) .

function sa(&$la): void //ok
{
    if(count($la) >= 2)
    {
        $array_index = $la[0];
        $la[0] = $la[1];
        $la[1] = $array_index;
        unset($array_index);
    }
}

function sb(&$lb): void //ok
{
    if(count($lb) >= 2)
    {
        $array_index = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $array_index;
        unset($array_index);
    }
}

function sc(&$la, &$lb): void //ok
{
    sb($lb);
    sa($la);
}

function pa(&$la, &$lb): void //ok
{
    if(!empty($lb))
    {
        $array_index = array_shift($lb);
        array_unshift($la, $array_index);
        unset($array_index);
    }
}

function pb(&$la, &$lb): void //ok
{
    if(!empty($la))
    {
        $array_index = array_shift($la);
        array_unshift($lb, $array_index);
        unset($array_index);
    }
}

function ra(&$la): void //ok
{
    $array_index = array_shift($la);
    $la[] = $array_index;
    unset($array_index);

}

function rb(&$lb): void //ok
{
    $array_index = array_shift($lb);
    $lb[] = $array_index;
    unset($array_index);
}

function rr(&$la, &$lb): void //ok
{
    rb($lb);
    ra($la);
}

function rra(&$la): void //ok
{
    $array_index = array_pop($la);
    array_unshift($la, $array_index);
    unset($array_index);
}

function rrb(&$lb): void //ok
{
    $array_index = array_pop($lb);
    array_unshift($lb, $array_index);
    unset($array_index);
}

function rrr(&$la, &$lb): void //ok
{
    rrb($lb);
    rra($la);
}

?>