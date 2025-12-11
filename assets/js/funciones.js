const myCarouselElement = document.querySelector('#myCarousel')

if (myCarouselElement) {
  const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 2000,
    touch: false
  })
}