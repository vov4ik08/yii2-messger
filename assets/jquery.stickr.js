// ----------------------------------------------------------------------------
// Stikr, jQuery plugin
// v 1.0
// ----------------------------------------------------------------------------
// Copyright (C) 2010 recens
// http://recens.ru/jquery/plugin_stickr.html
// ----------------------------------------------------------------------------
(function($) {
	$.stickr = function(o) {
		var o = $.extend({   // íàñòðîéêè ïî óìîë÷àíèþ
			time:5000, // êîëè÷åñòâî ìñ, êîòîðîå îòîáðàæàåòñÿ ñîîáùåíèå
			speed:'slow', // ñêîðîñòü èñ÷åçàíèÿ
			note:null, // òåêñò ñîîáùåíèÿ
			className:null, // êëàññ, äîáàâëÿåìûé ê ñîîáùåíèþ
			sticked:false, // íå âûâîäèòü êíîïêó çàêðûòèÿ ñîîáùåíèÿ
			position:{top:0,right:0} // ïîçèöèÿ ïî óìîë÷àíèþ - ñïðàâà ñâåðõó
		}, o);
		var stickers = $('#jquery-stickers'); // íà÷èíàåì ðàáîòó ñ ãëàâíûì ýëåìåíòîì
		if (!stickers.length) { // åñëè åãî åùž íå ñóùåñòâóåò
			$('body').prepend('<div id="jquery-stickers"></div>'); // äîáàâëÿåì åãî
			var stickers = $('#jquery-stickers');
		}
		stickers.css('position','fixed').css({right:'auto',left:'auto',top:'auto',bottom:'auto'}).css(o.position); // ïîçèöèîíèðóåì
		var stick = $('<div class="stick"></div>'); // ñîçäàžì ñòèêåð
		stickers.append(stick); // äîáàâëÿåì åãî ê ðîäèòåëüñêîìó ýëåìåíòó
		if (o.className) stick.addClass(o.className); // åñëè íåîáõîäèìî, äîáàâëÿåì êëàññ
        stick.html(o.note); // âñòàâëÿåì ñîîáùåíèå
		if (o.sticked) { // åñëè ñîîáùåíèå çàêðåïëåíî
			var exit = $('<div class="exit"></div>');  // ñîçäàžì êíîïêó âûõîäà
			stick.prepend(exit); // âñòàâëÿåì åž ïåðåä ñîîáùåíèåì
			exit.click(function(){  // ïðè êëèêå
				stick.fadeOut(o.speed,function(){ // ñêðûâàåì ñòèêåð
					$(this).remove(); // ïî îêîí÷àíèè àíèìàöèè óäàëÿåì åãî
				})
			});
		} else { // åñëè æå íåò
			setTimeout(function(){ // óñòàíàâëèâàåì òàéìåð íà íåîáõîäèìîå âðåìÿ
				stick.fadeOut(o.speed,function(){ // çàòåì ñêðûâàåì ñòèêåð
					$(this).remove(); // ïî îêîí÷àíèè àíèìàöèè óäàëÿåì åãî
				});
			}, o.time);
		}
	};
})(jQuery);
$(document).ready(function(){
	$('#one').click(function(){
		$.stickr({note:'Ñàìûé ïðîñòîé ñòèêåð ñ íàñòðîéêàìè ïî óìîë÷àíèþ.',className:'classic'});
	});
	$('#two').click(function(){
		$.stickr({note:'Ýòî îøèáêà.<br />×òîáû ïðèâëå÷ü âàøå âíèìàíèå, îíà áóäåò îñòàâàòüñÿ íà ìåñòå äî òåõ ïîð, ïîêà âû íå çàêðîåòå åž',className:'classic error',sticked:true});
	});
	$('#three').click(function(){
		$.stickr({note:'Ïðîáà ïîëóïðîçðà÷íûõ èçîáðàæåíèé',className:'opacity',position:{left:0,top:0}});
	});
	$('#four').click(function(){
		$.stickr({note:'Óñïåé ïðî÷èòàòü ìîž ñîäåðæèìîå!',className:'next',position:{right:0,bottom:0},time:1000,speed:300});
	});
	$('#five').click(function(){
		$.stickr({note:'Ñàìûé ïîñëåäíèé èç òåñòîâûõ ñòèêåðîâ. Èñ÷åçàåò î÷åíü ìå-å-åäëåííî.',className:'last',time:1000,speed:3000});
	});
});