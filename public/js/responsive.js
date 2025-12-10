// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    
    // Create mobile menu toggle button if not exists
    const header = document.getElementById('header');
    const nav = document.querySelector('#nav-menu-container');
    
    if (header && nav && window.innerWidth <= 768) {
        // Check if toggle button already exists
        let mobileToggle = document.querySelector('.mobile-nav-toggle');
        
        if (!mobileToggle) {
            // Create toggle button
            mobileToggle = document.createElement('button');
            mobileToggle.className = 'mobile-nav-toggle';
            mobileToggle.innerHTML = '<i class="fa fa-bars"></i>';
            mobileToggle.setAttribute('aria-label', 'Toggle navigation');
            
            // Insert toggle button before nav
            nav.parentNode.insertBefore(mobileToggle, nav);
            
            // Add click event
            mobileToggle.addEventListener('click', function() {
                nav.classList.toggle('mobile-nav-active');
                this.querySelector('i').classList.toggle('fa-bars');
                this.querySelector('i').classList.toggle('fa-times');
            });
            
            // Close menu when clicking on a link
            const navLinks = nav.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    nav.classList.remove('mobile-nav-active');
                    mobileToggle.querySelector('i').classList.remove('fa-times');
                    mobileToggle.querySelector('i').classList.add('fa-bars');
                });
            });
        }
    }
    
    // Responsive table wrapper
    const tables = document.querySelectorAll('table:not(.table-responsive table)');
    tables.forEach(table => {
        if (!table.parentElement.classList.contains('table-responsive')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        }
    });
    
    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            const mobileToggle = document.querySelector('.mobile-nav-toggle');
            const nav = document.querySelector('#nav-menu-container');
            
            if (window.innerWidth > 768) {
                if (nav) nav.classList.remove('mobile-nav-active');
                if (mobileToggle) {
                    mobileToggle.querySelector('i').classList.remove('fa-times');
                    mobileToggle.querySelector('i').classList.add('fa-bars');
                }
            }
        }, 250);
    });
});
