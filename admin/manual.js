document.querySelectorAll('.carousel').forEach((carousel) => {
    const slides = carousel.querySelectorAll('.carousel-slide');
    const prevBtn = carousel.querySelector('.prev-btn');
    const nextBtn = carousel.querySelector('.next-btn');
    let currentSlideIndex = 0;
  
    // Función para actualizar la visibilidad de las diapositivas
    function updateSlides() {
      slides.forEach((slide, index) => {
        slide.classList.toggle('active', index === currentSlideIndex);
      });
    }
  
    // Evento para el botón "anterior"
    prevBtn.addEventListener('click', () => {
      currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
      updateSlides();
    });
  
    // Evento para el botón "siguiente"
    nextBtn.addEventListener('click', () => {
      currentSlideIndex = (currentSlideIndex + 1) % slides.length;
      updateSlides();
    });
  
    // Mostrar el primer slide al cargar
    updateSlides();
  });
  