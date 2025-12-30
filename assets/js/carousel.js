/* import { Carousel } from 'flowbite';


function initCarousel() {
  const carouselElement = document.getElementById('carousel-example');
  if (!carouselElement) return;

  const itemEls = Array.from(
    carouselElement.querySelectorAll('[id^="carousel-item-"]')
  );

  if (!itemEls.length) return;

  const items = itemEls.map((el, idx) => ({ position: idx, el }));

  const indicatorEls = Array.from(
    carouselElement.querySelectorAll('[id^="carousel-indicator-"]')
  );

  const indicatorsItems = indicatorEls.map((el, idx) => ({
    position: idx,
    el,
  }));

  const options = {
    defaultPosition: 0,
    interval: 5000,
    indicators: {
      activeClasses: 'bg-white',
      inactiveClasses:
        'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
      items: indicatorsItems,
    },
    onNext: () => applyFadeToVisibleItems(),
    onPrev: () => applyFadeToVisibleItems(),
    onChange: () => applyFadeToVisibleItems(),
  }
  ;

  const instanceOptions = { id: 'carousel-example', override: true };

  const carousel = new Carousel(carouselElement, items, options, instanceOptions);

  // Fade/blur helper: apply transition to any visible item (hidden class removed)
function applyFadeToVisibleItems() {
  items.forEach((it) => {
    const el = it.el;
    if (!el) return;

    if (!el.classList.contains('hidden')) {
      // reset
      el.classList.remove('carousel-visible-end');
      //el.classList.remove('carousel-slide-active');
      el.classList.add('carousel-hidden-start');
      el.classList.add('carousel-fade-transition');

      // force reflow
      el.offsetHeight;

      // animate
      el.classList.remove('carousel-hidden-start');
      el.classList.add('carousel-visible-end');
      //el.classList.add('carousel-slide-active');
    }
  });
}

function applySlideAnimation() {
  items.forEach((it) => {
    const el = it.el;
    if (!el) return;

    if (el.classList.contains('hidden')) {
      el.classList.remove('carousel-slide-active');
    } else {
      // force reflow pour garantir la transition
      el.offsetHeight;
      el.classList.add('carousel-slide-active');
    }
  });
}

  // Apply transition to the initial visible item(s)
  //applyFadeToVisibleItems();

  // Next and Previous button event listeners (only if present)
  const $prevButton = carouselElement.querySelector('#data-carousel-prev');
  const $nextButton = carouselElement.querySelector('#data-carousel-next');

  if ($prevButton) {
    $prevButton.addEventListener('click', () => carousel.prev());
  }
  if ($nextButton) {
    $nextButton.addEventListener('click', () => carousel.next());
  }

  // start automated cycling
  if (typeof carousel.cycle === 'function') {
    carousel.cycle();
  }
}document.addEventListener('turbo:load', initCarousel); */