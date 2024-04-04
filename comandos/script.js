const chk = document.getElementById('chk')

chk .addEventListener('change', () => {
    document.body.classList.toggle('dark')
})

const carousel = document.getElementById('carousel');
let isDown = false;
let startX;
let scrollLeft;

carousel.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - carousel.offsetLeft;
  scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('mouseleave', () => {
  isDown = false;
});

carousel.addEventListener('mouseup', () => {
  isDown = false;
});

carousel.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - carousel.offsetLeft;
  const walk = (x - startX) * 3; // Ajuste a sensibilidade de rolagem aqui
  carousel.scrollLeft = scrollLeft - walk;
});
