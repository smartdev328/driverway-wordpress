(function($) {

	function focusLabel() {
		const labeledInput = $(
			".gform_wrapper .gform_fields input, .gform_wrapper .gform_fields textarea, .gform_wrapper .gform_fields select"
		);

		labeledInput.each(function() {
			$(this).focus(function() {
				$(this)
					.closest(".gfield")
					.addClass("is-active");
			});

			$(this).blur(function() {
				if (!$(this).val()) {
					$(this)
						.closest(".gfield")
						.removeClass("is-active");
				} else {
					$(this)
						.closest(".gfield")
						.addClass("is-active");
				}
			});
			if (!$(this).val()) {
				$(this)
					.closest(".gfield")
					.removeClass("is-active");
			} else {
				$(this)
					.closest(".gfield")
					.addClass("is-active");
			}
		});
	}

	$(document).ready(() => {
		focusLabel();
	});

	$(document).bind("gform_page_loaded", function() {
		focusLabel();
	});

	$(".gform_wrapper .gform_fields select").bind("change", function(){
		$(this)
			.closest(".gfield")
			.addClass("is-active");
	});

})(jQuery);
