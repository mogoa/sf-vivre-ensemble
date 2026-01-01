import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {

    // Direct DOM selection
    this.menuButton = this.element.querySelector('[data-navbar-target="menuButton"]');
    this.mobileMenu = this.element.querySelector('[data-navbar-target="mobileMenu"]');


    if (this.menuButton && this.mobileMenu) {
      // Use bound method so 'this' context is preserved
      this.toggleHandler = this.toggleMenu.bind(this);
      this.menuButton.addEventListener('click', this.toggleHandler);
    } else {
      console.error('Menu button or mobile menu not found!');
    }
  }

  disconnect() {
    if (this.menuButton && this.toggleHandler) {
      this.menuButton.removeEventListener('click', this.toggleHandler);
    }
  }

  toggleMenu() {
    if (this.mobileMenu) {
      this.mobileMenu.classList.toggle('hidden');
    }
  }
}
