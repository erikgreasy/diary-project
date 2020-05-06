let rellax = new Rellax('.rellax'); 

const enterBtn = document.querySelector('#enter');

window.onbeforeunload = function () {
    window.scrollTo(0, 0);
  }

$(document).ready(function(){
    $("#enter").click(function() {
        document.querySelector( 'body' ).classList.remove('noscroll');
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".diary").offset().top
        }, 3000, 'easeInOutCubic');
    });
});

