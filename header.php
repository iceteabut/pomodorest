<?php
//error display TODO-delete
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['userEmail']) == false)$_SESSION['userEmail']=null;
if(isset($_SESSION['loggedIn']) == false)$_SESSION['loggedIn']=false;
if($_SESSION['userEmail'] == null)$_SESSION['loggedIn']=false;
if($_SESSION['userEmail'] == null)$_SESSION['userId']=null;

$daysPerWeek = 0;
$display = 'none';
$minutesPerDay = 0;
/*
if (!isset($_SESSION['userEmail'])) {
  $_SESSION['userEmail'] = null;
  $_SESSION['loggedIn'] = false;
}

if (!isset($_SESSION['userId'])) {
  $_SESSION['userId'] = null;
  
}


if (!isset($_SESSION['loggedIn'])) {
  $_SESSION['loggedIn'] = false;
}

if ($_SESSION['userEmail'] == null) {
  $_SESSION['loggedIn'] = false;
  $_SESSION['userId'] = null;
}*/

 
  if (!isset($_SESSION['timerMode'])) $_SESSION['timerMode'] = "Pomodoro(25-5)";
  if (!isset($_SESSION['workInterval']) || $_SESSION['workInterval']==null )  $_SESSION['workInterval'] = 25;
  if (!isset($_SESSION['restInterval']) || $_SESSION['restInterval']==null )  $_SESSION['restInterval'] = 5;
  if (!isset($_SESSION['workInterval']) || $_SESSION['workInterval']==null )  $_SESSION['workInterval'] = 0.1;//TEST VALUE
  if (!isset($_SESSION['restInterval']) || $_SESSION['restInterval']==null )  $_SESSION['restInterval'] = 0.1;//TEST VALUE
  if (!isset($_SESSION['colorTheme']) || $_SESSION['colorTheme']==null )  $_SESSION['colorTheme'] = "Numatytoji";
  if (!isset($_SESSION['workColor']) || $_SESSION['workColor']==null )  $_SESSION['workColor'] = "#fba271";
  if (!isset($_SESSION['restColor']) || $_SESSION['restColor']==null )  $_SESSION['restColor'] = "#6acc80";
  if (!isset($_SESSION['week_goal']) || $_SESSION['week_goal']==null )    $_SESSION['week_goal'] = "5";
  if (!isset($_SESSION['minutes_goal']) || $_SESSION['minutes_goal']==null )    $_SESSION['minutes_goal'] = "420";


  
/*
  $colorTheme = $_POST['colorTheme'];
  $workColor = $_POST['workColor'];
  $restColor = $_POST['restColor'];
  if($workColor=='#fba271' && $restColor=='#6acc80') $colorTheme="Numatytoji";
  else if($workColor=='#cccccc' && $restColor=='#a6a6a6') $colorTheme="Nespalvota";
  else $colorTheme="Pasirinktinė";*/


///todocheckifworks

echo '<script>
      function clearInput2() {
        document.getElementById("emailRegister").value = "";
        document.getElementById("emailLogin").value = "";
        document.getElementById("usernameRegister").value = "";
        document.getElementById("passwordRegister1").value = "";
        document.getElementById("passwordRegister1").value = "";
        document.getElementById("passwordLogin").value = "";
      }
      window.addEventListener("load", clearInput2);
      </script>';
      
    
/*
$hName = 'localhost';
$uName = 'root';
$password = '';
$dbName = 'TimerDB';
$dbCon = mysqli_connect($hName, $uName, $password, $dbName);
if (!$dbCon) {
    die('Could not Connect MySQL Server.');
}
*/

/*echo '<script>alert("' .  $_SESSION['loggedIn']  . '")</script>';
echo '<script>console.log("'.$_SESSION['loggedIn'] .'")</script>';*/
require_once('TimerDB.php'); //TODOpalikt tik 1 includa



