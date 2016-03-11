<?php

//LINK OF JENKINS API
$link = 'http://localhost:8080/api/json?tree=jobs[displayName,lastBuild[result]]';

try {
//GET RESPONSE OF JENKINS API
    $jobsString = file_get_contents($link);
//CONVERT STRING TO JSON
    $jobs = json_decode($jobsString);
//NEW CONNECTION TO DATABASE
    $db = new PDO('sqlite:Jenkins');
//QUERIE
    $query = 'INSERT INTO jobs (name, status) VALUES (:name, :status)';
//INSERT JOBS IN DATABASE 
    if (sizeof($jobs->jobs) > 0) {

        foreach ($jobs->jobs as $key => $value) {

            $sql = $db->prepare($query);
            $sql->bindParam(':name', $value->displayName, PDO::PARAM_STR);
            $sql->bindParam(':status', $value->lastBuild->result, PDO::PARAM_STR);
            $sql->execute();

            $errors = $sql->errorInfo();
//IF AN ERROR OCCUR DISPLAY THE ERROR
            if ($errors[0] !== "00000") {
                echo "For Job " . $value->displayName . " ERROR:" . $errors[2];
            }
        }

        echo "DONE!!!!";
    } else {
        echo "There isn't any job to insert";
    }
} catch (Exception $e) {
    echo "Error:" . $e->getMessage();
}
