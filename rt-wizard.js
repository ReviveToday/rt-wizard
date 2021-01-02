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
	settings.changer.forEach(
		function(entry) {
			document.getElementById( entry ).addEventListener( "change", rtwizz_changer );
		}
	);
}

function rtwizz_changer() {
	settings = RTWIZZ.content;
	settings.involves.forEach(
		function(entry) {
			document.getElementsByClassName( entry )[0].style.display = 'none';
		}
	);

	settings.changer.forEach(
		function(entry) {
			opt = document.getElementById( entry );
			if ( opt.parentElement.style.display !== 'none' ) {
				visible_part = settings.action[ opt.options[ opt.selectedIndex ].value ];
				visibles     = document.getElementsByClassName( visible_part )[0];
				if ( typeof visibles !== 'undefined' ) {
					visibles.style.display = '';
				}
			}
		}
	);
}
