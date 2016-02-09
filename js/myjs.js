//for slideanim slideUp animination effect
$(document).ready(function(){
  $(".navbar a, footer a[href='index.php']").on('click', function(event) {
   var hash = this.hash;
  $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   window.location.hash = hash;
    });
  });

});