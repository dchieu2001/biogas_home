jQuery.noConflict();
(function ($) {
    $(window).load(function () {
      if(!($.browser.msie)){
            worldone = $("#worldone").clone();
            $("#worldone").remove();
            $("body").prepend(worldone);
       }

        $(".worldcont_two").hover(

        function () {
            $(".worldcont_three").fadeIn("slow");
        });
        $(".worldcont_three").hover(

        function () {}, function () {
            $(".worldcont_three").fadeOut("slow");
        });
    
        var speed = "normal" 
                           
        $("#hovred a").each(function(){

            $(this).css("position","relative");
            var html = $(this).html();
            $(this).html("<span class=\"oneageent\">"+ html +"</span>");
            $(this).append("<span class=\"twoageent\">"+ html +"</span>");        
            if($.browser.msie){   
                $("span.oneageent",$(this)).css("opacity",1);            
            };
            $("span.twoageent",$(this)).css("opacity",0);        
            $("span.twoageent",$(this)).css("position","absolute");        
            $("span.twoageent",$(this)).css("top","0");
            $("span.twoageent",$(this)).css("left","0");
            $("span.twoageent",$(this)).css("display","block");
            $(this).hover(
                function(){
                    $("span.oneageent",this).fadeTo(speed, 0);                
                    $("span.twoageent",this).fadeTo(speed, 1);
                },
                function(){
                    $("span.oneageent",this).fadeTo(speed, 1);    
                    $("span.twoageent",this).fadeTo(speed, 0);
                }            
            )
        });
    });
})(jQuery);