if (isset($_POST['emailLogin'])){
 // echo '<script>alert("iejo")</script>';
  $emailLogin=$_POST['emailLogin'];
  $passwordLogin=$_POST['passwordLogin'];
 //include 'TimerDB.php';
 //echo ($emailLogin);

 $passwordLogin=$_POST['passwordLogin'];
 
 $getinfo = "select user_id, user_email, user_password from users where user_email = '$emailLogin'";

$result = $dbCon->query($getinfo);

if ($result->num_rows > 0) 
{
    $emailDB = null;
		$passwordDB = null;
    $idDB = null;
	while($row = $result->fetch_assoc()) 
	{
     $idDB = $row['user_id'];
		$emailDB = $row['user_email'];
		$passwordDB = $row['user_password'];
   
   
	} 
  $checkPass = password_verify($passwordLogin, $passwordDB);
  //echo '<script>alert("'.$passwordLogin.'")</script>';
	if ($checkPass){
    echo '<script> console.log("ieina1")</script>';
    //echo '<script>alert("'. $passwordDB.'")</script>';
    $_SESSION['loggedIn'] = true; //TODO
    $_SESSION['userEmail'] = $_POST['emailLogin']; 
    $_SESSION['userId'] = $idDB;

    $userId = $_SESSION["userId"];


   header('Location: ' . $_SERVER['PHP_SELF']); //GET metodas, neberodo form resubmition pranesimo
   /* 
    echo '
  <script>
  function updateUI() {
    
   document.getElementById("circle-container").style.display = "none";
    document.getElementById("circle-container").style.setProperty("display", "none", "important");
    
  }
 
  window.addEventListener("load", updateUI);
  </script> ';*/
   
}
  else{
    
    echo '<script> 
    function displayMessageL() {

      const loginOptions = document.querySelector(".loginOptions");
      const loginInfo = document.querySelector(".loginInfo");
      const registerInfo = document.querySelector(".registerInfo");
      const loginMessage = document.getElementById("loginMessage");

      loginOptions.style.setProperty("display", "none", "important");
      loginInfo.style.setProperty("display", "flex", "important");
      registerInfo.style.setProperty("display", "none", "important");

      loginMessage.textContent = "Neteisingi duomenys, bandykite dar kartą.";
       
     }
    
     window.addEventListener("load", displayMessageL);
    
        </script>';
    
  }


}
else{
 
  echo '<script> 
    function displayMessageL() {
    
      const loginOptions = document.querySelector(".loginOptions");
      const loginInfo = document.querySelector(".loginInfo");
      const registerInfo = document.querySelector(".registerInfo");
      const loginMessage = document.getElementById("loginMessage");

      loginOptions.style.setProperty("display", "none", "important");
      loginInfo.style.setProperty("display", "flex", "important");
      registerInfo.style.setProperty("display", "none", "important");

      loginMessage.textContent = "Neteisingi duomenys, bandykite dar kartą.";
       
     }
    
     window.addEventListener("load", displayMessageL);
    
        </script>';
    
  }
  
}


  if (isset($_POST['passwordRegister1'])){
    $emailRegister=$_POST['emailRegister'];
    $usernameRegister=$_POST['usernameRegister'];
    $passwordRegister1=$_POST['passwordRegister1'];
    $passwordRegister2=$_POST['passwordRegister2'];
	  
	  //include 'TimerDB.php';
    if (!filter_var($emailRegister, FILTER_VALIDATE_EMAIL)) {
      echo '<script> 
          function displayMessageR() {
              const loginOptions = document.querySelector(".loginOptions");
              const loginInfo = document.querySelector(".loginInfo");
              const registerInfo = document.querySelector(".registerInfo");
              const registerMessage = document.getElementById("registerMessage");
    
              loginOptions.style.setProperty("display", "none", "important");
              loginInfo.style.setProperty("display", "none", "important");
              registerInfo.style.setProperty("display", "flex", "important");
    
              registerMessage.textContent = "Neteisingas el. paštas";
          }
        
          window.addEventListener("load", displayMessageR);
      </script>';
  } elseif (strlen($passwordRegister1) < 6) { // Check if password is at least 6 characters
      echo '<script> 
          function displayMessageR() {
              const loginOptions = document.querySelector(".loginOptions");
              const loginInfo = document.querySelector(".loginInfo");
              const registerInfo = document.querySelector(".registerInfo");
              const registerMessage = document.getElementById("registerMessage");
    
              loginOptions.style.setProperty("display", "none", "important");
              loginInfo.style.setProperty("display", "none", "important");
              registerInfo.style.setProperty("display", "flex", "important");
    
              registerMessage.textContent = "Slaptažodis turi būti bent 6 simbolių ilgio";
          }
        
          window.addEventListener("load", displayMessageR);
      </script>';
  }
  else{
    
			
			$checkingN = "select * from users where user_email = '$emailRegister'";
			$resultN = $dbCon->query($checkingN);
	
	
		if($resultN === false ||	$resultN->num_rows != 0 ) {
			
      echo '<script> 
      function displayMessageR() {
      
        const loginOptions = document.querySelector(".loginOptions");
        const loginInfo = document.querySelector(".loginInfo");
        const registerInfo = document.querySelector(".registerInfo");
        const registerMessage = document.getElementById("registerMessage");
  
        loginOptions.style.setProperty("display", "none", "important");
        loginInfo.style.setProperty("display", "none", "important");
        registerInfo.style.setProperty("display", "flex", "important");
  
        registerMessage.textContent = "Vartotojas tokiu el paštu jau yra, galite prisijungti.";
         
       }
      
       window.addEventListener("load", displayMessageR);
      
          </script>';
      
		} 	 
		else if ($passwordRegister1 != $passwordRegister2){		
      echo '<script> 
      function displayMessageR() {
      
        const loginOptions = document.querySelector(".loginOptions");
        const loginInfo = document.querySelector(".loginInfo");
        const registerInfo = document.querySelector(".registerInfo");
        const registerMessage = document.getElementById("registerMessage");
  
        loginOptions.style.setProperty("display", "none", "important");
        loginInfo.style.setProperty("display", "none", "important");
        registerInfo.style.setProperty("display", "flex", "important");
  
        registerMessage.textContent = "Slaptažodžiai nesutampa";
         
       }
      
       window.addEventListener("load", displayMessageR);
      
          </script>';
    }
	 
 
	else {
   
	    $passHash = password_hash( $passwordRegister1, PASSWORD_DEFAULT); 
      //echo '<script>alert("'.$passwordRegister1.'")</script>';
			$insertN ="insert into users values (null, '$usernameRegister', '$emailRegister', '$passHash')";
			$result = $dbCon->query($insertN);
      
      //echo '<script>alert("'.$passwordRegister1.'")</script>';
      $getinfoR = "select user_id from users where user_email = '$emailRegister'";
      
    $resultR = $dbCon->query($getinfoR);
    $idDB = null;
    if ($resultR->num_rows > 0) 
    {
       
      while($row = $resultR->fetch_assoc()){
        
        $idDB = $row['user_id'];
      
      } 
    }
    
			$_SESSION['loggedIn'] = true;
			$_SESSION['userEmail'] = $_POST['emailRegister'];
      $_SESSION['userId'] = $idDB;

      $timerMode = "Pomodoro(25-5)";
      $workInterval = 25;
      $restInterval = 5;
      $colorTheme = "Numatytoji";
      $workColor = "#fba271";
      $restColor = "#6acc80";
      $weekGoal = 5;
      $minutesGoal = 420;

      $insertNS ="insert into user_settings values (null, '$idDB','$timerMode', '$workInterval', '$restInterval','$colorTheme','$workColor','$restColor','$weekGoal','$minutesGoal')";
      $resultNS = $dbCon->query($insertNS);

      
      
      echo '<script>
      function clearInput() {
        document.getElementById("emailRegister").value = "";
        document.getElementById("usernameRegister").value = "";
        document.getElementById("passwordRegister1").value = "";
        document.getElementById("passwordRegister2").value = "";
      }
      </script>';

      $emailRegister='';
      $usernameRegister='';
      $passwordRegister1='';
      $passwordRegister2='';

      echo '<script> 
      function displayMessageRS() {
  
        const registerMessage = document.getElementById("registerMessage");
  
        registernMessage.textContent = "";
         
       }
      
       window.addEventListener("load", displayMessageRS);
      
          </script>';

    header('Location: ' . $_SERVER['PHP_SELF']); //GET metodas, neberodo form resubmition pranesimo
 //exit;
    
 }

 

  }
  }

  if ($_SESSION['loggedIn']) {

    echo '<script>userId='.$_SESSION['userId'].';</script>';
    $display = 'none';
 //GAUTI VARTotoJO DUOMENIS

    $userId=$_SESSION['userId'];
//GET USER SETTINGS
$selectSettings = "SELECT * FROM user_settings WHERE user_id = '$userId'";
$resultSettings = $dbCon->query($selectSettings);

if ($resultSettings->num_rows > 0) {
  $settingsRow = $resultSettings->fetch_assoc();
  $_SESSION['timerMode'] = $settingsRow["timer_mode"];
  $_SESSION['workInterval'] = $settingsRow["work_interval"];
  $_SESSION['restInterval'] = $settingsRow["rest_interval"];
  $_SESSION['colorTheme'] = $settingsRow["color_theme"];
  $_SESSION['workColor'] = $settingsRow["work_color"];
  $_SESSION['restColor'] = $settingsRow["rest_color"];
  $_SESSION['week_goal'] = $settingsRow["week_goal"];
  $_SESSION['minutes_goal'] = $settingsRow["minutes_goal"];
  
  
} 
$weekGoal =$_SESSION['week_goal'];
$dayGoal = $_SESSION['minutes_goal'];


 
  //GAUTI VARTotoJO STATS
  $day = date('d');
  $month = date('m');
  $year = date('Y');
  $weekStart = date('Y-m-d', strtotime('monday this week'));
  $weekEnd = date('Y-m-d', strtotime('sunday this week'));

  $selectStats = "SELECT SUM(stat_full_day) AS total_full_day, SUM(stat_minutes) AS total_minutes, SUM(stat_rounds) as total_rounds
  FROM user_stats WHERE user_id = '$userId'
  AND MONTH(stat_date) = '$month' 
  AND YEAR(stat_date) = '$year'
  GROUP BY user_id";
  $resultStats = $dbCon->query($selectStats);
  if(mysqli_num_rows($resultStats) > 0) {
    // A row already exists for today, update the stat_rounds and stat_minutes fields if the current values are bigger
    $row = mysqli_fetch_assoc($resultStats);
    $fullDayTotal = $row['total_full_day'];
    $minutesTotal = $row['total_minutes'];
    $taskRoundsTotal = $row['total_rounds'];
    
} else {
    // No row exists for today, set default values
    $fullDayTotal = 0;
    $minutesTotal = 0;
    $taskRoundsTotal = 0;
    
}
  $selectMins = "SELECT stat_minutes 
  FROM user_stats
  WHERE user_id = '$userId'
  AND stat_date = CURDATE();";
  $resultMins = $dbCon->query($selectMins);
  if(mysqli_num_rows($resultMins) > 0) {
    // A row already exists for today, update the stat_rounds and stat_minutes fields if the current values are bigger
    $row = mysqli_fetch_assoc($resultMins);
    $minutesPerDay = $row['stat_minutes'];
} else {
    // No row exists for today, set default values
    $minutesPerDay = 0;

    
}


  echo '<script> console.log("ieina2")</script>';
  echo '<script> 
  function displayMessageLS() {

    const loginMessage = document.getElementById("loginMessage");

    loginMessage.textContent = "";
    
  }

  window.addEventListener("load", displayMessageLS);

    </script>';

    $emailLogin='';
    $passwordLogin='';

    
    $selectSuccesfulWeeks = "SELECT COUNT(*) as successful_weeks
    FROM (
      SELECT DISTINCT week_start
      FROM user_stats
      WHERE user_id = '$userId'
        AND stat_rounds > 0
        AND MONTH(stat_date) = '$month'
        AND YEAR(stat_date) = '$year'
      GROUP BY YEAR(stat_date), MONTH(stat_date), week_start
      HAVING COUNT(DISTINCT stat_date) >= '$weekGoal'
    ) as successful_weeks_query;";

    $resultSuccesfulWeeks = $dbCon->query($selectSuccesfulWeeks);
    if ($resultSuccesfulWeeks->num_rows > 0) {
      // Data exists
      $row = $resultSuccesfulWeeks->fetch_assoc();
      $successfulWeeks = $row["successful_weeks"];
      
    } 
    else {
      $successfulWeeks = "0";
    }
  
    $selectDaysPerWeek = "SELECT COUNT(DISTINCT task_date) as days_worked 
    FROM user_tasks
    WHERE user_id = '$userId' 
    AND week_start = '$weekStart' 
    AND week_end = '$weekEnd'";

    $resultDaysPerWeek = $dbCon->query($selectDaysPerWeek);
    if ($resultDaysPerWeek->num_rows > 0) {
      // Data exists
      $row = $resultDaysPerWeek->fetch_assoc();
      $daysPerWeek = $row["days_worked"];
      
    } 
    else {
      $daysPerWeek = "0";
    }

    $selectSuccesfulDays = "SELECT COUNT(DISTINCT stat_date) AS successful_days
    FROM user_stats
    WHERE user_id = '$userId'
      AND stat_rounds > 0
      AND MONTH(stat_date) = '$month'
      AND YEAR(stat_date) = '$year'
      AND stat_minutes >= '$dayGoal'";

    $resultSuccesfulDays = $dbCon->query($selectSuccesfulDays);
    if ($resultSuccesfulDays->num_rows > 0) {
      // Data exists
      $row = $resultSuccesfulDays->fetch_assoc();
      $succesfulDays = $row["successful_days"];
      
    } 
    else {
      $successfulDays = "0";
    }
    
   
  } 


  else {
    $display = 'flex';
    /*echo '
    <script>
    function updateUI() {
      
        document.getElementById("circle-container").style.display = "flex";
        document.getElementById("circle-container").style.setProperty("display", "flex", "important");
   

    }
   
    window.addEventListener("load", updateUI);
    </script> ';*/
    echo '<script>userId=null;</script>';
  
  }

  if ($_SESSION['loggedIn'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buttonSettings'])) {

  $timerMode = $_POST['timerMode'];
  $workInterval = $_POST['workInterval'];
  $restInterval = $_POST['restInterval'];
  echo '<script>alert("'.$restInterval.'")</script>';
  if($workInterval==25 && $restInterval==5) $timerMode="Pomodoro(25-5)";
  else if($workInterval==90 && $restInterval==20) $timerMode="90-20";
  else if($workInterval==52 && $restInterval==17) $timerMode="52-17";
  else $timerMode="Pasirinktinis";

  $colorTheme = $_POST['colorTheme'];
  $workColor = $_POST['workColor'];
  $restColor = $_POST['restColor'];
  if($workColor=='#fba271' && $restColor=='#6acc80') $colorTheme="Numatytoji";
  else if($workColor=='#cccccc' && $restColor=='#a6a6a6') $colorTheme="Nespalvota";
  else $colorTheme="Pasirinktinė";
  $weekGoal = $_POST['weekGoal'];
  $dayGoal = $_POST['dayGoal'];

  $userId = $_SESSION["userId"];

  $checkQuery = "SELECT * FROM user_settings WHERE user_id = '$userId'";
  $checkResult = $dbCon->query($checkQuery);
  
  if ($checkResult->num_rows > 0) {
    
    $updateQuery = "UPDATE user_settings SET timer_mode = '$timerMode', work_interval = '$workInterval', rest_interval = '$restInterval', color_theme = '$colorTheme', work_color = '$workColor', rest_color = '$restColor', week_goal = $weekGoal,minutes_goal = $dayGoal WHERE user_id = '$userId'";
    $updateResult = $dbCon->query($updateQuery);
  } else {
    
    $insertQuery = "INSERT INTO user_settings VALUES (null, '$userId', '$timerMode', '$workInterval', '$restInterval', '$colorTheme', '$workColor', '$restColor','$weekGoal','$dayGoal')";
    $insertResult = $dbCon->query($insertQuery);
  }


    
      echo '<script>alert("ok")</script>';
      header('Location: ' . $_SERVER['PHP_SELF']); 
      exit;
      
  }


  if ($_SESSION['loggedIn'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buttonTasks'])) {

  $taskNames = $_POST['task'];
  $taskRounds= $_POST['rounds'];
   $userId = $_SESSION["userId"];
   $tasksDate = date('Y-m-d');
   $weekStart = date('Y-m-d', strtotime('monday this week'));
   $weekEnd = date('Y-m-d', strtotime('sunday this week'));
    $checkQuery = "SELECT * FROM user_tasks WHERE user_id = '$userId' AND task_date = '$tasksDate' AND week_start = '$weekStart' AND week_end = '$weekEnd'";
  $checkResult = $dbCon->query($checkQuery);
  
  if ($checkResult->num_rows > 0) {
    
    for ($i = 0; $i < count($taskNames); $i++) {
      $name = $taskNames[$i];
      $rounds = $taskRounds[$i];

      $updateQuery = "UPDATE user_tasks SET task_name = '$name', task_rounds = '$rounds', task_date = '$tasksDate', week_start = '$weekStart', week_end = '$weekEnd' WHERE user_id = '$userId' AND task_date = '$tasksDate' AND week_start = '$weekStart' AND week_end = '$weekEnd'";
      $updateResult = $dbCon->query($updateQuery);
    }
   
  } 
  else 
  {
    
    for ($i = 0; $i < count($taskNames); $i++) {
      $name = $taskNames[$i];
      $rounds = $taskRounds[$i];

      $insertQuery = "INSERT INTO user_tasks (user_id, task_name, task_rounds, task_date, week_start, week_end) VALUES ('$userId', '$name', '$rounds', '$tasksDate', '$weekStart', '$weekEnd')";
      $insertResult = $dbCon->query($insertQuery);
    }
  }		

      echo '<script>alert("ok")</script>';
      header('Location: ' . $_SERVER['PHP_SELF']); 
      exit;
      
  }
  if ($_SESSION['loggedIn'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buttonTasksDelete'])) {

    $taskNames = $_POST['task'];
    $taskRounds = $_POST['rounds'];
   $userId = $_SESSION["userId"];
   $tasksDate = date('Y-m-d');
   $weekStart = date('Y-m-d', strtotime('monday this week'));
   $weekEnd = date('Y-m-d', strtotime('sunday this week'));
    // Loop through the arrays and do something with each value
    
  $deleteQuery = "DELETE FROM user_tasks WHERE user_id = '$userId' AND task_date = '$tasksDate'";
  $deleteResult = $dbCon->query($deleteQuery);
  
      header('Location: ' . $_SERVER['PHP_SELF']); 
      exit;
      
  }

  if($_SESSION['timerMode'] ="Pomodoro(25-5)"){$_SESSION['workInterval']==25; $_SESSION['restInterval']==5;}
  if($_SESSION['workInterval']==25 && $_SESSION['restInterval']==5) $_SESSION['timerMode'] ="Pomodoro(25-5)";
  else if($_SESSION['workInterval']==90 && $_SESSION['restInterval']==20) $_SESSION['timerMode']="90-20";
  else if($_SESSION['workInterval']==52 && $_SESSION['restInterval']==17) $_SESSION['timerMode'] ="52-17";
  else $_SESSION['timerMode']="Pasirinktinis";///ACTUAL VALUE
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Timeris</title>
    
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-7HJrKtpm+hPeOibFQcLeB4AH4l4CrmPUJ5p5vprhXIZ5S1KnjmS5qW8DvJ43xZ+LpMIkEpKDhW0PyvM9P7zxzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/phaser@3.54.0/dist/phaser.min.js"></script>
    <script src="/phaser.min.js"></script>

  </body>
  </head>
  <body>
    <header class="header ">
      <nav>  
              <?php if($_SESSION['loggedIn']){
          echo '<span class="float-left col-3" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-in-left logout" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
          <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
        </svg>
          Sveiki, '.$_SESSION["userEmail"].'</span>';
        }
        else {
          echo '<span class="float-left col-3" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-in-right login" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
          </span>';
        }?>
        <ul class = " d-flex flex-row justify-content-between align-items-center">

        <li><a  href="#timer" class="active ">LAIKMATIS</a></li>
        <li><a href="#about">APIE METODĄ</a></li>
        <li><a href="#rest">POILSIS</a></li>
        <li><a href="#tasks">UŽDUOTYS</a></li>
        <li><a href="#settings">NUSTATYMAI</a></li>
        <li><a href="#stats">STATISTIKA</a></li>
        </ul>
      </nav>

    </header>
    <?php /*if ($loggedIn): ?> //TODO-maybechangetothislogic?
        <!-- Display page content for logged-in users -->
        <h1>Welcome back!</h1>
        <p>Here's the content of the page...</p>
    <?php else: ?>
        <!-- Display login form for non-logged-in users -->
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Log In</button>
        </form>
    <?php endif; */?>
    <main>


<script>
    
   /*const userId= <?php /*echo $_SESSION['userId']; */?>;
  console.log(userId);*/


</script>
    <div class="circleContainer" id="circle-container" style = "display:<?php echo $display; ?>">
     <div class="circle d-flex flex-column align-items-center justify-content-center"  ">
      <div class="loginOptions d-flex flex-column align-items-center justify-content-center col-12" style = "display:none">
          <div class=" mb-5 row col-12 " id="optionLogin"><h2 >Prisijungti</h2></div>
          <div class="mb-5  row col-12" id="optionRegister"> <h2>Registruotis</h2></div>
          <button class=" row closeButton btn btn-info btn-lg text-center">Tęsti neprisijungus</button>
      </div>
      <div class="loginInfo d-flex flex-column align-items-center justify-content-center col-12">

        <div class=" mb-5 row col-12 " id="optionLogin" ><h2 >Prisijungti</h2></div>

        <div class=" mb-4 row col-12 d-flex flex-column align-items-center justify-content-center col-12">
        <!--onsubmit="return do_login()"-->
        <form class=" forma  row col-12 d-flex flex-column align-items-center justify-content-center col-12" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div class=" mb-3 col-6 ">
            <input type="email" class="col form-control p-3" id="emailLogin" name="emailLogin" placeholder="El. paštas" required>
          </div>
          <div class="col-6 mb-4">
            <input type="password" class="form-control p-3" id="passwordLogin" name="passwordLogin" placeholder="Slaptažodis" required>
            
          </div>
          <button class="btn btn-lg  col-4 text-center" type="submit" name="buttonLogin">Prisijungti</button>
        </form>
        </div>
    
        <div class=" row col-12 text-danger mb-5 text-center" ><h5 id="loginMessage"></h5></div>
        <div class="loginBack row col-12 text-center" id="optionLogin"><h4 ><u>< Atgal</u></h4></div>
      </div>
      
      <div class="registerInfo d-flex flex-column align-items-center justify-content-center col-12" >

        <div class=" mb-3 row col-12 " id="optionLogin"><h2 >Registruotis</h2></div>

        <div class=" mb-3 row col-12 d-flex flex-column align-items-center justify-content-center col-12">
        <form class="  row col-12 d-flex flex-column align-items-center justify-content-center col-12" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          
          <div class=" mb-3 col-6 ">
            <input type="text" class="col form-control p-3" id="usernameRegister" placeholder="Vardas" name="usernameRegister" required>
          </div>
          <div class=" mb-3 col-6 ">
            <input type="email" class="col form-control p-3" id="emailRegister" placeholder="El. paštas" name="emailRegister" required>
          </div>
          <div class="col-6 mb-3">
            <input type="password" class="form-control p-3" id="passwordRegister1" name="passwordRegister1" placeholder="Slaptažodis(bent 6 simboliai)" required>
          </div>
          <div class="col-6 mb-4">
            <input type="password" class="form-control p-3" id="passwordRegister2" name="passwordRegister2" placeholder="Pakartokite slaptažodį" required>
          </div>
          <button class="btn btn-lg  col-4 text-center" type="submit" name="buttonRegister">Registruotis</button>
        </form>
        </div>     
        <div class=" row col-12 text-danger mb-5 text-center" ><h5 id="registerMessage"></h5></div>
        <div class="loginBack row col-12 text-center" id="optionLogin"><h4 ><u>< Atgal</u></h4></div>
      </div>

     </div>
    </div>
    <script>
   /*const userId= <?php /*echo $_SESSION['userId']; */?>;
  console.log(userId);*/
</script>

<div class="circleContainer2" id="circleContainer3">
     <div class="circle2  pt-5 text-wrap d-flex flex-column align-items-center justify-content-center " id="circle3">
        <div class="game1 text-wrap d-flex flex-column align-items-center justify-content-center">
        <div class="title "><h3>Stapleris, poperius, žirklės</h3></div>
         <div class="score row mt-2">  
            <div class="playerScore col">
                <h4>Žaidėjas</h4>
                <p class="p-count count">0</p>
  
            </div>       
            <div class="computerScore col">
                <h4>Kompiuteris</h4>
                <p class="c-count count">0</p>
  
            </div>
        </div>
        
        <div class="move row mb-2">Pasirinkite savo ėjimą</div>
          
          
        <div class="movesleft row mb-2">Liko ėjimų: 10 </div>
          
         
        <div class="options row">
            <button class="rock btn btn-lg col">Stapleris</button>
            <button class="paper btn btn-lg col">Popierius</button>
            <button class="scissor btn btn-lg col">Žirklės</button>    
        </div>
          
         
        <div class="result row"></div>
        <button class="reload row btn btn-lg text-center fs-4"></button>
         <button class=" row closeButton3 btn btn-lg text-center fs-4 ">Uždaryti</button>
    </div>
    
    <div class="game2 text-wrap d-flex flex-column align-items-center justify-content-center">
        <h4 class="pt-3 mt-2">Kartuvės</h4>
    <div class="Hangman">
      
    </div>
    <div class="word">
     
    </div>
    <div class="letters">
      
    </div>
    <div class="message">
    </div>
        <button class="again row  btn btn-lg text-center fs-4 mb-1">Spėti kitą</button>
       <button class="closeButton3 row  btn btn-lg text-center fs-4 ">Uždaryti</button>
    </div>
    </div>
    </div>


    <section id="timer">
 <div class="circleBckgr" id="circleBckgr2"></div>
    <div class="circleBckgr" id="circleBckgr1"><div id="flower"></div></div>
    <script src="lottie.js"></script>
    <script src="lottie.js"></script>
   
    <div class="circleBckgr" id="circleBckgr3"></div>

    <div class="timer-container ">
    <h4 class="fst-italic text-center col-12" id="timerTaskName"></h4>
    <div class="timer col-12"><?php echo $_SESSION['workInterval']; ?>:00</div>

      <div class="timer-info d-flex flex-wrap justify-content-center align-items-center col-12">
        <h3 class="timer-label text-center col col-8 com-md-4 col-lg-4 col-xl-4 col-xxl-4">DARBAS</h3>
        <h3 class="timer-progress col-3 col-md-2 col-lg-2 col-xl-2 col-xxl-2 ">1/3</h3>
      
        <div class="timer-icons d-flex flex-row text-center justify-content-center align-items-center mt-md-4 mt-sm-4 mt-0 col-12 com-md-5 col-lg-5 col-xl-5 col-xxl-5  ">
          <div class="timer-icon col-3" id="timerPlay">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
            </svg>
          </div>
          <div class="timer-icon  ps-lg-5 ps-xl-5 ps-xxl-5 col-3" id="timerPause">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-pause-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z"/>
            </svg>
          </div>
        </div>
    </div>




  <div class="circleContainer2" id="circleContainer2">
     <div class="circle2  pt-5 text-wrap d-flex flex-column align-items-center justify-content-center " id="circle2">

        <div class=" mb-1 row  mt-5"><h2>Poilsis</h2></div>
        <span class=" restTip mb-1 row  ">Ar šiandien gėrėte pakankamai vandens? Trumpa pertrauka nuo darbo - puiki proga pasirūpinti stikline vandens. </span>
        <button class=" row closeButton2 btn btn-lg text-center fs-3 mb-4">Uždaryti</button>
      </div>
     </div>





</section>

<section id="about">

  <div class="circleBckgr d-flex flex-row align-items-center justify-content-center " id="circleBckgr4">
    <h1 class="section-heading text-center "> APIE METODĄ</h1>
  
  </div>
    <div class="about-content">
    <p class="about-text fs-5">Ši svetainė paremta visame pasaulyje žinomu ir naudojamu efektyviu Pomodoro darbo ir mokymosi metodu, sukurtu italo Francesco Cirillo praeitame amžiuje. Šios technikos pavadinimas yra kilęs iš itališko žodžio, apibūdinančio pomidoro formos virtuvinį laikmatį - būtent jis ir įkvėpė šio metodo atsiradimą.
Metodo esmė: padalinkite savo darbui skirtą laiką į visiško susikaupimo (25 min.) ir trumpų pertraukų (5 min.) laiką. Po 4 tokių ciklų leiskite sau atsipūsti 15–30 min. Ši svetainė naudoja 15min. trukmės pertrauką (jei nustatymuose pasirinkote bent 15min. trukmės poilsio intervalus, pertrauka sieks 5 minutes). Per ilgesnes ir trumpesnes pertraukėles rekomenduojama kartais atsitraukti nuo darbų, pasivaikščioti, atsigerti vandens, kartais - atlikti savo darbo planavimą ir refleksiją.
Nesukčiaukite! Per darbo intervalus jūs turite susitelkti tik į darbą, visiems pašaliniams darbams skirkite laiko pertraukėlių metu ar atlikus visas užduotis.
Užduotis, kurioms reikia daugiau nei 5–7 darbo etapų(intervalų), padalinkite į mažesnes dalis, o jei užduočiai atlikti pilnas intervalas nereikalingas - per vieną etapą atlikite kelis darbus.
Žinoma, kiekvieno darbas, tikslai ir užduotys skiriasi, tad siūloma išbandyti įvairius darbo-poilsio intervalus. Literatūros šaltiniais pagrįsti efektyvūs darbo-poilsio intervalai taip pat yra 52-17min bei 90-20min darbo-poilsio, tačiau paekspermentuokite ir atraskite sau labiausiai tinkantį darbo-poilsio intervalų santykį.</p>
</div>
</section>

<section id="rest">

<div class="circleBckgr" id="circleBckgr5"></div>
    <h1 class="col col-5 section-heading">POILSIS</h1>

  
    <?php 
$selectTips = "SELECT * FROM rest_tips";
$resultTips = $dbCon->query($selectTips);

// Display the tips if the query returned results
if ($resultTips->num_rows > 0) {
    echo '<div class="circlesRestContainer">';
    while ($row = $resultTips->fetch_assoc()) {
        echo '<div class="circleRest text-wrap p-1">';
        echo '<span>' . $row["tip_text"] . '</span>';
        echo '</div>';
    }
    echo '</div>';
}
?>  
 
</section>


<section id="tasks">
<div class="circleBckgr" id="circleBckgr6"></div>
    <h1 class="col col-5 section-heading">UŽDUOTYS</h1>
      
   <div class=" taskAdd mb-5 col-6 offset-4">
    <div> <h2 class="dayTasks text-center" id="currentTasks">mm-dd</h2> </div>
    <div class="underline-div mb-3 mt-5">
      <div class="underline-line"></div></div>
  
    <div class=" pt-5">
    <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  
    <?php
    if($_SESSION['loggedIn']){
      $userId=$_SESSION['userId'];
      $tasksDate = date('Y-m-d');
      $btnName = "buttonTasks";
      $btnText = "Išsaugoti užduotis";
        //GET USER TASKS 
      $selectTasks = "SELECT * FROM user_tasks WHERE user_id = '$userId' AND task_date = '$tasksDate'";
      $resultTasks = $dbCon->query($selectTasks);
      if ($resultTasks->num_rows > 0) {
        $btnName = "buttonTasksDelete";
        $btnText = "Ištrinti užduotis";
        while ($row = $resultTasks->fetch_assoc()) {
          echo '<div class="addTasks input-group mb-1 " id="add-tasks-group">';
          echo '<input type="text" class="taskName form-control col-4 m-2" name="task[]" id="task" maxlength="255" placeholder="Užduotis" value="' . $row['task_name'] . '" required>';
          echo '<input type="number" class="taskRounds form-control col-2 m-2" min="1" step="1" name="rounds[]" id="rounds" maxlength="255" placeholder="Etapai" value="' . $row['task_rounds'] . '" required>';
          echo '<button class="btn btn-success m-2 fs-3 add-tasks-btn" type="button" id="add-tasks-btn">+</button>';
          echo '</div>';

        }
      } else {
        $btnName = "buttonTasks";
        $btnText = "Išsaugoti užduotis";
        echo '    <div class="addTasks input-group mb-1 " id="add-tasks-group">
        <input type="text" class="taskName form-control col-4 m-2" name="task[]" id="task" maxlength="255" placeholder="Užduotis" required>
        <input type="number" class="taskRounds form-control col-2 m-2" min="1" step="1" name="rounds[]" id="rounds" maxlength="255" placeholder="Etapai" required>
        <button class="btn btn-success  m-2 fs-3 add-tasks-btn" type="button" id="add-tasks-btn">+</button>
      </div>';
      
      }
      
      
      
    }else{
      echo '    <div class="addTasks input-group mb-1 " id="add-tasks-group">
        <input type="text" class="taskName form-control col-4 m-2" name="task[]" id="task" maxlength="255" placeholder="Užduotis" required>
        <input type="number" class="taskRounds form-control col-2 m-2" min="1" step="1" name="rounds[]" id="rounds" maxlength="255" placeholder="Etapai" required>
        <button class="btn btn-success  m-2 fs-3 add-tasks-btn" type="button" id="add-tasks-btn">+</button>
      </div>';
    }
    ?>
    </div>
    <div class="row">
      <h5 class="recommend col col-6  m-3 ">Viso etapų (rekomenduojama iki 16):</h5>
      <h4 class="col col-4  m-3 text-center" id="roundsTotal">0</h4>
      <?php
      if($_SESSION['loggedIn'] === true) {
          echo '      <div class="row  align-items-center justify-content-center mt-3 col-12 mb-2">
          <button class="btn   col-4  text-center" type="submit" id="buttonTasks" name="'.$btnName.'">'.$btnText.'</button>
      </div>;';}?>
    </div><div class="underline-div my-5">
      <div class="underline-line"></div>
    </div>
    </form>
  </div>
 
</section>





<script>
  /*
    const addMoreButtons = document.querySelectorAll('#add-tasks-btn');

function setup() {
  // Add event listeners to all input fields
  const inputs = document.getElementsByName('rounds[]');
  inputs.forEach(input => {
    input.addEventListener('input', updateRounds);
  });

  const inputsN = document.getElementsByName('task[]');
  inputsN.forEach(inputn => {
    inputn.addEventListener('change', updateTasks);
  });

  // Add event listeners to all buttons
  Array.from(addMoreButtons).forEach(addMoreButton => {
    addMoreButton.addEventListener('click', () => {
      const ingredentsInputGroup = document.getElementById('add-tasks-group');
      const clonedIngredentsInputGroup = ingredentsInputGroup.cloneNode(true);

      // Remove previous values from inputs
      const inputs = clonedIngredentsInputGroup.getElementsByTagName('input');
      [...inputs].forEach(input => input.value = '');

      // Change button attributes and add click event listener
      const addButton = clonedIngredentsInputGroup.querySelector('#add-tasks-btn');
      addButton.id = "remove-tasks-button";
      addButton.className = "btn btn-danger m-2 fs-3";
      addButton.innerText = "-";

      // Add click event listener to the '-' button
      const removeButton = clonedIngredentsInputGroup.querySelector('#remove-tasks-button');
      removeButton.addEventListener('click', () => {
        clonedIngredentsInputGroup.parentElement.removeChild(clonedIngredentsInputGroup);
        updateRounds();
      });

      ingredentsInputGroup.parentElement.append(clonedIngredentsInputGroup);
      // Add input event listener to new input field
      const newInputA = clonedIngredentsInputGroup.querySelector('input[name="rounds[]"]');
      const newInputT = clonedIngredentsInputGroup.querySelector('input[name="task[]"]');
      newInputA.addEventListener('input', updateRounds);
      newInputT.addEventListener('change', updateTasks);
    }, false)
  });

  // Call updateRounds on page load
  updateRounds();
  updateTasks();
}

function updateRounds() {
  const rounds = document.getElementsByName('rounds[]');
  let sum = 0;
  for (let i = 0; i < rounds.length; i++) {
    sum += parseInt(rounds[i].value) || 0;
  }
  const rounds = document.getElementById('rounds');
  rounds.innerText = sum;
}

function updateTasks() {
  const tasks = document.getElementsByName('task[]');
  const tasksArr = [];
  tasks.forEach(task => {
    if (task.value !== '') {
      tasksArr.push(task.value);
    }
  });
  console.log(tasksArr);
}

setup();
*/
</script>




<section id="settings">
<div class="circleBckgr" id="circleBckgr7"></div>
<div class="circleBckgr" id="circleBckgr8"></div>
<div class="circleBckgr" id="circleBckgr9"></div>

  <h1 class="section-heading">NUSTATYMAI</h1>
    <div id="input-fields" class="col-6 ps-5">
      <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label for="timer" class="col-form-label">Laikmatis</label>
        </div>
        <div class="col-4 text-center">
            <div class="dropdown">
              <button class="dropdownButton btn btn-secondary dropdown-toggle sessionButton col-12 py-2" name="timerMode" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['timerMode'];?></button>
              <ul class="dropdownMenu dropdown-menu fs-5">
                <li class="active"><a class="dropdownItem dropdown-item" href="#" data-value="25-05">Pomodoro(25-5)</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="52-17">52-17</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="90-20">90-20</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="01-01">Pasirinktinis</a></li>
              </ul>
            </div>
            <input type="hidden" name="timerMode" id="timerModeInput">
  
        </div>
          <div class="col-2 text-start">
              <span id="selectedOption" class="form-text" >
              25min darbas-5min poilsis
              </span>
          </div>
      </div>
      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label for="timer" class="col-form-label ">Intervalai, min</label>
        </div>
        <div class="col-2 text-center">
    
            <input type="number" name="workInterval" class="form-control p-2 sessionInput workInterval" id="work" value="<?php echo $_SESSION['workInterval'];?>" step="1" min="1" max="1440">
          
        </div>
        <div class="col-2 text-center">
          
          <input type="number" name="restInterval" class="form-control p-2 sessionInput restInterval" id="break" value="<?php echo $_SESSION['restInterval'];?>"  step="1" min="1" max="1440">
        
      </div>
      
      <div class="col-3">
              <span id="alertError" class="form-text text-danger invisible">
              Bendra inervalo reikšmė negali būti ilgesnė nei 24h (1440min)
              </span>
          </div>
      </div>

      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label class="col-form-label ">Spalvų tema</label>
        </div>
        <div class="col-4 text-center">
            <div class="dropdown">
              <button class="dropdownButton2 sessionButton btn btn-secondary dropdown-toggle col-12 py-2" name="colorTheme" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['colorTheme'];?></button>

              <ul class="dropdownMenu2 dropdown-menu fs-3">
                <li class="active2"><a class="dropdownItem2 dropdown-item " href="#" data-value="#FBA271-#6ACC80">Numatytoji</a></li>
                <li><a class="dropdownItem2 dropdown-item" href="#" data-value="#cccccc-#a6a6a6">Nespalvota</a></li>
                <li><a class="dropdownItem2 dropdown-item" href="#" data-value="#808080-#a6a6a6">Pasirinktinė</a></li>

              </ul>
              <input type="hidden" name="colorTheme" id="colorThemeInput">
            </div>
        </div>
    
      </div>
      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label for="timer" class="col-form-label ">Intervalų spalvos</label>
        </div>
        <div class="colorWrapper col-2 ">
          
            <input type="color" name="workColor" class="col-5 sessionInput" id="colorWork" value="<?php echo $_SESSION['workColor']; ?>">
          
        </div>
        <div class="colorWrapper col-2">
          
          <input type="color" name="restColor" class="col-5 sessionInput" id="colorBreak" value="<?php echo $_SESSION['restColor']; ?>">
        
        </div>
      </div>
    
      <?php
      if($_SESSION['loggedIn'] === true) {
          echo '      
        <div class="row mb-2 align-items-center col-12 ms-1">
          <div class="col-4 text-end">
            <label for="weekGoal" class="col-form-label ">Dienų/savaitę tikslas:</label>
          </div>
          <div class="col-4 text-center">
              <input type="number" name="weekGoal" class="form-control p-3 " id="weeks" value="'.$_SESSION['week_goal'].'" step="1" min="0" max="7">
          </div>
          <div class="col-3">
                <span id="alertGoal" class="form-text">
                Nustatykite darbo dienų per savaitę tikslą
                </span>
          </div>
        </div> 

        <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label for="dayGoal" class="col-form-label ">Minučių/dieną tikslas:</label>
        </div>
        <div class="col-4 text-center">
            <input type="number" name="dayGoal" class="form-control p-3 " id="days" value="'.$_SESSION['minutes_goal'].'" step="1" min="0" max="1440">
        </div>
        <div class="col-3">
              <span id="alertGoal" class="form-text">
              Nustatykite darbo minučių per dieną tikslą
              </span>
        </div>
      </div> 
                    
          <div class="row ms-1 align-items-center justify-content-center mt-3 col-12 mb-2">
          <button class="btn btn-lg  col-4  text-center" type="submit" id="buttonSettings" name="buttonSettings">Išsaugoti nustatymus</button>
      </div>;';}?>

      <div class="row mb-2 fs-3 align-items-center text-center col-12 mb-2">
        <?php
        if($_SESSION['loggedIn'] === true) {
          echo '<div class="logout row col-12 mt-3 ms-2" id="logout"><h4 ><u>X Atsijungti</u></h4></div>';
          /*echo '<script>
            const loggingout = document.querySelector("#logout");
            loggingout.addEventListener("click", function() {
              // Send a request to logout.php to log out the user
              
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "logout.php");
              xhr.onload = function() {
                // If the request was successful, reload the page
                if (xhr.status === 200) {
                  location.reload();
                }
              };
              xhr.send();
            
              // Update the UI
              document.getElementById("circle-container").style.display = "flex";
              document.getElementById("circle-container").style.setProperty("display", "flex", "important");
              const loginOptions = document.querySelector(".loginOptions");
              const loginInfo = document.querySelector(".loginInfo");
              const registerInfo = document.querySelector(".registerInfo");
              
            
              loginOptions.style.setProperty("display", "block", "important");
              loginInfo.style.setProperty("display", "none", "important");
              registerInfo.style.setProperty("display", "none", "important");
            });
            </script>';*/
        }
        else{
          echo '<div class="login row col-12 mt-3 ms-2" id="login"><h4 ><u>> Prisijungti</u></h4></div>';
          /*echo '<script>
           
            </script>';
        }*/}
        ?>
      </div></form>
    </div>
</section>

<section id="stats">

<div class="circleBckgr" id="circleBckgr10"></div>
<div class="circleBckgr" id="circleBckgr11"></div>

  <h1 class="section-heading">STATISTIKA</h1>

 
            <?php
    if ($_SESSION['loggedIn'] === true) {
      echo ' <div class="statsContent col-5 offset-5">
      <div><h2 class=" fs-2 text-center" id="statsMonth">GEGUŽĖ</h2> </div>
      <div class="underline-div mb-3 mt-5">
        <div class="underline-line"></div>
      </div>

      <div class="row col-12 mb-1 pt-5 align-items-center justify-content-center">

      <div class="col col-1 align-items-center justify-content-center">
        
      </div>

    <div class="col col-10  align-items-center justify-content-center">

    <div class=" row  text-center" >
      <div class="col col-1  "></div>
        <h4  class="col col-8  mb-0 text-start " name="statName" id="statFullName">Pilnai įvykdytos dienos:</h4>
        <h4 class="col col-2 " name="NametatStat" id="statFullData" >'.$fullDayTotal.'</h4>
        <div class="col col-1 ms-0 ">
             
          </span>
        </div>
      </div>
 
      <div class=" row  pt-2 text-center" >
        <div class="col col-1  "></div>
          <h4  class="col col-8  mb-0 text-start " name="statName" id="statPartName">Sėkmingų savaičių:</h4>
          <h4 class="col col-2 " name="NametatStat" id="successfulWeeks" >'.$successfulWeeks.'</h4>
          <div class="col col-1 ms-0 ">
                 
            </span>
          </div>
      </div> 

      <div class=" row  text-center" >
      <div class="col col-1  "></div>
        <h4  class="col col-8  mb-0 text-start " name="statName" id="statPartName">Dirbta dienų šią savaitę :</h4>
        <h4 class="col col-2 " name="NametatStat" id="daysPerWeek" >'.$daysPerWeek.'</h4>
        <div class="col col-1 ms-0 ">

        </div>
    </div> 

    <div class=" row   text-center" >
    <div class="col col-1  "></div>
      <h4  class="col col-8  mb-0 text-start " name="statName" id="statPartName">Sėkmingų dienų:</h4>
      <h4 class="col col-2 " name="NametatStat" id="succesfulDays" >'.$succesfulDays.'</h4>
      <div class="col col-1 ms-0 pt-2">

      </div>
  </div> 

  <div class=" row  text-center" >
  <div class="col col-1  "></div>
    <h4  class="col col-8 text-start mb-0" name="statName" id="statPartName">Dirbta minučių šiandien :</h4>
    <h4 class="col col-2 " name="NametatStat" id="minutesPerDay" >'.$minutesPerDay.'</h4>
    <div class="col col-1 ms-0 pt-2">

    </div>
</div> 

      <div class=" row  text-center" >
        <div class="col col-1  "></div>
        <h4  class="col col-8 mb-0 text-start " name="statName" id="statNoneName">Dirbta laiko, min:</h4>
        <h4 class="col col-2 " name="NametatStat" id="statNoneData" >'.$minutesTotal.'</h4>
          <div class="col col-1 ms-0 pt-2">
  
        </div>
      </div> 

      <div class=" row   text-center" >
        <div class="col col-1  "></div>
        <h4  class="col col-8  mb-0 text-start " name="statName" id="statRoundsName">Įveikta etapų:</h4>
        <h4 class="col col-2  " name="NametatStat" id="statRoundsData" >'.$taskRoundsTotal.'</h4>
          <div class="col col-1 ms-0 ">

          </div>
      </div>

    </div>

      <div class="col col-1  text-end ">
        
      </div>

    </div>

    <div class="underline-div my-5">
      <div class="underline-line"></div>
    </div>
    </div>
            ';
    } 
    else {
      echo '<div class="statsContent col-5 text-center offset-5 ">
        <div class="underline-div mb-5">
          <div class="underline-line "></div>
        </div>
        <div><h3 class=" fs-3 text-center mb-4" id="statsLogin">Prisijunkite, kad matytumėte savo statistiką.</h3> </div>
        <button class="login btn btn-lg col-4 text-center" name="loginStats" id="loginStats" >Prisijungti</button>

        <div class="underline-div  mt-5">
          <div class="underline-line"></div>
        </div>
      </div>';
    }
  ?>



   
</section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <script src="script.js" data-loggedin="<?php echo $_SESSION['loggedIn']; ?>"></script>
   

  </body>
</html>


:root {
  --main-accent-color-work: #FBA271;
  --light-accent-color-work: lighten(var(--main-accent-color-work), 15%);
  --dark-accent-color-work: desaturate(darken(var(--main-accent-color-work), 20%), 30%);
  --main-accent-color-rest: #6ACC80;
  --light-accent-color-rest: lighten(var(--main-accent-color-rest), 15%);
  --dark-accent-color-rest: desaturate(darken(var(--main-accent-color-rest), 20%), 30%);
  --main-accent-color: #FBA271;
  --light-accent-color:lighten(var(--main-accent-color-work), 15%);
  --dark-accent-color:desaturate(darken(var(--main-accent-color-work), 20%), 30%);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  
}

body {
  overflow-x: hidden;
}

h3 {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 7vh !important;
  font-weight: 600 !important;
}

h2 {
  text-align: center;
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 7vh !important;
}

.circle h2 {
  font-size: 5vh !important;
  font-weight: 600;
}

.loginOptions h2:hover {
  cursor: pointer;
}

.circle h4:hover {
  cursor: pointer;
}

#settings h4:hover {
  cursor: pointer;
}

input {
  border-radius: 1vh !important;
}

button {
  border-radius: 2vh !important;
}

#timer h4 {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 2rem !important;
}

header {
  background-color: rgb(255, 255, 255);
  font-family: "Lato", sans-serif;
  color: #5F5653;
  padding-top: 10px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1;
  transition: transform 0.3s ease-in-out;
}

.header.hide {
  transform: translateY(-100%);
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 80px;
}

nav ul {
  display: flex;
  list-style: none;
  margin-left: auto;
  float:left;
}
nav a{
  text-decoration: none;
  font-size: 2.5vh;
  color: #5F5653;
}


nav li, nav span {
  position: relative; 

  display: inline-block;
 padding: 10px;
  padding-left: 20px; 
  padding-right: 20px; 

}

nav span {
  margin-left: 3vh;
  float: right;
 color:  rgb(255, 215, 142);
 font-size: 3vh;
 
}


nav a::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: #fcbc32;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.2s ease-in-out;
}

nav a:hover::after {
  transform: scaleX(1);
}

nav a:hover {
  color: rgb(255, 215, 142);
}


nav a.active {
  color: orange;
}

nav a.active::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: orange;
  transform: scaleX(1);
  transform-origin: left;
}

#flower{
  width: 800px; 
  height: 800px;
  display: none;
}



