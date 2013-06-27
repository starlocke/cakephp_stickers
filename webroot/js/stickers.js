$(document).ready(function(){
	window.stickers = {};
	window.stickers.last_position = {top: 0, left:0}; // of drag helper
	window.stickers.last_bg_position = {top: 0, left:0};
	window.stickers.parallax = 1.5;
	window.stickers.init_sticker = function(elems){
		console.log(elems);
		elems.each(function(idx, elem){
			elem = $(elem);
			console.log('init for ' + elem.attr('id'));
			elem.draggable({
				stack: "#content .sticker"
				, containment: 'parent'
			});
			elem.find('.delete').click(function(){
				$(this).parents('.sticker').toggle('fold', function(){
					$(this).remove();
				});
			});
			var html = elem.find('section').html();
			elem.find('section').html('');
			YUI().use('editor', function(Y) {
				//Create the Base Editor
				var editor = new Y.EditorBase({
					content: html,
					extracss: '* {background: transparent}'
				});
				editor.render('#' + elem.attr('id'));
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
			console.log('row ' + row + ' / col ' + column);
			$(elem).offset({ top: 40 + row * 210, left: column * 210 + 10 });
			if(column+1 == elems_per_row ){
				row++;
			}
		});
	};
	window.stickers.arrange();
	$('#add-sticker').click(function(){
		var clone = $('.sticker.template').clone();
		clone.removeClass('template');
		$('#content').append(clone);
		console.log($('#content .sticker').length);
		var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
			return v.toString(16);
		});
		clone.attr('id', uuid);
		window.stickers.init_sticker(clone);
		window.stickers.arrange();
		window.stickers.db.put({id: uuid, color: 'yellow', content: ''});
	});
	$('#arrange-sticker').click(window.stickers.arrange);
	$(window).resize(window.stickers.arrange);
	window.stickers.restore = function(data){
		var clone = $('.sticker.template').clone();
		clone.removeClass('template');
		$('#content').append(clone);
		console.log($('#content .sticker').length);
		var uuid = data.id;
		clone.find('section').html(data.content);
		clone.attr('id', uuid);
		window.stickers.init_sticker(clone);
		window.stickers.arrange();
	};
	window.stickers.store = function(elem){
		
	}
	window.stickers.db = new IDBStore({
		dbVersion: 1,
		storeName: 'stickers',
		keyPath: 'id',
		onStoreReady: function(){
			var onsuccess = function(data){
				console.log('Here is what we have in store ('+data.length+' items in total):');
				data.forEach(function(item){
					console.log(item);
					window.stickers.restore(item);
				});
			};
			var onerror = function(error){
				console.log('Oh noes, sth went wrong!', error);
			};
			window.stickers.db.getAll(onsuccess, onerror);
		}
	});
});
