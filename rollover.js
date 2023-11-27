$(document).ready(() => {
    const breadImage = $("#breadImage");

    breadImage.mouseenter(function() {
        const src = breadImage.attr('src');
        const newSrc = src.replace("-bw.jpg", "-Color.jpg");
        breadImage.attr('src', newSrc);
    });

    breadImage.mouseleave(function() {
        const src = breadImage.attr('src');
        const newSrc = src.replace("-Color.jpg", "-bw.jpg");
        breadImage.attr('src', newSrc);
    });
});
