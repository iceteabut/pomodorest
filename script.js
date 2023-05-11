


const colorWork = document.getElementById('colorWork');
const colorBreak = document.getElementById('colorBreak');

const dropdownItems = document.querySelectorAll('.dropdownItem');
const dropdownItemActive = document.querySelector('li.active > a.dropdownItem'); 
const selectedOption = document.querySelector('#selectedOption');
const workInput = document.getElementById('work');
const breakInput = document.getElementById('break');
const errorAlert = document.getElementById('alertError');
const defaultValues2 = dropdownItemActive ? dropdownItemActive.dataset.value.split('-') : dropdownItems[0].dataset.value.split('-'); //jei neranda reiksmes,raso pirma value

//SESSION VARIABLES update
const sessionInputs = document.querySelectorAll('.sessionInput');

sessionInputs.forEach(input => {
  input.addEventListener('input', () => {
    
    const inputName = input.getAttribute('name');
    const inputVal = input.value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText); // This is the response from the PHP file
      }
    };
    xhr.send("inputName=" + inputName + "&inputVal=" + inputVal);
  });
});



//PRISIJUNGIMAS

//const { Console } = require("console");

var loggedIn = document.currentScript.getAttribute("data-loggedin");


//isjungti apskritima

const closeButton = document.querySelector('.closeButton');
const circle = document.querySelector('.circle');
const circleContainer = document.querySelector('.circleContainer');

closeButton.addEventListener('click', function() {
  circle.style.display = 'none';
  circleContainer.style.display = 'none';
  
});
//registracijos laukai
const loginOptions = document.querySelector('.loginOptions');
const loginOption = document.querySelector('#optionLogin');
const registerOption = document.querySelector('#optionRegister');
const loginInfo = document.querySelector('.loginInfo');
const registerInfo = document.querySelector('.registerInfo');
const loginBack = document.querySelectorAll('.loginBack');
loginInfo.style.setProperty('display', 'none', 'important');
registerInfo.style.setProperty('display', 'none', 'important');

loginOption.addEventListener('click', () => {
  loginOptions.style.display = 'none';
  loginOptions.style.setProperty('display', 'none', 'important');
  registerInfo.style.display = 'none';
  registerInfo.style.setProperty('display', 'none', 'important');
  loginInfo.style.display = 'flex';
});

registerOption.addEventListener('click', () => {
  loginOptions.style.display = 'none';
  loginOptions.style.setProperty('display', 'none', 'important');
  loginInfo.style.display = 'none';
  loginInfo.style.setProperty('display', 'none', 'important');
  registerInfo.style.display = 'flex';
});

loginBack.forEach((button) => {
  button.addEventListener('click', () => {
    loginOptions.style.display = 'flex';
    loginOptions.style.setProperty('display', 'flex', 'important');
    loginInfo.style.display = 'none';
    loginInfo.style.setProperty('display', 'none', 'important');
    registerInfo.style.display = 'none';
    registerInfo.style.setProperty('display', 'none', 'important');
  });
});

//ATSIJUNGIMAS is puslapio, STATS + SETTINGS
if(loggedIn){

  const loggingout = document.querySelectorAll(".logout");
 
            loggingout.forEach((button) => {
              button.addEventListener('click', () => {
              
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
              
            
              loginOptions.style.setProperty("display", "flex", "important");
              loginInfo.style.setProperty("display", "none", "important");
              registerInfo.style.setProperty("display", "none", "important");
  });
            });
  //STATISTIKA - NAVIGAVIMAS PER MENESIUS
  // Store the current month as a number (0-11)
  const monthNames = ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"];
  const currentDate = new Date();

  // get the month number (0-11)
  let monthNumber = currentDate.getMonth();

  // get the month name in Lithuanian from the array
  let currentMonth = monthNames[monthNumber];

  // set the month name in the HTML element with the "currentMonth" id
   document.getElementById("statsMonth").innerHTML = currentMonth;
  // Add event listeners to the left and right arrows
  /*const leftArrow = document.getElementById('statsArrowBack');
  const rightArrow = document.getElementById('statsArrowFwrd');*/
/*
  leftArrow.addEventListener('click', () => {
    // Subtract one from the current month to move back one month
    monthNumber = (monthNumber - 1 + 12) % 12; // Handle wrapping around from January to December
    console.log(currentMonth);
    // Update the table with the new data
    updateTable();
  });

  rightArrow.addEventListener('click', () => {
    // Add one to the current month to move forward one month
    monthNumber = (monthNumber + 1) % 12; // Handle wrapping around from December to January
    
   
    updateTable();
  });

 
  function updateTable() {
   
    const hoursWorked = ['10', '20', '40', '30', '15', '8', '25', '40', '77', '56', '49', '63']; 

    // Update the table with the new data
    //const monthName = document.getElementById('statsMonth');
   // const FullData = document.getElementById('statFullData');
    //const PartData = document.getElementById('statPartData');
    //const NoneData = document.getElementById('statNoneData');
    //const RoundsData = document.getElementById('statRoundsData');
    document.getElementById("statsMonth").innerHTML = currentMonth;
    //FullData.textContent = hoursWorked[currentMonth];
    //PartData.textContent = hoursWorked[currentMonth];
    //NoneData.textContent = hoursWorked[currentMonth];
    //RoundsData.textContent = hoursWorked[currentMonth]; 
    
    
    // Find the month with the biggest number
    const biggestMonth = hoursWorked.reduce((maxIndex, currentValue, currentIndex, array) => {
      if (parseInt(currentValue) > parseInt(array[maxIndex])) {
        return currentIndex;
      } else {
        return maxIndex;
      }
    }, 0);

    const trophy = document.querySelectorAll('.bestResult');
    trophy.forEach((icon) => {
    if (currentMonth === biggestMonth) {
      icon.style.visibility = 'visible';
    } else {
      icon.style.visibility = 'hidden';
    }

  });
  }
  // Initialize the table with the data for the current month
  updateTable();*/


}
//PRISIJUNGIMAS
if(!loggedIn){
  const loggingIn = document.querySelectorAll('.login');

  loggingIn.forEach((button2) => {
    button2.addEventListener('click', () => {
    // Update the UI
    document.getElementById("circle-container").style.display = "flex";
    document.getElementById("circle-container").style.setProperty("display", "flex", "important");
    const loginOptions = document.querySelector(".loginOptions");
    const loginInfo = document.querySelector(".loginInfo");
    const registerInfo = document.querySelector(".registerInfo");
    

    loginOptions.style.setProperty("display", "flex", "important");
    loginInfo.style.setProperty("display", "none", "important");
    registerInfo.style.setProperty("display", "none", "important");
    });
  });
}

// HEADERIO MENIU I SECTIONS
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
  
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  
// HEADERIO MENIU ACTIVE
// Get all the navigation links
const navLinks = document.querySelectorAll("nav a");

// Add an event listener to each link
navLinks.forEach(link => {
  link.addEventListener("click", event => {
    // Prevent the default behavior of the link
    event.preventDefault();
    
    // Remove the "active" class from all the links
    navLinks.forEach(link => {
      link.classList.remove("active");
    });
    
    // Add the "active" class to the clicked link
    link.classList.add("active");
  });
});

//HEADERIS hide on scroll
const header = document.querySelector('.header');

window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    header.classList.add('hide');
  } else {
    header.classList.remove('hide');
  }
});

