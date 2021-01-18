<?php
/*
    Analytics Logic And Index Cards
    1. Total Registered Births
    2. Total Registered Deaths

    Charts Logic
        1. Pie Chart - Overall Births And Deaths Registrations
        2. Pie Chart  - Overall Reported Mortalities Based On Age Sets
        3. Line Graph - Reported Deaths And Births Based On Months And Years
 */



/* 1. Total Registered Births */
$query = "SELECT COUNT(*)  FROM `births_registration` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($registered_births);
$stmt->fetch();
$stmt->close();

/* 2. Total Registered Deaths */
$query = "SELECT COUNT(*)  FROM `deaths_registration` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($registered_deaths);
$stmt->fetch();
$stmt->close();


