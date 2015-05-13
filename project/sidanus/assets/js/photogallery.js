
              $(document).ready(function() {
                $("#img_holder_bg").click(function(){
                  $("#popopen_wrap").hide();
              });
               $("img#thumbnail").click(function(){
                   $("#popopen_wrap").show();
                   $("img#maximised").attr("src",$(this).attr("src"));
                   $(this).addClass("selected");
                   $(document).keydown(function(event){
                       if(event.keyCode==27){
                           $("#popopen_wrap").hide();
                           }
                        else if(event.keyCode==39){
                            $("img#maximised").attr("src",function(){
                                if($(".selected").hasClass('last')){
                                    $(".selected").removeClass("selected");
                                    $(".first").addClass("selected");
                                    return $(".first").attr("src");}
                                else {
                                    $nxt=$(".selected");
                                    $(".selected").removeClass("selected");
                                    $nxt.parent().next().children("img#thumbnail").addClass("selected");
                                    return $(".selected").attr("src");}
                                });
                            }
                        else if(event.keyCode==37){
                            $("img#maximised").attr("src",function(){
                                if($(".selected").hasClass('first')){
                                    $(".selected").removeClass("selected");
                                    $(".last").addClass("selected");
                                    return $(".last").attr("src");}
                                else {
                                    $prev=$(".selected");
                                    $(".selected").removeClass("selected");
                                    $prev.parent().prev().children("img#thumbnail").addClass("selected");
                                    return $(".selected").attr("src");}
                                });
                            }
             
                });
            });
            });
            