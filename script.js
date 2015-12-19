$( document ).ready(function() {
    var width = $(window).width(), height = $(window).height();
    // si smarphone ou tablette
    if (width <= 768) {
        $(document).find("h2").find("span").attr("class", "glyphicon glyphicon-chevron-down");
    }
});

$("h2").click(function() {
    if ($(this).next("div").is(":visible")) {
        $(this).next("div").hide( "slow" );
        $(this).find( "span" ).attr("class", "glyphicon glyphicon-chevron-down");
    } else {
        $(this).next("div").show( "slow" );
        $(this).find( "span" ).attr("class", "glyphicon glyphicon-chevron-up");
    }
});
