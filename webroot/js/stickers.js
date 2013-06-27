$(document).ready(function(){
	window.stickers = {};
	window.stickers.last_position = {top: 0, left:0}; // of drag helper
	window.stickers.last_bg_position = {top: 0, left:0};
	window.stickers.parallax = 1.5;
	window.stickers.init_sticker = function(elems){
		elems.each(function(idx, elem){
			elem = $(elem);
			elem.draggable({
				stack: "#content .sticker"
				, containment: 'parent'
			});
			elem.find('.delete').click(function(){
				var id = $(this).parents('.sticker').attr('id');
				window.stickers.db.remove(id);
				$(this).parents('.sticker').toggle('fold', function(){
					$(this).remove();
				});
			});
			var html = elem.find('.content').html();
			elem.find('.content').html('');
			YUI().use('dial', 'slider', 'event-valuechange', 'color', 'editor', function(Y) {
				//Create the Base Editor
				var editor = new Y.EditorBase({
					content: html,
					extracss: '* {background: transparent}'
				});
				editor.set('id', elem.attr('id'));
				editor.set('color', elem.css('background-color'));
				var editorEvt = function(e){
					var tag = e.frameTarget.get('tagName').toLowerCase();
					if(e.type === 'keyup'){
						var ts = window.stickers.now();
						elem.find('.modified').html(ts);
						editor.set('modified', ts);
						window.stickers.db.put({id: editor.get('id'), color: editor.get('color'), content: editor.getContent(), modified: ts});
					}
				}
				Y.each(Y.Frame.DOM_EVENTS, function(v, k) {
					editor.on('dom:' + k, editorEvt);
				});
				editor.render('#' + elem.attr('id'));

				var hue = new Y.Dial({
								min: 0,
								max: 360,
								stepsPerRevolution: 360,
								continuous: true,
								centerButtonDiameter: 0.4,
								render: '#' + elem.attr('id') + ' .hue-dial'
				});
				hue.after('valueChange', function(e) {
					var h = hue.get('value');
					var hslString = Y.Color.fromArray([h, 100, 50], Y.Color.TYPES.HSL);
					elem.css('background-color', hslString);
					editor.set('color', elem.css('background-color'));
					var ts = window.stickers.now();
					elem.find('.modified').html(ts);
					editor.set('modified', ts);
					window.stickers.db.put({id: editor.get('id'), color: editor.get('color'), content: editor.getContent(), modified: ts});
				});
				elem.find('.color').click(function(){
					$(this).parents('.sticker').find('.hue-dial').toggleClass('hide');
					if($(this).parents('.sticker').find('.hue-dial').hasClass('hide')){
						$(this).html('Color');
					}
					else {
						$(this).html('Done');
					}
				});
				elem.find('.hue-dial').addClass('hide');
			});
		});
	};
	window.stickers.init_sticker($( "#content .sticker" ));
	window.stickers.arrange = function(){
		var width = $('#content').width();
		var elems_per_row = Math.floor((width - 20) / 210);
		var row = 0;
		var column = 1;
		$('.sticker').each(function(idx,elem){
			column = idx % elems_per_row;
			$(elem).offset({ top: 40 + row * 210, left: column * 210 + 10 });
			if(column+1 == elems_per_row ){
				row++;
			}
		});
	};
	window.stickers.pad = function(number, length) {
			var str = '' + number;
			while (str.length < length) {
				str = '0' + str;
			}
			return str;
	};
	window.stickers.now = function(){
		var date = new Date;
		var ts = date.getFullYear() + '-'
						+ window.stickers.pad(date.getMonth(),2) + '-'
						+ window.stickers.pad(date.getDay(),2) + ' '
						+ window.stickers.pad(date.getHours(),2) + ':'
						+ window.stickers.pad(date.getMinutes(),2) + ':'
						+ window.stickers.pad(date.getSeconds(),2);
		return ts;
	}
	window.stickers.arrange();
	$('#add-sticker').click(function(){
		var clone = $('.sticker.template').clone();
		clone.removeClass('template');
		$('#content').append(clone);
		var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
			return v.toString(16);
		});
		clone.attr('id', uuid);
		clone.find('.modified').html(window.stickers.now());
		window.stickers.init_sticker(clone);
		window.stickers.arrange();
		window.stickers.db.create({id: uuid, color: 'yellow', content: '', modified: ts});
	});
	$('#arrange-sticker').click(window.stickers.arrange);
	$(window).resize(window.stickers.arrange);
	window.stickers.restore = function(data){
		var clone = $('.sticker.template').clone();
		clone.removeClass('template');
		$('#content').append(clone);
		var uuid = data.id;
		clone.find('.content').html(data.content);
		clone.attr('id', uuid);
		clone.css('background-color', data.color);
		clone.find('.modified').html(data.modified);
		window.stickers.init_sticker(clone);
		window.stickers.arrange();
	};
	window.stickers.store = function(elem){
		
	}
	window.stickers.db = {};
	window.stickers.db.create = function(item) {
		var post_url = '/stickers/add/';
		var post_data = {
			'Sticker[id]'      : item.id
		,	'Sticker[color]'   : item.color
		,	'Sticker[content]' : item.content
		};
		$.post(post_url, post_data);
	};
	window.stickers.db.put = function(item) {
		var post_url = '/stickers/edit/' + item.id;
		var post_data = {
			'Sticker[id]'      : item.id
		,	'Sticker[color]'   : item.color
		,	'Sticker[content]' : item.content
		};
		$.post(post_url, post_data);
	};
	window.stickers.db.remove = function(id) {
		var post_url = '/stickers/delete/' + item.id;
		var post_data = {
			'Sticker[id]'      : item.id
		};
		$.post(post_url, post_data);
	};
	window.stickers.db.getAll = function() {
		$.getJSON('/stickers/index.json', function(data) {
			$.each(data.stickers, function(key, item) {
				window.stickers.restore(item.Sticker)
			});
		});
	};
	window.stickers.db.getAll();
});
