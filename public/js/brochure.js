// Brochure Section JavaScript

let currentScroll = 0;
let activeFilter = '*';

// Filter Brochures
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('#brochure-filters .nav-link');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active class
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get filter value
            activeFilter = this.getAttribute('data-filter');
            
            // Filter items
            const items = document.querySelectorAll('.brochure-item');
            items.forEach(item => {
                const isOnline = item.getAttribute('data-online') === '1';
                const cityId = item.getAttribute('data-city');
                
                if (activeFilter === '*') {
                    // Tampilkan semua
                    item.style.display = 'block';
                } else if (activeFilter === 'online') {
                    // Hanya tampilkan online
                    item.style.display = isOnline ? 'block' : 'none';
                } else {
                    // Tampilkan brosur dari kota yang dipilih
                    // ATAU online yang memiliki city_id yang sama dengan filter
                    if (cityId === activeFilter) {
                        // Item dari kota ini (bisa offline atau online dengan city_id)
                        item.style.display = 'block';
                    } else if (isOnline && cityId === activeFilter) {
                        // Online dengan city_id yang sesuai
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
            
            // Reset scroll position
            currentScroll = 0;
            updateCarouselPosition();
        });
    });
});

// Scroll Brochures
function scrollBrochures(direction) {
    const carousel = document.getElementById('brochure-carousel');
    const container = document.querySelector('.brochure-carousel-container');
    const items = Array.from(document.querySelectorAll('.brochure-item')).filter(item => item.style.display !== 'none');
    
    if (items.length === 0) return;
    
    const itemWidth = items[0].offsetWidth + 24; // width + margin (mx-3 = 12px left + 12px right)
    const overflowContainer = document.querySelector('.brochure-carousel-overflow');
    const containerWidth = overflowContainer.offsetWidth;
    const visibleItems = Math.floor(containerWidth / itemWidth);
    const maxScroll = Math.max(0, items.length - visibleItems);
    
    if (direction === 'next') {
        currentScroll = Math.min(currentScroll + 1, maxScroll);
    } else {
        currentScroll = Math.max(currentScroll - 1, 0);
    }
    
    updateCarouselPosition();
}

function updateCarouselPosition() {
    const carousel = document.getElementById('brochure-carousel');
    const items = document.querySelectorAll('.brochure-item');
    
    if (items.length === 0) return;
    
    const itemWidth = items[0].offsetWidth + 24;
    carousel.style.transform = `translateX(-${currentScroll * itemWidth}px)`;
}

// Open Brochure Modal
function openBrochureModal(imageUrl, title) {
    const modal = document.getElementById('brochureModal');
    const modalImage = document.getElementById('brochureModalImage');
    
    modalImage.src = imageUrl;
    modalImage.alt = title;
    
    $('#brochureModal').modal('show');
}

// Responsive adjustment
window.addEventListener('resize', function() {
    currentScroll = 0;
    updateCarouselPosition();
});
