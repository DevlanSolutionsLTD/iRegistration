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


/* Overall Mortalities Based On Age Sets */

/* 0 - 10 Years  */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age BETWEEN 0 AND 10 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetOne);
$stmt->fetch();
$stmt->close();

/* 20 - 30 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age BETWEEN 20 AND 30 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetTwo);
$stmt->fetch();
$stmt->close();

/* 40 - 50 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age BETWEEN 40 AND 50 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetThree);
$stmt->fetch();
$stmt->close();

/* 60 - 70 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age BETWEEN 60 AND 70 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetFour);
$stmt->fetch();
$stmt->close();

/* 80 - 90 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age BETWEEN 80 AND 90 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetFive);
$stmt->fetch();
$stmt->close();

/* 90 And Above */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE age >  90 ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetFive);
$stmt->fetch();
$stmt->close();

