<?php

$fp = fopen(__DIR__ . "/input.csv", "r");

$lineCount = 0;
$maleCount = 0;
$femaleCount = 0;
while($data = fgetcsv($fp)){
    // var_dump($data);
    $lineCount++;
    if($lineCount === 1){
        continue;
    }

    if($data[4] === "男性"){
        $maleCount++;
    }else{
        $femaleCount++;
    }
}

fclose($fp);

// echo $maleCount . $femaleCount;

$fpOut = fopen(__DIR__ . "/output.csv", "w");

$header = ["男性", "女性"];
fputcsv($fpOut, $header);

$outputData = [$maleCount, $femaleCount];
fputcsv($fpOut, $outputData);

fclose($fpOut);