/*position bckgr circles*/
.circleBckgr {
  position: absolute;
  border-radius: 50%;
  width: 90vh;
  height: 90vh;
  z-index: -1;
  background-image: url("flower.png");
  background-size: 75%;
  background-repeat: no-repeat;
  background-position: center center;

}

#circleBckgr1 {
  background-color: var(--dark-accent-color);
  top: 5%;
  left: -2%;
  background-image: none;
  display: flex;
  align-items: center;
  justify-content: center;
}

#circleBckgr2 {
  background-color: var(--main-accent-color);
  top: 37%;
  left: 25%;
  background-image: none;
}

#circleBckgr3 {
  background-color: var(--light-accent-color);
  top: -20%;
  left: 70%;
  background-image: none;
}

#circleBckgr4 {
  background-color: var(--dark-accent-color);
  top: 20vh;
  left: 54%;
}

#circleBckgr5 {
  background-color: var(--light-accent-color);
  top: 20vh;
  left: -25%;
}

#circleBckgr6 {
  background-color: var(--dark-accent-color);
  top: 20vh;
  left: -8%;
}

#circleBckgr7 {
  background-color: var(--main-accent-color);
  /*top: calc(50% - 75px);
  left: calc(50% - 450px);*/
  background-image: none;
}

#circleBckgr8 {
  background-color: var(--dark-accent-color);
  top: -20%;
  left: 80%;
}

