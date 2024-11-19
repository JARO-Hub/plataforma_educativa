document.addEventListener('DOMContentLoaded', function() {
    // Modal elements
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const closeButtons = document.querySelectorAll('.modal__close');

    // Open login modal
    loginBtn.addEventListener('click', () => {
        loginModal.classList.add('modal--active');
    });

    // Open register modal
    registerBtn.addEventListener('click', () => {
        registerModal.classList.add('modal--active');
    });

    // Close modals
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            loginModal.classList.remove('modal--active');
            registerModal.classList.remove('modal--active');
        });
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === loginModal) {
            loginModal.classList.remove('modal--active');
        }
        if (e.target === registerModal) {
            registerModal.classList.remove('modal--active');
        }
    });

    // Prevent modal close when clicking modal content
    const modalContents = document.querySelectorAll('.modal__content');
    modalContents.forEach(content => {
        content.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    });

    // Form submissions
    const forms = document.querySelectorAll('.form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            // Add your form submission logic here
            console.log('Form submitted');
        });
    });
});