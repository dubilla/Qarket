qarket = {
	baseURL: "",
	setBaseURL: function() {
		if (window.location.hostname == "localhost") {
			this.baseURL = "/projects/qarket";
		} else {
			this.baseURL = "/dev";
		}
	},
	init: function() {
		this.setBaseURL();
	}
};

qarket.init();

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

$('.carousel').carousel({
  interval: 3500
})