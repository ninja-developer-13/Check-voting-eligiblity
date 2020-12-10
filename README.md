# How-to-check-whether-input-age-is-eligible-for-voting-or-not-using-PHP-ajax-
In this tutorial you will learn how to check whether input age is eligible for voting or not using PHP ajax.

Input age of the person and we have to write a function to validate whether person is eligible for voting or not in php and ajax? 

Step1: Create index.html and copy/paste below code in index.html

index.html

<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>www.sleepycoder.com | Enter your Date of Birth to check your vote eligiblity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css
/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.
validate.min.js"></script>
  <script src="ajax.js" type="text/javascript"></script>
     <style type="text/css">
        .label {
        width: 100px;
        text-align: right;
        float: left;
        padding-right: 10px;
        }
        #submit_form label.error, .output {
        color: #FB3A3A;
        font-family:"Segoe UI";
        font-size:13px;
        margin-top:-10px;
        }
     </style>

</head>
<body>

<div class="container">
<div class="row">
    <div class="col-md-12">
  <h2>Enter your Date of Birth to check your Vote Eligibility</h2><br>
  <form action="#" id="submit_form" method="POST"  
enctype="application/x-www-form-urlencoded">
    <div class="form-group">
      <label for="dob">Enter your DOB:</label>
      <input type="date" class="form-control" id="dob"  
placeholder="Enter Date of birth" name="dob">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit_btn" value="Submit">
  </form>
  <div id="loading" style="display: none;">Calculating...</div>
  <br>
  <div class="alert alert-primary" role="alert" id="message" style="display: none;">
    
  </div>
</div>
</div>
</div>
</body>
</html>


Step2: Create ajax.js and copy/paste below script in ajax.js

ajax.js

 
$("#loading").hide();
        // When the browser is ready...
        $(document).ready(function(){
        // Setup form validation on the #signup element
        $("#submit_form").validate({
        
         // Specify the validation rules
         rules: {
          dob: {
           required: true,
           date: true
          }
        
         },
        
         // Specify the validation error messages
         messages: {
        
          dob: {
           required: "Please select your date of birth",
           date: "Invalid date"
          }
         },
        
         submitHandler: function (form) {   
          $("#loading").show(); 
        $.ajax({
           type: 'POST',
           dataType:'JSON',    
           url: 'calculate-age.php',    
           data: $("#submit_form").serialize(),
           success: function (json_data) {          
            var msg = json_data.msg;
            var flag = json_data.flag;     
            if (flag == 1) {
             $("#loading").hide();
             $("#message").html(msg).show();
             $("#submit_form").trigger('reset');
            } else {
             $("#message").html(msg).show();
             $("#submit_form").trigger('reset');
        
            }
           }
          });
         }
        });
        
        }); 
 
 

Step3:Create calculate-age.php and copy/paste below code in calculate-age.php

calculate-age.php


<?php
    $dateOfBirth = $_POST['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    if($diff->format('%y')>= 18){
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>1, 'msg'=> 
'You are eligible for vote. Your Age is: '.$diff->format('%y').' Years, 
'.$diff->format('%m').' months ,'.$diff->format('%d').' days'));
        exit;
    }else{
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>1, 'msg'=>'You are not eligible for vote. 
Your Age is: '.$diff->format('%y').' Years, '.$diff->format('%m').' months ,
'.$diff->format('%d').' days'));
        exit;
    }
?>


Happy coding!
</svg>
