<?php function shipping_insurance_scripts(){
wp_register_style('shipping_insurance_policy',plugin_dir_url( __FILE__ ).'assets/css/shipping-insurance.css',false,'1.0.0');
wp_enqueue_style('shipping_insurance_policy');
wp_enqueue_script( 'custom_script', plugin_dir_url( __FILE__ ).'assets/js/custom.js', array(), '1.0.0', true );
wp_localize_script('custom_script','myAjax',array(
    'ajaxurl'=>admin_url( 'admin-ajax.php'),
    'siteurl'=> site_url(),
    'stylesheeturi'=>get_stylesheet_directory_uri(),
    'templateuri' =>get_template_directory_uri(),
    'Policy_text' =>get_option('policy_text'),
    'Policy_color'=>get_option('policy_color'),
    'insurance_opt'=>get_option('wc_settings_tab_demo_title3')
   ));	
}
function shipping_insurance_scripts_admin() {
wp_enqueue_script( 'wp-color-picker');
wp_register_style('custom_admin_css',plugin_dir_url( __FILE__ ).'assets/css/custom_style.css',false,'1.0.0');
wp_enqueue_style('custom_admin_css');
wp_enqueue_script( 'custom_script_admin', plugin_dir_url( __FILE__ ).'assets/js/custom-admin.js', array(), '1.0.0', true );
}