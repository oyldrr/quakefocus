/* Counter */

// Getting elements to use later
const hoursElement = document.getElementById("hours");
const minutesElement = document.getElementById("minutes");
const secondsElement = document.getElementById("seconds");

const optionWater = document.getElementById("optionWater");
const optionFood = document.getElementById("optionFood");
const optionEducation = document.getElementById("optionEducation");
const optionShelter = document.getElementById("optionShelter");

const message = document.getElementById("message");
// 

// Creating click event to listen and calling functions when its clicked
optionWater.addEventListener("click", function () {
  optionWaterFunc();
});
optionFood.addEventListener("click", function () {
  optionFoodFunc();
});
optionEducation.addEventListener("click", function () {
  optionEducationFunc();
});
optionShelter.addEventListener("click", function () {
  optionShelterFunc();
});
//

// Option Functions
function optionWaterFunc() {
  options.style.display = "none";
  startTimer(900, 90);
}

function optionFoodFunc() {
  options.style.display = "none";
  startTimer(1800, 180);
}

function optionEducationFunc() {
  options.style.display = "none";
  startTimer(3600, 360);
}

function optionShelterFunc() {
  options.style.display = "none";
  startTimer(10800, 1080);
}
//

// Start Interval  and setting up values
function startTimer(targetTime, targetLimit) {
  trigger.innerText = "Finish Early";
  var target = new Date().getTime() + (targetTime * 1000);

  var timer = setInterval(function () {
    var now = new Date().getTime();
    var totalSeconds = target - now;
    var hours = Math.floor((totalSeconds % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
    var minutes = Math.floor((totalSeconds % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((totalSeconds % (1000 * 60)) / 1000);
    hoursElement.innerText = formatTime(hours);
    minutesElement.innerText = formatTime(minutes);
    secondsElement.innerText = formatTime(seconds);


    // setting color, if timer less than limit
    if (totalSeconds < (targetLimit * 60 * 1000)) {
      hoursElement.style.color = "magenda";
      minutesElement.style.color = "magenda";
      secondsElement.style.color = "magenda";
    }

    // counter is over
    if (totalSeconds < 0) {
      message.innerText = "Successfully finished!";
      clearInterval(timer);
    }
  }, 1000);
}
/* */

/* Fixing the counter format  */ 
function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}
/* */


/* Start now button */
var trigger = document.getElementById("startCounterBtn");
var options = document.getElementById("pomodoroOptions");
var isOpened = "false";

trigger.addEventListener("click", toggleOptions);

function toggleOptions() {
  if (isOpened == "false") {
    options.style.transition = "1s all ease-in-out"
    options.style.display = "block";
    options.style.opacity = "1";

    trigger.innerText = "Cancel";

    isOpened = "true";

  }
  else {
    if (trigger.innerHTML == "Finish Early") {
      hoursElement.innerText = "00";
      minutesElement.innerText = "00";
      secondsElement.innerText = "00";
      message.innerText = "Failed! :(";
      trigger.innerHTML == "Start Now!";
      isOpened = "false";
    }
    else {
      options.style.display = "none";

      trigger.innerHTML = "Start now!";

      isOpened = "false";
    }
  }

}

/* */
