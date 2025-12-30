import { Controller } from '@hotwired/stimulus';
import { Carousel } from 'flowbite';

export default class extends Controller {
  static targets = ['item', 'indicator'];

  connect() {
    if (this.initialized) return;
    this.initialized = true;

    this.activeIndex = 0;
    this.isFirstSlide = true;

    // Force tous les slides à être visibles mais transparents
    this.itemTargets.forEach((item, idx) => {
      item.style.display = 'block';
      if (idx !== 0) {
        item.classList.add('hidden');
      }
    });

    const items = this.itemTargets.map((el, idx) => ({
      position: idx,
      el,
    }));

    const indicators = this.indicatorTargets.map((el, idx) => ({
      position: idx,
      el,
    }));

    this.carousel = new Carousel(
      this.element,
      items,
      {
        defaultPosition: 0,
        interval: 6000,
        indicators: {
          activeClasses: 'bg-white',
          inactiveClasses: 'bg-white/50 hover:bg-white/75',
          items: indicators,
        },
        onChange: (newIndex) => this.onSlideChange(newIndex),
      },
      { override: true }
    );

    this.carousel.cycle();
  }

  disconnect() {
    this.initialized = false;
    if (this.carousel) {
      this.carousel.pause();
    }
  }

  onSlideChange(newIndex) {
    if (!this.itemTargets || newIndex >= this.itemTargets.length || newIndex < 0) {
      return;
    }

    // Garde tous les slides en display block pour les transitions
    this.itemTargets.forEach((item) => {
      item.style.display = 'block';
      item.classList.remove('ken-burns');
    });

    const currentSlide = this.itemTargets[newIndex];

    // Ajoute Ken Burns sauf pour la première image au chargement
    if (currentSlide && !(this.isFirstSlide && newIndex === 0)) {
      setTimeout(() => {
        if (currentSlide && !currentSlide.classList.contains('hidden')) {
          currentSlide.classList.add('ken-burns');
        }
      }, 200);
    }

    if (this.isFirstSlide && newIndex !== 0) {
      this.isFirstSlide = false;
    }

    this.activeIndex = newIndex;
  }

  prev() {
    this.carousel?.prev();
  }

  next() {
    this.carousel?.next();
  }
}
