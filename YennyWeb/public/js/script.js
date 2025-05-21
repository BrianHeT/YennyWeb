// public/js/script.js

// Ejecutamos el código cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
  // Ejemplo: Animación con Intersection Observer en elementos con la clase .fade-in
  const faders = document.querySelectorAll(".fade-in");

  const appearOptions = {
    threshold: 0.5,
    rootMargin: "0px 0px -50px 0px"
  };

  const appearOnScroll = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("appear");
        observer.unobserve(entry.target);
      }
    });
  }, appearOptions);

  faders.forEach(fader => {
    appearOnScroll.observe(fader);
  });
});
