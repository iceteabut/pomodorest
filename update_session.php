<?php
session_start();
if (isset($_POST['inputVal']) && isset($_POST['inputName'])) {
  // Get the input name and value
  $inputName = $_POST['inputName'];
  $inputVal = $_POST['inputVal'];
if (($inputName == "workInterval" || $inputName == "restInterval") && $inputVal < 1){
    $inputVal = 1;}
  // Update the session variable
  $_SESSION[$inputName] = $inputVal;

  // Send a response to confirm that the update was successful
  /*echo "Session variable updated successfully.";*/
  echo $_SESSION[$inputName];
} 
else if (isset($_POST['buttonText']) && isset($_POST['buttonName'])) {
    $buttonName = $_POST['buttonName'];
    $buttonText = $_POST['buttonText'];
    //$values = explode("-", $buttonText);
  //$workVal = $values[0];
  /*$restVal = $values[1];

  // Update the session variables
  $_SESSION['workInterval'] = $workVal;
  $_SESSION['restInterval'] = $restVal;
  // Update the session variable*/
  $_SESSION[$buttonName] = $buttonText;

  // Send a response to confirm that the update was successful
  /*echo "Session variable updated successfully.";*/
  echo $_SESSION[$buttonName];
}
else {
  echo "Invalid request.";
}
?>