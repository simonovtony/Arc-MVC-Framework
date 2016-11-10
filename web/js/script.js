/* script.js */

$(function() {
    tinymce.init({
        selector: '.tinymce',
        plugins: "code",
    });

    showHeading();
});

top_cur = 0;

function showHeading() {
    $('#top' + (top_cur + 1)).css({opacity: 0}).animate({opacity: 1.0, left: "50px"}, 500);
    setTimeout(hideHeading, 5000);
    console.log('show');
}
function hideHeading() {
    $('#top' + (top_cur + 1)).css({opacity: 1}).animate({opacity: 0, left: "-50px"}, 500, function () {
        showHeading();
    });
    top_cur = (top_cur + 1) % blog_count;
}