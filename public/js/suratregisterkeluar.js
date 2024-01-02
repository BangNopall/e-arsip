document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('mySidebar');
    var closeBtn = document.getElementById('closeSidebarBtn');
    var openBtn = document.getElementById('openSidebarBtn');
    var mainContent = document.getElementById('myMaincontent');
    var body = document.body;

    function adjustSidebarAndScroll() {
        var shouldFix = window.scrollY > 0;
        var isMobile = window.innerWidth < 768;

        if (sidebar.classList.contains('hidden')) {
            sidebar.style.position = shouldFix ? 'sticky' : 'static';
            closeBtn.style.display = 'none';
            body.style.overflow = 'auto';
        } else {
            sidebar.style.position = 'fixed';
            sidebar.style.zIndex = '1';
            closeBtn.style.display = 'flex';

            if (isMobile) {
                mainContent.style.marginLeft = '0';
                body.style.overflow = 'hidden';
            } else {
                mainContent.style.marginLeft = '64px';
                body.style.overflow = 'hidden';
            }
        }
    }

    window.addEventListener('scroll', function () {
        adjustSidebarAndScroll();
    });

    openBtn.addEventListener('click', function () {
        openSidebar();
        adjustSidebarAndScroll();
    });

    closeBtn.addEventListener('click', function () {
        closeSidebar();
        adjustSidebarAndScroll();
    });

    // Pertama kali panggil untuk mengatur scroll behavior saat halaman dimuat
    adjustSidebarAndScroll();
});

function openSidebar() {
    var sidebar = document.getElementById('mySidebar');
    var closeBtn = document.getElementById('closeSidebarBtn');
    var openBtn = document.getElementById('openSidebarBtn');
    var mainContent = document.getElementById('myMaincontent');
    var body = document.body;

    sidebar.classList.remove('hidden');
    closeBtn.classList.remove('hidden');
    openBtn.classList.add('hidden');
    sidebar.style.position = 'fixed';
    sidebar.style.zIndex = '1';
    mainContent.style.marginLeft = '64px';
    body.style.overflow = 'hidden';
}

function closeSidebar() {
    var sidebar = document.getElementById('mySidebar');
    var closeBtn = document.getElementById('closeSidebarBtn');
    var openBtn = document.getElementById('openSidebarBtn');
    var mainContent = document.getElementById('myMaincontent');
    var body = document.body;

    sidebar.classList.add('hidden');
    mainContent.style.marginLeft = '0';
    closeBtn.classList.add('hidden');
    openBtn.classList.remove('hidden');
    body.style.overflow = 'auto';
}
