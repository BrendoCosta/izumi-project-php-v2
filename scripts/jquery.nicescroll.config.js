window.onload = function () {
    if (window.screen.width >= 600) {
        $("body").niceScroll({
            cursorcolor:"black",
            cursoropacitymax: 0,
            cursorborderradius: "20px",
            cursorborder: "0px solid #fff",
            cursorwidth:"0px",
            smoothscroll: true,
            scrollspeed: 60,
            enablekeyboard: true,
            horizrailenabled: true,
            bouncescroll: false,
            iframeautoresize: true,
            touchbehavior: false
        });
    }
};