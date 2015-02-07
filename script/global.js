$(function () {

    //FreeWall
    var wall = new freewall(".wall");
    wall.reset({
        selector: '.brick',
        animate: true,
        cellW: 315,
        cellH: 210,
        fixSize: 0,
        onResize: function () {
            wall.refresh();
        }
    });

    wall.fitWidth();

    $('.wall .brick').on('mouseover', function () {
        $(this).stop().animate({backgroundColor: $(this).attr("data-color")}, 500);
    }).on('mouseout', function () {
        $(this).stop().animate({backgroundColor: '#ECECEC'}, 500);
    });

    //FancyBox

    $(".various").fancybox({
        maxWidth: 800,
        fitToView: true,
        width: '70%',
        height: '90%',
        autoSize: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        beforeShow: function () {
            var color = [
                'rgba(255, 17, 175, 0.5)',
                'rgba(46, 208, 59, 0.5)',
                'rgba(239, 100, 46, 0.5)',
                'rgba(255, 210, 58, 0.5)',
                'rgba(0, 153, 206, 0.5)'
            ];
            
            $(".fancybox-overlay").stop().animate({backgroundColor: color[Math.floor(Math.random() * color.length)]}, 500);
        }
    });

});

