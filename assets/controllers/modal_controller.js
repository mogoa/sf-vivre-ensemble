import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['trigger', 'close'];

    connect() {
        // Set up all trigger buttons to open modals
        document.querySelectorAll('[data-modal-show]').forEach(trigger => {
            trigger.addEventListener('click', (e) => this.showModal(e));
        });

        // Set up all close buttons to close modals
        document.querySelectorAll('[data-modal-hide]').forEach(closeBtn => {
            closeBtn.addEventListener('click', (e) => this.hideModal(e));
        });

        // Close modal when clicking on the overlay background
        document.querySelectorAll('[data-modal-overlay]').forEach(overlay => {
            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    this.hideModal(e);
                }
            });
        });
    }

    showModal(event) {
        const modalId = event.currentTarget.getAttribute('data-modal-show');
        const modal = document.getElementById(modalId);
        if (modal) {
            // Set initial state before removing hidden
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.95)';
            modal.style.transition = 'opacity 300ms ease-in-out, transform 300ms ease-in-out';

            // Remove hidden class to make it visible
            modal.classList.remove('hidden');
            modal.setAttribute('data-modal-overlay', 'true');

            // Trigger reflow to apply initial state
            modal.offsetHeight;

            // Animate to final state
            setTimeout(() => {
                modal.style.opacity = '1';
                modal.style.transform = 'scale(1)';
            }, 10);
        }
    }

    hideModal(event) {
        event.preventDefault();
        const button = event.currentTarget;
        const modalId = button.getAttribute('data-modal-hide');
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.95)';
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.style.opacity = '1';
                modal.style.transform = 'scale(1)';
            }, 300);
        }
    }
}
