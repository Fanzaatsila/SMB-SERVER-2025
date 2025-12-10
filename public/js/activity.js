// Activity/Gallery Section JavaScript

let currentActivityScroll = 0;
let activeActivityFilter = '*';

// Filter Activities
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('#activity-filters .nav-link');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active class
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get filter value
            activeActivityFilter = this.getAttribute('data-filter');
            
            // Filter items
            const items = document.querySelectorAll('.activity-item');
            items.forEach(item => {
                const isOnline = item.getAttribute('data-online') === '1';
                const cityId = item.getAttribute('data-city');
                
                if (activeActivityFilter === '*') {
                    // Tampilkan semua
                    item.style.display = 'block';
                } else if (activeActivityFilter === 'online') {
                    // Hanya tampilkan online
                    item.style.display = isOnline ? 'block' : 'none';
                } else {
                    // Tampilkan aktivitas dari kota yang dipilih
                    // ATAU online yang memiliki city_id yang sama dengan filter
                    if (cityId === activeActivityFilter) {
                        // Item dari kota ini (bisa offline atau online dengan city_id)
                        item.style.display = 'block';
                    } else if (isOnline && cityId === activeActivityFilter) {
                        // Online dengan city_id yang sesuai
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
            
            // Reset scroll position
            currentActivityScroll = 0;
            updateActivityCarouselPosition();
        });
    });
});

// Scroll Activities
function scrollActivities(direction) {
    const carousel = document.getElementById('activity-carousel');
    const items = Array.from(document.querySelectorAll('.activity-item')).filter(item => item.style.display !== 'none');
    
    if (items.length === 0) return;
    
    const itemWidth = items[0].offsetWidth + 24; // width + margin (mx-3 = 12px left + 12px right)
    const overflowContainer = document.querySelector('.activity-carousel-overflow');
    const containerWidth = overflowContainer.offsetWidth;
    const visibleItems = Math.floor(containerWidth / itemWidth);
    const maxScroll = Math.max(0, items.length - visibleItems);
    
    if (direction === 'next') {
        currentActivityScroll = Math.min(currentActivityScroll + 1, maxScroll);
    } else {
        currentActivityScroll = Math.max(currentActivityScroll - 1, 0);
    }
    
    updateActivityCarouselPosition();
}

function updateActivityCarouselPosition() {
    const carousel = document.getElementById('activity-carousel');
    const items = document.querySelectorAll('.activity-item');
    
    if (items.length === 0) return;
    
    const itemWidth = items[0].offsetWidth + 24;
    carousel.style.transform = `translateX(-${currentActivityScroll * itemWidth}px)`;
}

// Open Activity Modal
function openActivityModal(imageUrl, title) {
    const modal = document.getElementById('activityModal');
    const modalImage = document.getElementById('activityModalImage');
    
    modalImage.src = imageUrl;
    modalImage.alt = title;
    
    $('#activityModal').modal('show');
}

// Responsive adjustment
window.addEventListener('resize', function() {
    currentActivityScroll = 0;
    updateActivityCarouselPosition();
});
