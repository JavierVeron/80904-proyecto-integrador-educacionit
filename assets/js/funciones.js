const myCarouselElement = document.querySelector('#myCarousel')

if (myCarouselElement) {
  const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 2000,
    touch: false
  })
}

function eliminarProducto(id) {
    let confirmar = confirm("Desea eliminar el Producto #" + id + "?");

    if (confirmar) {
      location.href = "index.php?id=" + id + "&accion=eliminar";
    }
}