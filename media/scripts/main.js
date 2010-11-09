$(function(){
	var $prev_li;
	var has_hl = false;

	$('#doc .sidebar li.title').each(function(){
		var $self = $(this);
		if ($self.attr('level').indexOf('.') != -1) {
			$prev_li.find(' > .container').append($self);
		} else {
			$prev_li = $self;
		}

	});

	var loc = location.toString()
	if (loc.indexOf('?') == -1) {
		has_hl = true;
	}
	$('#doc .sidebar li a').each(function(){
		var $self = $(this);
		if (!has_hl) {
			if ($self.attr('href') == '?'+loc.split('?')[1]) {
				$self.addClass('selected');
				$self.parents().toggleClass('show');
				$self.next().show();
				has_hl = true;
			}
		}
	});

	/*
	$('#doc .sidebar').delegate('li a', 'click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var $self = $(this);
		$self.get(0).blur();
		$self.next().slideToggle('fast');
		$('#doc .sidebar a').removeClass('selected');
		$self.toggleClass('selected');
		var href = $self.attr('href');
		$.get(href, function(result){
			$('#doc .main').empty().html(result);
			if (href.indexOf('#') != -1) {
				var hash = href.split('#')[1];
				$.scrollTo($('#'+hash),1000);
			}
		});
	});
	*/

	prettyPrint();
});
