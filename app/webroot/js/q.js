qarket = {
	baseURL: "/dev"
};

yepnope({
  test : Modernizr.inputtypes && Modernizr.inputtypes.date,
  nope : [
	qarket.baseURL + '/js/jquery-ui-1.8.18.js',
	qarket.baseURL + '/css/jquery-ui-1.8.18.css'
  ],
  complete: function() {
	$( ".hasDatePicker" ).datepicker();
  }
});

