$(document).ready(() => {
    const breadImage = $("#breadImage");

    breadImage.mouseenter(function() {
        const src = breadImage.attr('src');
        const newSrc = src.replace("-bw.jpg", "-color.jpg");
        breadImage.attr('src', newSrc);
    });

    breadImage.mouseleave(function() {
        const src = breadImage.attr('src');
        const newSrc = src.replace("-color.jpg", "-bw.jpg");
        breadImage.attr('src', newSrc);
    });
});
