jQuery(document).ready(function(){
jQuery('#wc_settings_tab_demo_title6').parent().parent().addClass('flatrate');
jQuery('#wc_settings_tab_demo_title7').parent().parent().addClass('percentage');
/*---colorpicker----*/
jQuery('.colour_selections').wpColorPicker();
/*-----------change Event-------*/
jQuery('body').on('change','#wc_settings_tab_demo_title5',function(e){
var my_val = jQuery('option:selected',this).val();
jQuery('.flatrate,.percentage').hide();
jQuery('.'+my_val).show();
});



});
