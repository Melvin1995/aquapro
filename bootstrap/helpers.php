<?php

function greeting() {

    $hour = date('G');

    if ( $hour >= 5 && $hour <= 11 ) {
        $greeting = "Goedemorgen, ";
    } else if ( $hour >= 12 && $hour <= 18 ) {
        $greeting =  "Goedemiddag, ";
    } else if ( $hour >= 19 || $hour <= 4 ) {
        $greeting =  "Goedenavond, ";
    }

    return $greeting;
}