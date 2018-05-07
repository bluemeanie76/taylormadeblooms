
function parse(document) {
    $(document).find("image").each(function () {
        $("#content").append(
        '<li><img src="' + $(this).find('url').text() + '"  title="' + $(this).find('title').text() + '"/></li>'
        );
    });

    SetupSlider();
}

function SetupSlider() {
    $('.bxslider').bxSlider({
        mode: 'fade',
        captions: false,
        adaptiveHeight: true,
        responsive: true,
        pager: false
    });
}