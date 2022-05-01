<?php

$la = $argv;
$lb = [];
array_shift($la); // we remove the name of the file
// and leave only the arguments

function sa(&$la): void //test ok, we flip the two first elements of $la
{
    if(count($la) >= 2)
    {
        $array_index = $la[0];
        $la[0] = $la[1];
        $la[1] = $array_index;
    }
}

function sb(&$lb): void //test ok, we flip the two first elements of $lb
{
    if(count($lb) >= 2)
    {
        $array_index = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $array_index;
    }
}

function sc(&$la, &$lb): void //test ok, we call sa and sb
{
    sb($lb);
    sa($la);
}

function pa(&$la, &$lb): void
//test ok, we take the first element of $lb
// and push it to first position of $la
{
    if(!empty($lb))
    {
        $array_index = array_shift($lb);
        array_unshift($la, $array_index);
    }
}

function pb(&$la, &$lb): void //test ok, we take the first element of $la
// and push it to first position of $lb
{
    if(!empty($la))
    {
        $array_index = array_shift($la);
        array_unshift($lb, $array_index);
    }
}

function ra(&$la): void
//test ok, we take the first element of $la
//and push it to the end of the array
{
    $array_index = array_shift($la);
    $la[] = $array_index;

}

function rb(&$lb): void
//test ok, we take the first element of $lb
//and push it to the end of the array
{
    $array_index = array_shift($lb);
    $lb[] = $array_index;
}

function rr(&$la, &$lb): void //test ok, we call ra and rb
{
    rb($lb);
    ra($la);
}

function rra(&$la): void
//test ok, take the last element of $la
// and push it to the beginning of $la
{
    $array_index = array_pop($la);
    array_unshift($la, $array_index);
}

function rrb(&$lb): void //test ok, take the last element of $lb
// and push it to the beginning of $lb
{
    $array_index = array_pop($lb);
    array_unshift($lb, $array_index);
}

function rrr(&$la, &$lb): void //test ok we call rra and rrb
{
    rrb($lb);
    rra($la);
}

function swapPush($la, $lb): void
{
    global $argc;
    global $la;
    global $lb;
    global $result;
    $n = count($la) - 1;
    $order = 0;

    //echos nothing if the passed argument contains only 2 arguments
    // (the script name and the first argument)
    if($argc == 2)
    {
        echo "\n";
    }

    //we loop through $la, if $next is true
    //and bigger than $current we increment $order
    for($i = 0; $i < count($la); $i++)
    {
        $current = current($la);
        $next = next($la);
        if($next && $next < $current)
        {
            $order++;
        }
    }

    //echos nothing if $order is zero
    // but $argc hase more than 2 arguments
    if($order == 0 && $argc != 2)
    {
        echo "\n";
    } else
    {
        for($i = 0; $i < $n; $i++) //we loop through $la = $n for both for
        {
            for($j = 0; $j < $n; $j++)
            {
                //if $la[0] is bigger than $la[1]
                // then we call the sa function
                if($la[0] > $la[1])
                {
                    sa($la);
                    $result .= " sa"; //we concat a string to $result
                }
                pb($la, $lb);
                $result .= " pb";

                //if $lb is not empty and that $lb[0] is smaller than $lb[1]
                // then we call the sb function
                if(!empty($lb) && count($lb) >= 2 && $lb[0] < $lb[1])
                {
                    sb($lb);
                    $result .= " sb";
                }
            }

            $v = count($lb);
            for($k = 0; $k < $v; $k++)
            {
                if(!empty($lb))
                {
                    pa($la, $lb);
                    $result .= " pa";
                }
            }
        }
    }

    //if $result is true then we
    // echo $result in terminal
    if($result)
    {
        echo trim($result) . "\n";
    }

}

swapPush($la, $lb);