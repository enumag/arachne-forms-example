$(function () {

	var replaceDateTime = function (field, visibleFormat, hiddenFormat) {
		var replacement = $('<input>');
		replacement.attr('class', field.attr('class'));
		replacement.insertAfter(field);
		replacement.datetimepicker({
			locale: 'cs',
			format: visibleFormat,
			sideBySide: true,
			useCurrent: false,
		});
		replacement.on('dp.change', function (e) {
			field.val(moment(e.date).format(hiddenFormat));
		});
		field.hide();
	};

	$('.form-horizontal').each(function () {
		$(this).filter('.form-ajax-validation').ajaxValidation();
		$(this).find('.form-collection').collection({
			up: '<a href="#" class="input-group-addon fa fa-arrow-up"></a>',
			down: '<a href="#" class="input-group-addon fa fa-arrow-down"></a>',
			add: '<a href="#" class="input-group-addon fa fa-plus"></a>',
			delete: '<a href="#" class="input-group-addon fa fa-trash-o"></a>',
			hide_disabled_buttons: false,
		});

		$(this).find('input[type="datetime"]').each(function () {
			replaceDateTime($(this), 'D. M. YYYY H:mm', 'YYYY-MM-DD HH:mm');
		});
		$(this).find('input[type="date"]').each(function () {
			replaceDateTime($(this), 'D. M. YYYY', 'YYYY-MM-DD');
		});
		$(this).find('input[type="time"]').each(function () {
			replaceDateTime($(this), 'H:mm', 'HH:mm');
		});
	});

});
