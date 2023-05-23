document.getElementById('menu-icon').addEventListener('click', function() {
    var menu = document.getElementById('nav-principal');
    menu.classList.toggle('hidden');
  });



  document.getElementById('account').addEventListener('click', function() {
    // Effectuer la redirection
    window.location.href = './view/FormulaireInscription.html.twig';
});
