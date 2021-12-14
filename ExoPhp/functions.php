<?php

function dd($data)
{
    var_dump($data);
    die();
}

function sortThree($x,$y,$z)
{
    if(is_numeric($x) && is_numeric($y) && is_numeric($z))
    {
        $table = [$x,$y,$z];
        if($x > $z){
            $table[0] = $z;
            $table[2] = $x;
            $x = $table[0];
            $z = $table[2];
        }
        if($x > $y){
            $table[0] = $y;
            $table[1] = $x;
            $x = $table[0];
            $y = $table[1];
        }
        if($y > $z){
            $table[1] = $z;
            $table[2] = $y;
            $y = $table[1];
            $z = $table[2];
        }
        return $table;
    }else{
        return "Mauvais type";
    }
    
}

function showEven($start, $end)
{
    $table = [];
    if(is_numeric($start) && is_numeric($end)){
        if($start > $end){
            return "2nd parameter must be higher than 1st";
        }else{
            $start = floor($start);
            $end = floor($end);
            if($start % 2){
                $start++;
            }
            for($i = $start; $i < $end; $i = $i+2){
                array_push($table,$i);
            }
        }
    }
    return $table;
}

?>