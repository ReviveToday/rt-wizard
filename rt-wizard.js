/**
 * Bespoke conditional wizard/guide setup.
 *
 * @package rt-wizard
 * @author soup-bowl <code@soupbowl.io>
 * @license MIT
 */

data = {
	'1': {
		'changer': 'rtwiz1',
		'involves' : [
			'SF1'
		],
		'action': {
			'1': 'SF1'
		}
	}
}

if ( typeof data[ RTWIZZ.id ] !== 'undefined' ) {
	settings = data[ RTWIZZ.id ];
	rtwizz_changer();
	document.getElementById( settings.changer ).addEventListener( "change", rtwizz_changer );
}

function rtwizz_changer() {
	settings = data[ RTWIZZ.id ];
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
