
    
    $('[placeholder]').on('focus', function (){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
     }).blur (function () {
         $(this).attr('placeholder', $(this).attr('data-text'));
    });

// console.log("mohamed")
// $('h4').on('click', function() {
// $(this).fadeOut(2000)
// })
//dropmenu nav bar
$('.menudrop').click(function () {
    $('ul .do').slideToggle(300);
});
// convet paswword field to text on hover
var passfield = $('.password');
$('.show-pass').click( function(){
   passfield.attr('type', 'text')

});
//confirm massage to delete ID

$('.confirm').click(function(){
    return confirm('are you sure?')
});
// this for catgories Name of cat to slide down or up

$(".cat h3").click(function (){
    $(this).next(".full-view").fadeToggle(200)
});
// 
$('.option span').click(function(){
    $(this).addClass('active').siblings('span').removeClass('active')
    if ($(this).data('view') === 'Full') {
        $('.cat .full-view').fadeIn(200)
    }else{
        $('.cat .full-view').fadeOut(200)
        
    }
});
// 
$('.toggale-info').click(function() {
  $(this).toggleClass('selected').parent().next('.card-body').fadeToggle(200)
  if ($(this).hasClass('selected')){
        $(this).html('<i class="fa fa-minus fa-lg"></i>')
  }else{
    $(this).html('<i class="fa fa-plus fa-lg"></i>')

  }
});

// show button delete in child catgories
$('.child-link').hover(function(){
    $(this).find('.show-delete').fadeToggle(300)
})//