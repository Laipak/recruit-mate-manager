var App = {
	countCheckedCheckboxes: function () {
		var $exportBtn = $('#export-selected-button');
		var $emailBtn = $('#send-email-button');
		var checkboxes = $('#table-content').find('.child.checkbox');
		var count = 0;

		checkboxes.each(function () {
			if ($(this).checkbox('is checked')) {
				count ++;
			}
		});

		$('#export-selected-button .text').text('Export selected ('+ count +')');
		$('#send-email-button .text').text('Send email ('+ count +')');

		if (count < 1) {
			$exportBtn.addClass('disabled');
			$emailBtn.addClass('disabled');
		} else {
			$exportBtn.removeClass('disabled');
			$emailBtn.removeClass('disabled');
		}
	}
};

$(function() {

	App.countCheckedCheckboxes();

	// Semantic UI modules init
	$('.ui.checkbox').checkbox();
	$('.ui.dropdown').dropdown();
	$('.ui.accordion').accordion();
	$('.ui.info.modal').modal('attach events', '.unhide.icon.caller', 'show');
	$('.ui.reset.modal').modal('attach events', '#reset-db-btn', 'show');
	$('*[data-content]').popup({
		position: 'top center'
	});
	$('.ui.message .close').on('click', function() {
    	$(this).closest('.message').transition('fade');
  	});

	// Clear the selection of course when department is selected
	$('#dept-select').dropdown({
		fullTextSearch: true,
		onChange: function (val) {
			if (App.target != 'course') {
				$('#course-select').dropdown('clear');
			}
		}
	});

	// Clear the selection of department when course is selected
	$('#course-select').dropdown({
		fullTextSearch: 'true',
		onChange: function (val) {
			console.log(val);
			if (App.target != 'dept') {
				$('#dept-select').dropdown('clear');
			}
		}
	});

	// Grouped checkboxes
	$('#master-checkbox').checkbox({
		onChecked: function () {
			// Check all children
			$('#table-content').find('.child.checkbox').checkbox('check');
			App.countCheckedCheckboxes();
		},
		onUnchecked: function () {
			// Uncheck all children
			$('#table-content').find('.child.checkbox').checkbox('uncheck');
			App.countCheckedCheckboxes();
		}
	});
	$('.child.checkbox').checkbox({
		// Fire on load to set parent value
		fireOnInit : true,

		// Change parent state on each child checkbox change
    	onChange : function() {
    		var allChecked = true;
    		var allUnchecked = true;
    		var parentCheckbox = $('#master-checkbox');
    		var checkboxes = $('#table-content').find('.child.checkbox');

    		// Check to see if all other siblings are checked or unchecked
    		checkboxes.each(function () {
    			if ($(this).checkbox('is checked')) {
    				allUnchecked = false;
    			} else {
    				allChecked = false;
    			}
    		});

    		App.countCheckedCheckboxes();

    		// Set parent checkbox state, but dont trigger its onChange callback
		    if(allChecked) {
		      parentCheckbox.checkbox('set checked');
		    } else if(allUnchecked) {
		      parentCheckbox.checkbox('set unchecked');
		    } else {
		      parentCheckbox.checkbox('set indeterminate');
		    }
    	},
	});
});

// Set select box states
$('#dept-select').on('click', function() {
	App.target = 'dept';
});
$('#course-select').on('click', function() {
	App.target = 'course';
});


// Upload file button
$('#file-import-btn').on('click', function() {
   $('#file-import-input').click(); 
});
// Get uploaded file path name
$('#file-import-input').change(function() {
    $('#file-import-form').submit();
});

// Send email button
$('#file-email-btn').on('click', function() {
   $('#file-email-input').click(); 
});
// Show uploading files 
$('#file-email-input').change(function() {
	var files = $('#file-email-input')[0].files;
	
	if (files.length > 0) {
		var $desc = $('#file-email-btn .desc');

		// Clear description
		$desc.text('');

		for (var i = 0; i < files.length; i++) {
		    $desc.append(files[i].name + '<br>');
		}

		$('#file-email-btn .text').text(files.length + ' file(s) selected');
		$('#file-email-btn .desc').text();
	
	} else {

		$('#file-email-btn .text').text('Select file(s)');
		$('#file-email-btn .desc').text('');

	}

});

// Determine which action are selected by user
$('#export-all-button').on('click', function () {
	$('#process-form-action').val('EXPORTALL');
	$('#process-form').submit();
});
$('#export-selected-button').on('click', function () {
	$('#process-form-action').val('EXPORTSELECTED');
	$('#process-form').submit();
});
$('#send-email-button').on('click', function () {
	$('#process-form-action').val('SENDEMAIL');
	$('#process-form').submit();
});

// Modal caller
$('.unhide.icon.caller').on('click', function () {
	var applicant = $(this).data('item');
	console.log(applicant);

	$table = $('#info-table');

	$table.find('span.name').text(applicant.name);
	$table.find('span.gender').text("(" + applicant.gender.charAt(0) + ")");
	$table.find('td.dob').text(applicant.dob);
	$table.find('td.nric').text(applicant.nric);
	$table.find('td.nationality').text(applicant.nationality);
	$table.find('td.email').text(applicant.email);
	$table.find('td.mobile').text(applicant.mobile);
	$table.find('td .addr1').text(applicant.address_line_1);
	$table.find('td .addr2').text(applicant.address_line_1);
	$table.find('td .addr3').text(applicant.postal + ", " + applicant.address_country);
	$table.find('td .ep').text(applicant.english_proficiency);
	$table.find('td .gpa').text(applicant.gpa);
	$table.find('td .type').text(applicant.course_type);
	$table.find('td .start').text(applicant.expected_start_date);
	
	$list = $table.find('td .coi.list');
	$list.empty();
	
	$list.append("<li>" + applicant.course_of_interest_1 + "</li>");
	if (applicant.course_of_interest_2 && applicant.course_of_interest_2 != 'None') {
		$list.append("<li>" + applicant.course_of_interest_2 + "</li>");
	}
	if (applicant.course_of_interest_3 && applicant.course_of_interest_3 != 'None') {
		$list.append("<li>" + applicant.course_of_interest_3 + "</li>");
	}
	
	$table.find('td .enquiry').text(applicant.enquiry);
	$table.find('td .registered').text(applicant.registered_at);
	$table.find('td .device').text(applicant.device_name);

	if (applicant.is_exported == 1) {
		$table.find('td.exported i').attr('class', 'inverted green circular checkmark icon');
	} else {
		$table.find('td.exported i').attr('class', 'inverted red circular remove icon');
	}

	if (applicant.is_emailed == 1) {
		$table.find('td.emailed i').attr('class', 'inverted green circular checkmark icon');
	} else {
		$table.find('td.emailed i').attr('class', 'inverted red circular remove icon');
	}
});
