

$(document).ready(function(){
  var navbar_top_section = $('.navbar-top-section').innerHeight();
   var navbar_bottom_section = $('.botom-menu').innerHeight();
   var document_height = $(window).innerHeight();
    var side_width = $('.sidebar').innerWidth();
   var total_section = document_height - (navbar_top_section +  navbar_bottom_section); 
   $('.music_section').css('height',total_section);
    $('.music_section').css('margin-top',navbar_top_section);
     $('.sidebar').css('top',navbar_top_section);
     
});


$(window).resize(function() {
 var navbar_top_section = $('.navbar-top-section').innerHeight();
   var navbar_bottom_section = $('.botom-menu').innerHeight();
   var document_height = $(window).innerHeight();
   var side_width = $('.sidebar').innerWidth();
   var total_section = document_height - (navbar_top_section +  navbar_bottom_section);   
  $('.music_section').css('height',total_section);
  $('.music_section').css('margin-top',navbar_top_section);
  $('.sidebar').css('top',navbar_top_section);
});

$(window).trigger('resize');