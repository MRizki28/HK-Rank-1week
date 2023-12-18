<?php

/*
 * Complete the 'lonelyinteger' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function lonelyinteger($a)
{
    $number_occur_mapping = [];
    $lonely_number_candidate = [];
    $lonely_number = null;

    foreach ($a as $number) {
        if (!isset($number_occur_mapping[$number])) {
            $lonely_number_candidate[$number] = $number;
        } else {
            unset($lonely_number_candidate[$number]);
        }
        $number_occur_mapping[$number] = 1;
    }

    $lonely_number = array_pop($lonely_number_candidate);

    return $lonely_number;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lonelyinteger($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
