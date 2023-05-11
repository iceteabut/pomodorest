<?php

// Get the POST parameters
$user_id = $_POST['user_id'];
$stat_date = date('Y-m-d');
$stat_full_day = $_POST['stat_full_day'];
$stat_minutes = $_POST['stat_minutes'];
$stat_rounds = $_POST['stat_rounds'];
$weekStart = date('Y-m-d', strtotime('monday this week'));
$weekEnd = date('Y-m-d', strtotime('sunday this week'));

// Connect to the database
$hName = 'localhost';
$uName = 'root';
$password = '';
$dbName = 'TimerDB';
$dbCon = mysqli_connect($hName, $uName, $password, $dbName);
if (!$dbCon) {
    die('Could not Connect MySQL Server.');
}

// Check if a row exists for today
$today = date("Y-m-d");
$weekStart = date('Y-m-d', strtotime('monday this week'));
$weekEnd = date('Y-m-d', strtotime('sunday this week'));

$checkSql = "SELECT * FROM user_stats WHERE user_id='$user_id' AND stat_date='$today'";
$result = mysqli_query($dbCon, $checkSql);

if(mysqli_num_rows($result) > 0) {
    // A row already exists for today, update the stat_rounds and stat_minutes fields if the current values are smaller
    $row = mysqli_fetch_assoc($result);
    if($stat_rounds > $row['stat_rounds'] || $stat_minutes > $row['stat_minutes']) {
        $updateSql = "UPDATE user_stats SET ";
        if($stat_rounds > $row['stat_rounds']) {
            $updateSql .= "stat_rounds='$stat_rounds', ";
        }
        if($stat_minutes > $row['stat_minutes']) {
            $updateSql .= "stat_minutes='$stat_minutes', ";
        }
        $updateSql = rtrim($updateSql, ", "); // Remove the last comma
        $updateSql .= " WHERE user_id='$user_id' AND stat_date='$today'";
        if(mysqli_query($dbCon, $updateSql)) {
            echo "Lentele atnaujinta";
        } else {
            echo "Buvo klaidu: " . mysqli_error($dbCon);
        }
    }
} else {
    // No row exists for today, insert a new row
    $sql = "INSERT INTO user_stats (user_id, stat_date, stat_full_day, stat_minutes, stat_rounds, week_start, week_end) 
            VALUES ('$user_id', '$stat_date', $stat_full_day, '$stat_minutes','$stat_rounds', '$weekStart', '$weekEnd')";
    if(mysqli_query($dbCon, $sql)) {
        echo "Lentele papildyta";
    } else {
        echo "Buvo klaidu: " . mysqli_error($dbCon);
    }
}
mysqli_close($dbCon);
?>