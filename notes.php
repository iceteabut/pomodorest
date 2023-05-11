<?php
//error display TODO-delete
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
/*if(isset($_SESSION['userEmail']) == false)$_SESSION['userEmail']=null;
if(isset($_SESSION['loggedIn']) == false)$_SESSION['loggedIn']=false;
if($_SESSION['userEmail'] == null)$_SESSONloggedIn['userEmail']=0;
if($_SESSION['userEmail'] == null)$_SESSION['loggedIn']=false;*/

if (!isset($_SESSION['userEmail'])) {
  $_SESSION['userEmail'] = null;
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
}///todocheckifworks
//echo '<script>alert("'.$_SESSION['userId'].'")</script>';
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
    //echo '<script>alert("'. $passwordDB.'")</script>';
    $_SESSION['loggedIn'] = true; //TODO
    $_SESSION['userEmail'] = $_POST['emailLogin']; 
    $_SESSION['userId'] = $idDB;
    echo '<script> 
    function displayMessageLS() {

      const loginMessage = document.getElementById("loginMessage");

      loginMessage.textContent = "";
       
     }
    
     window.addEventListener("load", displayMessageLS);
    
        </script>';

        $emailLogin='';
        $passwordLogin='';

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
	  //include 'TimerDB.php';
 
    $emailRegister=$_POST['emailRegister'];
    $usernameRegister=$_POST['usernameRegister'];
    $passwordRegister1=$_POST['passwordRegister1'];
    $passwordRegister2=$_POST['passwordRegister2'];
	  
			
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

    if ($resultR->num_rows > 0) 
    {
        $idDB = null;
      while($row = $resultR->fetch_assoc()){
        
        $idDB = $row['user_id'];
      
      } 
    }
    
			$_SESSION['loggedIn'] = true;
			$_SESSION['userEmail'] = $_POST['emailRegister'];
      $_SESSION['userId'] = $idDB;

      echo '<script>
      console.log("'.$_SESSION['userId'].'");
      console.log("'.$_SESSION['userEmail'].'");
      </script>';
      
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


  if ($_SESSION['loggedIn']) {
  
    echo '
    <script>
    function updateUI() {
      
        console.log("prisi"); //TODO
        document.getElementById("circle-container").style.display = "none";
        document.getElementById("circle-container").style.setProperty("display", "none", "important");
      
    }
   
    window.addEventListener("load", updateUI);
    </script> ';
  
  
  } 
  else {
    
    echo '
    <script>
    function updateUI() {
      
        document.getElementById("circle-container").style.display = "flex";
        document.getElementById("circle-container").style.setProperty("display", "flex", "important");
   

    }
   
    window.addEventListener("load", updateUI);
    </script> ';
  
  
  }

  if ($_SESSION['loggedIn'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buttonSettings'])) {

    $timerMode = $_POST['timerMode'];
  $workInterval = $_POST['workInterval'];
  $restInterval = $_POST['restInterval'];
  if($workInterval==25 && $restInterval==05) $timerMode="Pomodoro(25-5)";
  if($workInterval==90 && $restInterval==20) $timerMode="90-20";
  if($workInterval==52 && $restInterval==17) $timerMode="52-17";
  else $timerMode="Pasirinktinis";

  $colorTheme = $_POST['colorTheme'];
  $workColor = $_POST['workColor'];
  $restColor = $_POST['restColor'];
  if($workColor=='#fba271' && $restColor=='#6acc80') $colorTheme="Numatytoji";
  if($workColor=='#000000' && $restColor=='#ffffff') $colorTheme="Juoda-balta";
  else $colorTheme="Pasirinktinė";

  $userId = $_SESSION["userId"];
    $insertS ="insert into user_settings values (null, '$userId','$timerMode', ' $workInterval', '$restInterval','$colorTheme','$workColor','$restColor')";
			$resultS = $dbCon->query($insertS);
      echo '<script>alert("ok")</script>';

  }



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
  </body>
  </head>
  <body>
    <header class="header">
      <nav>
        <ul>
        <li><a href="#timer" class="active"><i class="fas fa-stopwatch"></i>LAIKMATIS</a></li>
        <li><a href="#about"><i class="fas fa-info-circle"></i>APIE METODĄ</a></li>
        <li><a href="#rest"><i class="fas fa-bed"></i>POILSIS</a></li>
        <li><a href="#tasks"><i class="fas fa-tasks"></i>UŽDUOTYS</a></li>
        <li><a href="#settings"><i class="fas fa-cog"></i>NUSTATYMAI</a></li>
        <li><a href="#stats"><i class="fas fa-chart-bar"></i>STATISTIKA</a></li>
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

    
    <!--
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>
    <div class="circleBckgr"></div>-->


    <div class="circleContainer" id="circle-container">
     <div class="circle d-flex flex-column align-items-center justify-content-center">
      <div class="loginOptions d-flex flex-column align-items-center justify-content-center col-12">
          <div class=" mb-5 row col-12 " id="optionLogin"><h2 >Prisijungti</h2></div>
          <div class="mb-5  row col-12" id="optionRegister"> <h2>Registruotis</h2></div>
          <button class=" row closeButton btn btn-info btn-lg text-center">Tęsti neprisijungus</button>
      </div>
      <div class="loginInfo d-flex flex-column align-items-center justify-content-center col-12">

        <div class=" mb-5 row col-12 " id="optionLogin"><h2 >Prisijungti</h2></div>

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
      
      <div class="registerInfo d-flex flex-column align-items-center justify-content-center col-12">

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
            <input type="password" class="form-control p-3" id="passwordRegister1" name="passwordRegister1" placeholder="Slaptažodis" required>
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
    <section id="timer">

    <div class="circleBckgr" id="circleBckgr1"></div>
    <div class="circleBckgr" id="circleBckgr2"></div>
    <div class="circleBckgr" id="circleBckgr3"></div>

    <div class="timer-container ">
    <h4 class="fst-italic text-center col-12" id="timerTaskName"></h4>
    <div class="timer col-12">45:00</div>
    
    <div class="timer-info row col-12">
      <h3 class="timer-label col col-4">DARBAS</h3>
      <h3 class="timer-progress col-2">1/3</h3>
      <div class="timer-gap col-1"></div>
      <div class="timer-icons row col-5  ">
       
        <div class="timer-icons col-3" id="timerPlay">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
          </svg>
        </div>
        <div class="timer-icons col-3" id="timerPause">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-pause-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z"/>
          </svg>
        </div>
      
        
    </div>
    </div>
  </div>

  <div class="circleContainer2" id="circle-container2">
     <div class="circle2  pt-5 text-wrap d-flex flex-column align-items-center justify-content-center ">

        <div class=" mb-1 row  mt-5"><h2 >Poilsis</h2></div>
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
    <p class="about-text">Francesco Cirillo sukurtą efektyvaus darbo ir mokymosi metodą „Pomodoro“. Šios technikos pavadinimas yra kilęs iš itališko žodžio, apibūdinančio pomidoro formos virtuvinį laikmatį.
Padalink savo darbui skirtą laiką į visiško susikaupimo (25 min.) ir trumpų pertraukų (5 min.) laiką. Po 4 tokių ciklų leisk sau atsipūsti 15–30 min. Tai nebūtinai reiškia nieko neveikimą, bet galbūt tą laiką gali skirti lengvesniems darbams, kuriuos atliekant kažkiek atsipalaiduotum. Žinoma, šio metodo schema galima pritaikyti prie savo poreikių ir galimybių.
Pagrindiniai „Pomodoro“ metodo principai:
Nedalink visiško susikaupimo laiko bloko į atskirus blokus. Nepamiršk: 25 min. absoliučiai jokio blaškymosi ir absoliutaus susikaupimo darbo.
Darbus, kuriems reikia daugiau nei 5–7 visiško susikaupimo blokų, padalink į mažesnes dalis.
Jeigu viena užduotis atrodo nepakankama vienam darbo ciklui, papildyk ciklą keliais darbais.
Reikėtų atkreipti dėmesį į tai, kad „Pomodoro“ metodas yra efektyvaus darbo/mokymosi būdas, o ne laisvalaikio organizavimo technika.</p>
  </div>
</section>

<section id="rest">

<div class="circleBckgr" id="circleBckgr5"></div>
    <h1 class="col col-5 section-heading">POILSIS</h1>


  <div class="circlesRestContainer">
    <div class="circleRest text-wrap">
      <span>Ar šiandien gėrėte pakankamai vandens? Trumpa pertrauka nuo darbo - puiki proga pasirūpinti stikline vandens. </span>
    </div>
    <div class="circleRest text-wrap">
      <span>Kad pagrindinio darbo metu nesiblaškytumėte, per pertauką galite peržiūrėti gautus elektroninius laiškus ar žinutes.</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Dirbant sėdimą darbą, neretai rutinoje trūksta fizinio aktyvumo. Pasinaudokite galimybe per petrauką pakilti nuo stalo ir šiek tiek pasivaikščioti.</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Pareto principas teigia, kad 20 % pastangų duoda 80 % rezultatų, o likę 80 % pastangų – tik 20 % rezultatų. Peržiūrėkite savo atliekamus darbus - ar daugiausiai laiko skiriate svarbiausiems darbams?</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Per pertraukas leiskite akims pailsėti - nukreipkite jas į tolį, jei netoliese yra langas, tai padeda mankštinti akies raumenis.</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Daug laiko praleidžiant prie kompiuterio, dažnai kenčia jūsų laikysena. Pasitikrinkite, ar sėdite tiesiai - nesikūprinkite, neatkiškite smakro, atloškite pečius atgal.</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Vadinamoji Eizenhauerio matrica jums gali padėti susiplanuoti būsimus darbus: suskirstykite darbus į 4 grupes pagal 2 kriterijus: svarbumą ir skubumą. Skubius ir svarbius darbus atlikite kaip įmanoma greičiau, svarbiems ir neskubiems parinkite tinkamą laiką ateityje, nesvarbius, bet skubius pamėginkite perleisti atlikti kitiems, o jei darbą priskyrėte nesvarbiam ir neskubiam, gal reikėtų jo visai atsisakyti?</span>
    </div>
    <div class="circleRest text-wrap">
      <span>Išbandykite naršyklės papildinius ar svetaines, blokuojančius dėmesį blaškančius puslapius.</span>
    </div>
  </div>
</section>

<section id="tasks">
<div class="circleBckgr" id="circleBckgr6"></div>
    <h1 class="col col-5 section-heading">UŽDUOTYS</h1>
      
   <div class=" taskAdd mb-5 col-6 offset-4">
    <div> <h2 class="dayTasks text-center" id="currentTasks">04-21</h2> </div>
    <div class="underline-div mb-3 mt-5">
      <div class="underline-line"></div></div>
  
    <div class=" pt-5">
      <div class="addTasks input-group mb-1 " id="add-tasks-group">
        <input type="text" class="taskName form-control col-4 m-2" name="task[]" id="task" maxlength="255" placeholder="Užduotis" required>
        <input type="number" class="taskRounds form-control col-2 m-2" min='1' step='1' name="rounds[]" id="rounds" maxlength="255" placeholder="Etapai" required>
        <button class="btn btn-success  m-2 fs-3 add-tasks-btn" type="button" id="add-tasks-btn">+</button>
      </div>
    </div>
    <div class="row">
      <h5 class="col col-6  m-3 ">Viso etapų (rekomenduojama iki 16):</h5>
      <h4 class="col col-4  m-3 text-center" id="roundsTotal">0</h4>
      
    </div><div class="underline-div my-5">
      <div class="underline-line"></div>
    </div>
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
    <div id="input-fields" class="col-6">
      <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end">
          <label for="timer" class="col-form-label">Laikmatis</label>
        </div>
        <div class="col-4 text-center">
            <div class="dropdown">
              <button class="dropdownButton btn btn-secondary dropdown-toggle  col-12 py-3" name="timerMode" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
              Pomodoro(25-5)</button>
              <ul class="dropdownMenu dropdown-menu fs-3">
                <li class="active"><a class="dropdownItem dropdown-item" href="#" data-value="25-05">Pomodoro(25-5)</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="52-17">52-17</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="90-20">90-20</a></li>
                <li><a class="dropdownItem dropdown-item" href="#" data-value="01-01">Pasirinktinis</a></li>
              </ul>
            </div>
            <input type="hidden" name="timerMode" id="timerModeInput">
  
        </div>
          <div class="col-3 text-start">
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
          
            <input type="number" name="workInterval" class="form-control p-3 " id="work" placeholder="25" step="1" min="1" max="1440">
          
        </div>
        <div class="col-2 text-center">
          
          <input type="number" name="restInterval" class="form-control p-3 " id="break" placeholder="5" step="1" min="1" max="1440">
        
      </div>
      
      <div class="col-4">
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
              <button class="dropdownButton2 btn btn-secondary dropdown-toggle col-12 py-3" name="colorTheme" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Numatytoji</button>
              <ul class="dropdownMenu2 dropdown-menu fs-3">
                <li class="active2"><a class="dropdownItem2 dropdown-item" href="#" data-value="#FBA271-#6ACC80">Numatytoji</a></li>
                <li><a class="dropdownItem2 dropdown-item" href="#" data-value="#000000-#FFFFFF">Juoda-balta</a></li>
                <li><a class="dropdownItem2 dropdown-item" href="#" data-value="#808080-#808080">Pasirinktinė</a></li>

              </ul>
              <input type="hidden" name="colorTheme" id="colorThemeInput">
            </div>
        </div>
    
      </div>
      <div class="row mb-2 align-items-center col-12 ms-1">
        <div class="col-4 text-end"">
          <label for="timer" class="col-form-label ">Intervalų spalvos</label>
        </div>
        <div class="colorWrapper col-2 ">
          
            <input type="color" name="workColor" class="col-5" id="colorWork">
          
        </div>
        <div class="colorWrapper col-2">
          
          <input type="color" name="restColor" class="col-5 " id="colorBreak" >
        
        </div>
      </div>
      <div class="row ms-1 align-items-center justify-content-center mt-3 col-12 mb-2">
        <button class="btn btn-lg  col-3  text-center" type="submit" id="buttonSettings" name="buttonSettings">Išsaugoti nustatymus</button>
    </div>
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
      <div><h2 class=" fs-2 text-center" id="statsMonth">BALANDIS</h2> </div>
      <div class="underline-div mb-3 mt-5">
        <div class="underline-line"></div>
      </div>

      <div class="row col-12 mb-1 pt-5 align-items-center justify-content-center">

      <div class="col col-1 align-items-center justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" id="statsArrowBack" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
      </div>

    <div class="col col-9  align-items-center justify-content-center">

    <div class=" row  text-center" >
      <div class="col col-1  "></div>
        <h4  class="col col-7 m-2 text-start " name="statName" id="statFullName">Pilnai įvykdytos dienos:</h4>
        <h4 class="col col-2 m-2 " name="NametatStat" id="statFullData" >12</h4>
        <div class="col col-1 m-2 ms-0 pt-2">
          <span class="bestResult form-text"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
          <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
          </svg>    
          </span>
        </div>
      </div>
 
      <div class=" row mb-1 pt-5 text-center" >
        <div class="col col-1  "></div>
          <h4  class="col col-7 m-2 text-start " name="statName" id="statPartName">Dalinai įvykdytos dienos:</h4>
          <h4 class="col col-2 m-2 " name="NametatStat" id="statPartData" >12</h4>
          <div class="col col-1 m-2 ms-0 pt-2">
            <span class="bestResult form-text"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
            <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
            </svg>      
            </span>
          </div>
      </div> 

      <div class=" row mb-1 pt-5 text-center" >
        <div class="col col-1  "></div>
        <h4  class="col col-7 m-2 text-start " name="statName" id="statNoneName">Visai nevykdytos dienos:</h4>
        <h4 class="col col-2 m-2 " name="NametatStat" id="statNoneData" >12</h4>
          <div class="col col-1 m-2 ms-0 pt-2">
            <span class="bestResult form-text"><svg xmlns="http://www.w3.org/2000/svg" width="32"  height="32" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
            <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
            </svg>    
            </span>
        </div>
      </div> 

      <div class=" row mb-1 pt-5 text-center" >
        <div class="col col-1  "></div>
        <h4  class="col col-7 m-2 text-start " name="statName" id="statRoundsName">Įveikta etapų:</h4>
        <h4 class="col col-2 m-2 " name="NametatStat" id="statRoundsData" >12</h4>
          <div class="col col-1 m-2 ms-0 pt-2">
            <span class="bestResult form-text"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
              <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
            </svg>     
            </span>
          </div>
      </div>

    </div>

      <div class="col col-1  text-end ">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" id="statsArrowFwrd" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
      </div>

    </div>

    <div class="underline-div my-5">
      <div class="underline-line"></div>
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


//TODO: fix timer
      //TODO: ---update tasks in timer---
      //TODO: ---display rest---
      //TODO: fix rest section
      //TODO: ---to LT---
      //TODO: more rest fields
      //TODO: ---overall design---
      //TODO: -add flower-
      //TODO: validation, requiredfields (server n client), if email(regex), length+messages accordingly; 
      //TODO: responsiv; 
      //TODO: stats login OK
      //TODO: settings  loginifnot alredi OK
      //TODO: when notlogged in and loggs in scroll to that sec
      //TODO: -add sass-
      //TODO: success login w timeout + ajax
      //TODO: sound
      //TODO: ---change colours rest-work---
      //TODO: change login/logout style/icons
      //TODO: arrows: rest, stats, tasks
      //TODO: header active on scroll
      //TODO: ---settings on input change pasirinktinis---
      //TODO: login circle off on bckgr click
	  //TODO: on etapai input change: fix code
	  //TODO: minigame
	  //TODO: sounds
	  //TODO: ---hello,..---
    //TODO: logout near hello,..
	  //TODO: settings variables with sessions
    //TODO: flower:after  rest pasue nlaterrestar anim + add fade in
    //TODO: add lil logos w center circles
    //TODO: add alert ok circles
    //TODO: colors on achieved goals

      //TEXT HIERARCHY
      
      header menu text LATO 24px 5F5653
      h1 section headings LATO 96px 524843
      h4 task name LATO 36px 524843; rest circles
      h2 loggin/register; settings, stats, 56 regular
      h3 timer label (bold 45px)
      text in about section lato regular 24px 1A1A1A
     
      
      section settings label lato 36px 524843
      section settings input, button lato 28px 5F5653
      section settings span lato regular 24px 1A1A1A
      section stats lato 36px 524843
      section tasks input lato 28px 5F5653

      "Take a deep breath and stretch",
  "Close your eyes and relax",
  "Get up and walk around",
  "Have a drink of water",
  "Do a quick meditation",
  "Listen to your favorite song",
  "Take a power nap"

  INSERT INTO user_tasks (user_id, task_name, task_rounds, task_date, week_start, week_end)
VALUES
(28, 'task1', 1, '2023-05-02', '2023-05-01', '2023-05-07'),
(28, 'task2', 1, '2023-05-03', '2023-05-01', '2023-05-07'),
(28, 'task3', 1, '2023-05-04', '2023-05-01', '2023-05-07'),
(28, 'task4', 1, '2023-05-05', '2023-05-01', '2023-05-07'),
(28, 'task5', 1, '2023-05-06', '2023-05-01', '2023-05-07'),
(28, 'task6', 1, '2023-05-08', '2023-05-08', '2023-05-14'),
(28, 'task7', 1, '2023-05-09', '2023-05-08', '2023-05-14');
//work https://pixabay.com/sound-effects/news-ting-6832/
//rest https://pixabay.com/sound-effects/bell-98033/rest
//break https://pixabay.com/sound-effects/triangle-open-01-102876/break
//complete https://pixabay.com/sound-effects/bell-chord1-83260/visoscomplete