window.addEventListener('mousemove', (e) => {
  if (e.clientY < 80) {
    header.classList.remove('hide');
  }
});

 // TIMERIS
//uzdaryti poilsio tips
 const closeButton2 = document.querySelector('.closeButton2');
 const closeButton3 = document.querySelector('.closeButton3');
 const circle2 = document.getElementById('circle2');
 const circleContainer2 = document.getElementById('circleContainer2');
 const circle3 = document.getElementById('circle3');
 const circleContainer3 = document.getElementById('circleContainer3');
 const flowerContainer = document.getElementById('flower');
 
 closeButton2.addEventListener('click', function() {
   circle2.style.display = 'none';
   circleContainer2.style.display = 'none';

 });

 closeButton3.addEventListener('click', function() {
  circle3.style.display = 'none';
  circleContainer3.style.display = 'none';
  circleContainer3.style.setProperty('style','none','!important');
  console.log("sss");
  
});

   //poilsio tip tekstas
   let restTipsArr = [];
  const circleRestSpans = document.querySelectorAll('.circleRest span');
  circleRestSpans.forEach(span => {
    restTipsArr.push(span.textContent.trim());
  });


 function reverseCol(){
  const selectedColorWork = colorWork.value;
  const selectedColorBreak = colorBreak.value;
  
  // Convert the selected colors to HSL format
  const colorWorkHsl = tinycolor(selectedColorWork).toHsl();
  const colorBreakHsl = tinycolor(selectedColorBreak).toHsl();
  
  // Calculate the lighter and darker shades of the selected colors
  const lightnessOffset = 15;
  const darknessOffset = 7;
  const selectedColorWorkT = tinycolor(selectedColorWork);
  const selectedColorBreakT = tinycolor(selectedColorBreak);
  const desatWorkT = selectedColorWorkT.desaturate(25); // desaturate the color by 10%
  const desatRestT = selectedColorBreakT.desaturate(25); // desaturate the color by 10%
  const darkerWorkHsl = { ...desatWorkT.toHsl(), l: desatWorkT.getLuminance() + darknessOffset / 100 };
  const lighterWorkHsl = { ...colorWorkHsl, l: colorWorkHsl.l + lightnessOffset / 100 };
  const darkerBreakHsl = { ...desatRestT.toHsl(), l: desatRestT.getLuminance() + darknessOffset / 100 };
  const lighterBreakHsl = { ...colorBreakHsl, l: colorBreakHsl.l + lightnessOffset / 100 };

  const darkerWork = tinycolor(darkerWorkHsl).toHexString();
  const lighterWork = tinycolor(lighterWorkHsl).toHexString();
  const darkerBreak = tinycolor(darkerBreakHsl).toHexString();
  const lighterBreak = tinycolor(lighterBreakHsl).toHexString();

  document.documentElement.style.setProperty('--main-accent-color', selectedColorBreak);
  document.documentElement.style.setProperty('--light-accent-color', lighterBreak);
  document.documentElement.style.setProperty('--dark-accent-color', darkerBreak);
  document.documentElement.style.setProperty('--main-accent-color-rest', selectedColorBreak);
  document.documentElement.style.setProperty('--light-accent-color-rest', lighterBreak);
  document.documentElement.style.setProperty('--dark-accent-color-rest', darkerBreak);
}

/*let tasksArr = [
  { name: "1task", rounds: 2 },
  { name: "2task", rounds: 3 }
];//tasks array


/*
 function updateTimer() {
  console.log(roundCount);
  console.log(sumRounds);

   let minutes = Math.floor(timeLeft / 60);
   let seconds = timeLeft % 60;
   timerElement.innerText = `${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
 }
 
 function startTimer() {
  updateTimer();
  
  timerInterval = setInterval(() => {
    timeLeft--;
    updateTimer();

    if (timeLeft === 0) {
      clearInterval(timerInterval);

      if (!isResting) {
        reverseCol();
        timerLabel.innerText = 'POILSIS';
        restTip.style.display = "flex";
        restTip.style.setProperty("display", "flex", "important");
        timeLeft = restTime;
        isResting = true;
        sessionNumber++;
        roundCount++;

        // Get a random index from restTipsArr
        const randomIndex = Math.floor(Math.random() * restTipsArr.length);
        // Set the restTip element's text content to the random element
        restTipText.textContent = restTipsArr[randomIndex];

      } 

      else {
        updateColors();
        isResting = false;
        timerLabel.innerText = 'DARBAS';
        restTip.style.display = "none";
        restTip.style.setProperty("display", "none", "important");
      

        currentTaskRound = 1;
        let sumRounds = 0;
        for (let i = 0; i < tasksArr.length; i++) {
          console.log("TASK NAME N SUM RUNDS");
          console.log(tasksArr[i].name);
          console.log(sumRounds);

          sumRounds += tasksArr[i].rounds;
          if (roundCount <= sumRounds) {
            currentTaskRound = roundCount - (sumRounds - tasksArr[i].rounds) + 1;
            timerTaskName.innerText = tasksArr[i].name + ' - Etapas ' + currentTaskRound;
            
          }
          
         
        }
        if (!isResting && (roundCount+1)== sumRounds && tasksArr.length != 0) {
          timerTaskName.innerText = 'Visos užduotys baigtos';
          clearInterval(timerInterval);
        }

        timeLeft = workTime;
        isResting = false;

        //nera uzduociu
        if(tasksArr.length == 0){
          if (sessionNumber <= 3) {
            updateColors();
          timerProgress.innerText = `${sessionNumber}/3`;
          
          timerProgress.style.visibility = "visible";
        } 
        else if (sessionNumber % 4 === 0) {
          reverseCol();
          timerLabel.innerText = 'PERTRAUKA';
          restTip.style.display = "flex";
        restTip.style.setProperty("display", "flex", "important");
          timerProgress.style.visibility = "hidden";
          timeLeft = breakTime;
          isResting = true;
          sessionNumber = 1;
          console.log(sessionNumber);

        // Get a random index from restTipsArr
        const randomIndex = Math.floor(Math.random() * restTipsArr.length);
        // Set the restTip element's text content to the random element
        restTipText.innerText = restTipsArr[randomIndex];

        } 
        else {
          updateColors();
          restTip.style.display = "hidden";
          restTip.style.setProperty("display", "none", "important");
          timerLabel.innerText = 'DARBAS';
          timerProgress.style.visibility = "visible";
          timeLeft = workTime;
          timerProgress.innerText = `${sessionNumber}/3`;
          
        }
      }
        else{
        if (sessionNumber <= 3) {
          timerProgress.innerText = `${sessionNumber}/3`;
        } else if (sessionNumber === 4) {
          timerLabel.innerText = 'PERTRAUKA';
          timerProgress.style.visibility = "hidden";
          timeLeft = breakTime;
        } else if (sessionNumber === 5) {
          timerLabel.innerText = 'DARBAS';
          timerProgress.style.visibility = "visible";
          timeLeft = workTime;
        } else {
          sessionNumber = 1;
          timerLabel.innerText = 'DARBAS';
          timerProgress.style.visibility = "visible";
          timeLeft = workTime;
          timerProgress.innerText = '';
        }
      }
      }

      if (tasksArr.length == 0) {
        setTimeout(startTimer, 1000);
      } else if (roundCount < sumRounds) {
        if (roundCount <= sumRounds) {
          setTimeout(startTimer, 1000);
        }
        if (roundCount == sumRounds){clearInterval(timerInterval);}
      }
    }
  }, 1000);
}
*/

