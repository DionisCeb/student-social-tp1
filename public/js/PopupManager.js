class PopupManager {
    constructor() {
        // Selectors for pop-up elements
        this.popup = document.getElementById('popup');
        this.openPopupButton = document.getElementById('open-popup');
        this.closePopupButton = document.getElementById('close-popup');

        // Selectors for alert elements
        this.alertBox = document.getElementById('alert-box');
        this.closeAlertButton = document.getElementById('close-alert');

        // Initialize event listeners
        this.initListeners();
    }

    // Initialize all event listeners
    initListeners() {
        if (this.openPopupButton) {
            this.openPopupButton.addEventListener('click', (e) => this.showPopup(e));
        }

        if (this.closePopupButton) {
            this.closePopupButton.addEventListener('click', () => this.hidePopup());
        }

        if (this.closeAlertButton) {
            this.closeAlertButton.addEventListener('click', () => this.hideAlert());
        }

        // Automatically show the alert if a message is present
        if (this.alertBox && this.alertBox.querySelector('p').textContent.trim()) {
            this.showAlert();
        }
    }

    // Show the pop-up modal
    showPopup(event) {
        event.preventDefault(); // Prevent form submission
        this.popup.style.display = 'flex';
    }

    // Hide the pop-up modal
    hidePopup() {
        this.popup.style.display = 'none';
    }

    // Show the alert box
    showAlert() {
        this.alertBox.style.display = 'flex';
    }

    // Hide the alert box
    hideAlert() {
        this.alertBox.style.display = 'none';
    }
}

export default PopupManager;