<?php
$hName = 'localhost';
$uName = 'root';
$password = '';
$dbName = 'TimerDB';
$dbCon = mysqli_connect($hName, $uName, $password, $dbName);
if (!$dbCon) {
    die('Could not Connect MySQL Server.');
}
?>
<?php 
/*$checkPass = password_verify($passwordLogin, $passwordDB);
	if ($checkPass){
		echo '<!--p class="text-success text-center fs-5">Prisijungėte sėkmingai, prašome perkrauti puslapį</p>';
    echo '<script>alert("suces")</script>';
		
		$_SESSION['loggedin'] = true;
		$_SESSION['userEmail'] = $_POST['emailLogin'];
		echo '<script>alert("successs")</script>';}*/



   /* echo "<script>/*
    
    const closeButton = document.querySelector('.closeButton');
    const circle = document.querySelector('.circle');
    const circleContainer = document.querySelector('.circleContainer');
    
    closeButton.addEventListener('click', function() {
      circle.style.display = 'none';
      circleContainer.style.display = 'none';
});
</script>";
		header("location:index.php");
	}
	else
	{
		failedToLogin();
		
	}
} 
else
{
	failedToLogin();
 }
}
 
function failedToLogin()
{
		$_SESSION['loggedin'] = false;
		$_SESSION['userEmail'] = null;
		
		header("location:index.php");
    echo '<script>/*alert("notasuccesss")</script>';
		echo '<p class="text-danger text-center fs-5">Bandykite dar kartą</p>';
		exit;
}
*/

 
/*
 if (isset($_POST['buttonLogin'])){
 
  echo '<script>/*alert("login")</script>';
  $message='dsds';
  echo '<script>/*alert(' . json_encode($message) . ')</script>';

 $emailLogin=$_POST['emailLogin'];
 include 'TimerDB.php';

 
 $passwordLogin=$_POST['passwordLogin'];
 $getinfo = "select user_email, user_password from users where user_email = '$emailLogin'";

$result = $dbCon->query($getinfo);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$emailDB = $row['user_email'];
		$passwordDB = $row['user_password'];

	}
	
	$checkPass = password_verify($passwordLogin, $passwordDB);
	if ($checkPass){
		echo '<p class="text-success text-center fs-5">Prisijungėte sėkmingai, prašome perkrauti puslapį</p>';
    echo '<script>/*alert("suces")</script>';
		
		$_SESSION['loggedin'] = true;
		$_SESSION['userEmail'] = $_POST['emailLogin'];
		echo '<script>/*alert("successs")</script>';
   /* echo "<script>
    /*
    const closeButton = document.querySelector('.closeButton');
    const circle = document.querySelector('.circle');
    const circleContainer = document.querySelector('.circleContainer');
    
    closeButton.addEventListener('click', function() {
      circle.style.display = 'none';
      circleContainer.style.display = 'none';
});
</script>";
		header("location:index.php");
	}
	else
	{
		failedToLogin();
		
	}
} 
else
{
	failedToLogin();
 }
}
 
function failedToLogin()
{
		$_SESSION['loggedin'] = false;
		$_SESSION['userEmail'] = null;
		
		header("location:index.php");
    echo '<script>/*alert("notasuccesss")</script>';
		echo 'p class="text-danger text-center fs-5">Bandykite dar kartą</p>';
		exit;
}-->



<!--
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    
    			<div class="d-flex mb-3 g-3 justify-content-end">
				<a href="/recipes/resetPassword">Forgot password?</a>
			</div>
      
      --->
      //TODO: fix timer
      //TODO: update tasks in timer
      //TODO: display rest
      //TODO: fix rest section
      //TODO: to LT
      //TODO: more rest fields
      //TODO: overall design
      //TODO: add flower
      //TODO: validation, requiredfields (server n client), if email(regex), length+messages accordingly; 
      //TODO: responsiv; 
      //TODO: stats login OK
      //TODO: settings  loginifnot alredi OK
      //TODO: when notlogged in and loggs in scroll to that sec
      //TODO: react n sass
      //TODO: success login w timeout + ajax
      //TODO: sound
      //TODO: change colours rest-work
      //TODO: change login/logout style/icons
      //TODO: arrows: rest, stats, tasks
      //TODO: header active on scroll
      //TODO: settings on input change pasirinktinis
      //TODO: login circle off on bckgr click

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


<script>
   /*       
          function do_login()
{
    var email=$("#emailLogin").val();
    var pass=$("#passwordLogin").val();

    if(email !== "" && pass !== "")
    {
       

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                do_login: "do_login",
                email: email,
                password: pass
            },
            alert(response);
            success: function(response) {
                if(response === "success")
                {
                    window.location.href = "index.php";
                }
                else if(response === "error")
                {
                   
                    alert("Wrong Details");
                }
                else if(response === "empty")
                {
                    
                    alert("Please Fill All The Details");
                }
            }
        });
    }
    else
    {
        alert("Please Fill All The Details");
    }

    return false;
}
      </script>*/
      ?>
