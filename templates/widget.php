<?php
/**
 * The template for the secrets widget.
 *
 * @package MITlib Secrets Widget
 * @since 0.1.0
 */

?>

<p>The following secrets have been defined for this application / environment:</p>
<ul>
<?php
foreach ( array_keys( $data ) as $item ) {
	echo( '<li>' . esc_html( $item ) . '</li>' );
}
?>
</ul>
