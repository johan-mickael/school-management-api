<?php

function extract_date($date)
{
    $time  = strtotime($date);
    $day   = date('d', $time);
    $month = date('m', $time);
    $year  = date('Y', $time);

    $hour = date('H', $time);
    $minute = date('i', $time);

    $dayOw = date('w', $time);

    return ['year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute, 'dayOw' => $dayOw];
}

function french_date($date)
{

    $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    $jours = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    $d = extract_date($date);
    return $jours[$d['dayOw']] . " " . $d['day'] . " " . $mois[$d['month']-1] . " " . $d['year'];
}



function concat_date_and_time($date, $time)
{
    return $date . " " . $time . "";
}
