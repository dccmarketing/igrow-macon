/**

 * ffo.js
 *
 * Initializes Font Face Observer script.
 */
( function() {
	
	var museo = new FontFaceObserver( 'museo300' );
	
	museo.load().then( function(){
		document.documentElement.className += ' museo-loaded';
	});

} )();
