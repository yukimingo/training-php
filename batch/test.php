<?php
// echo "hello world!!!\n";

$num = $argv[1];

if($num % 3 === 0 && $num % 5 === 0){
    echo "FizzBuzz";
}elseif($num % 3 === 0){
    echo "Fizz";
}elseif($num % 5 === 0){
    echo "Buzz";
}else{
    echo $num;
}