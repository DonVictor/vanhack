$(document).ready(function(){

  $("a.dropdown-link").click(function(e) {
    e.preventDefault();
    var $div = $(this).next('.dropdown-container');
    $(".dropdown-container").not($div).hide();
    if ($div.is(":visible")) {
        $div.hide()
    }  else {
       $div.show();
    }
});

   $(document).click(function(e){
       var p = $(e.target).closest('.dropdown').length
       if (!p) {
          $(".dropdown-container").hide();
       }
   });

});