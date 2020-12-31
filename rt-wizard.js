/**
 * Bespoke conditional wizard/guide setup.
 *
 * @package rt-wizard
 * @author soup-bowl <code@soupbowl.io>
 * @license MIT
 */

if ( typeof RTWIZZ.content !== 'undefined' ) {
	settings = RTWIZZ.content;
	rtwizz_changer();
	document.getElementById( settings.changer ).addEventListener( "change", rtwizz_changer );
}

function rtwizz_changer() {
	settings = RTWIZZ.content;
	settings.involves.forEach(
		function(entry) {
			document.getElementsByClassName( entry )[0].style.display = 'none';
		}
	);

	opt          = document.getElementById( settings.changer );
	visible_part = settings.action[ opt.options[ opt.selectedIndex ].value ];
	visibles     = document.getElementsByClassName( visible_part )[0];
	if ( typeof visibles !== 'undefined' ) {
		visibles.style.display = '';
	}

	console.log( 'changed', opt.options[ opt.selectedIndex ].value, this.value, settings.action[this.value] );
}
