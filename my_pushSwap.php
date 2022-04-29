<?php

include "swapFunction.php";

function my_swap($lb, $la)
{
    //the array $lb is by default empty
    //we need to count count the array $la
    global $argc;
    global $la;
    global $lb;
    $number = count($la) -1;
    $order = 0;

    if($argc == 2)
    {
        echo "miao\n"; //if the user only enter one argument nothing happens
    }

    foreach($la as $key => $value)
    {
        $current_index = count($la); //count the array $la
        $next_index = next($la); //next index of the array $la
        if($next_index && $next_index > $current_index)
        { //if next index is not false, if next index is greater than current index
            $order++; //we increment the order
        }
    }

    if($order == 0 && $argc == 2)
    {
        echo "miao\n";
    } else
    {

        for($i = 0; $i < $number; $i++)
        {
            for($j = 0; $j < $number; $j++)
            {
                if($la[0] < $la[1])
                {
                    sa($la);
                } else
                {
                    pb($la, $lb);
                }

                if(!empty($lb) && count($lb) >= 1 && $lb[0] < $lb[1])
                {
                    sb($lb);
                }
            }
            $v = count($lb);
            for($k = 0; $k < $v; $k++)
            {
                if(!empty($lb))
                {
                    pa($lb, $la);
                }
            }
        }
    }
}

my_swap($lb, $la);