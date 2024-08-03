jQuery.noConflict();
(function ($) {
    $(window).load(function () {
        makeposition();

        $(window).mousemove(function(event) {
            changeposition();
        });
        function makeposition() {
            offset = $("#translate_translate").offset();
            height = $("#translate_translate").height();
            translate_translate_width = $("#translate_translate").width();
            max_width = $(window).width();
            curent_left = offset.left;
            width_translate_popup = $("#translate_popup").width();
            rezultat = max_width - curent_left;
            if (rezultat < width_translate_popup) {
                leftofset = offset.left - width_translate_popup + translate_translate_width-15;
                $("#translate_popup").css({
                    "display": "none",
                    "top": offset.top + height + "px",
                    "left": leftofset + "px"
                });
            } else {
                $("#translate_popup").css({
                    "display": "none",
                    "top": offset.top + height + "px",
                    "left": offset.left + "px"
                });
            }
            text_to_insert = $("#translate_popup").clone();
            $("#translate_popup").remove();
            $("body").append(text_to_insert);
            $("#translate_translate").toggle(function () {
                $("#translate_popup").slideDown();
            }, function () {
                $("#translate_popup").slideUp();
            });
            
            var speed = "normal" 
            var bgcolor = "#fff";                    
            $("#translate_popup a").each(function(){

                $(this).css("position","relative");
                var html = $(this).html();
                $(this).html("<span class=\"oneageent\">"+ html +"</span>");
                $(this).append("<span class=\"twoageent\">"+ html +"</span>");        
                if($.browser.msie){
                    $("span.oneageent",$(this)).css("background",bgcolor);
                    $("span.twoageent",$(this)).css("background",bgcolor);    
                    $("span.oneageent",$(this)).css("opacity",1);            
                };
                $("span.twoageent",$(this)).css("opacity",0);        
                $("span.twoageent",$(this)).css("position","absolute");        
                $("span.twoageent",$(this)).css("top","0");
                $("span.twoageent",$(this)).css("left","0");        
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
        }
        function changeposition() {
            offset = $("#translate_translate").offset();
            height = $("#translate_translate").height();
            translate_translate_width = $("#translate_translate").width();
            max_width = $(window).width();
            curent_left = offset.left;
            width_translate_popup = $("#translate_popup").width();
            rezultat = max_width - curent_left;
            if (rezultat < width_translate_popup) {
                leftofset = offset.left - width_translate_popup + translate_translate_width-15;
                $("#translate_popup").css({
                    "top": offset.top + height + "px",
                    "left": leftofset + "px"
                });
            } else {
                $("#translate_popup").css({
                    "top": offset.top + height + "px",
                    "left": offset.left + "px"
                });
            }
        }
    });
})(jQuery);