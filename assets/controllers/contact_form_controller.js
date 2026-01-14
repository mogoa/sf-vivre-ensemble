import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['recontactCheckbox', 'emailContainer', 'emailField'];

    connect() {
        // Initialize email visibility based on initial checkbox state
        this.updateEmailVisibility();
    }

    toggleEmail() {
        this.updateEmailVisibility();
    }

    updateEmailVisibility() {
        const isChecked = this.recontactCheckboxTarget.checked;

        if (isChecked) {
            // Show email field
            this.emailContainerTarget.hidden = false;
            this.emailContainerTarget.style.opacity = '0';
            this.emailContainerTarget.style.transition = 'opacity 0.3s ease';

            // Trigger reflow to enable transition
            setTimeout(() => {
                this.emailContainerTarget.style.opacity = '1';
            }, 10);

            // Make email required
            this.emailFieldTarget.required = true;
            this.emailFieldTarget.removeAttribute('hidden');
        } else {
            // Hide email field
            this.emailContainerTarget.style.opacity = '0';

            setTimeout(() => {
                this.emailContainerTarget.hidden = true;
            }, 300);

            // Make email not required and clear it
            this.emailFieldTarget.required = false;
            this.emailFieldTarget.value = '';
            this.emailFieldTarget.setAttribute('hidden', 'hidden');
        }
    }
}