#circleBckgr9 {
  background-color: var(--light-accent-color);
  top: 50%;
  left: -30%;
  background-image: none;
}

#circleBckgr10 {
  background-color: var(--dark-accent-color);
  top: 20vh;
  left: 3%;
}

#circleBckgr11 {
  background-color: var(--light-accent-color);
  top: 65%;
  left: 85%;
  background-image: none;
}

main {
  padding-top: 80px; /* Adjust to match header height */
}

section {
  min-height: calc(100vh - 12vh + 47vh); /* Adjust to match header height */
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 70px;
}

.section-heading {
  font-size: 11vh !important; 
  margin: 0;
  position: absolute;
}

.circleContainer {
  position: fixed;
 
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 100;
  background-color: rgba(0, 0, 0, 0.5);
}

.circle {
  width: 85vh;
  height: 85vh;
  border-radius: 50%;
  opacity: 0.9;
  background-color: var(--main-accent-color);
  display: flex;
  justify-content: center;
  align-items: center;
}

.loginInfo,
.registerInfo {
  display: none;
}

/* Name centered in the middle vertically, 70px margin from the right for About section */
#about .section-heading {
  top: 0%;
  position: relative !important;
}

/* Vertically center horizontally 50px from the left for Rest section */
#rest .section-heading {
  top: 50%;
  left: 5vh;
  transform: translateY(-50%);
}

