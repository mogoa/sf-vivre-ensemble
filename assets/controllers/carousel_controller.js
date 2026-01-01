import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {
    if (this.initialized) return;
    this.initialized = true;

    this.items = Array.from(this.element.querySelectorAll('[data-carousel-item]'));
    if (!this.items.length) return;

    // find current visible slide or default to 0
    this.current = this.items.findIndex((it) => !it.classList.contains('hidden'));
    if (this.current === -1) this.current = 0;

    // ensure visibility state: show current, hide others
    this.items.forEach((item, idx) => {
      if (idx === this.current) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });

    // apply ken-burns to the current slide so it slowly zooms
    const currentItem = this.items[this.current];
    if (currentItem) {
      // small delay to ensure CSS transitions/animation start correctly
      setTimeout(() => currentItem.classList.add('ken-burns'), 150);
    }

    this.prevHandler = () => this.prev();
    this.nextHandler = () => this.next();

    const prev = this.element.querySelector('[data-carousel-prev]');
    const next = this.element.querySelector('[data-carousel-next]');
    if (prev) prev.addEventListener('click', this.prevHandler);
    if (next) next.addEventListener('click', this.nextHandler);

    // Touch/swipe support for mobile and tablet
    this.touchStartX = 0;
    this.touchEndX = 0;
    this.element.addEventListener('touchstart', (e) => this.handleTouchStart(e), false);
    this.element.addEventListener('touchend', (e) => this.handleTouchEnd(e), false);

    this.interval = setInterval(() => this.next(), 6000);
  }

  disconnect() {
    this.initialized = false;
    if (this.interval) clearInterval(this.interval);

    const prev = this.element.querySelector('[data-carousel-prev]');
    const next = this.element.querySelector('[data-carousel-next]');
    if (prev) prev.removeEventListener('click', this.prevHandler);
    if (next) next.removeEventListener('click', this.nextHandler);

    this.element.removeEventListener('touchstart', (e) => this.handleTouchStart(e));
    this.element.removeEventListener('touchend', (e) => this.handleTouchEnd(e));
  }

  handleTouchStart(e) {
    this.touchStartX = e.changedTouches[0].screenX;
    this.touchStartY = e.changedTouches[0].screenY;
  }

  handleTouchEnd(e) {
    this.touchEndX = e.changedTouches[0].screenX;
    this.touchEndY = e.changedTouches[0].screenY;
    this.detectSwipe();
  }

  detectSwipe() {
    const swipeThreshold = 50; // minimum distance for a swipe
    const diffX = this.touchStartX - this.touchEndX;
    const diffY = this.touchStartY - this.touchEndY;

    // Only trigger swipe if horizontal movement is greater than vertical (to avoid scrolling interference)
    if (Math.abs(diffX) > swipeThreshold && Math.abs(diffX) > Math.abs(diffY)) {
      if (diffX > 0) {
        // swiped left → next slide
        this.next();
      } else {
        // swiped right → previous slide
        this.prev();
      }
    }
  }

  next() {
    const nextIndex = (this.current + 1) % this.items.length;
    this.show(nextIndex);
  }

  prev() {
    const prevIndex = (this.current - 1 + this.items.length) % this.items.length;
    this.show(prevIndex);
  }

  show(index) {
    if (index === this.current) return;
    const old = this.items[this.current];
    const nw = this.items[index];
    if (old) old.classList.add('hidden');
    if (old) old.classList.remove('ken-burns');
    if (nw) {
      nw.classList.remove('hidden');
      // allow repaint before starting ken-burns animation
      setTimeout(() => nw.classList.add('ken-burns'), 150);
    }
    this.current = index;
  }
}