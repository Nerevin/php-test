<?php 
    function dataCheck($dateRange, $checkDate) {
        $date = preg_split("/ - /", $dateRange);
        echo boolval($date[0] <= $checkDate && $checkDate <= $date[1]) ? "true" : "false";
    }
?>