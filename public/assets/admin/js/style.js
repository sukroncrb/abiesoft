document.addEventListener('DOMContentLoaded', function() {
    
    /*





        Navbar dan Sidebar
    */

    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    const profileDropdownToggle = document.querySelector('.profile-dropdown .dropdown-toggle');
    const profileDropdownMenu = document.querySelector('.profile-dropdown .dropdown-menu');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        mainContent.classList.toggle('pushed');

        if (profileDropdownMenu.classList.contains('show')) {
            profileDropdownMenu.classList.remove('show');
        }
    });

    profileDropdownToggle.addEventListener('click', function(event) {
        profileDropdownMenu.classList.toggle('show');
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (!profileDropdownToggle.contains(event.target) && !profileDropdownMenu.contains(event.target)) {
            profileDropdownMenu.classList.remove('show');
        }

        if (sidebar.classList.contains('active') && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
            sidebar.classList.remove('active');
            mainContent.classList.remove('pushed');
        }
    });

    sidebarToggle.addEventListener('click', function() {
        if (profileDropdownMenu.classList.contains('show')) {
            profileDropdownMenu.classList.remove('show');
        }
    });

    
    profileDropdownToggle.addEventListener('click', function() {
        if (sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
            mainContent.classList.remove('pushed');
        }
    });




















    /*





        Modal
    */

    let modalSelector = document.querySelectorAll("[data-modal]");
    modalSelector.forEach(modal => {
        document.getElementById(modal.dataset.modal).style.display = 'none';

        modal.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modal.dataset.modal);
        });
    });

    function openModal(IDModal) {
        const closeButton = document.getElementById(IDModal).querySelector('.close-button');
        const cancelButton = document.getElementById(IDModal).querySelector('.modal-button.cancel-button');
        closeButton.addEventListener('click', ()=>{
            closeModal(IDModal);
        });
        cancelButton.addEventListener('click', ()=>{
            closeModal(IDModal);
        });

        document.getElementById(IDModal).style.display = 'flex';
        setTimeout(() => {
            document.getElementById(IDModal).classList.add('show');
        }, 10);

        window.addEventListener('click', (event) => {
            if (event.target === document.getElementById(IDModal)) {
                closeModal(IDModal);
            }
        });
    }

    function closeModal(IDModal) {
        document.getElementById(IDModal).classList.remove('show');
        document.getElementById(IDModal).addEventListener('transitionend', function handler() {
            document.getElementById(IDModal).style.display = 'none';
            document.getElementById(IDModal).removeEventListener('transitionend', handler);
        });
    }

    document.addEventListener('keydown', (event) => {
        modalSelector.forEach(modal => {
            if (event.key === 'Escape' && document.getElementById(modal.dataset.modal).classList.contains('show')) {
                closeModal(modal.dataset.modal);
            }
        });
        
    });
});