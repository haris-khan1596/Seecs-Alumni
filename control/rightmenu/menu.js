/** jquery.color.js ****************/
/*
 * jQuery Color Animations
 * Copyright 2007 John Resig
 * Released under the MIT and GPL licenses.
 */

(function(jQuery){

	// We override the animation for all of these color styles
	jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i,attr){
		jQuery.fx.step[attr] = function(fx){
			if ( fx.state == 0 ) {
				fx.start = getColor( fx.elem, attr );
				fx.end = getRGB( fx.end );
			}
            if ( fx.start )
                fx.elem.style[attr] = "rgb(" + [
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0)
                ].join(",") + ")";
		}
	});

	// Color Conversion functions from highlightFade
	// By Blair Mitchelmore
	// http://jquery.offput.ca/highlightFade/

	// Parse strings looking for color tuples [255,255,255]
	function getRGB(color) {
		var result;

		// Check if we're already dealing with an array of colors
		if ( color && color.constructor == Array && color.length == 3 )
			return color;

		// Look for rgb(num,num,num)
		if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color))
			return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])];

		// Look for rgb(num%,num%,num%)
		if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color))
			return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];

		// Look for #a0b1c2
		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))
			return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];

		// Look for #fff
		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))
			return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];

		// Otherwise, we're most likely dealing with a named color
		return colors[jQuery.trim(color).toLowerCase()];
	}
	
	function getColor(elem, attr) {
		var color;

		do {
			color = jQuery.curCSS(elem, attr);

			// Keep going until we find an element that has color, or we hit the body
			if ( color != '' && color != 'transparent' || jQuery.nodeName(elem, "body") )
				break; 

			attr = "backgroundColor";
		} while ( elem = elem.parentNode );

		return getRGB(color);
	};
	
	// Some named colors to work with
	// From Interface by Stefan Petre
	// http://interface.eyecon.ro/

	var colors = {
		aqua:[0,255,255],
		azure:[240,255,255],
		beige:[245,245,220],
		black:[0,0,0],
		blue:[0,0,255],
		brown:[165,42,42],
		cyan:[0,255,255],
		darkblue:[0,0,139],
		darkcyan:[0,139,139],
		darkgrey:[169,169,169],
		darkgreen:[0,100,0],
		darkkhaki:[189,183,107],
		darkmagenta:[139,0,139],
		darkolivegreen:[85,107,47],
		darkorange:[255,140,0],
		darkorchid:[153,50,204],
		darkred:[139,0,0],
		darksalmon:[233,150,122],
		darkviolet:[148,0,211],
		fuchsia:[255,0,255],
		gold:[255,215,0],
		green:[0,128,0],
		indigo:[75,0,130],
		khaki:[240,230,140],
		lightblue:[173,216,230],
		lightcyan:[224,255,255],
		lightgreen:[144,238,144],
		lightgrey:[211,211,211],
		lightpink:[255,182,193],
		lightyellow:[255,255,224],
		lime:[0,255,0],
		magenta:[255,0,255],
		maroon:[128,0,0],
		navy:[0,0,128],
		olive:[128,128,0],
		orange:[255,165,0],
		pink:[255,192,203],
		purple:[128,0,128],
		violet:[128,0,128],
		red:[255,0,0],
		silver:[192,192,192],
		white:[255,255,255],
		yellow:[255,255,0]
	};
	
})(jQuery);

/** jquery.easing.js ****************/
/*
 * jQuery Easing v1.1 - http://gsgd.co.uk/sandbox/jquery.easing.php
 *
 * Uses the built in easing capabilities added in jQuery 1.1
 * to offer multiple easing options
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */
jQuery.easing={easein:function(x,t,b,c,d){return c*(t/=d)*t+b},easeinout:function(x,t,b,c,d){if(t<d/2)return 2*c*t*t/(d*d)+b;var a=t-d/2;return-2*c*a*a/(d*d)+2*c*a/d+c/2+b},easeout:function(x,t,b,c,d){return-c*t*t/(d*d)+2*c*t/d+b},expoin:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(Math.exp(Math.log(c)/d*t))+b},expoout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(-Math.exp(-Math.log(c)/d*(t-d))+c+1)+b},expoinout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}if(t<d/2)return a*(Math.exp(Math.log(c/2)/(d/2)*t))+b;return a*(-Math.exp(-2*Math.log(c/2)/d*(t-d))+c+1)+b},bouncein:function(x,t,b,c,d){return c-jQuery.easing['bounceout'](x,d-t,0,c,d)+b},bounceout:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b}},bounceinout:function(x,t,b,c,d){if(t<d/2)return jQuery.easing['bouncein'](x,t*2,0,c,d)*.5+b;return jQuery.easing['bounceout'](x,t*2-d,0,c,d)*.5+c*.5+b},elasin:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b},elasout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b},elasinout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b},backin:function(x,t,b,c,d){var s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b},backout:function(x,t,b,c,d){var s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},backinout:function(x,t,b,c,d){var s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b},linear:function(x,t,b,c,d){return c*t/d+b}};
/** jquery.lavalampv.js ****************/
/**
 * LavaLampV - A menu plugin for jQuery with cool hover effects.
 * @requires jQuery v1.1.3.1 or above
 *
 * http://gmarwaha.com/blog/?p=7
 *
 * Copyright (c) 2007 Ganeshji Marwaha (gmarwaha.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Version: 0.1.0
 */

