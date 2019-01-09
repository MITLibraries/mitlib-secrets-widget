<?php
/**
 * The template for the secrets widget.
 *
 * @package MITlib Secrets Widget
 * @since 0.1.0
 */

?>

<p>The following secrets have been defined for this application / environment:</p>
<table>
	<thead>
		<tr>
			<th scope="col">Key</th>
			<th scope="col">Value</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach ( $data as $key => $value ) {
	echo( '<tr>' );
	echo( '<td>' . esc_html( $key ) . '</td>' );
	echo( '<td>' . esc_html( $value ) . '</td>' );
	echo( '</tr>' );
}
?>
	</tbody>
</table>
