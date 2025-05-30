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




















    /*










        Action Form

    */

    let forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const functionName = form.dataset.action;
            if (typeof window[functionName] === 'function') {
                window[functionName]();
            } else {
                console.error(`Fungsi "${functionName}" tidak ditemukan atau bukan fungsi.`);
            }
        });
    });

    
});

const token = document.querySelector('[data-token]').dataset.token;

function Toast(x) {
    const container = document.querySelector('.message-container');
    container.innerHTML = '';

    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message-status', x.tipe);

    let iconName = '';
    let messageText = '';

    if (x.tipe === 'success') {
        iconName = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>';
        messageText = x.pesan;
    } else if (x.tipe === 'error') {
        iconName = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>';
        messageText = x.pesan;
    } else if (x.tipe === 'info') {
        iconName = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-info-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm0 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" /></svg>';
        messageText = x.pesan;
    } else if (x.tipe === 'warning') {
        iconName = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-alert-triangle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 1.67c.955 0 1.845 .467 2.39 1.247l.105 .16l8.114 13.548a2.914 2.914 0 0 1 -2.307 4.363l-.195 .008h-16.225a2.914 2.914 0 0 1 -2.582 -4.2l.099 -.185l8.11 -13.538a2.914 2.914 0 0 1 2.491 -1.403zm.01 13.33l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -7a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" /></svg>';
        messageText = x.pesan;
    }

    messageDiv.innerHTML = `
        ${iconName}
        <p>${messageText}</p>
    `;

    container.appendChild(messageDiv);

    setTimeout(() => {
        messageDiv.classList.add('show');
    }, 100);

    setTimeout(() => {
        messageDiv.classList.remove('show');
        
        messageDiv.addEventListener('transitionend', () => {
            messageDiv.remove();
        });
    }, 3000);
}