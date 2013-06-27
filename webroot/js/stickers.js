$(document).ready(function(){
	window.stickers = {};
	window.stickers.last_position = {top: 0, left:0}; // of drag helper
	window.stickers.last_bg_position = {top: 0, left:0};
	window.stickers.parallax = 1.5;
	$( "#content" ).draggable({
		helper: function(event){return $("<div id='content-drag-helper'></div>");}
	, start: function(event){
			window.stickers.last_position = {top: 0, left:0};
		}
	, drag: function(event){
			var current_position = $('#content-drag-helper').position();
			var diff_top = current_position.top - window.stickers.last_position.top;
			var diff_left = current_position.left - window.stickers.last_position.left;
			$('#content .sticker').each(function(idx, elem){
				var pos = $(elem).position();
				$(elem).css({
					left: (pos.left + diff_left) + "px"
				, top: (pos.top + diff_top) + 'px'
				});
			});
			window.stickers.last_position = current_position;
			$('body').css({
				'background-position': (window.stickers.last_bg_position.left + diff_left/window.stickers.parallax) + "px " + (window.stickers.last_bg_position.top + diff_top/window.stickers.parallax) + 'px'
			});
			window.stickers.last_bg_position.left += diff_left / window.stickers.parallax;
			window.stickers.last_bg_position.top += diff_top / window.stickers.parallax;
		}
	, stop: function(event){
		}
	});
	$( "#content .sticker" ).draggable({ stack: "#content .sticker" });
	window.stickers.arrange = function(){
		$('.sticker').each(function(idx,elem){
			$(elem).offset({ top: 40, left: idx * 210 + 10 });
		});
	};
	window.stickers.arrange();
});