$(function () {
   'use strict';

   $(document).on('click', '.panel-heading', function () {
       $(this).parents('.panel').find('.panel-body').toggleClass('open');
       if ($('.panel-body').hasClass('open')){
           $(this).parents('.panel').find('.panel-heading i').addClass('fa-minus').removeClass('fa-plus');
       }else {
           $(this).parents('.panel').find('.panel-heading i').removeClass('fa-minus').addClass('fa-plus');
       }
   });
});
