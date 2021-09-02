<?php
    function test($d){
        if($d>=100) return $d;
        else if($d<100 && $d>=10) return "0".$d;
        else return "00".$d;
    }
    function cost($a){
        if($a>=1000000){
            $b=round($a/1000000-0.5);
            $c=$a - $b*1000000;
            $c=round($c/1000-0.5); 
            $d= $a - $b*1000000 - $c*1000;
            return $b.".".test($c).".".test($d);
        }
        else{
            $b=round($a/1000-0.5);
            $d=$a - $b*1000;
            return $b.".".test($d);
        }
    }    
?>
