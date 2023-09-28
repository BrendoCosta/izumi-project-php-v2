<!--
<script type="text/javascript">

    var images = ['/images/global/ChuuNiByouChristimas.png',
    '/images/natal/nekopara1.jpg',
    '/images/natal/k-on1.jpg',
    '/images/natal/k-on2.jpg',
    '/images/natal/lucky-star1.jpg',
    '/images/natal/girls-und-panzer1.jpg'
    ];
    
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
        	var c = ca[i];
        	while (c.charAt(0) == ' ') {
        		c = c.substring(1);
        	}
        	if (c.indexOf(name) == 0) {
        		return c.substring(name.length, c.length);
        	}
        }
        return "";
    }
    
    var currentBackground = 0 + getCookie("background") % images.length;
    
    $("body").css({'background-image': 'url(' + images[currentBackground] + ')'});
    
    currentBackground++;
    document.cookie = "background=" + currentBackground + ";path=/";

</script>
<script type="text/javascript">
/**
 * jquery.snow - jQuery Snow Effect Plugin
 * https://github.com/kopipejst/jqSnow
 *
 * Available under MIT licence
 *
 * @version 1 (21. Jan 2012)
 * @author Ivan Lazarevic
 * @requires jQuery
 * @see http://workshop.rs
 *
 * @params flakeChar - the HTML char to animate
 * @params minSize - min size of snowflake, 10 by default
 * @params maxSize - max size of snowflake, 20 by default
 * @params newOn - frequency in ms of appearing of new snowflake, 500 by default
 * @params flakeColors - array of colors , #FFFFFF by default
 * @params durationMillis - stop effect after duration
 * @example $.fn.snow({ maxSize: 200, newOn: 1000 });
 */
$(document).ready( function(options){
	
			var $flake 			= $('<div class="flake" />').css({'position': 'absolute', 'top': '-50px'}),
				documentHeight 	= $(document).height(),
				documentWidth	= $(document).width(),
				defaults		= {
									flakeChar	: "❅", 
									minSize		: 10,
									maxSize		: 20,
									newOn		: 300,
									flakeColor	: ["#ffffff"],
									durationMillis: null
								},
				options			= $.extend({}, defaults, options);
							
			$flake.html(options.flakeChar);

			var interval		= setInterval( function(){
				var startPositionLeft 	= Math.random() * documentWidth - 100,
				 	startOpacity		= 0.5 + Math.random(),
					sizeFlake			= options.minSize + Math.random() * options.maxSize,
					endPositionTop		= documentHeight - defaults.maxSize - 40,
					endPositionLeft		= startPositionLeft - 100 + Math.random() * 200,
					durationFall		= documentHeight * 10 + Math.random() * 5000;
				$flake
					.clone()
					.appendTo('body')
					.css(
						{
							left: startPositionLeft,
							opacity: startOpacity,
							'font-size': sizeFlake,
							color: options.flakeColor[Math.floor((Math.random() * options.flakeColor.length))]
						}
					)
					.animate(
						{
							top: endPositionTop,
							left: endPositionLeft,
							opacity: 0.2
						},
						durationFall,
						'linear',
						function() {
							$(this).remove()
						}
					);
			}, options.newOn);

			if (options.durationMillis) {
				setTimeout(function() {
					removeInterval(interval);
				}, options.durationMillis);
			}	
	});
</script>
-->
<script type="text/javascript">
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
        	var c = ca[i];
        	while (c.charAt(0) == ' ') {
        		c = c.substring(1);
        	}
        	if (c.indexOf(name) == 0) {
        		return c.substring(name.length, c.length);
        	}
        }
        return "";
    }
    
    var rounded = $("[name='switcher-rounded']");
    var switcher = $("[name='switcher-input']");
    
    var currentTheme = getCookie('theme');
    document.documentElement.setAttribute('data-theme', currentTheme);
    
    if (currentTheme == "dark") {
        switcher.prop('checked', true);
        rounded.css("transform", "translateX(115%)");
    } else {
        switcher.prop('checked', false);
        rounded.css("transform", "none");
    }
    
    switcher.click(function() {
        if (this.checked) {
            $(this).prop('checked', true);
            rounded.css("transform", "translateX(115%)");
            document.cookie="theme=dark;path=/";
            document.documentElement.setAttribute('data-theme', 'dark');
        }
        else {
            $(this).prop('checked', false);
            rounded.css("transform", "none");
            document.cookie="theme=light;path=/";
            document.documentElement.setAttribute('data-theme', 'light');
        }
        // FOR DISQUS RELOAD
        const event = new Event("themeChanged");
        setTimeout(function() {
			
			document.dispatchEvent(event);
			
		}, 500);
    });
