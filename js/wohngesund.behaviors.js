(function ($) {
    
  $(function() {
  
    $(".schnellanfrage .pane-content").hide();
    $(".schnellanfrage > h2").click(function(){
    $(this).toggleClass("active").next().slideToggle("fast");
    return false; //Prevent the browser jump to the link anchor
    });
    
    $(".toggle .pane-content").hide();
    $(".toggle > h2").click(function(){
    $(this).toggleClass("active").next().slideToggle("fast");
    return false; //Prevent the browser jump to the link anchor
    });

      $(".toggle .pane-content").hide();
      $(".toggle > strong").click(function(){
          $(this).toggleClass("active").next().slideToggle("fast");
          return false; //Prevent the browser jump to the link anchor
      });
    
    $(".toggle .long-content").hide();
    $(".toggle > h1").click(function(){
    $(this).toggleClass("active").next().slideToggle("fast");
    return false; //Prevent the browser jump to the link anchor
    });
    
    $(".toggle .long-content").hide();
    $(".toggle > h3").click(function(){
    $(this).toggleClass("active").next().slideToggle("fast");
    return false; //Prevent the browser jump to the link anchor
    });
  
    //append Text to Main Menu Items
    $('#navigation .menu-wg-parkett').append('<em>Europas grosse Auswahl.</em>');
    $('#navigation .menu-wg-terrassen').append('<em>Wohndeck® Terrassenböden.</em>');
    $('#navigation .menu-wg-tueren').append('<em>Indoor Programm.</em>');
    $('#navigation .menu-wg-service').append('<em>Verlegung, Pflege.</em>');
    $('#navigation .menu-wg-grosshandel').append('<em>Werden Sie Partner.</em>');
    $('#navigation .menu-wg-verlegung').append('<em>Parkett & Terrassen.</em>');
    $('#navigation .menu-wg-kontakt').append('<em>Filialen, Mitarbeiter.</em>');
    $('#navigation .menu-wg-aktion').append('<em>jetzt sparen!</em>'); 
    
    
    $('.form-item-quantity').append('<span>m²</span>');
    
    $('.menu-galerie-side li.active-trail').prepend('<i class="fa fa-chevron-left"></i>');
    
    $('.commerce-price-savings-formatter-savings').prepend('<span class="orange">-</span>');
    
    $('.pane-webform > h2').append('<i class="fa fa-envelope"></i>');
    $('.social-media > h2').append('<i class="fa fa-google-plus-square"></i><i class="fa fa-twitter-square"></i><i class="fa fa-facebook-square"></i>');
    
    $('.aktion-sutro.quadrat .field-name-commerce-price .field-item').append('<span>/m²</span>');
    
    $('.aktion-sutro.quadrat .field-name-field-commerce-saleprice .field-item').append('<span>/m²</span>');
    
    $('.aktion-sutro.tueren .field-name-field-commerce-saleprice .field-item').append('<span>/Türe</span>');
    
    
    $('.page-aktionen-parkett-landhausdielen .view-content > h2:nth-child(1)').append('<span>n</span>'); 
    $('.page-aktionen-parkett-landhausdielen .view-content > h2:nth-child(9)').append('<span>n</span>');

    
    
    $('#nav li:has(ul)').doubleTapToGo();
    $('#nav > ul > li:has(ul) a').append('<i class="fa fa-caret-down"></i>');
    $('#nav > ul > li > ul > li > a i').remove();
    
    // Füge den Slogan bei Mobile ein
    if ($(window).width() < 640) {
      //$('#header .region-header').append('<div class="slogan-mobile tk-alexa-std">Parkett ist unsere Welt!</div>');
      //$('.aktions-banderole > .pane-content > div').text('jetzt in Aktion');
      $('.node-type-galerie-artikel .pane-aktion-produkt-ansicht-iii-panel-pane-aktion-3-2').appendTo('.sutro-double-header');
      $('.node-type-galerie-artikel .pane-aktion-produkt-ansicht-iii-panel-pane-5').appendTo('.sutro-double-header');
      $('.node-type-galerie-artikel .pane-webform').appendTo('.sutro-double-header');
      
      $('.node-type-terrasse .pane-aktion-produkt-ansicht-iii-panel-pane-1').appendTo('.sutro-double-header');
      $('.node-type-terrasse .pane-webform').appendTo('.sutro-double-header');
      
      $('.node-type-tueren .pane-aktion-produkt-ansicht-iii-panel-pane-2').appendTo('.sutro-double-header');
      $('.node-type-tueren .pane-webform').appendTo('.sutro-double-header');
      
      //$('.preis-gross').html($('.preis-gross').replace(',',',<sup>')+'</sup>');


    }

    if ($(window).width() > 640) {
      $('.hotline-mobile, .standorte-mobile').hide();

    } else {
      $('.hotline-mobile, .standorte-mobile').show();
    }
    
    
    // Hauptnavigation soll beim scrollen an Top Position bleiben:
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = $('#navigation').offset().top;
     
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = $(window).scrollTop(); // our current vertical position from the top
         
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top) { 
            $('#navigation').css({ 'position': 'fixed', 'top':0, 'left':0, 'z-index': 49 });
            if ($(window).width() > 640) {
              $('#logo img').css({ 'position': 'fixed', 'top':0, 'left': 0, 'z-index': 999, 'width': '70px', 'margin': '13px' });
              } else {
                $('#logo img').css({ 'position': 'fixed', 'top':0, 'right': 0, 'z-index': 999, 'width': '85px', 'margin': '10px' });
              }
              
        } else {
            $('#navigation').css({ 'position': 'relative', 'z-index': 59 }); 
            $('#logo img').css({ 'position': 'relative', 'left': 'inherit', 'width': '114px', 'margin': '0', 'z-index': 59 });
        }   
    };
     
    // run our function on load
    sticky_navigation();
     
    // and run it again every time you scroll
    $(window).scroll(function() {
         sticky_navigation();
    });   
    // Ende Hauptnavigation

    // Entferne Zeilenumbrüche und whitespace von Prozentangabe mit - vorangestellt.
    var removeElements = document.getElementsByClassName("aktionsprozent-2015");
    for (var i = 0; i < removeElements.length; ++i) {
      removeElements[i].innerHTML = removeElements[i].innerHTML.replace(/\n|\s/g,'');
    }

    // tabbed content - https://codepen.io/cssjockey/pen/jGzuK
    $('ul.tabsy li').click(function(){
      var tab_id = $(this).attr('data-tab');

      $('ul.tabsy li').removeClass('current');
      $('.tab-content').removeClass('current');

      $(this).addClass('current');
      $("#"+tab_id).addClass('current');
    });

/*    $('#tabs').tabs({
      activate: function (event, ui) {
        $('.sidebar-img').hide();
        $('.sidebar-img').eq( ui.newTab.index() ).show();
      }
    });*/


    
  }); //jQuery Document ready
    

})(jQuery);