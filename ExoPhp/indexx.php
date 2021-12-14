<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $var = 50;
        $test = number_format( is_numeric($var ?? null) ? $var : 0 , 2);
        
        $pu = 100;
        $tva = 20;
        $time = 12346;
        $remise = 20;

        echo exo1_3($pu,$tva);
        echo "<br>";
        echo exo2($time);
        echo "<br>";
        echo exo4(strtotime("23:30:00"));
        echo "<br>";
        echo exo5(strtotime("13:20:00"));


        function exo1_3($pu,$tva)
        {
            $priceTTC = $pu * (($tva/100)+1);
            if($priceTTC >= 100 && $priceTTC <= 500){
                $priceTTC *= (1 - 0.15);
            }else{
                $priceTTC *= (1 - 0.05);
            }

            return $priceTTC;
        }

        function exo2($time)
        {
            return gmdate("H:i:s",$time);
            $h = intval($time/3600);
            $m = intval($time%3600 / 60);
            $s = intval($time%3600 % 60);
            
            echo $h.'h '.$m.'m '.$s.'s';

            if($m < 10){
                $m = "0".$m;
            }
            if($s < 10){
                $s = "0".$s;
            }
            echo $h.":".$m.":".$s;
        }
        function exo4($now)
        {
            $hourNow = date("G",$now );
            $minuteNow = date("i",$now );
            if($hourNow < 5 or $hourNow >= 23){
                $message="Bonne nuit";
            }else if($hourNow < 12){
                $message="Bonne matinee";
            }
            else if($hourNow < 14 and $minuteNow < 30){
                $message="Bon appétit";
            }
            else if($hourNow < 18){
                $message="Bon après-midi";
            }
            else if($hourNow < 23){
                $message="Bonne soirée";
            }else{
                $message = "Bon rien";
            }
            return $message;
        }
        function exo5($now)
        {
            $hourNow = date("G",$now );
            $minuteNow = date("i",$now );
            switch(true){
                case $hourNow < 5 or $hourNow >= 23:
                    $message="Bonne nuit";
                    break;
                case $hourNow < 12:
                    $message="Bonne matinee";
                    break;
                case $hourNow < 14 and $minuteNow < 30:
                    $message="Bon appétit";
                    break;
                case $hourNow < 18:
                    $message="Bon après-midi";
                    break;
                case $hourNow < 23:
                    $message="Bonne soirée";
                    break;
                default:
                    $message = "Bon rien";
                    break;
            }
            return $message;
        }
    ?>

</body>
</html>