/* Vertically center horizontally 30px from the right for Tasks section */
#tasks .section-heading {
  top: 50%;
  left: 50px;
  transform: translateY(-50%);
}

/* 70px from section top vertically and 50px margin from the right for Settings section */
#settings .section-heading {
  top: 11vh;
  right: 12vh;
}

/* 50px from section top vertically and horizontally 140px from the left for Stats section */
#stats .section-heading {
  top: 12vh;
  right: 22vh;
}

/* Position section headings relative to their respective sections */
section {
  position: relative;
  height: calc(100vh - 100px); /* Take into account the height of the header */
  padding-top: 80px; /* Move content below the header */
}

.timer-container {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: center;
  height: 100%;
  padding-left: 25%;
}

.timer {
  font-size: 35vh;
  font-family: "Lato", sans-serif;
  color: #524843;
}

.timer-info, .timer-label, .timer-progress {
  width: 50vh;
  font-size: 5vh !important;
}
#timer{
  padding-bottom: 40vh;
}


.circleContainer2 {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  justify-content: center;
  align-items: center;
  z-index: 100;
  background-color: rgba(179, 179, 179, 0.5);
  display: none !important;
}


.circle2 {
  width: 85vh !important;
  height: 85vh !important;
  border-radius: 50%;
  opacity: 0.9;
  display: flex;
  flex-direction: column;
  background-color: var(--light-accent-color-rest);
  justify-content: center;
  align-items: center;
  text-align: center;
  line-height: 1.2;
  padding: 50px;
  padding-top: 20px !important;
  padding-bottom: 150px;
}