let taskName="";

let tasksArr = [];
 let timerElement = document.querySelector('.timer'); //timer, eg 25:00
 let timerLabel = document.querySelector('.timer-label'); //says DARBAS/POILSIS/PERTRAUKA
 let timerProgress = document.querySelector('.timer-progress');//how many sessions before PERTRAUKA, goes 1/3, 2/3, 3/3. then PETRTAUKA, then 1/3...
 let timerTaskName = document.getElementById('timerTaskName');//task name from tasksArray[i].name
 let restTip = document.getElementById('circleContainer2'); // div displays rest tip
 let restGame = document.getElementById('circleContainer3'); // div displays rest game
 let restGameCont = document.getElementById('circle3'); // div displays rest game content
let restTipText = document.querySelector('.restTip');// rest tip text
let workTime = workInput.value*60; //ACTUAL VALUE
let restGame1 = document.querySelector('.game1');
let restGame2 = document.querySelector('.game2');
restGame1.style.display = "none";
restGame2.style.display = "none";
console.log(workTime);
let gameIdx = 1;
 //const workTime = 3; // 3 seconds for demonstration purposes TEST VALUE
let restTime = breakInput.value*60;//ACTUAL VALUE
let timerInterval;
 //let restTime = 2; // 2 seconds for demonstration purposes TEST VALUE
 let timeLeft = workTime; //starts with work
 console.log(timeLeft);
 let isResting = false;//DARBAS
 let sessionNumber = 1;//sessions before long break - 1,2,3 PETRAUKA 1,2,3..
 let roundCount = 1;//which DARBAS-POILSIS (as 1 round) round is that
 let currentTaskRound = 1; //which round of current task is that,changes according to tasksArray[i].round(total rounds of a task) value
 //let breakTime = 6;//6 seconds for demonstration purposes
 let breakTime = 15*60;//PETRAUKA duration ACTUAL VALUE
 //let breakTime = 15;//PETRAUKA duration TEST VALUE
 let taskInx = 0;
 let totalWorkMinutes = 0;


 if(restTime >= 15*60) hasBreak = 5*60;//ACTUAL VALUE
 //if(restTime >= 1) hasBreak = 5;//TEST VALUE
 
  if (tasksArr.length == 0) {
   timerTaskName.innerHTML = "Nėra nustatytų užduočių";
 } 
 
 else {
   timerTaskName.innerText = tasksArr[0].name + ' - Etapas ' + currentTaskRound;
 }

 function updateTimer() {
  
   let minutes = Math.floor(timeLeft / 60);
   let seconds = timeLeft % 60;
   timerElement.innerText = `${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
 }

 function startTimer() {
  let intervalSound;
  updateTimer();

  timerInterval = setInterval(() => {
    timeLeft--;
    updateTimer();

    if (timeLeft === 0) {
      
      clearInterval(timerInterval);

      if (!isResting) {
        //play assets/rest.mp3
        intervalSound = new Audio('assets/rest.mp3');
        intervalSound.play();
        totalWorkMinutes += Math.round(workTime/60);
        console.log(totalWorkMinutes);
        reverseCol();
        timerLabel.innerText = 'POILSIS';
        restTip.style.display = "flex";
        restTip.style.setProperty("display", "flex", "important");
        flowerContainer.style.setProperty("display", "flex", "important");
        timeLeft = restTime;
        isResting = true;
        restGame.style.display = "none";
        restGame.style.setProperty("display", "none", "important");
        sessionNumber++;
        roundCount++;
        
        // Get a random index from restTipsArr
        const randomIndex = Math.floor(Math.random() * restTipsArr.length);
        // Set the restTip element's text content to the random element
        restTipText.textContent = restTipsArr[randomIndex];
      } 
      else {
        //play assets/work.mp3
        intervalSound = new Audio('assets/work.mp3');
        intervalSound.play();
        updateColors();
        timerLabel.innerText = 'DARBAS';
        restTip.style.display = "none";
        restTip.style.setProperty("display", "none", "important");
        flowerContainer.style.setProperty("display", "none", "important");
        restGame.style.display = "none";
        restGame.style.setProperty("display", "none", "important");
      
        // Determine the current task round
        currentTaskRound = 0;
        let sumRounds = 0;
        for (let i = 0; i < tasksArr.length; i++) {
          
          sumRounds += tasksArr[i].rounds;
          if (roundCount <= sumRounds) {
            if (sessionNumber == 3)taskInx = i;
            currentTaskRound = roundCount - (sumRounds - tasksArr[i].rounds) ;
            if(sessionNumber==4)timerTaskName.innerText = tasksArr[i].name + ' - Etapas ' + (currentTaskRound-1);
            else timerTaskName.innerText = tasksArr[i].name + ' - Etapas ' + currentTaskRound;
            break;
          }
        }
        if (roundCount > sumRounds && tasksArr.length != 0) {
          //play sound assets/complete.mp3 
          intervalSound = new Audio('assets/complete.mp3');
          intervalSound.play();
          timerTaskName.innerText = 'Visos užduotys baigtos';
          clearInterval(timerInterval);
        }

        timeLeft = workTime;
        console.log(timeLeft);
        isResting = false;
        //nera uzduociu
        if(tasksArr.length == 0){
          if (sessionNumber <= 3) {
            updateColors();
          timerProgress.innerText = `${sessionNumber}/3`;
          
          timerProgress.style.visibility = "visible";
        } 
        else if (sessionNumber % 4 === 0) {
          reverseCol();
          restGame.style.setProperty("display", "flex", "important");
          if(gameIdx==1){restGameCont.innerHTML=restGame1.innerHTML;
          game();
          gameIdx=2;
          }
          else{ 
            restGameCont.innerHTML=restGame2.innerHTML;
          initializeGame();
          gameIdx=1;
          }
          //play assets/break.mp3
          intervalSound = new Audio('assets/break.mp3');
          intervalSound.play();
          timerLabel.innerText = 'PERTRAUKA';
          restTip.style.display = "none";
          restTip.style.setProperty("display", "none", "important");
          flowerContainer.style.setProperty("display", "flex", "important");
          timerProgress.style.visibility = "hidden";
          timeLeft = breakTime;
          sessionNumber = 1;
          

        // Get a random index from restTipsArr
        const randomIndex = Math.floor(Math.random() * restTipsArr.length);
        // Set the restTip element's text content to the random element
        restTipText.innerText = restTipsArr[randomIndex];

        } 
        else {
          //play assets/work.mp3
          intervalSound = new Audio('assets/work.mp3');
          intervalSound.play();
          updateColors();
          restGame.style.display = "none";
          restGame.style.setProperty("display", "none", "important");
          restTip.style.display = "hidden";
          restTip.style.setProperty("display", "none", "important");
          flowerContainer.style.setProperty("display", "none", "important");
          timerLabel.innerText = 'DARBAS';
          timerProgress.style.visibility = "visible";
          timeLeft = workTime;
          timerProgress.innerText = `${sessionNumber}/3`;
          
        }
      }
        else{
        if (sessionNumber <= 3) {
          updateColors();
          timerProgress.innerText = `${sessionNumber}/3`;
         
          timerProgress.style.visibility = "visible";
        } 
        else  {
            isResting = true;
            reverseCol();
          //play assets/break.mp3
          intervalSound = new Audio('assets/break.mp3');
          intervalSound.play();
            //timerTaskName.innerText="";
            timerLabel.innerText = 'PERTRAUKA';
            restTip.style.display = "flex";
            restTip.style.setProperty("display", "none", "important");
            flowerContainer.style.setProperty("display", "flex", "important");
            timerProgress.style.visibility = "hidden";
            restGame.style.setProperty("display", "flex", "important");
            if(gameIdx==1){
              
            game();
            gameIdx=2;
            }
            else{ 
            
            initializeGame();
            gameIdx=1;
            }
            timeLeft = breakTime;
            sessionNumber = 1;
            //roundCount--;
            
          // Get a random index from restTipsArr
          const randomIndex = Math.floor(Math.random() * restTipsArr.length);
          // Set the restTip element's text content to the random element
          restTipText.innerText = restTipsArr[randomIndex];
        }      
      }
      }

      if (tasksArr.length == 0) {
        setTimeout(startTimer, 1000);
      } else if (roundCount <= sumRounds) {
        
          setTimeout(startTimer, 1000);
        
      }
      else {
        //play assets/complete.mp3
        intervalSound = new Audio('assets/complete.mp3');
        intervalSound.play();
        timerTaskName.innerText = 'Visos užduotys baigtos';
      

      if(userId !== null){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("POST", "update_stats.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
        xhttp.send("&user_id="+ userId + "&stat_full_day=true"+ "&stat_minutes=" + totalWorkMinutes + "&stat_rounds=" + roundCount);
      }

      
    }
    }
  }, 1000);
}


const timerPlayButton = document.getElementById('timerPlay');
const timerPauseButton = document.getElementById('timerPause');

timerPlayButton.addEventListener('click', () => {
  startTimer();
  intervalSound = new Audio('assets/work.mp3');
  intervalSound.play();
});

timerPauseButton.addEventListener('click', () => {
  clearInterval(timerInterval);
  
  if(userId !== null){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "update_stats.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(roundCount);
  xhttp.send("&user_id="+ userId + "&stat_full_day=false" + "&stat_minutes=" + totalWorkMinutes + "&stat_rounds=" + roundCount);
}

  
});

/*
 //POILSIS-SCROLLING
 const circlesContainer = document.querySelector('.circles-container');
const arrowLeft = document.createElement('div');
arrowLeft.classList.add('arrow', 'arrow-left');
arrowLeft.innerHTML = '&#10094;';
const arrowRight = document.createElement('div');
arrowRight.classList.add('arrow', 'arrow-right');
arrowRight.innerHTML = '&#10095;';
circlesContainer.before(arrowLeft);
circlesContainer.after(arrowRight);

arrowLeft.addEventListener('click', () => {
  circlesContainer.scrollBy({
    left: -500,
    behavior: 'smooth'
  });
});

arrowRight.addEventListener('click', () => {
  circlesContainer.scrollBy({
    left: 500,
    behavior: 'smooth'
  });
});
*/

//get user tasks
/*
 let tasks = [];

function addTask() {
 
  const taskInputs = document.querySelectorAll('.addTasks');
 
  taskInputs.forEach((taskInput) => {
    taskInput.addEventListener('change', () => {
      
      const taskName = taskInput.querySelector('.taskName').value;
      const taskRounds = taskInput.querySelector('.taskRounds').value;
      tasks.push({ name: taskName, type: taskRounds }); console.log(taskName);
    });
  });
}*/


 /* 
  const taskInputs = document.querySelectorAll('.addTasks');

  taskInputs.forEach(taskInput => {
    const taskName = taskInput.querySelector('.taskName').value;
    const taskRounds = taskInput.querySelector('.taskRounds').value;
    tasks.push({ name: taskName, rounds: taskRounds });
  });

  console.log(tasks); // Do something with the tasks array
}

addTask();*/
/*
function addTask() {
  const tasks = [];
  const taskInputs = document.querySelectorAll('.addTasks');
  taskInputs.forEach((taskInput) => {
    const taskName = taskInput.querySelector('.taskName');
    const taskRounds = taskInput.querySelector('.taskRounds');
    taskName.addEventListener('input', () => {
      tasks.push({ name: taskName.value, rounds: taskRounds.value });
      console.log(tasks);
    });
    taskRounds.addEventListener('input', () => {
      tasks.push({ name: taskName.value, rounds: taskRounds.value });
      console.log(tasks);
    });
  });
}
addTask();*/




//UZDUOTYS - etapu pridejimas ir idejimas i array
const addMoreButtons = document.querySelectorAll('#add-tasks-btn');



function setup() {
  // Add event listeners to all input fields
  const inputs = document.getElementsByName('rounds[]');
  inputs.forEach(input => {
    input.addEventListener('change', updateRounds);
    input.addEventListener('blur', updateTasks);
  });

  const inputsN = document.getElementsByName('task[]');
  inputsN.forEach(inputn => {
    inputn.addEventListener('change', updateTasks);
    inputn.addEventListener('blur', updateTasks);
  });

  // Add event listeners to all buttons
  Array.from(addMoreButtons).forEach(addMoreButton => {
    addMoreButton.addEventListener('click', () => {
      const tasksInputGroup = document.getElementById('add-tasks-group');
      const clonedtasksInputGroup = tasksInputGroup.cloneNode(true);

      // Remove previous values from inputs
      const inputs = clonedtasksInputGroup.getElementsByTagName('input');
      [...inputs].forEach(input => input.value = '');

      // Change button attributes and add click event listener
      const addButton = clonedtasksInputGroup.querySelector('#add-tasks-btn');
      addButton.id = "remove-tasks-button";
      addButton.className = "btn btn-danger m-2 fs-3";
      addButton.innerText = "-";

      // Add click event listener to the '-' button
      const removeButton = clonedtasksInputGroup.querySelector('#remove-tasks-button');
      removeButton.addEventListener('click', () => {
        clonedtasksInputGroup.parentElement.removeChild(clonedtasksInputGroup);
        updateRounds();
        updateTasks();
      });

      tasksInputGroup.parentElement.append(clonedtasksInputGroup);
      // Add input event listener to new input field
      const newInputA = clonedtasksInputGroup.querySelector('input[name="rounds[]"]');
      const newInputT = clonedtasksInputGroup.querySelector('input[name="task[]"]');
      newInputA.addEventListener('change', updateRounds);
      newInputA.addEventListener('blur', updateTasks);
      newInputT.addEventListener('change', updateTasks);
      newInputT.addEventListener('blur', updateTasks);
    }, false)
  });

  // Call updateRounds on page load
  updateRounds();
  updateTasks();
}

function updateRounds() {
  sumRounds = 0;
  const rounds = document.getElementsByName('rounds[]');
  
  for (let i = 0; i < rounds.length; i++) {
    sumRounds += parseInt(rounds[i].value) || 0;
  }
  const roundsTotal = document.getElementById('roundsTotal');
  roundsTotal.innerText = sumRounds;
}

function updateTasks() {
  const tasks = document.getElementsByName('task[]');
  const rounds = document.getElementsByName('rounds[]');
  
  tasksArr.length = 0;
  for (let i = 0; i < tasks.length; i++) {
    const taskName = tasks[i].value;
    const taskRounds = parseInt(rounds[i].value) || 0;

    if (taskName !== '' && taskRounds > 0) {
      tasksArr.push({ name: taskName, rounds: taskRounds });
    }
  }
  if (tasksArr.length != 0) timerTaskName.innerText = tasksArr[0].name + ' - Etapas ' + currentTaskRound;
  
}
setup();
  // Update the label of timerTaskName
  /*
  const timerLabel = document.getElementById('timerTaskName');
  if (tasksArr.length == 0) {
    timerLabel.innerHTML = "Nėra nustatytų užduočių";
  } else {
    timerLabel.innerHTML = tasksArr[0].name;
  }*
  /
  console.log(tasksArr);
}




*/

//TASKS - data

  const today = new Date();
  const month = String(today.getMonth() + 1).padStart(2, '0');
  const day = String(today.getDate()).padStart(2, '0');
  const dateString = `${month}-${day}`;
  document.getElementById('currentTasks').textContent = dateString;


  
//NUSTATYMAI-DROPDOWN MYGTUKO TEKSTAS
const dropdownButton = document.querySelector('.dropdownButton');
const dropdownMenu = document.querySelector('.dropdownMenu');
const recommendedRounds = document.querySelector('.recommend');

dropdownMenu.addEventListener('click', (event) => {
  if (event.target.tagName === 'A') {
    dropdownButton.innerText = event.target.innerText;

    const buttonName = dropdownButton.getAttribute('name');
    const buttonText = dropdownButton.innerText;
    work
    
   

    xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText); // This is the response from the PHP file
      }
    };
    xhr.send("buttonName=" + buttonName + "&buttonText=" + buttonText);

/*


    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText); // This is the response from the PHP file
      }
    };
    xhr.send("buttonName=" + buttonName + "&buttonText=" + buttonText);
*/

  }
});

/*
dropdownItems.forEach(item => {
  item.addEventListener('click', () => {
    const buttonName = dropdownButton.getAttribute('name');
    const buttonText = dropdownButton.innerText;
    const buttonVal = item.getAttribute('data-value');
    const [workInputVal, breakInputVal] = buttonText.split('-');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText); // This is the response from the PHP file
      }
    };
    xhr.send("buttonName=" + buttonName + "&buttonText=" + buttonText + "&workInputVal=" + workInputVal + "&breakInputVal=" + breakInputVal);
  });
});*/

//NUSTATYMAI-DROPDOWN SPAN TEKSTAS


// Add an input event listener to the work and rest input fields
workInput.addEventListener('input', () => {
  if(workInput.value<1)workInput.value=1;
  defaultValues2[0] = workInput.value;
  workTime = workInput.value*60; //ACTUAL VALUE
  timeLeft= workInput.value*60;
  recommendedRoundsVal = Math.floor(7 * 60*60 / workTime);
  recommendedRounds.innerHTML = `Viso etapų (rekomenduojama iki ${recommendedRoundsVal}):`;

document.querySelector('.timer').textContent = `${workInput.value}:00`;
  //workTime=`${workInput.value}:00`; //ACTUAL VALUE??
  selectedOption.textContent = `${workInput.value}min darbas-${breakInput.value}min poilsis`;

    if(workInput.value==25 && breakInput.value==5) dropdownButton.innerText="Pomodoro(25-5)";
  else if(workInput.value==90 && breakInput.value==20) dropdownButton.innerText="90-20";
  else if(workInput.value==52 && breakInput.value==17) dropdownButton.innerText="52-17";
  else dropdownButton.innerText="Pasirinktinis";
});

breakInput.addEventListener('input', () => {
  if(breakInput.value<1)breakInput.value=1;
  defaultValues2[1] = breakInput.value;
 
  restTime = breakInput.value*60; //ACTUAL VALUE
  selectedOption.textContent = `${workInput.value}min darbas-${breakInput.value}min poilsis`;

  if(workInput.value==25 && breakInput.value==5) dropdownButton.innerText="Pomodoro(25-5)";
  else if(workInput.value==90 && breakInput.value==20) dropdownButton.innerText="90-20";
  else if(workInput.value==52 && breakInput.value==17) dropdownButton.innerText="52-17";
  else dropdownButton.innerText="Pasirinktinis";
});

//NUSTATYMAI-TIKRINA INTERVALU LAIKA 24h

function updateTotal() {
  const workValue = parseInt(workInput.value) || 0;
  const breakValue = parseInt(breakInput.value) || 0;
  const total = workValue + breakValue;

  if (total < 1440) {
    errorAlert.className = "form-text text-danger invisible";
  } else {
    errorAlert.className = "form-text text-danger visible";
  }
}

workInput.addEventListener('input', updateTotal);
breakInput.addEventListener('input', updateTotal);

//INTERVALU REIKSMES

// Set the default values of work and rest input fields
//const defaultValues2 = document.document.querySelector('.dropdownMenu .active a').dataset.value.split('-');
/*workInput.value = defaultValues2[0];
breakInput.value = defaultValues2[1];*/
/*
// Loop through the dropdown items and add a click event listener to each one
dropdownItems.forEach(item => {
  item.addEventListener('click', () => {
    // Split the selected value into work and rest times
    const values = item.dataset.value.split('-');
    // Set the values of the work and rest input fields
    workInput.value = values[0];
    breakInput.value = values[1];
  });
});

// Set the default values of work and rest input fields
let defaultValues = [workInput.value, breakInput.value];
selectedOption.textContent = `${defaultValues[0]}min darbas-${defaultValues[1]}min poilsis`;
*/
// Loop through the dropdown items and add a click event listener to each one
dropdownItems.forEach(item => {
  item.addEventListener('click', () => {
    // Split the selected value into work and rest times
    const values = item.dataset.value.split('-');
    // Set the values of the work and rest input fields
    workInput.value = values[0];
    breakInput.value = values[1];
    // Set the span text to the selected item with custom formatting
    selectedOption.textContent = `${values[0]}min darbas-${values[1]}min poilsis`;
  });
});



//NUSTATYMAI-SPALVU PASIRINKIMAS

const dropdownMenu2 = document.querySelector('.dropdownMenu2');
const dropdownButton2 = document.querySelector('.dropdownButton2');
const dropdownItems2 = document.querySelectorAll('.dropdownItem2');

const dropdownItemActive2 = document.querySelector('li.active2 > a.dropdownItem2');
//const defaultColors = dropdownItemActive2 ? dropdownItemActive2.dataset.value.split('-') : ['#cccccc', '#FFFF00'];

/*colorWork.value = defaultColors[0];
colorBreak.value = defaultColors[1];*/

dropdownMenu2.addEventListener('click', (event) => {
  if (event.target.tagName === 'A') {
    dropdownButton2.innerText = event.target.innerText;
    
  } });

  dropdownItems2.forEach(item => {
    item.addEventListener('click', () => {
      // Split the selected value into work and rest times
      const values2 = item.dataset.value.split('-');
      // Set the values of the work and rest input fields
      colorWork.value = values2[0];
      colorBreak.value = values2[1];
      updateColors();
      
      
      
    });
  });

    //////////////REIKES  PAKEISTI I KT EL KAI JAU JIE BUS
   
   /* dropdownButton2.style.backgroundColor = colorWork.value;
     dropdownButton2.style.backgroundColor = colorBreak.value;*/
     //const colorWork = document.getElementById('colorWork');
/*
     colorWork.addEventListener('input', function() {
      console.log(colorWork.value);
       document.documentElement.style.setProperty('--main-accent-color-work', colorWork.value);
       document.documentElement.style.setProperty('--light-accent-color-work', `lighten(${colorWork.value}, 15%)`);
       document.documentElement.style.setProperty('--dark-accent-color-work', `desaturate(darken(${colorWork.value}, 20%), 30%)`);
     });

*/

function updateColors() {
  if(colorWork.value=='#fba271' && colorBreak.value=='#6acc80') dropdownButton2.innerText="Numatytoji";
  else if(colorWork.value=='#cccccc' && colorBreak.value=='#a6a6a6') dropdownButton2.innerText="Nespalvota";
  else dropdownButton2.innerText="Pasirinktinė";
  // Get the selected color values from the color picker inputs
const selectedColorWork = colorWork.value;
const selectedColorBreak = colorBreak.value;

// Convert the selected colors to HSL format
const colorWorkHsl = tinycolor(selectedColorWork).toHsl();
const colorBreakHsl = tinycolor(selectedColorBreak).toHsl();

// Calculate the lighter and darker shades of the selected colors
const lightnessOffset = 15;
const darknessOffset = 7;
const selectedColorWorkT = tinycolor(selectedColorWork);
const selectedColorBreakT = tinycolor(selectedColorBreak);
const desatWorkT = selectedColorWorkT.desaturate(25); // desaturate the color by 10%
const desatRestT = selectedColorBreakT.desaturate(25); // desaturate the color by 10%
const darkerWorkHsl = { ...desatWorkT.toHsl(), l: desatWorkT.getLuminance() + darknessOffset / 100 };
const lighterWorkHsl = { ...colorWorkHsl, l: colorWorkHsl.l + lightnessOffset / 100 };
const darkerBreakHsl = { ...desatRestT.toHsl(), l: desatRestT.getLuminance() + darknessOffset / 100 };
const lighterBreakHsl = { ...colorBreakHsl, l: colorBreakHsl.l + lightnessOffset / 100 };

const darkerWork = tinycolor(darkerWorkHsl).toHexString();
const lighterWork = tinycolor(lighterWorkHsl).toHexString();
const darkerBreak = tinycolor(darkerBreakHsl).toHexString();
const lighterBreak = tinycolor(lighterBreakHsl).toHexString();
  // Set the color values of your CSS variables
  document.documentElement.style.setProperty('--main-accent-color', selectedColorWork);
  document.documentElement.style.setProperty('--light-accent-color', lighterWork);
  document.documentElement.style.setProperty('--dark-accent-color', darkerWork);
  document.documentElement.style.setProperty('--main-accent-color-rest', darkerBreak);
  document.documentElement.style.setProperty('--light-accent-color-rest', lighterBreak);
  document.documentElement.style.setProperty('--dark-accent-color-rest', darkerBreak);
}


// Update the colors when the user selects a new color
colorWork.addEventListener('input', updateColors);
colorBreak.addEventListener('input', updateColors);

updateColors();


/*
//add defaut settings to user_settings table
$(document).ready(function() {
  // Listen for changes in the timer mode dropdown
  $('.dropdownItem').on('click', function() {
    console.log("input");
    // Get the selected value
    const selectedValue = $(this).data('value');
    
    // Update the display
    $('#selectedOption').text(selectedValue);
    
    // Update the database
    updateUserSettings('timer_mode', selectedValue);
  });
  
  // Listen for changes in the work and rest interval input fields
  $('#work, #break').on('change', function() {
    // Get the values
    const workValue = $('#work').val();
    const breakValue = $('#break').val();
    
    // Update the display
    const displayValue = workValue + 'min darbas-' + breakValue + 'min poilsis';
    $('#selectedOption').text(displayValue);
    
    // Update the database
    const intervalValue = workValue + '-' + breakValue;
    updateUserSettings('work_interval', intervalValue);
    updateUserSettings('rest_interval', intervalValue);
  });
  
  // Listen for changes in the color theme dropdown
  $('.dropdownItem2').on('click', function() {
    // Get the selected value
    const selectedValue = $(this).data('value');
    
    // Update the database
    updateUserSettings('color_theme', selectedValue);
  });
  
  // Listen for changes in the work and rest color input fields
  $('#colorWork, #colorBreak').on('change', function() {
    // Get the values
    const colorWorkValue = $('#colorWork').val();
    const colorBreakValue = $('#colorBreak').val();
    
    // Update the database
    updateUserSettings('work_color', colorWorkValue);
    updateUserSettings('rest_color', colorBreakValue);
  });
  
  // Function to update the user settings in the database
  function updateUserSettings(settingName, settingValue) {
    // Get the user ID from the session variable
    //const userId = <?php echo $_SESSION['userId']; ?>;
    
    // Make the Ajax request
    $.ajax({
      url: 'update_user_settings.php',
      type: 'POST',
      data: {
        userId: userId,
        settingName: settingName,
        settingValue: settingValue
      },
      success: function(response) {
       console.log("yes");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("no");
      }
    });
  }
});
*/


//GAME

const resetGame = () => {
  playerScore = 0;
  computerScore = 0;
  moves = 0;

  const movesLeft = document.querySelector('.movesleft');
  movesLeft.innerText = 'Liko ėjimų: 10';

  const playerScoreBoard = document.querySelector('.p-count');
  playerScoreBoard.textContent = '0';

  const computerScoreBoard = document.querySelector('.c-count');
  computerScoreBoard.textContent = '0';

  const result = document.querySelector('.result');
  result.innerText = '';

  const chooseMove = document.querySelector('.move');
  chooseMove.innerText = 'Pasirinkite savo ėjimą';

  const reloadBtn = document.querySelector('.reload');
  reloadBtn.style.display = 'none';

  const playerOptions = [rockBtn, paperBtn, scissorBtn];
  playerOptions.forEach(option => {
    option.style.display = 'block';
  });
};


const game = () => {
  let playerScore = 0;
  let computerScore = 0;
  let moves = 0;


  // Function to 
  const playGame = () => {
      const rockBtn = document.querySelector('.rock');
      const paperBtn = document.querySelector('.paper');
      const scissorBtn = document.querySelector('.scissor');
      const playerOptions = [rockBtn,paperBtn,scissorBtn];
      const computerOptions = ['stapleris','popierius','žirklės']
       
        
      // Function to start playing game
      playerOptions.forEach(option => {
          option.addEventListener('click',function(){
            console.log(option);
              const movesLeft = document.querySelector('.movesleft');
              moves++;
              movesLeft.innerText = `Liko ėjimų: ${10-moves}`;
                

              const choiceNumber = Math.floor(Math.random()*3);
              const computerChoice = computerOptions[choiceNumber];

              // Function to check who wins
              winner(this.innerText,computerChoice)
                
              // Calling gameOver function after 10 moves
              if(moves == 10){
                  gameOver(playerOptions,movesLeft);
              }
          })
      })
        
  }

  // Function to decide winner
  const winner = (player,computer) => {
      const result = document.querySelector('.result');
      const playerScoreBoard = document.querySelector('.p-count');
      const computerScoreBoard = document.querySelector('.c-count');
      console.log(playerScoreBoard);
      player = player.toLowerCase();
      computer = computer.toLowerCase();
      
      if(player === computer){
          result.textContent = 'Lygiosios :|'
      }
      else if(player == 'stapleris'){
          if(computer == 'popierius'){
              result.textContent = 'Laimėjo kompiuteris';
              computerScore++;
              computerScoreBoard.textContent = computerScore;

          }else{
              result.textContent = 'Laimėjo žaidėjas'
              playerScore++;
              playerScoreBoard.textContent = playerScore;
          }
      }
      else if(player == 'žirklės'){
          if(computer == 'stapleris'){
              result.textContent = 'Laimėjo kompiuteris';
              computerScore++;
              computerScoreBoard.textContent = computerScore;
          }else{
              result.textContent = 'Laimėjo žaidėjas';
              playerScore++;
              playerScoreBoard.textContent = playerScore;
          }
      }
      else if(player == 'popierius'){
          if(computer == 'žirklės'){
              result.textContent = 'Laimėjo kompiuteris';
              computerScore++;
              computerScoreBoard.textContent = computerScore;
          }else{
              result.textContent = 'Laimėjo žaidėjas';
              playerScore++;
              playerScoreBoard.textContent = playerScore;
          }
      }
  }

  // Function to run when game is over
  const gameOver = (playerOptions,movesLeft) => {

      const chooseMove = document.querySelector('.move');
      const result = document.querySelector('.result');
      const reloadBtn = document.querySelector('.reload');

      playerOptions.forEach(option => {
          option.style.display = 'none';
      })

     
      chooseMove.innerText = 'Žaidimas baigtas'
      movesLeft.style.display = 'none';

      if(playerScore > computerScore){
          
          result.innerText = 'Laimėjote:)'
          result.style.color = '#308D46';
      }
      else if(playerScore < computerScore){
          
          result.innerText = 'Pralaimėjote:(';
          result.style.color = 'red';
      }
      else{
          
          result.innerText = 'Lygiosios';
          result.style.color = 'grey'
      }
      reloadBtn.innerText = 'Žaisti dar kartą'; //TOFIX
      reloadBtn.style.display = 'flex';
      reloadBtn.addEventListener('click',() => {
          window.location.reload();
      })
  }


  // Calling playGame function inside game
  playGame();
    
}

// Calling the game function
//game();


//ANIMACIJA
var animation = bodymovin.loadAnimation({
  container: document.getElementById('flower'),
  render: 'svg',
  loop:true,
  autoplay:true,
  path:'data.json',
  
  
})
animation.setSpeed(0.7);

//STATISTIKA colours
if(loggedIn){
goalWeek = parseInt(document.getElementById('weeks').value);
goalDay = parseInt(document.getElementById('days').value);
statWeek = parseInt(document.getElementById('daysPerWeek').innerHTML);
statDay = parseInt(document.getElementById('minutesPerDay').innerHTML);
h4day = document.getElementById('minutesPerDay');
if (statDay >= goalDay) {
  
  h4day.style.color='#00b300'; 
  h4day.style.setProperty('color', '#00b300', 'important');
} else {
  document.getElementById('minutesPerDay').style.color = '#ffbf00'; 
  document.getElementById('minutesPerDay').style.setProperty('color', '#ffbf00', 'important');
}
if (statWeek >= goalWeek) {
  document.getElementById('daysPerWeek').style.color = '#00b300'; 
  document.getElementById('daysPerWeek').style.setProperty('color', '#00b300', 'important');
} else {
  document.getElementById('daysPerWeek').style.color = '#ffbf00'; 
  document.getElementById('daysPerWeek').style.setProperty('color', '#ffbf00', 'important');
}}
/*

//GAME2
var config = {
  type: Phaser.AUTO,
  width: 800,
  height: 600,
  backgroundColor: '#ffffff',
  physics: {
      default: 'arcade',
      arcade: {
          gravity: { y: 300 },
          debug: false
      }
  },
  scene: {
      preload: preload,
      create: create,
      update: update
  }
};

var game = new Phaser.Game(config);

function preload ()
{
  this.load.image('coffee', 'assets/coffee.png');
  this.load.image('pillow', 'assets/pillow.png');
  this.load.image('yoga', 'assets/yoga.png');
}

function create ()
{
  this.add.image(400, 300, 'background');

  var coffee = this.physics.add.image(Phaser.Math.Between(50, 750), 0, 'coffee');
  coffee.setCollideWorldBounds(true);
  coffee.setBounce(1);

  var pillow = this.physics.add.image(Phaser.Math.Between(50, 750), 0, 'pillow');
  pillow.setCollideWorldBounds(true);
  pillow.setBounce(1);

  var yoga = this.physics.add.image(Phaser.Math.Between(50, 750), 0, 'yoga');
  yoga.setCollideWorldBounds(true);
  yoga.setBounce(1);

  this.physics.add.collider(coffee, pillow);
  this.physics.add.collider(coffee, yoga);
  this.physics.add.collider(pillow, yoga);

  this.input.on('pointerdown', function () {

      if (coffee.body.velocity.y == 0 && pillow.body.velocity.y == 0 && yoga.body.velocity.y == 0)
      {
          coffee.setVelocityY(Phaser.Math.Between(200, 400));
          pillow.setVelocityY(Phaser.Math.Between(200, 400));
          yoga.setVelocityY(Phaser.Math.Between(200, 400));
      }

  }, this);
}

function update ()
{
}*/
/*
var config = {
  type: Phaser.AUTO,
  width: 1000,
  height: 1000,
  backgroundColor: '#00ffff',
  physics: {
      default: 'arcade',
      arcade: {
          gravity: { y: 0 },
          debug: false
      }
  },
  scene: {
      preload: preload,
      create: create,
      update: update
  }
};

var game = new Phaser.Game(config);
var player;
var desk;
var coffee;
var water;
var plant;
var score = 0;
var scoreText;

function preload ()
{
  this.load.image('player', 'assets/player.png');
  this.load.image('desk', 'assets/pillow.png');
  this.load.image('coffee', 'assets/coffee.png');
  this.load.image('water', 'assets/water.png');
  this.load.image('plant', 'assets/plant.png');
}

function create ()
{
  desk = this.physics.add.staticImage(400, 300, 'desk');
  coffee = this.physics.add.image(300, 450, 'coffee').setInteractive({ cursor: 'pointer' });
  water = this.physics.add.image(400, 450, 'water').setInteractive({ cursor: 'pointer' });
  plant = this.physics.add.image(500, 450, 'plant').setInteractive({ cursor: 'pointer' });

  player = this.physics.add.sprite(50, 50, 'player');
  player.setCollideWorldBounds(true);

  scoreText = this.add.text(16, 16, 'Score: 0', { fontSize: '32px', fill: '#000' });

  this.physics.add.collider(player, desk);

  this.physics.add.overlap(player, coffee, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Coffee break! Take a few minutes to recharge and refocus.');
      coffee.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, water, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Stay hydrated! Drinking water throughout the day can help you stay focused and productive.');
      water.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, plant, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Greenery can boost your mood and productivity! Take a moment to appreciate nature.');
      plant.disableBody(true, true);
  }, null, this);

  cursors = this.input.keyboard.createCursorKeys();
}

function update ()
{
  if (cursors.left.isDown)
  {
      player.setVelocityX(-160);
  }
  else if (cursors.right.isDown)
  {
      player.setVelocityX(160);
  }

  if (cursors.up.isDown)
  {
      player.setVelocityY(-160);
  }
  else if (cursors.down.isDown)
  {
      player.setVelocityY(160);
  }
}*/
/*
var config = {
  type: Phaser.AUTO,
  width: 800,
  height: 600,
  physics: {
      default: 'arcade',
      arcade: {
          gravity: { y: 0 },
          debug: false
      }
  },
  scene: {
      preload: preload,
      create: create,
      update: update
  }
};

var game = new Phaser.Game(config);
var player;
var desk;
var coffee;
var water;
var plant;
var book;
var score = 0;
var scoreText;
var timeText;
var timeLimit = 60;
var timerEvent;

function preload ()
{
  this.load.image('background', 'assets/background.jpg');
  this.load.image('player', 'assets/player.png');
  this.load.image('desk', 'assets/yoga.png');
  this.load.image('coffee', 'assets/coffee.png');
  this.load.image('water', 'assets/water.png');
  this.load.image('plant', 'assets/plant.png');
  this.load.image('book', 'assets/water.png');
}

function create ()
{
  this.add.image(400, 300, 'background');

  desk = this.physics.add.staticImage(400, 300, 'desk');
  coffee = this.physics.add.image(300, 450, 'coffee').setInteractive({ cursor: 'pointer' });
  water = this.physics.add.image(400, 450, 'water').setInteractive({ cursor: 'pointer' });
  plant = this.physics.add.image(500, 450, 'plant').setInteractive({ cursor: 'pointer' });
  book = this.physics.add.image(400, 200, 'book').setInteractive({ cursor: 'pointer' });

  player = this.physics.add.sprite(50, 50, 'player');
  player.setCollideWorldBounds(true);

  scoreText = this.add.text(16, 16, 'Score: 0', { fontSize: '32px', fill: '#000' });
  timeText = this.add.text(650, 16, 'Time: ' + timeLimit, { fontSize: '32px', fill: '#000' });

  this.physics.add.collider(player, desk);

  this.physics.add.overlap(player, coffee, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Coffee break! Take a few minutes to recharge and refocus.');
      coffee.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, water, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Stay hydrated! Drinking water throughout the day can help you stay focused and productive.');
      water.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, plant, function(){
      score += 10;
      scoreText.setText('Score: ' + score);
      alert('Greenery can boost your mood and productivity! Take a moment to appreciate nature.');
      plant.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, book, function(){
      score += 20;
      scoreText.setText('Score: ' + score);
      alert('Reading can increase your knowledge and creativity. Take some time to learn something new!');
      book.disableBody(true, true);
  }, null, this);

  cursors = this.input.keyboard.createCursorKeys();

  timerEvent = this.time.addEvent({
      delay: 1000,
      callback: onTimerEvent,
      callbackScope: this,
      loop: true
  });
  function onTimerEvent() {
    timeLimit--;
    timeText.setText('Time: ' + timeLimit);
    if (timeLimit === 0) {
        this.physics.pause();
        player.setTint(0xff0000);
        alert('Time is up! Your final score is ' + score);
        location.reload();
    }
}

timerEvent.loop = true;
}
function update ()
{
  if (cursors.left.isDown)
  {
      player.setVelocityX(-160);
  }
  else if (cursors.right.isDown)
  {
      player.setVelocityX(160);
  }

  if (cursors.up.isDown)
  {
      player.setVelocityY(-160);
  }
  else if (cursors.down.isDown)
  {
      player.setVelocityY(160);
  }
}*/
//GAME3

// Define the list of words to choose from
const words = [
  'JOGA',
  'LAIKYSENA',
  'PARETAS',
  'POMODORAS',
  'LAIKMATIS',
  'POILSIS',
  'MEDITACIJA',
  'KONCENTRACIJA'
];

// Define the maximum number of incorrect guesses allowed
const maxWrongGuesses = 8;

let wordToGuess = '';
let guessedLetters = [];
let wrongGuesses = 0;
let imageCount = 1;

// Select random word from the list
function selectRandomWord() {
  return words[Math.floor(Math.random() * words.length)];
}

// Initialize the game
function initializeGame() {
  wordToGuess = selectRandomWord();
  guessedLetters = Array(wordToGuess.length).fill('_');
  wrongGuesses = 0;
  imageCount = 1;

  // Update the word display
  updateWordDisplay();

  updateHangmanGraphic();

  // Remove any previously generated buttons
  const lettersContainer = document.querySelector('.letters');
  while (lettersContainer.firstChild) {
    lettersContainer.removeChild(lettersContainer.firstChild);
  }

  // Generate the letter buttons
  for (let i = 0; i < 26; i++) {
    const letter = String.fromCharCode(65 + i);
    const button = document.createElement('button');
    button.innerText = letter;
    button.addEventListener('click', function () {
      handleGuess(letter);
    });
    lettersContainer.appendChild(button);
  }

  // Clear any previous win/lose message
  const messageContainer = document.querySelector('.message');
  messageContainer.innerText = '';
}

// Update the word display
function updateWordDisplay() {
  const wordContainer = document.querySelector('.word');
  wordContainer.innerText = guessedLetters.join(' ');
}

// Handle a letter guess
function handleGuess(letter) {
  // If the letter has already been guessed, do nothing
  if (guessedLetters.includes(letter)) {
    return;
  }

  // Add the letter to the list of guessed letters
  guessedLetters.forEach((guessedLetter, index) => {
    if (wordToGuess[index] === letter) {
      guessedLetters[index] = letter;
    }
  });

  // If the letter is not in the hidden word, increment the wrong guesses count and update the Melting Snowman graphic
  if (!wordToGuess.includes(letter)) {
    wrongGuesses++;
    updateHangmanGraphic();
  }

  // Update the word display
  updateWordDisplay();

  // Check if the game has been won or lost
  checkWinOrLose();
}

// Update the Melting Snowman graphic
function updateHangmanGraphic() {
  const HangmanContainer = document.querySelector('.Hangman');
  HangmanContainer.innerHTML = `<img src="assets/hangman${imageCount}.png" alt="hangman ${imageCount}">`;
  imageCount++;
}

// Check if the game has been won or lost
function checkWinOrLose() {
  if (guessedLetters.join('') === wordToGuess) {
    const messageContainer = document.querySelector('.message');
    messageContainer.innerText = 'Laimėjote!';
    const letterButtons = document.querySelectorAll('.letters button');
    letterButtons.forEach(button => {
      button.disabled = true;
      button.removeEventListener('click', handleGuess);
    });
  } else if (wrongGuesses >= maxWrongGuesses) {
    const messageContainer = document.querySelector('.message');
    messageContainer.innerText = `Pralaimėjote! Žodis buvo "${wordToGuess}".`;
    const HangmanContainer = document.querySelector('.Hangman');
    HangmanContainer.innerHTML = `<img src="assets/gameover.png" alt="gameover">`;
    const letterButtons = document.querySelectorAll('.letters button');
    letterButtons.forEach(button => {
      button.disabled = true;
      button.removeEventListener('click', handleGuess);
    });
  }
}
const againBtn = document.querySelector('.again');

againBtn.addEventListener('click', function () {
  initializeGame();
});

// Initialize the game when the page loads
//window.addEventListener('load', initializeGame);
