<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
<input id="booking_from_date" class="form-control" name="booking_from_date" type="text" value="" />
<input id="booking_to_date" class="form-control" name="booking_to_date" type="text" value="" />
</body>
<script type="text/javascript">
$( function() {
var dateToday = new Date();
var dateFormat = "mm/dd/yy";
beginDate = $( "#booking_from_date" )
.datepicker({
 
changeMonth: true,
minDate:dateToday
 
})
.on( "change", function() {
endDate.datepicker( "option", "minDate", getDate( this ) );
}),
endDate = $( "#booking_to_date" ).datepicker({
 
changeMonth: true,
minDate:dateToday
 
})
.on( "change", function() {
beginDate.datepicker( "option", "maxDate", getDate( this ) );
});
function getDate( element ) {
var date;
try {
date = $.datepicker.parseDate( dateFormat, element.value );
} catch( error ) {
date = null;
}
return date;
}
} );
</script>
</html>