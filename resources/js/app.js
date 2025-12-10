import './bootstrap';

// Intersection Observer untuk animasi fade-in/slide-in
document.addEventListener('DOMContentLoaded', function() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add(entry.target.dataset.animationType || 'animate-fade-in-up');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe semua elemen dengan class 'animation-item'
  const animationItems = document.querySelectorAll('.animation-item');
  let delayIndex = 0;
  
  animationItems.forEach((el) => {
    // Check apakah elemen sudah visible saat halaman load (di viewport)
    const rect = el.getBoundingClientRect();
    const isVisible = (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= window.innerHeight &&
      rect.right <= window.innerWidth
    );

    if (isVisible) {
      // Jika sudah visible, langsung trigger animasi dengan delay
      const animationType = el.dataset.animationType || 'animate-fade-in-up';
      const delay = (delayIndex * 0.15) + 's';
      
      el.style.animationDelay = delay;
      el.classList.add(animationType);
      delayIndex++;
    } else {
      // Jika belum visible, gunakan IntersectionObserver
      observer.observe(el);
    }
  });
});
