var delayb4scroll169=1000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
		var marqueespeed169=1 //Specify marquee scroll speed (larger is faster 1-10)
		var pauseit169=1 //Pause marquee onMousever (0=no. 1=yes)?
 
		var copyspeed169=marqueespeed169
		var pausespeed169=(pauseit169==0)? copyspeed169: 0
		var actualheight169=''
 
		function scrollmarquee169(){
			if (parseInt(cross_marquee169.style.top)>(actualheight169*(-1)+8))
				cross_marquee169.style.top=parseInt(cross_marquee169.style.top)-copyspeed169+"px"
			else
				cross_marquee169.style.top=parseInt(marqueeheight169)+8+"px"
		}
 
		function initializemarquee169(){
			cross_marquee169=document.getElementById("vmarquee169")
			cross_marquee169.style.top=0
			marqueeheight169=document.getElementById("marqueecontainer169").offsetHeight
			actualheight169=cross_marquee169.offsetHeight
			if (navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Netscape 7x, add scrollbars to scroll and exit
				cross_marquee169.style.height=marqueeheight169+"px"
				cross_marquee169.style.overflow="scroll"
				return
			}
			setTimeout('lefttime169=setInterval("scrollmarquee169()",80)', delayb4scroll169)
		}
 
		if (window.addEventListener)
			window.addEventListener("load", initializemarquee169, false)
		else if (window.attachEvent)
			window.attachEvent("onload", initializemarquee169)
		else if (document.getElementById)
			window.onload=initializemarquee169