<?php
//LINK OF JENKINS API
$link ='http://localhost:8080/api/json?tree=jobs[displayName,lastBuild[result]]';

//GET RESPONSE OF JENKINS API
$jobsString = file_get_contents($link);

//CONVERT STRING TO JSON
$jobs = json_decode($jobsString);
//NEW CONNECTION TO DATABASE
$db = new SQLite3('Jenkins');
//HEAD OF INSERT QUERIE
$insert = 'INSERT INTO jobs (name, status) VALUES ';
//LOOP THAT FULLFILLS THE INSERT QUERY
foreach ($jobs->jobs as $key => $value) {
    
    $insert .="("
            . "'".$value->displayName."',"
            . "'".$value->lastBuild->result."'"
            . "),";
}
//DELETE THE LAST COMMA IN THE QUERIE
$insert = rtrim($insert,",");
//EXECUTE THE QUERY
$db->exec($insert);
//CLOSE CONNECTION
$db->close();
