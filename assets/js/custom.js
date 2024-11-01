jQuery(document).ready(function(){
var checkbox    = myAjax.insurance_opt=='optional' ? '<input type="checkbox" id="optional_s" name="optional_s">':'';
var button_text = myAjax.Policy_text!='' ? myAjax.Policy_text : 'view policy';
var button_color= myAjax.Policy_color!='' ? myAjax.Policy_color : 'red';

    setTimeout(function(){
     jQuery("tr.fee th").append('<span style="color:'+button_color+'" class="view Show_Policy" id="insurance_policy">('+button_text+')</span>');
 }, 1000);
    setTimeout(function(){
     jQuery(".woocommerce-input-wrapper .optional").text('');
 }, 1000);

jQuery('body').on('click','#insurance_policy',function(e){
jQuery('#myModal_policy').show();
});
/*------Close Click-------*/
jQuery('body').on('click','.policy_close',function(e){
jQuery('#myModal_policy').hide();	
});
/*-----------change Event-------*/
// jQuery('body').on('change','#wc_settings_tab_demo_title5',function(e){
// var my_val = jQuery('option:selected',this).val();
// alert(my_val);
// });



});
