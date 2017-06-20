<div class="szbl-shortcode" id="<?php echo sanitize_title( $shortcode ); ?>">

	<h2>[<?php echo esc_html( $shortcode ); ?>]</h2>
	<?php echo wpautop( $data['description'] . "\n<hr>" ); ?>

	<?php if ( $data['content'] ) : $data['closing_required'] = true; ?>
	
	<h3>Notes on Content</h3>
	<?php echo wpautop( $data['content'] ); ?>
	
	<?php else : ?>
	
		<!-- nothing -->

	<?php endif; ?>

	<?php
		if ( $data['closing required'] )
			echo '<p><em>The closing shortcode tag is required: <code>[/' . $shortcode . '].</em></p>'; 
	?>

	<h3>Attributes List</h3>
	
	<?php if ( is_array( $data['atts'] ) && count( $data['atts'] ) > 0 ) : ?>

		<p>The following attributes are available:</p>

		<table class="widefat fixed">
		<thead>
		<tr>
			<th>Attribute</th>
			<th>Description</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $data['atts'] as $att => $desc ) : ?>
		<tr>
			<td><code><?php echo esc_html( $att ); ?></code></td>
			<td><?php echo wpautop( $desc ); ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>

	<?php else : ?>

	<p><em>There are no available attributes.</em></p>

	<?php endif; ?>

	<hr>

	<h3>Example Usage:</h3>

	<p>Examples are based on the entry in the <strong>Text</strong> editor, not the <strong>Visual</strong> editor.

	<?php if ( is_array( $data['examples'] ) && count( $data['examples'] ) > 0 ) : foreach ( $data['examples'] as $example ) : ?>

	<textarea class="code"><?php echo esc_textarea( $example ); ?></textarea><hr>

	<?php endforeach; else: ?>

	<textarea class="code">[<?php 
		echo $shortcode; 
		if ( is_array( $data['atts'] ) && count( $data['atts'] ) > 0 )
		{
			foreach ( $data['atts'] as $att => $desc )
			{
				echo ' ' . $att . '="someval"';
			}
		}
	?>]</textarea>

	<?php endif; ?>
	</ul>
</div>