</script>
<script type="text/javascript">
    var menuSlide = document.getElementsByClassName("menu dropdown");
    var i;
    
    for (i = 0; i < menuSlide.length; i++) {
        menuSlide[i].addEventListener("click", function() {
            this.classList.toggle("menu-active");
            var menuPanel = this.nextElementSibling;
            if (menuPanel.style.maxHeight) {
              menuPanel.style.maxHeight = null;
            } else {
              menuPanel.style.maxHeight = menuPanel.scrollHeight + "px";
            }
        });
    }
</script>
<script type="text/javascript">
	
	var openButtuon = $("[name='open-navigation']");
	var closeButton = $("[name='close-navigation']");
	var header = $("[name='navigation-header']");
	
	openButtuon.on('click', function() {
		
		$("body").css("height", "100%");
		$("body").css("overflow", "hidden");
		
		header.css("left", "0");
		
		openButtuon.css("opacity", "0");
		closeButton.css("display", "flex");
		
		setTimeout(function() {
			
			openButtuon.css("display", "none");
			closeButton.css("opacity", "1");
			
		}, 300);
		
	});
	
	closeButton.on('click', function() {
		
		$("body").css("height", "auto");
		$("body").css("overflow", "unset");
		
		header.css("left", "-100%");
		
		closeButton.css("opacity", "0");
		openButtuon.css("display", "flex");
		
		setTimeout(function() {
			
			closeButton.css("display", "none");
			openButtuon.css("opacity", "1");
			
		}, 300);
		
	});

	
</script>
<!--
<script type="text/javascript">
    var html = document.getElementsByTagName("html")[0];
	html.addEventListener("DOMContentLoaded", init(), false);
	
	function init() {
		new SmoothScroll(document,120,2)
	}
	
	function SmoothScroll(target, speed, smooth) {
		if (target === document)
			target = (document.scrollingElement 
				  || document.documentElement 
				  || document.body.parentNode 
				  || document.body) // cross browser support for document scrolling
	  
	var moving = false
	var pos = target.scrollTop
	var frame = target === document.body 
			  && document.documentElement 
			  ? document.documentElement 
			  : target // safari is the new IE
  
	target.addEventListener('mousewheel', scrolled, { passive: false })
	target.addEventListener('DOMMouseScroll', scrolled, { passive: false })

	function scrolled(e) {
		e.preventDefault(); // disable default scrolling

		var delta = normalizeWheelDelta(e)

		pos += -delta * speed
		pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)) // limit scrolling

		if (!moving) update()
	}

	function normalizeWheelDelta(e) {
		if(e.detail){
			if(e.wheelDelta)
				return e.wheelDelta/e.detail/40 * (e.detail>0 ? 1 : -1) // Opera
			else
				return -e.detail/3 // Firefox
		}else
			return e.wheelDelta/120 // IE,Safari,Chrome
	}

	function update() {
		moving = true
	
		var delta = (pos - target.scrollTop) / smooth
	
		target.scrollTop += delta
	
		if (Math.abs(delta) > 0.5)
			requestFrame(update)
		else
			moving = false
	}

	var requestFrame = function() { // requestAnimationFrame cross browser
		return (
			window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
			function(func) {
				window.setTimeout(func, 1000 / 50);
			}
		);
	}()
}
</script>
-->
<!--
<script type="text/javascript">
    $( document ).ready(function() {
        $.preloadImages = function() {
            for (var i = 0; i < arguments.length; i++) {
                $("<img />").attr("src", arguments[i]);
            }
        }
        
        $.preloadImages(
            "https://izumiproject.com.br/images/logos/v6/v6_star_outline.png",
		    "https://izumiproject.com.br/images/logos/v6/v6_star_full.png",
			"https://izumiproject.com.br/images/logos/v6/v6_star_icon_full.png",
        	"https://izumiproject.com.br/images/logos/v6/v6_star_icon_outline.png",
        	"https://izumiproject.com.br/images/logos/v6/v6_heart_icon_full.png",
        	"https://izumiproject.com.br/images/logos/v6/v6_heart_icon_outline.png",
        	"https://izumiproject.com.br/images/global/mega.png",
        	"https://izumiproject.com.br/images/global/patch.png",
        	"https://izumiproject.com.br/images/global/torrent.png"
        );
        console.log("Images preloaded!");
        
    });
</script>
-->
<script type="text/javascript" src="/scripts/notificationBox.js"></script>
<script id="dsq-count-scr" src="//izumiproject.disqus.com/count.js" async></script>