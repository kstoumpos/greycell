/*  Wizard */
jQuery(function (jQuery) {
	jQuery("#wizard_container").wizard({
		stepsWrapper: "#wrapped",
		beforeSelect: function (event, state) {
			if (jQuery('input#website').val().length != 0) {
				return false;
			}
			if (!state.isMovingForward)
				return true;
			var inputs = jQuery(this).wizard('state').step.find(':input');
			return !inputs.length || !!inputs.valid();
		}
	}).validate({
		errorPlacement: function (error, element) {
			if (element.is(':radio') || element.is(':checkbox')) {
				error.insertBefore(element.next());
			} else {
				error.insertAfter(element);
			}
		}
	});
	//  progress bar
	jQuery("#progressbar").progressbar();
	jQuery("#wizard_container").wizard({
		afterSelect: function (event, state) {
			jQuery("#progressbar").progressbar("value", state.percentComplete);
			jQuery("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
		}
	});
});