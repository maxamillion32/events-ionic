<?php
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');

    $host="localhost"; //replace with database hostname
    $username="zaemuzha_kira"; //replace with database username
    $password="nopassword"; //replace with database password
    $db_name="zaemuzha_fypkira"; //replace with database name

    $con=mysql_connect("$host", "$username", "$password")or die("cannot connect");

    mysql_select_db("$db_name")or die("cannot select DB");
   
    $sql = "SELECT * FROM eventList"; //$sql is a variable

    $events = mysql_query($sql); //use $sql as query statement, insert data into $event

    $json = array(); //create empty json array

    if(mysql_num_rows($events)){ //if event still has row with data
        while($row=mysql_fetch_assoc($events)){ //fetch one row data into row
            $json['events_list'][]=$row;
        }
    }

    mysql_close($con);
    echo json_encode($json);
?>