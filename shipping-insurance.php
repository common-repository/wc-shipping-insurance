<?php
/**
 * Plugin Name:  Shipping Insurance WC Addon
 * Plugin URI: https://wordpress.org/plugins/Shipping-Insurance-wc-addon/
 * Description: This plugin adds a Shipping Insurance option in WooCommerce for Products.
* Version: 1.0.6
*  Author: David Myles
 * Author URI: https://www.shippinginsurance.shop/
 * Author Email: admin@shippinginsurance.shop
 * License: GPLv2
 * Text-domain: https://www.shippinginsurance.shop/
*/
function Shipping_insurance_assets(){
include( plugin_dir_path( __FILE__ ) . '/Shipping_insurance_assets.php');
}
add_action( 'plugins_loaded', 'Shipping_insurance_assets' );
/*----------------------------enqueque the frontend style--------------------*/
add_action( 'wp_enqueue_scripts', 'shipping_insurance_scripts' );
/*------------admin---------*/
add_action( 'admin_enqueue_scripts', 'shipping_insurance_scripts_admin' );

add_action( 'woocommerce_settings_tabs_settings_tab_demo', 'shipping_insurance_admin_options' );
function shipping_insurance_admin_options() {
    woocommerce_admin_fields( shipping_insurance_admin_setting_fields() );
}
function shipping_insurance_admin_setting_fields() {
    $shipping_option_admin = array(
        'section_title' => array(
            'name'     => __( 'Shipping Insurance', 'woocommerce-shipping_insurance' ),
            'type'     => 'title',
            'desc'     => '',
            'id'       => 'wc_settings_tab_demo_section_title'
        ),
        'showatcheckout' => array(
            'name' => __( 'Show at Checkout','woocommerce-shipping_insurance'),
            'type'    => 'select',
            'options' => array(
            'yes'     => __( 'Yes', 'woocommerce' ),
            'no'      => __( 'No', 'woocommerce' )),
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title'
        ),
        'costper100' => array(
            'name' => __( 'Cost Per $100', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title2'
        ),
        'minimum_subtotal' => array(
            'name' => __( 'Minimum Order Subtotal', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc_tip' => __('Enter in the minimum amount to start your insurance calculations.Example: If you enter $500,cart total below that amount will not insurance calculated for the cart but any cart total above $500 will begin the calculation for the insurance.'),
			'id'       => 'wcslider_title',
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'minimum_subtotal'
        ),
        
        'forced_optional' => array(
            'name' => __( 'Forced or Optional', 'woocommerce-shipping_insurance' ),
            'type'    => 'select',
            'options' => array(
            'forced'     => __( 'Forced', 'woocommerce' ),
            'optional'      => __( 'Optional', 'woocommerce' )),
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title3'
        ),
        'markup_rate' => array(
            'name' => __( 'Mark up Rate', 'woocommerce-shipping_insurance' ),
            'type'    => 'select',
            'options' => array(
            'yes'     => __( 'Yes', 'woocommerce' ),
            'no'      => __( 'No', 'woocommerce' )),
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title4'
        ),
        'flat_or_percent' => array(
            'name' => __( 'Flat fee or %', 'woocommerce-shipping_insurance' ),
            'type'    => 'select',
            'options' => array(
            'flatrate'     => __( 'Flat', 'woocommerce' ),
            'percentage' => __( '%', 'woocommerce' )),
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title5'
        ),
        'flat_fee' => array(
            'name' => __( 'Flat fee Add on', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title6'
        ),
        'percentage' => array(
            'name' => __( 'Percentage Markup', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title7'
        ),
        'popup_description' => array(
            'name' => __( 'Show Insurance info pop-up', 'woocommerce-shipping_insurance' ),
            'type' => 'textarea',
            'desc' => __( '' ),
            'id'   => 'wc_settings_tab_demo_description'
        ),
        'minimum' => array(
            'name' => __( 'Minimum Charge To Show', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '', 'woocommerce-shipping_insurance' ),
            'id'   => 'wc_settings_tab_demo_title8'
        ),
        'policy_text' => array(
            'name' => __( 'View Policy Text', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '<p style="color: #cccccc"><i>Default is "View Policy".</i></p>', 'woocommerce-shipping_insurance' ),
            'id'   => 'policy_text'
        ),
        'shipping_insurance_text' => array(
            'name' => __( 'Shipping Insurance Text', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '<p style="color: #cccccc"><i>Default is "Shipping Insurance".</i></p>', 'woocommerce-shipping_insurance' ),
            'id'   => 'shipping_insurance_text'
        ),
        'policy_color' => array(
            'name' => __( 'Policy Text Color', 'woocommerce-shipping_insurance' ),
            'type' => 'text',
            'desc' => __( '<p style="color: #cccccc"><i>Please Choose a Policy Text color.default is "#f0f0f0".</i></p>', 'woocommerce-shipping_insurance' ),
            'class'   => 'colour_selections',
            'id'   => 'policy_color'
        ),
        'section_end' => array(
             'type' => 'sectionend',
             'id' => 'wc_settings_tab_demo_section_end'
        )
    );
    return apply_filters( 'wc_settings_tab_demo_settings',$shipping_option_admin);
}
add_action( 'woocommerce_update_options_settings_tab_demo', 'update_settings' );
function update_settings() {
    woocommerce_update_options( shipping_insurance_admin_setting_fields() );
}
//class WC_Settings_Tab_Demo {
    //public static function init() {
        add_filter( 'woocommerce_settings_tabs_array','add_shipping_insurance_settings_tab',50);
    //}
    function add_shipping_insurance_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_demo'] = __( 'Shipping Insurance', 'woocommerce-shipping_insurance' );
        return $settings_tabs;
    }
//}
/*----------------------*/
add_action( 'woocommerce_cart_calculate_fees', 'woocommerce_shipping_insurance_calculation', 10, 1 );
function woocommerce_shipping_insurance_calculation( $cart_object ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

    // The percetage
    $percent = 15; // 15% 
    // The cart total
    $cart_total = $cart_object->cart_contents_total; 
    $cost_per_100   = get_option('wc_settings_tab_demo_title2')!='' ?get_option('wc_settings_tab_demo_title2') : 0;
    $minimum_charge = get_option('wc_settings_tab_demo_title8');
    $forced         = get_option('wc_settings_tab_demo_title3');
    $markup_type    = get_option('wc_settings_tab_demo_title5');
    $prcntage_markup= get_option('wc_settings_tab_demo_title7');
    $flat_markup    = get_option('wc_settings_tab_demo_title6');
    $markup_rate    = get_option('wc_settings_tab_demo_title4');
    $mini_subtotal  = get_option('minimum_subtotal');
    $shipping_insura= get_option('shipping_insurance_text')!='' ? get_option('shipping_insurance_text') : 'Shipping Insurance';
    
    $fee            = 0;
    //if($cart_total >= 100){
    if($markup_rate=='yes'){ //mark up rate is 'yes'
    //mark up is 'percentage'
    if($markup_type == 'percentage')
    {       if($prcntage_markup!='')
    	    {
	    	    $calculated_cost = $cost_per_100 * $prcntage_markup /100;
			    $pecntg_fee      = $calculated_cost + $cost_per_100;
			    $fee             = $pecntg_fee < $minimum_charge ? $minimum_charge : $pecntg_fee;
            }else
            {
	            $calculated_cost= $cost_per_100 * $cart_total /100;	
			    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;

            }
    }
    //mark up is 'flat rate'
    else
    {       if($flat_markup!='')
			{
				$flat_fee = $flat_markup + $cost_per_100;
				$fee      = $flat_fee < $minimum_charge ? $minimum_charge : $flat_fee;
            }else
            {
            	$calculated_cost= $cost_per_100 * $cart_total /100;	
			    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;
            }
		    
    }
    }//value not Null
    else
    {
            $calculated_cost= $cost_per_100 * $cart_total /100;	
		    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;
    }
    // The conditional Calculation
    $show_on_checkout = Option_to_hide_shipping_insurance($percent);
    //get_option('wc_settings_tab_demo_title');
    if ($show_on_checkout == '' || $show_on_checkout == 'yes') 
    	if($cart_total>=$mini_subtotal){
           if($forced == '' || $forced =='forced')
           { 
    		$cart_object->add_fee( __($shipping_insura, "woocommerce" ), $fee, false );
            }
    		//else{
           // 	$cart_object->add_fee( __($shipping_insura, "woocommerce" ), $fee, false );
           // }
    	}
}
/*---------------Check Checkout-------*/
function Option_to_hide_shipping_insurance($bool)
 {
     if (is_checkout() || is_cart()) {
     	$show_checkout = get_option('wc_settings_tab_demo_title');
        return $show_checkout;
     }
     return $bool;
 }
/*add popup Content*/
add_action( 'wp_footer', 'shipping_insurance_View_policy_Content', 1);
function shipping_insurance_View_policy_Content($content){
?>
 <div id="myModal_policy" class="modal_policy" style="display: none;">
        <div class="modal-content">
        <span class="policy_close">x</span>
        <?php echo get_option('wc_settings_tab_demo_description'); ?>
 </div>
</div>
<?php }
// Part 2: reload checkout on payment gateway change 

add_action( 'woocommerce_review_order_before_payment', 'add_Shipping_option_to_checkout_optional' );
function add_Shipping_option_to_checkout_optional( $checkout ) {
$forced         = get_option('wc_settings_tab_demo_title3');
global $woocommerce;
    // Will get you cart object
$cart_amount = $woocommerce->cart->total;
$mini_subtotal  = get_option('minimum_subtotal');
if($cart_amount>=$mini_subtotal){
if($forced=='optional'){	
    echo '<div id="message_fields">';
    woocommerce_form_field( 'shipping_insurance_box', array(
        'type'          => 'checkbox',
        'class'         => array('shipping_insurance_box form-row-wide'),
        'label'         => __('Shipping Insurance'),
        'placeholder'   => __(''),
        )
    //, $checkout->get_value( 'shipping_insurance_box' )
);
        echo '</div>';
    }
}
}
add_action( 'wp_footer', 'woocommerce_add_gift_box' );
function woocommerce_add_gift_box() {
    if (is_checkout()) {
    ?>
    <script type="text/javascript">
    jQuery( document ).ready(function( $ ) {
    	var checkbox    = myAjax.insurance_opt=='optional' ? '<input type="checkbox" id="optional_s" name="optional_s">':'';
var button_text = myAjax.Policy_text!='' ? myAjax.Policy_text : 'view policy';
var button_color= myAjax.Policy_color!='' ? myAjax.Policy_color : 'red';

        jQuery('input#shipping_insurance_box').click(function(){
            jQuery('body').trigger('update_checkout');
            setTimeout(function(){
     jQuery("tr.fee th").append('<span style="color:'+button_color+'" class="Show_Policy" id="insurance_policy">('+button_text+')</span>');
 }, 1000);
        });
    });
    </script>
    <?php
    }
}
add_action( 'woocommerce_cart_calculate_fees', 'shipping_insurance_On_checkout' );
function shipping_insurance_On_checkout( $cart ){
$shipping_insura= get_option('shipping_insurance_text')!='' ? get_option('shipping_insurance_text') : 'Shipping Insurance';
        if ( ! $_POST || ( is_admin() && ! is_ajax() ) ) {
        return;
    }

    if ( isset( $_POST['post_data'] ) ) {
        parse_str( $_POST['post_data'], $post_data );
    } else {
        $post_data = $_POST; // fallback for final checkout (non-ajax)
    }

    if (isset($post_data['shipping_insurance_box'])) {
        // The percetage
    $percent = 15; // 15% 
    // The cart total
    $cart_total =0;
    foreach( WC()->cart->get_cart() as $item ){ 
        $cart_total += $item["line_total"];
    }
    $cost_per_100   = get_option('wc_settings_tab_demo_title2')!='' ?get_option('wc_settings_tab_demo_title2') : 0;
    $minimum_charge = get_option('wc_settings_tab_demo_title8');
    $forced         = get_option('wc_settings_tab_demo_title3');
    $markup_type    = get_option('wc_settings_tab_demo_title5');
    $prcntage_markup= get_option('wc_settings_tab_demo_title7');
    $flat_markup    = get_option('wc_settings_tab_demo_title6');
    $markup_rate    = get_option('wc_settings_tab_demo_title4');
    $mini_subtotal  = get_option('minimum_subtotal');
    $shipping_insura= get_option('shipping_insurance_text')!='' ? get_option('shipping_insurance_text') : 'Shipping Insurance';
    
    $fee            = 0;
    //if($cart_total >= 100){
    if($markup_rate=='yes'){ //mark up rate is 'yes'
    //mark up is 'percentage'
    if($markup_type == 'percentage')
    {       if($prcntage_markup!='')
    	    {
	    	    $calculated_cost = $cost_per_100 * $prcntage_markup /100;
			    $pecntg_fee      = $calculated_cost + $cost_per_100;
			    $fee             = $pecntg_fee < $minimum_charge ? $minimum_charge : $pecntg_fee;
			    //$fee =11;
            }else
            {
	            $calculated_cost= $cost_per_100 * $cart_total /100;	
			    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;
			    //$fee =22;

            }
    }
    //mark up is 'flat rate'
    else
    {       if($flat_markup!='')
			{
				$flat_fee = $flat_markup + $cost_per_100;
				$fee      = $flat_fee < $minimum_charge ? $minimum_charge : $flat_fee;
				//$fee =33;
            }else
            {
            	$calculated_cost= $cost_per_100 * $cart_total /100;	
			    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;
			    //$fee =44;
            }
		    
    }
    }//value not Null
    else
    {
            $calculated_cost= $cost_per_100 * $cart_total /100;	
		    $fee = $calculated_cost < $minimum_charge ? $minimum_charge : $calculated_cost;
		    //$fee =$minimum_charge;
    }
        // not sure why you used intval($_POST['state']) ?
        if($cart_total>=$mini_subtotal){
        WC()->cart->add_fee($shipping_insura,$fee );
         }
    }

}