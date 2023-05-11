<?php



echo '
    <script>
    function login() {
      
        document.getElementById("circle-container").style.display = "flex";
        document.getElementById("circle-container").style.setProperty("display", "flex", "important");

        const loginOptions = document.querySelector(".loginOptions");
        const loginInfo = document.querySelector(".loginInfo");
        const registerInfo = document.querySelector(".registerInfo");
        
  
        loginOptions.style.setProperty("display", "block", "important");
        loginInfo.style.setProperty("display", "none", "important");
        registerInfo.style.setProperty("display", "none", "important");

    }
   
    window.addEventListener("load", login);
    </script> ';
?>