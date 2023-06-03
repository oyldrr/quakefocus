/* About us Scroll Timeline Effect */
document.addEventListener('scroll', timeline);

function timeline() {
  var threshold_position = window.scrollY + window.innerHeight * 2 / 3;
  //compare scrolltop with scrolltop on each timeline event
  var timeline_events = document.querySelectorAll('.timeline li');
  for (i in timeline_events) {
    if (timeline_events[i].offsetTop < threshold_position) {
      timeline_events[i].classList.add('visible');
    } else {
      timeline_events[i].classList.remove('visible');
    }
  }
}
timeline();
/* */