.circle2 span {
  word-wrap: break-word;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 24px;
}

.closeButton2 {
  background-color: var(--dark-accent-color-rest) !important;
}
.closeButton3 {
  background-color: var(--dark-accent-color-rest) !important;
  font-size:24px;
}
.again{
  background-color: var(--dark-accent-color-rest) !important;
  font-size:24px;
}

.section-heading {
  font-size: 96px; /* Change the font size of section headings */
  margin: 0;
  position: absolute;
}

/* Name centered in the middle vertically, 70px margin from the right for About section */
.about-content {
  margin-left: 70px;
  padding-right: 50%;
  display: flex;
  justify-content: center; /* Centers content horizontally */
  align-items: center; /* Centers content vertically */
}

.about-text {
  font-size: 24px;
  color: #1A1A1A;
  font-family: "Lato", sans-serif;
}

#rest {
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.circlesRestContainer {
  width: 70%;
  margin: 0 auto;
  overflow-x: scroll;
  margin-left: 30%;
  white-space: nowrap; 
}

.circleRest {
  display: inline-block;
  border-radius: 50%;
  background-color: var(--main-accent-color);
  margin-right: 100px; 
  text-align: center;
 
  width: 90vh;
  height: 90vh;
  line-height: 1.2; 
  padding: 40px;
}

