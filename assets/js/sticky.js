/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).scroll(function (event) {
    // A chaque fois que l'utilisateur va scroller (descendre la page)
    var y = $(this).scrollTop(); // On récupérer la valeur du scroll vertical
 
    //si cette valeur > à 200 on ajouter la class
    if (y >= 200) {
      $('.nav').addClass('fixed');
    } else {
      // sinon, on l'enlève
      $('.nav').removeClass('fixed');
    }
  });
