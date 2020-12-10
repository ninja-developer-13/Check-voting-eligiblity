<?php
    $dateOfBirth = $_POST['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    if($diff->format('%y')>= 18){
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>1, 'msg'=>'You are eligible for vote. Your Age is: '.$diff->format('%y').' Years, '.$diff->format('%m').' months ,'.$diff->format('%d').' days'));
        exit;
    }else{
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>1, 'msg'=>'You are not eligible for vote. Your Age is: '.$diff->format('%y').' Years, '.$diff->format('%m').' months ,'.$diff->format('%d').' days'));
        exit;
    }
?>
