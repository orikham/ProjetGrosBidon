//bouton du menu

document.getElementById('menu-icon').addEventListener('click', function() {
    var menu = document.getElementById('nav-principal');
    menu.classList.toggle('hidden');
  });



  


//slider accueil

$(document).ready(function() { // $ remplace/equivaut a ecrire jquery
  // Ajouter la classe 'active' au premier élément carouselItem
  $('.carouselItem').first().addClass('active');

  setInterval(function() {
    // Retirer la classe 'active' de l'élément actif actuel et ajouter la classe 'active' à l'élément suivant
    $('.active').removeClass('active').next('.carouselItem').addClass('active');

    // Si aucun élément n'est actif, ajouter la classe 'active' au premier élément
    if ($('.active').length == 0) {
      $('.carouselItem').first().addClass('active');
    }
  }, 1500); 
});