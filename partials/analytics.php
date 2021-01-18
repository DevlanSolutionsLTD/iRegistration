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


/* Overall Mortalities Based On Age Sets Based On Current Year */
$currentYear = date('Y');
/* 0 - 10 Years  */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age  BETWEEN 0 AND 10) AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetOne);
$stmt->fetch();
$stmt->close();

/* 20 - 30 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age BETWEEN 20 AND 30) AND year_reg = '$currentYear' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetTwo);
$stmt->fetch();
$stmt->close();

/* 40 - 50 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age BETWEEN 40 AND 50) AND year_reg = '$currentYear' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetThree);
$stmt->fetch();
$stmt->close();

/* 60 - 70 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age BETWEEN 60 AND 70) AND year_reg = '$currentYear' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetFour);
$stmt->fetch();
$stmt->close();

/* 80 - 90 Years */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age BETWEEN 80 AND 90) AND year_reg = '$currentYear' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetFive);
$stmt->fetch();
$stmt->close();

/* 90 And Above */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE (age >  90) AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($SetSix);
$stmt->fetch();
$stmt->close();


/* 
    Mortality Rates And Birth Rates Based On Months
    1. Birth Rates
*/
/* Jan */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Jan' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jan);
$stmt->fetch();
$stmt->close();

/* Feb */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Feb' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Feb);
$stmt->fetch();
$stmt->close();

/* Mar */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Mar' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Mar);
$stmt->fetch();
$stmt->close();

/* Apr */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Apr' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Apr);
$stmt->fetch();
$stmt->close();

/* May */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'May' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($May);
$stmt->fetch();
$stmt->close();

/* Jun */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Jun' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jun);
$stmt->fetch();
$stmt->close();

/* Jul */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Jul' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jul);
$stmt->fetch();
$stmt->close();

/* Aug */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Aug' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Aug);
$stmt->fetch();
$stmt->close();

/* Sep */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Sep' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Sep);
$stmt->fetch();
$stmt->close();

/* Oct */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Oct' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Oct);
$stmt->fetch();
$stmt->close();

/* Nov */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Nov' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Nov);
$stmt->fetch();
$stmt->close();

/* Dec */
$query = "SELECT COUNT(*)  FROM `births_registration` WHERE month_reg= 'Dec' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Dec);
$stmt->fetch();
$stmt->close();


/* 
    Mortality Rates And Birth Rates Based On Months
    2. Death Rates
*/
/* Jan */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Jan' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jan);
$stmt->fetch();
$stmt->close();

/* Feb */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Feb' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($feb);
$stmt->fetch();
$stmt->close();

/* Mar */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Mar' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($mar);
$stmt->fetch();
$stmt->close();

/* Apr */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Apr' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($apr);
$stmt->fetch();
$stmt->close();

/* May */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'May' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($may);
$stmt->fetch();
$stmt->close();

/* Jun */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Jun' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jun);
$stmt->fetch();
$stmt->close();

/* Jul */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Jul' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jul);
$stmt->fetch();
$stmt->close();

/* Aug */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Aug' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($aug);
$stmt->fetch();
$stmt->close();

/* Sep */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Sep' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sep);
$stmt->fetch();
$stmt->close();

/* Oct */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Oct' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($oct);
$stmt->fetch();
$stmt->close();

/* Nov */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Nov' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($nov);
$stmt->fetch();
$stmt->close();

/* Dec */
$query = "SELECT COUNT(*)  FROM `deaths_registration` WHERE month_reg= 'Dec' AND year_reg = '$currentYear'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($dec);
$stmt->fetch();
$stmt->close();