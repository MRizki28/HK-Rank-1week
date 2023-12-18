<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function diagonalDifference($arr)
{
    $last_index_of_row = count($arr) - 1;

    $first_diagonal_number_sum = 0;
    $second_diagonals_number_sum = 0;

    $search_counter = 0;

    foreach ($arr as $row_number) {
        $first_diagonals_row_index = $search_counter;
        $second_diagonals_row_index = $last_index_of_row - $search_counter;

        $first_diagonal_number_sum += $row_number[$first_diagonals_row_index];
        $second_diagonals_number_sum += $row_number[$second_diagonals_row_index];
        $search_counter++;
    }

    $number_difference = abs($first_diagonal_number_sum - $second_diagonals_number_sum);

    return $number_difference;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
