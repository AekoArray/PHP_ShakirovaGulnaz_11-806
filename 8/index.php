<?php
if (isset($_POST["submit"])){
    if (empty($_POST["month"])){
        $our_date = new DateTime();
        $our_month = $our_date->format('n');
    } else {
        $our_month = $_POST["month"];
    }
    $date1 = new DateTime();
    $month1 = $date1->format('n');
    $year = $date1->format('Y');
    $days_in_month = date('t', mktime(0, 0, 0, $our_month, 1, $year));
    print_r($our_month);
    $current_day = $date1->format('j');
    $first_weekday = date('N', mktime(0, 0, 0, $our_month, 1, $year));
    $result = calendar($our_month,  $month1, $year, $days_in_month, $current_day, $first_weekday);
    print $result;

} else {
    include "form.html";
}
function calendar($month, $month1, $year, $days_in_month, $current_day, $first_weekday){
    $calendar = '<table>';
    $calendar .= '<tr>';
    $nameOfDays = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
    for ($i = 0; $i < 7; $i++){
        $calendar .= '<th>'.'<strong>'.$nameOfDays[$i].'</strong>'.'</th>';
    }
    $calendar .= '</tr>';
    $days = 1;
    $counter = 1;
    $calendar .= '<tr>';
    while ($counter != $first_weekday) {
        $calendar .= '<th>' . " " .  '</th>';
        $counter++;
    }
    for ($i = 0; $i < $days_in_month; $i++){

        if (date('N', mktime(0, 0, 0, $month, $days, $year)) == 1){
            $calendar .= '<tr>';
            $calendar .= '<th >' . $days . '</th>';

        } else
            if (date('N', mktime(0, 0, 0, $month, $days, $year)) == 6){
                $calendar .= '<th style="color: red">' . $days . '</th>';
            } else
        if (date('N', mktime(0, 0, 0, $month, $days, $year)) == 7){
            $calendar .= '<th style="color: red">' . $days . '</th>';
            $calendar .= '</tr>';
        } else
        if($month == $month1 && $days == $current_day){
            $calendar .= '<th style="color: blue">' . $days .'</th>';
        } else{
            $calendar .= '<th>' . $days . '</th>';
        }
        $days++;
    }
    $calendar .= '</table>';

    return $calendar;
}
