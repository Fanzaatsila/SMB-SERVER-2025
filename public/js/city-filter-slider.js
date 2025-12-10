// City Filter Slider
class CityFilterSlider {
    constructor(wrapperId, sliderId, prevBtnId, nextBtnId) {
        this.wrapper = document.getElementById(wrapperId);
        this.slider = document.getElementById(sliderId);
        this.prevBtn = document.getElementById(prevBtnId);
        this.nextBtn = document.getElementById(nextBtnId);
        this.currentPosition = 0;
        this.itemWidth = 0;
        this.visibleWidth = 0;
        this.maxScroll = 0;
        
        if (this.slider && this.prevBtn && this.nextBtn) {
            this.init();
        }
    }
    
    init() {
        // Calculate dimensions
        this.calculateDimensions();
        
        // Event listeners for navigation
        this.prevBtn.addEventListener('click', () => this.slide('prev'));
        this.nextBtn.addEventListener('click', () => this.slide('next'));
        
        // Update on window resize
        window.addEventListener('resize', () => {
            this.calculateDimensions();
            this.updateButtons();
        });
        
        // Initial button state
        this.updateButtons();
        
        // Touch support for mobile
        this.addTouchSupport();
    }
    
    calculateDimensions() {
        const container = this.slider.parentElement;
        this.visibleWidth = container.offsetWidth;
        this.maxScroll = this.slider.scrollWidth - this.visibleWidth;
    }
    
    slide(direction) {
        const slideAmount = this.visibleWidth * 0.7; // Slide 70% of visible width
        
        if (direction === 'next') {
            this.currentPosition = Math.min(this.currentPosition + slideAmount, this.maxScroll);
        } else {
            this.currentPosition = Math.max(this.currentPosition - slideAmount, 0);
        }
        
        this.slider.style.transform = `translateX(-${this.currentPosition}px)`;
        this.updateButtons();
    }
    
    updateButtons() {
        // Disable/enable buttons based on position
        if (this.currentPosition <= 0) {
            this.prevBtn.classList.add('disabled');
        } else {
            this.prevBtn.classList.remove('disabled');
        }
        
        if (this.currentPosition >= this.maxScroll - 10) { // 10px tolerance
            this.nextBtn.classList.add('disabled');
        } else {
            this.nextBtn.classList.remove('disabled');
        }
    }
    
    addTouchSupport() {
        let startX = 0;
        let startPosition = 0;
        let isDragging = false;
        
        this.slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startPosition = this.currentPosition;
            isDragging = true;
        });
        
        this.slider.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            
            const currentX = e.touches[0].clientX;
            const diff = startX - currentX;
            const newPosition = Math.max(0, Math.min(startPosition + diff, this.maxScroll));
            
            this.currentPosition = newPosition;
            this.slider.style.transform = `translateX(-${this.currentPosition}px)`;
        });
        
        this.slider.addEventListener('touchend', () => {
            isDragging = false;
            this.updateButtons();
        });
    }
    
    reset() {
        this.currentPosition = 0;
        this.slider.style.transform = 'translateX(0)';
        this.updateButtons();
    }
}

// Initialize slider when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Brochure City Filter Slider
    const brochureCitySlider = new CityFilterSlider(
        'brochure-city-filter-wrapper',
        'brochure-city-filter-slider',
        'brochure-slider-prev',
        'brochure-slider-next'
    );
    
    // Initialize Activity City Filter Slider
    const activityCitySlider = new CityFilterSlider(
        'activity-city-filter-wrapper',
        'activity-city-filter-slider',
        'activity-slider-prev',
        'activity-slider-next'
    );
    
    // Brochure Filter functionality
    const brochureFilterBtns = document.querySelectorAll('.city-filter-btn[data-filter-type="brochure"]');
    const brochureItems = document.querySelectorAll('.brochure-item');
    
    brochureFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active state
            brochureFilterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            brochureItems.forEach(item => {
                const itemCity = item.dataset.city;
                const itemOnline = item.dataset.online;
                
                if (filter === '*') {
                    item.style.display = 'block';
                } else if (filter === 'online') {
                    item.style.display = itemOnline === '1' ? 'block' : 'none';
                } else {
                    item.style.display = itemCity === filter ? 'block' : 'none';
                }
            });
            
            // Reset carousel position after filtering
            const brochureCarousel = document.getElementById('brochure-carousel');
            if (brochureCarousel) {
                brochureCarousel.style.transform = 'translateX(0)';
            }
        });
    });
    
    // Activity Filter functionality
    const activityFilterBtns = document.querySelectorAll('.city-filter-btn[data-filter-type="activity"]');
    const activityItems = document.querySelectorAll('.activity-item');
    
    activityFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active state
            activityFilterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            activityItems.forEach(item => {
                const itemCity = item.dataset.city;
                const itemOnline = item.dataset.online;
                
                if (filter === '*') {
                    item.style.display = 'block';
                } else if (filter === 'online') {
                    item.style.display = itemOnline === '1' ? 'block' : 'none';
                } else {
                    item.style.display = itemCity === filter ? 'block' : 'none';
                }
            });
            
            // Reset carousel position after filtering
            const activityCarousel = document.getElementById('activity-carousel');
            if (activityCarousel) {
                activityCarousel.style.transform = 'translateX(0)';
            }
        });
    });
    
    // Check if we're on Brosur Page
    if (document.getElementById('brosur-page-city-filter-wrapper')) {
        const brosurPageSlider = new CityFilterSlider(
            'brosur-page-city-filter-wrapper',
            'brosur-page-city-filter-slider',
            'brosur-page-slider-prev',
            'brosur-page-slider-next'
        );
        
        const brosurPageFilterBtns = document.querySelectorAll('.city-filter-btn[data-filter-type="brosur-page"]');
        
        brosurPageFilterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;
                
                // Update active state
                brosurPageFilterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Use Isotope for filtering
                if (typeof $ !== 'undefined' && $.fn.isotope) {
                    $('.portfolio-container').isotope({ filter: filter });
                }
            });
        });
    }
    
    // Check if we're on Galeri Page
    if (document.getElementById('galeri-page-city-filter-wrapper')) {
        const galeriPageSlider = new CityFilterSlider(
            'galeri-page-city-filter-wrapper',
            'galeri-page-city-filter-slider',
            'galeri-page-slider-prev',
            'galeri-page-slider-next'
        );
        
        const galeriPageFilterBtns = document.querySelectorAll('.city-filter-btn[data-filter-type="galeri-page"]');
        
        galeriPageFilterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;
                
                // Update active state
                galeriPageFilterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Use Isotope for filtering
                if (typeof $ !== 'undefined' && $.fn.isotope) {
                    $('.portfolio-container').isotope({ filter: filter });
                }
            });
        });
    }
});
