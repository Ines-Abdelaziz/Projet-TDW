$(document).ready(function(){

  
    $('.rating i').on('mouseover', function(){
      var index = $(this).data('index');
      $('.rating i').removeClass('active');
      for(var i=1; i<=index; i++){
        $('.rating i[data-index='+i+']').addClass('active');
      }
    });
  
    $('.rating i').on('mouseout', function(){
      var rating = $('.rating').data('rating');
      console.log(rating);
      $('.rating i').removeClass('active');
      for(var i=1; i<=rating; i++){
        $('.rating i[data-index='+i+']').addClass('active');
      }
    });
   
  
  
    $('.rating i').on('click', function(){
      var rating = $(this).data('index');
      var id = $('.rating').data('id');
      console.log(rating);
      console.log(id);
      $.ajax({
        type: 'POST',
        url: '../app/controllers/update_rating.php',
        data: { rating: rating, id: id, user:user},
        success: function(response){
          console.log(response);
        }
      });
      window.location.reload();
    });
  });
  
  