<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see           http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
$product_new = get_post_meta( $post->ID, 'thim_product_new', true );
$product_hot = get_post_meta( $post->ID, 'thim_product_hot', true );

?>

<?php
echo '<div class="list-sale-flash">';
if ( $product_hot != 'no' && $product_hot != '' ) {
	echo '<svg version="1.1" class="svg_image" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="109.173px" height="110px" viewBox="0 0 109.173 110" enable-background="new 0 0 109.173 110" xml:space="preserve">
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#96281B" d="M12.456,5.682c0,0-1.136-1.053-2.446-2.248
		C9.682,3.133,9.342,2.823,9.006,2.52C7.584,1.229,6.268,0,6.268,0L0,5.682H12.456z"/>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#96281B" d="M103.236,110c0,0,1.1-1.103,2.35-2.372
		c0.313-0.318,0.638-0.648,0.954-0.973c1.348-1.38,2.633-2.658,2.633-2.658l-5.937-6.079V110z"/>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#EF4836" d="M6.173,0c0,0,2.739,2.242,7.061,6.615
		c13.345,13.507,43.386,43.972,66.391,67.307c16.833,17.073,29.549,30.063,29.549,30.063V69.737L40.142,0H6.173z"/>
		</svg>';
	echo '<div class = "special-product">';
	echo '<span class="hot">' . esc_html__( 'Hot', 'coaching' ) . '</span>';
	echo '</div>';
} else {
	if ( $product->is_on_sale() ) {
		echo '<svg version="1.1" class="svg_image" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="109.173px" height="110px" viewBox="0 0 109.173 110" enable-background="new 0 0 109.173 110" xml:space="preserve">
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#287C90" d="M12.456,5.682c0,0-1.136-1.053-2.446-2.248
		C9.682,3.133,9.342,2.823,9.006,2.52C7.584,1.229,6.268,0,6.268,0L0,5.682H12.456z"/>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#287C90" d="M103.236,110c0,0,1.1-1.103,2.35-2.372
		c0.313-0.318,0.638-0.648,0.954-0.973c1.348-1.38,2.633-2.658,2.633-2.658l-5.937-6.079V110z"/>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#57BF90" d="M6.173,0c0,0,2.739,2.242,7.061,6.615
		c13.345,13.507,43.386,43.972,66.391,67.307c16.833,17.073,29.549,30.063,29.549,30.063V69.737L40.142,0H6.173z"/>
		</svg>';
		echo '<div class="special-product">';
		$price = $product->get_regular_price();
		$sale_price = $product->get_sale_price();
		//$sale_percent = round (($price - $sale_price)/$price * 100,0);
		echo apply_filters( 'woocommerce_sale_flash', '<span class="sale">' . esc_html__( 'Sale', 'coaching' ). '</span>', $post, $product );
		echo '</div>';
	} else {
		if ( $product_new != 'no' && $product_new != '' ) {
			echo '<svg version="1.1" class="svg_image" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="109.173px" height="110px" viewBox="0 0 109.173 110" enable-background="new 0 0 109.173 110" xml:space="preserve">
			<path fill-rule="evenodd" clip-rule="evenodd" fill="#f89406" d="M12.456,5.682c0,0-1.136-1.053-2.446-2.248
			C9.682,3.133,9.342,2.823,9.006,2.52C7.584,1.229,6.268,0,6.268,0L0,5.682H12.456z"/>
			<path fill-rule="evenodd" clip-rule="evenodd" fill="#f89406" d="M103.236,110c0,0,1.1-1.103,2.35-2.372
			c0.313-0.318,0.638-0.648,0.954-0.973c1.348-1.38,2.633-2.658,2.633-2.658l-5.937-6.079V110z"/>
			<path fill-rule="evenodd" clip-rule="evenodd" fill="#fbb450" d="M6.173,0c0,0,2.739,2.242,7.061,6.615
			c13.345,13.507,43.386,43.972,66.391,67.307c16.833,17.073,29.549,30.063,29.549,30.063V69.737L40.142,0H6.173z"/>
			</svg>';
			echo '<div class="special-product">';
			echo '<span class="new">' . esc_html__( 'New', 'coaching' ) . '</span>';
			echo '</div>';
		}
	}
}
echo '</div>';
?>