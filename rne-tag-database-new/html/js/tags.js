// Delete button
$(document).on("click", ".tag-delete", function() {
	var date = new Date();
	$(".modal-body .deleted").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});


// Add required leading zeros '0'
function addZero(i) {
	// Less than 10
	if (i < 10) {
		// Add leading zero '0'
		i = "0" + i;
	}
	
	// Return updated STRING
	return i;
};

$(document).on("click", ".open-tag-model", function() {	
	// Get current tag information
	var id = $(this).data('id');
	var name = $(this).data('name');
	var description = $(this).data('description');
	var type = $(this).data('type');
	var eu = $(this).data('eu');
	var min = $(this).data('min');
	var max = $(this).data('max');
	var hihi = $(this).data('hihi');
	var high = $(this).data('high');
	var low = $(this).data('low');
	var lolo = $(this).data('lolo');
	var hihiCheck = $(this).data('hihicheck');
	var highCheck = $(this).data('highcheck');
	var lowCheck = $(this).data('lowcheck');
	var loloCheck = $(this).data('lolocheck');
	var drop = $(this).data('drop');
	var plc = $(this).data('plc');
	var rack = $(this).data('rack');
	var slot = $(this).data('slot');
	var channel = $(this).data('channel');
	var memory = $(this).data('memory');
	var pnid = $(this).data('pnid');
	var elec = $(this).data('elec');
	var wireline = $(this).data('wireline');
	var datasheet = $(this).data('datasheet');
	var comment = $(this).data('comment');
	var panel_date = $(this).data('panel-date');
	var panel_note = $(this).data('panel-note');
	var construction_date = $(this).data('construction-date');
	var construction_note = $(this).data('construction-note');
	var hmi_date = $(this).data('hmi-date');
	var hmi_note = $(this).data('hmi-note');
	var plc_date = $(this).data('plc-date');
	var plc_note = $(this).data('plc-note');
	var deleted = $(this).data('deleted');
	var completed = $(this).data('completed');
	var created = $(this).data('created');
	var subproject = $(this).data('subproject');
	
	// Set name as pop-up title
	$(".modal-header h4").html(name);
	
	// Set default values for pop-up tag
	$(".modal-body .id").val(id);
	$(".deficiencies-input-id").val(id);
	$(".modal-body .name").val(name);
	$(".modal-body .description").val(description);
	$(".modal-body .type").val(type);
	$(".modal-body .eu").val(eu);
	$(".modal-body .min").val(min);
	$(".modal-body .max").val(max);
	$(".modal-body .hihi").val(hihi);
	$(".modal-body .high").val(high);
	$(".modal-body .low").val(low);
	$(".modal-body .lolo").val(lolo);
	$("#hihiCheck")[0].checked = hihiCheck;
	$("#highCheck")[0].checked = highCheck;
	$("#lowCheck")[0].checked = lowCheck;
	$("#loloCheck")[0].checked = loloCheck;
	$(".modal-body .drop").val(drop);
	$(".modal-body .plc").val(plc);
	$(".modal-body .rack").val(rack);
	$(".modal-body .slot").val(slot);
	$(".modal-body .channel").val(channel);
	$(".modal-body .memory").val(memory);
	$(".modal-body .pnid").val(pnid);
	$(".modal-body .elec").val(elec);
	$(".modal-body .wireline").val(wireline);
	$(".modal-body .datasheet").val(datasheet);
	$(".modal-body .comment").val(comment);
	$(".modal-body .panel-date").val(panel_date);
	$(".modal-body .construction-date").val(construction_date);
	$(".modal-body .hmi-date").val(hmi_date);
	$(".modal-body .plc-date").val(plc_date);
	$(".modal-body .panel-note").val(panel_note);
	$(".modal-body .construction-note").val(construction_note);
	$(".modal-body .hmi-note").val(hmi_note);
	$(".modal-body .plc-note").val(plc_note);
	$(".modal-body .deleted").val(deleted);
	$(".modal-body .completed").val(completed);
	$(".modal-body .created").val(created);
	$(".modal-body .subproject").val(subproject);
	
	// Select deficiencies table for updates
	var table = document.getElementById("table-deficiencies table-custom-sort");
	
	// Loop through rows in deficiencies-table
	/*for (var i = 1, row; row = table.rows[i]; i++) {
		if ( row.cells[0].innerHTML == id ) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	}*/
	
	// Select audit table for updates
	var table = document.getElementById("table-audits table-custom-sort");
	
	// Loop through rows in audit-table
	for (var i = 1, row; row = table.rows[i]; i++) {
		if ( row.cells[1].innerHTML == id ) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	}
});

//----------------------------------------------------------------------------------------------------
// Routine: #next - click
// Description: Navigate tag modal to "next" tag in sorted list
//----------------------------------------------------------------------------------------------------
$(document).off("click", "#next").on("click", "#next", function() {	
	
	// Load tag table
	var table = document.getElementById("table-tags table-custom-sort");
	
	selectRow = 1;
	setTimeout(function() {$("#close-btn").click();}, 0);
	for (var i = 1, row; row = table.rows[i]; i++) {
		if ( row.cells[0].childNodes[0].childNodes[0].getAttribute("data-id") == $(".modal-body .id").val() && i < table.rows.length - 1 ) {	
			selectRow = i + 1;
			break;
		}
	}
	setTimeout(function() {table.rows[selectRow].cells[0].childNodes[0].childNodes[0].click();}, 500);
});

//----------------------------------------------------------------------------------------------------
// Routine: #prev - click
// Description: Navigate tag modal to "previous" tag in sorted list
//----------------------------------------------------------------------------------------------------
$(document).off("click", "#prev").on("click", "#prev", function() {	
	
	// Load tag table
	var table = document.getElementById("table-tags table-custom-sort");
	
	selectRow = table.rows.length - 1;
	setTimeout(function() {$("#close-btn").click();}, 0);
	for (var i = 1, row; row = table.rows[i]; i++) {
		if ( row.cells[0].childNodes[0].childNodes[0].getAttribute("data-id") == $(".modal-body .id").val() && i > 1 ) {	
			selectRow = i - 1;
			break;
		}
	}
	setTimeout(function() {table.rows[selectRow].cells[0].childNodes[0].childNodes[0].click();}, 500);
});

$(document).on("click", ".panel-date-update", function() {
	var date = new Date();
	$(".modal-body .panel-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".construction-date-update", function() {
	var date = new Date();
	$(".modal-body .construction-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".hmi-date-update", function() {
	var date = new Date();
	$(".modal-body .hmi-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".plc-date-update", function() {
	var date = new Date();
	$(".modal-body .plc-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});


//-------------------------------------------------
$(document).on("click", ".panel-date-btn", function() {
	var date = new Date();
	$(".modal-body .panel-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".construction-date-btn", function() {
	var date = new Date();
	$(".modal-body .construction-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".hmi-date-btn", function() {
	var date = new Date();
	$(".modal-body .hmi-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});

$(document).on("click", ".plc-date-btn", function() {
	var date = new Date();
	$(".modal-body .plc-date").val(date.getFullYear()+'-'+addZero(date.getMonth())+'-'+addZero(date.getDate())+' '+addZero(date.getHours())+':'+addZero(date.getMinutes())+':'+addZero(date.getSeconds()));
});
