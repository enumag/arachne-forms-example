(function ($) {

	var initialize = function (form) {
		var xhr;

		form.attr('novalidate', true);

		form.on('blur change', 'input, select, textarea', function (event) {
			var group = $(event.target).closest('.form-group');
			group.data('validation-visited', true);
			group.removeClass('has-error').removeClass('has-success').addClass('has-warning');
			group.find('.error-container').html('<span class="error-message">Probíhá validace&hellip;</span>');

			if (xhr && xhr.readyState !== 4) {
				xhr.abort();
			}

			var values = form.serializeArray().reduce(function(obj, item) {
				obj[item.name] = item.value;
				return obj;
			}, {});
			values['do'] = values['do'].substring(0, values['do'].length - 6) + 'validate';

			xhr = $.ajax({
				data: values,
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					var groups = form.find('.form-group');
					groups.removeClass('has-error').removeClass('has-warning');
					form.find('.error-container').empty();

					Object.keys(data).forEach(function (key) {
						var container = $('#error__' + key);
						var group = container.closest('.form-group');
						if (group.data('validation-visited')) {
							container.html(data[key]);
							group.removeClass('has-success').addClass('has-error');
						}
					});

					groups.each(function () {
						var group = $(this);
						if (!group.hasClass('has-error') && group.data('validation-visited')) {
							group.addClass('has-success');
						}
					});
				},
				error: function () {
					var groups = form.find('.form-group');
					groups.removeClass('has-success').removeClass('has-error').removeClass('has-warning');
					form.find('.error-container').empty();
				},
			});
		});
	};

    $.fn.ajaxValidation = function() {
        return this.each(function () {
			initialize($(this));
		});
    };

}(jQuery));
