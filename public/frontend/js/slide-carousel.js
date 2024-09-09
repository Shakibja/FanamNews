let items = document.querySelectorAll('.carousel .carousel-item');

items.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 1; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = items[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});
/*
document.addEventListener('DOMContentLoaded', function () {
  var path = document.querySelector('.progress-wrap path');
  var pathLength = path.getTotalLength();
  path.style.transition = path.style.WebkitTransition = 'none';
  path.style.strokeDasharray = pathLength + ' ' + pathLength;
  path.style.strokeDashoffset = pathLength;
  path.getBoundingClientRect();
  path.style.transition = path.style.WebkitTransition =
    'stroke-dashoffset 10ms linear';

  var handleScroll = function () {
    var scroll = window.pageYOffset || document.documentElement.scrollTop;
    var windowHeight = window.innerHeight;
    var documentHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    var scrollPercentage =
      pathLength - (scroll * pathLength) / (documentHeight - windowHeight);
    path.style.strokeDashoffset = scrollPercentage;
  };

  handleScroll();
  window.addEventListener('scroll', handleScroll);

  window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
      document.querySelector('.progress-wrap').classList.add('active-progress');
    } else {
      document
        .querySelector('.progress-wrap')
        .classList.remove('active-progress');
    }
  });

  document
    .querySelector('.progress-wrap')
    .addEventListener('click', function (event) {
      event.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
      return false;
    });
});

*/
document.addEventListener('DOMContentLoaded', function () {
  var path = document.querySelector('.progress-wrap path');
  var pathLength = path.getTotalLength();
  path.style.transition = path.style.WebkitTransition = 'none';
  path.style.strokeDasharray = pathLength + ' ' + pathLength;
  path.style.strokeDashoffset = pathLength;
  path.getBoundingClientRect();
  path.style.transition = path.style.WebkitTransition =
    'stroke-dashoffset 10ms linear';

  var handleScroll = function () {
    var scroll = window.pageYOffset || document.documentElement.scrollTop;
    var windowHeight = window.innerHeight;
    var documentHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    var scrollPercentage =
      pathLength - (scroll * pathLength) / (documentHeight - windowHeight);
    path.style.strokeDashoffset = scrollPercentage;
  };

  handleScroll();
  window.addEventListener('scroll', handleScroll);

  window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
      document.querySelector('.progress-wrap').classList.add('active-progress');
    } else {
      document
        .querySelector('.progress-wrap')
        .classList.remove('active-progress');
    }
  });

  document
    .querySelector('.progress-wrap')
    .addEventListener('click', function (event) {
      event.preventDefault();
      setTimeout(function () {
        window.scrollTo({
          top: 0,
          behavior: 'smooth',
        });
      }, 100); // Delay of 0.1s (100ms) before scrolling to top
      return false;
    });
});

function show(element) {
  if (element && element.style) {
    // console.log(element);

    element.style.display = '';
  }
}


const autoLoad = document.getElementById('auto-load');
 document
   .getElementById('read-more-btn')
   ?.addEventListener('click', () => show(autoLoad));
