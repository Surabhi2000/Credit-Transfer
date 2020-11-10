$.noConflict();
jQuery(document).ready(function($) {
    $("#viewc").hover(function(){
        $(this).css({
            "border":"none",
            "borderRadius":"10px",
            "padding":"2% 8%",
            "backgroundColor":"rgba(231, 216, 216, 0.13)"
        });
    },function(){
        $(this).css({
            "border-bottom":"3px groove white",
            "borderRadius":"0",
            "padding":"0",
            "backgroundColor":"transparent"
        });
    });

});