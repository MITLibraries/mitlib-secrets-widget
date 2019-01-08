<?php
/**
 * The template for the secrets widget.
 *
 * @package MITlib Secrets Widget
 * @since 0.1.0
 */

?>

<p>The following secrets have been defined for this application / environment:</p>
<pre>
<?php print_r( array_keys( $data ) ); ?>
</pre>
