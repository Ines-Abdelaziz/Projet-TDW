const divs = document.querySelectorAll('.r-title');

divs.forEach(div => {
  const firstTwoLetters = div.textContent.slice(0, 2);
  div.innerHTML = `<span style="color:#FF9F0D !important;">${firstTwoLetters}</span>${div.textContent.slice(2)}`;
});

$(document).ready(function(){

  var rating = $('.rating ').data('rating') ;
  for(var i=1; i<=rating; i++){
    $('.rating i[data-index='+i+']').addClass('active');
  }
});

