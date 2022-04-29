<?php

include "swapFunction.php";

function my_swap($lb, $la): void
{
    global $argc;
    global $la;
    global $lb;

    $number = count($la) - 1;
    $order = 0;

    if($argc == 2)
    {
        echo "\n";
    }

    foreach($la as $key => $value)
    {
        $current_index = current($la);
        $next_index = next($la);
        if($next_index && $next_index < $current_index)
        {
            $order++;
        }
    }
    if($order == 0 && $argc != 2)
    {
        echo "\n";
    } else
    {
        for($i = 0; $i < $order; $i++)
        {
            for($j = 0; $j < $number; $j++)
            {
                if($la[0] > $lb[1])
                {
                    sa($la);
                    pb($la, $lb);
                } else
                {
                    sb($lb);
                }
                if(!empty($la) && count($lb) >= 2 && $la[1] > $lb[0])
                {
                    sb($lb);
                }
            }
        }
        $tmp = count($lb);
        for($i = 0; $i < $tmp; $i++)
        {
            if(!empty($lb))
            {
                pa($la, $lb);
            }
        }

    }
}

my_swap($lb, $la);