.circleRest span {
  word-wrap: break-word !important;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width:100%;
  padding:30px;
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 24px;
}

.circleRest:last-child {
  margin-right: 0; /* remove margin from last circle */
}

.underline-div {
  width: 80%;
  margin: 0 auto;
  position: relative;
  display: block;
}

.underline-line {
  height: 7px;
  width: 100%;
  background-color: rgb(235, 142, 22);
  position: absolute;
  bottom: 0;
  left: 0;
}

#task {
  width: 40%;
}

#settings label {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 3vh;
}

.colorWrapper {
  display: inline-block;
  border: 1px solid rgb(189, 189, 189);
  border-radius: 12px;
  overflow: hidden;
  height: 7vh;
  width: 14.5vh !important;
  padding: 0px;
  margin-left: 12px;
  margin-right: 0x;
}

.colorWrapper input[type=color] {
  display: block;
  width: 200%;
  height: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  border: none;
  margin-left: -3.2vh;
}

#settings li {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 3vh;
}

#settings button {
  font-family: "Lato", sans-serif !important;
 
  font-size: 3vh;
}

#buttonSettings {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 3vh;
  background-color: rgb(235, 142, 22) !important;
}

#buttonTasks {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 3vh !important;
  background-color: rgb(235, 142, 22) !important;
}

