<?php
function power($x, $y) {
    return pow($x, $y);
}

function factorial($x) {
    if ($x == 0) return 1;
    $result = 1;
    for ($i = 1; $i <= $x; $i++) {
        $result *= $i;
    }
    return $result;
}

function my_tg($x) {
    return sin($x) / cos($x);
}

function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}
?>
