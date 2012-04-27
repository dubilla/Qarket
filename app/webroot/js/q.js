yepnope({
  test : Modernizr.inputtypes && Modernizr.inputtypes.date,
  nope : [
	'jquery-ui-1.8.18.js',
	'jquery-ui-1.8.18.css'
  ]
});