#stats button, .circle button {
  background-color: var(--dark-accent-color) !important;
  color: #fff !important;
  font-family: "Lato", sans-serif !important;
  border: none;
  font-size: 3.4vh;
}

#stats h4 {
  font-family: "Lato", sans-serif !important;
  color: #524843 !important;
  font-size: 3.4vh !important;
}

#stats {
  overflow: hidden;
  padding-bottom: 0px;
  margin-bottom: 0px;
}



/*# sourceMappingURL=styles.css.map */
/*.circle3{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  
}*/

.circle3 img {
  max-width: 30%;
  max-height: 10%;
}

.Hangman {
  width: 200px;
  height: 200px;
  margin: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.word {
  font-size: 2rem;
  margin: 10px;
  display: flex;
  justify-content: center;
}

.letters {
  margin: 15px;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.letters button {
  margin: 5px;
  padding: 10px;
  font-size: 1.2rem;
  border: none;
  background-color: rgb(235, 142, 22);
  color: #fff;
  cursor: pointer;
}

.message {
  font-size: 1.5rem;
  margin: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.game1, .game2{
  display:none !important;
}

.rock, .paper, .scissor, .reload{
  background-color: rgb(235, 142, 22) !important;
}
.timer-icon {
  margin-top:-30px;
}




@media screen and (max-width: 767px) {

 #navbarNav.show {
    background-color: white;
    display:flex;
    justify-content: center !important;
    margin: auto; 

  }
  #timer h4 {
   
    font-size: 4.5vw !important;
  }

  .timer-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    padding-left: 5%;
    margin-top: -30%;
  }
  
  .timer {
    font-size: 28vw;

  }
  .circle {
    width: 90vw;
    height: 90vw;

  }
  .circle h2 {
    font-size: 3.5vh !important;
    margin-bottom: -20px !important;
  }
  .circle button, input {
    font-size: 2.5vh;
  }
  .circle input {
    font-size: 2vh;
    padding:0px;
    height: 30px;
  }
  .circle h4{
    font-size: 1rem !important;
    margin-top: -40px !important;
  }
  .registerInfo h4{
    margin-top: -60px !important;
  }
  .registerInfo h2{
    margin-bottom: 0px !important;
    margin-top:20px;
  }
  .timer-info, .timer-label, .timer-progress {
    
    font-size: 1.5rem !important;
  }
  .timer-icon {
    margin-top:30px;
  }
  
}