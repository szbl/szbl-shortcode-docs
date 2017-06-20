<div class="wrapper">

	<h2>Shortcode Documentation</h2>
	<p>Use the drop-down below to view the shortcodes that have custom documentation and read more about them.</p>

	<form id="szbl-shortcode-selector" method="get" action="">
		<input type="hidden" name="page" value="<?php echo esc_attr( $_GET['page'] ); ?>">
		
		Choose a Shortcode:
		<select name="szbl-shortcode" id="szbl-shortcode-select">
			<option value="">- Select -</option>
		
			<?php foreach ( $shortcodes as $shortcode => $data ) : ?> 
			<option value="<?php echo sanitize_title( $shortcode ); ?>"><?php echo "[{$shortcode}]"; ?></option>
			<?php endforeach; ?>

		</select>

		<button class="button button-primary">View Docs</button>

	</form>

	<div id="szbl-shortcode-canvas">

		<?php foreach ( $shortcodes as $shortcode => $data ) include __DIR__ . '/shortcode.php'; ?>

	</div>

</div>

<script>
jQuery(document).ready(function($){
	$( '.szbl-shortcode' ).hide();
	$('#szbl-shortcode-selector button').click(function(){
		$( '.szbl-shortcode' ).hide();
		$( '#' + $( '#szbl-shortcode-select' ).val() ).show();

		$( '.szbl-shortcode textarea.code' ).each(function(){
			console.log( $( this ).prop( 'scrollHeight' ) );
			$( this ).height( $( this ).prop( 'scrollHeight' ) );
		});
		
		return false;
	});
	$( '#szbl-shortcode-select' ).get(0).selectedIndex = 1;
	$('#szbl-shortcode-selector button').click();

});
</script>

<?php include __DIR__ . '/style.css.html';