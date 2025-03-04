<?php
$symbol = "b";

switch ($symbol = strtolower($symbol)) {
    case "a":case "e":case "i":case "o":case "u":
        echo "Літера <U>$symbol</U> є голосною";
        break;
    case "b":case "w":case "r":case "t":case "p":case "s":case "d":case "f":case "g":case "h":case "j":case "k":case "l":case "z":case "x":case "c":case "v":case "b":case "n":case "m":case "y":
        echo "Літера <U>$symbol</U> є приголосною";
        break;
    default: echo "Не є літерою";
}
?>