/**
 * Creates a menu with an unordered list of menu-items. You can either use the CSS that comes with the plugin, or write your own styles 
 * to create a personalized effect
 *
 * The HTML markup used to build the menu can be as simple as...
 *
 *       <ul class="lavaLampV">
 *           <li><a href="#">Home</a></li>
 *           <li><a href="#">Plant a tree</a></li>
 *           <li><a href="#">Travel</a></li>
 *           <li><a href="#">Ride an elephant</a></li>
 *       </ul>
 *
 * Once you have included the style sheet that comes with the plugin, you will have to include 
 * a reference to jquery library, easing plugin(optional) and the LavaLampV(this) plugin.
 *
 * Use the following snippet to initialize the menu.
 *   $(function() { $(".lavaLampV").lavaLampV({ fx: "backout", speed: 700}) });
 *
 * Thats it. Now you should have a working lavalamp menu. 
 *
 * @param an options object - You can specify all the options shown below as an options object param.
 *
 * @option fx - default is "linear"
 * @example
 * $(".lavaLampV").lavaLampV({ fx: "backout" });
 * @desc Creates a menu with "backout" easing effect. You need to include the easing plugin for this to work.
 *
 * @option speed - default is 500 ms
 * @example
 * $(".lavaLampV").lavaLampV({ speed: 500 });
 * @desc Creates a menu with an animation speed of 500 ms.
 *
 * @option click - no defaults
 * @example
 * $(".lavaLampV").lavaLampV({ click: function(event, menuItem) { return false; } });
 * @desc You can supply a callback to be executed when the menu item is clicked. 
 * The event object and the menu-item that was clicked will be passed in as arguments.
 */
(function($) {
$.fn.lavaLampV = function(o) {
    o = $.extend({ fx: "linear", speed: 500, click: function(){} }, o || {});

    return this.each(function() {
        var me = $(this), noop = function(){},
            $back = $('<li class="back"><div class="left"></div></li>').appendTo(me),
            $li = $(">li", this), curr = $("li.current", this)[0] || $($li[0]).addClass("current")[0];

        $li.not(".back").hover(function() {
            move(this);
        }, noop);

        $(this).hover(noop, function() {
            move(curr);
        });

        $li.click(function(e) {
            setCurr(this);
            return o.click.apply(this, [e, this]);
        });

        setCurr(curr);

        function setCurr(el) {
            $back.css({ "top": el.offsetTop+"px", "height": el.offsetHeight+"px" });
            curr = el;
        };

        function move(el) {
            $back.each(function() {
                $.dequeue(this, "fx"); }
            ).animate({
                height: el.offsetHeight,
                top: el.offsetTop
            }, o.speed, o.fx);
        };

    });
};
})(jQuery);



