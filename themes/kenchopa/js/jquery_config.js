$( document ).ready(function() {
    /*
     * Delete error classes on focus
     */
    $("input").on('mouseover', function(){
         $(this).removeClass('error');
      }).on('focus',function(){
         $(this).next(".errorMessage").hide('slow');
      });
      
      /*
       * List view
       */
    $(".view").click(function(){
          $('.view').fadeOut('slow', function() {
           });
        window.location=$(this).find("a").attr("href"); 
        //return false;
    });
    
    /*
     * Dropdown menu
     */
    $.each($('.item-test'), function(index, value) {
            $(this).hover(function () { //When trigger is hovered...
                $(this).find('.dropdown-menu').fadeIn('slow');
                //$(".dropdown-menu").css( "display",'block' );
            }, function () {
                //$(".dropdown-menu").hide("slow");
                $(this).find('.dropdown-menu').fadeOut('slow');
                // $(".dropdown-menu").css( "display",'none' );
            });
    }); 
});


