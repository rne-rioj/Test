$(function() {
	var d = new Date();
		
	$("#client-time").text(Date(d.getTime()));
	$("#client-time-input").val(Math.floor(d.getTime()/1000));
	
	if ( Math.abs($("#client-time-input").val() -$("#server-time-input").val()) > 300 ) {
		document.getElementById("time-row").style.backgroundColor = "red";
	}
	
	$("#compared-time").text(Math.abs($("#client-time-input").val() -$("#server-time-input").val()));
	
});

$("#client-time-btn").on("click", function() {
	var d = new Date();
	var dString = new Date(d.getTime());
	
	$("#client-time").text(Date(d.getTime()));
	$("#client-time-input").val(Math.floor(d.getTime()/1000));
});
