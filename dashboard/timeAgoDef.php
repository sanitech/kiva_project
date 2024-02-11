<?php
function time_ago_def($date1, $date2) {
    $date1_obj = new DateTime($date1);
    $date2_obj = new DateTime($date2);
  
    $time_diff = $date2_obj->diff($date1_obj);
  
    // Calculate total seconds manually
    $total_seconds = $time_diff->days * 24 * 60 * 60 +
                    $time_diff->h * 60 * 60 +
                    $time_diff->i * 60 +
                    $time_diff->s;
  
    // Convert seconds to units and format the string
    $units = array(
      3600 => "H",
      60 => "M",
      1 => "S",
    );
  
    $time_diff_str = "";
    $prev_unit = 0;
    foreach ($units as $seconds => $unit) {
      $value = floor($total_seconds / $seconds);
      if ($value > 0) {
        $time_diff_str .=  $value . " " . $unit . ($value > 1 ? " " : "") ;
        $prev_unit = $seconds;
      }
      $total_seconds %= $seconds;
    }
  
    // Remove comma and space if last unit is less than a second
    if ($prev_unit > 1) {
      $time_diff_str = substr($time_diff_str, 0, -2);
    }
  
    return $time_diff_str;
  }
  