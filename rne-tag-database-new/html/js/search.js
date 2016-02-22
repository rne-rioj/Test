$(".search").keyup( function() {

	// Get current search string
	var searchString = $(".search").val().toLowerCase();

	// Select tag table
	var table = document.getElementById("table-custom-sort");
	
	
	
	// Loop through rows in tag-table
	for (var i=1, row; row=table.rows[i]; i++) {
		
		var out;
		for (var j in row) {
			out += j + ": " + row[j] + "\n";
		}
		
		alert(row.cells[21].innerHTML);
		
		var tag = row.cells[2].innerHTML;
		var description = row.cells[3].innerHTML;
		var memory = row.cells[17].innerHTML;
		
		var tag = row.cells[0].childNodes[0].childNodes[0].innerHTML.toLowerCase();	// Tag name
		var description = row.cells[1].childNodes[0].innerHTML.toLowerCase();		// Tag description
		var memory = row.cells[15].childNodes[0].innerHTML.toLowerCase();			// PLC Memory address

		if ( tag.indexOf(searchString) > -1 || description.indexOf(searchString) > -1 || memory.indexOf(searchString) > -1) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	}
});
