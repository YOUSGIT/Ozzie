<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script src="script/jquery.cycle2.min.js"></script>
        <script>
            $(function () {

                $(".custom-caption").text(padLeft(1, 3).toString() + "/" + padLeft($("#gallery img").length, 3).toString());

                var gallery = $('#gallery').on('cycle-before', function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
                    $(".custom-caption").text(padLeft(optionHash.slideNum, 3).toString() + "/" + padLeft(optionHash.slideCount, 3).toString());
                }).on('cycle-initialized', function (event, optionHash) {
                    console.log(optionHash);
                    //$(".custom-caption").text(padLeft(1,3).toString()+"/"+padLeft(optionHash.slideCount,3).toString());
                });
            });
            function padLeft(str, lenght) {
                if (str.length >= lenght)
                    return str;
                else
                    return padLeft("0" + str, lenght);
            }
        </script>
    </head>

    <body class="box">

        <div class="work">
            <div id="gallery" class="photo cycle-slideshow"
                 data-cycle-log ="false"
                 data-cycle-fx="fade"
                 data-cycle-pause-on-hover="true"
                 data-cycle-speed="500"
                 data-cycle-timeout="0"
                 data-cycle-prev="#prev"
                 data-cycle-next="#next">
                <img src="images/sample_work_large.jpg">
                <img src="images/sample_work_large.jpg">
                <img src="images/sample_work_large.jpg">
                <img src="images/sample_work_large.jpg">
                <img src="images/sample_work_large.jpg">
            </div>
            <div class="number custom-caption"></div>
            <div class="title">Wide White Spaces</div>
            <div class="year">2015</div>
            <div class="control">
                <span id="prev" class="prev"><a href="#">< </a></span>
                <span id="next" class="next"><a href="#">> </a></span>
            </div>
            <div style="clear: both"></div>
            <div class="content">In early 2011, we were invited to participate in Wide White Space, an exhibition at CCA Wattis, San Francisco, organised by the American graphic designer and curator Jon Sueda, which addressed the relationship of graphic design, publishing and exhibition-making. Responding to the close relationship of book and exhibition-making, we contributed the Cosey Complex Reader, whose pages were recreated to suggest their original on-site production at the ICA, London.</div>
        </div>


    </body>

</html>