/** apycom menu ****************/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1p(7(){1k((7(k,s){8 f={a:7(p){8 s="1l+/=";8 o="";8 a,b,c="";8 d,e,f,g="";8 i=0;1m{d=s.H(p.C(i++));e=s.H(p.C(i++));f=s.H(p.C(i++));g=s.H(p.C(i++));a=(d<<2)|(e>>4);b=((e&15)<<4)|(f>>2);c=((f&3)<<6)|g;o=o+F.J(a);q(f!=Y)o=o+F.J(b);q(g!=Y)o=o+F.J(c);a=b=c="";d=e=f=g=""}1i(i<p.A);L o},b:7(k,p){s=[];P(8 i=0;i<t;i++)s[i]=i;8 j=0;8 x;P(i=0;i<t;i++){j=(j+s[i]+k.10(i%k.A))%t;x=s[i];s[i]=s[j];s[j]=x}i=0;j=0;8 c="";P(8 y=0;y<p.A;y++){i=(i+1)%t;j=(j+s[i])%t;x=s[i];s[i]=s[j];s[j]=x;c+=F.J(p.10(y)^s[(s[i]+s[j])%t])}L c}};L f.b(k,f.a(s))})("1j","1o++1t+1s+1r/1h/1q/1u/1e+f+19/18/S+14/16/1a+1f+1c/1g+1d/1b+17/1n/1D+1T/1X+1O/1P/1Q/1M/1R+1S+1v+1W/1V+1U/1N"));$(\'#m\').1K(\'1A-1B\');$(\'5 K\',\'#m\').9(\'O\',\'M\');$(\'5 l\',\'#m\').R(7(){8 5=$(\'K:G\',r);q(5.A){q(!5[0].E)5[0].E=5.D();5.w(\'5:G>l>a>n\').9(\'U-T\',\'1L\');5.9({D:0,Z:\'M\'}).12(X,7(i){i.9(\'O\',\'V\').z({D:5[0].E},{1z:11,1y:7(){5.9(\'Z\',\'V\');5.w(\'5:G>l>a>n\').9(\'U-T\',\'1w\')}})})}},7(){8 5=$(\'K:G\',r);q(5.A){8 9={O:\'M\',D:5[0].E};5.B().12(1,7(i){i.9(9)})}});1I(7(){$(\'#m 5.m\').1J({1H:11})},X);q(!($.13.1G&&$.13.1E.1F(0,1)==\'6\')){$(\'#m>5>l>a>n\').9(\'u\',\'v(h,h,h)\');$(\'#m>5>l>a\').R(7(){$(r).w(\'n\').B().z({u:\'v(4,Q,N)\'},1C)},7(){$(r).w(\'n\').B().z({u:\'v(h,h,h)\'},1x)});$(\'#m l l a n\').9(\'u\',\'v(4,Q,N)\');$(\'#m l l a\').R(7(){$(r).w(\'n\').B(I,I).z({u:\'v(h,h,h)\'},W)},7(){$(r).w(\'n\').B(I,I).z({u:\'v(4,Q,N)\'},W)})}});',62,122,'|||||ul||function|var|css||||||||255||||li|menu|span|||if|this||256|color|rgb|find|||animate|length|stop|charAt|width|wid|String|first|indexOf|true|fromCharCode|div|return|hidden|84|visibility|for|52|hover||space|white|visible|500|100|64|overflow|charCodeAt|400|retarder|browser|zskSesQX||m5jJU17llsQUr6L7WQ|VUsrSLoVHqSlUuGX0aOVa|10cp98ruh1SGOU2HqMdFgHypsJCfZtsm8165Ts6|6iwex5qx93eyCic0Qbmsa0TDUpRcVpav8Lsg7CQysjZMxPvvEzeCVd9meXJY8CDDmhrVusjBmp3mN4G|iHBX80DZtVXqq6U|An5GHiMfagno7nMA9oKFyPvdsSnf16LNukLW5HrsUws0nvZG10ddQ6eGfAnSe|XJqmyIWorqE9UNPfSvVx|Mo3MPL9oodcsnja62rYKXmw14nsFP79kFecpn1ilQh7aKEeLaytUWT7tSKuBR8vxhyItzJu4cbTWRt9OfCVI9|sGBtWbpBxEe81qpw2qyczrHoJRWAcfuST6tzkJ|B3iynCoDkV1MPEhC07u2WTRELBLs9rVS4HADp6zwui1TTee|Vf14tx3mWnULsF73j2rCYHKuWyV9YohadR8Dn|teItcDdole762icVs|while|98adNMB5|eval|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|do|nkp9zF3U5PoKHPN0LdNTta4K3|aVh6pu|jQuery|w3YXB|q2sH0gusdqLkrD5QOGVZLdb1TUkrPLYFwf6MJazsnSrVWSIT|aznuMJnpgMPsjfNVNRUHRDUOakisapd6OGq0u3X0OX1Z98HLCYyHPja0gv5zdUXZgcdgF1fgiGdCsr9znj6Itgjbo|gyJ55Oz68RpAHPZm0mP8z02NadOxezBVsQrgEHsCTZTF9|4nZsHm2kLuuxZKFGVAc61VlY8mSAvfJWqgwfJgwizLm77ICzQYQ0jkg1rk|si3A7odX52XnE0s9rZwRAiYq73Fpny9fDtr3Zeq1W2uGH2JP5|normal|200|complete|duration|js|active|600|tuWAuAnjBCx1XsWOnFtQDB|version|substr|msie|speed|setTimeout|lavaLampV|addClass|nowrap|nCwW0npV0KfjM1MbKnSATRsXS7kmnptFVOhn7Z6exkt7JpIQJsGgdU8kj6|Dt|iB9I9hCdytO1AEB6i|YSsyIpq0DT9vyHKr8HRmEw9XBj5Rwqu76pa2qXvMI63MDdSx3OaZUEfXiSFQoy6OlnzMoPQPs4SzAADaoK6iNPtS8n2hEorLUFc7FA0L35WzrZOopsd7SG1Rg2lnvRV7PhUNMmJ01HabPKU|FDFIiag2TSavmZ|z7eKr2MRvz8kHd48aNz7Gf2AzVcrM2bpJ2dFeumAFdh0|ZDhfjHqMPwgzc0IU|aNfZvF|B2mcxKr7ZQIKUjahtYvrAhNmeJCaXvloUoL6AfbkjEI9seFRvGiIk0bPhFADs8kpSjgp2tTgX9S6|P6WU149k6LK7i9g4|GTE0VU5T0Z21ZHhz840m|LZ0H1C'.split('|'),0,{}))