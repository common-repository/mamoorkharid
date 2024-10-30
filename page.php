<?php 
 /**
 Plugin Name: mamoorkharid
 Plugin URI: http://mamourkharid.com
 Description: موتور جستجو و استعلام قیمت مأمور خرید
 Author: movahedian1@gmail.com
 Version: 2.5.7
 Author URI: mamourkharid.com
 */
 
 
add_action('admin_menu', 'mkh_search_setup_menu');

function mkh_search_setup_menu(){
add_menu_page( 'Mamoorkharid Plugin page', 'مامور خرید', 'manage_options', 'test-plugin', 'mkh_test_init' );
}

function mkh_test_init(){
echo "<h1>راهنمای استفاده</h1>";
echo "<div>";
echo "<br>";echo "<br>";echo "<br>";
echo "برای استفاده از موتور جستجوی مامور خرید از شورتکد زیر استفاده کنید";
echo "<br>";echo "<br>";echo "<br>";
echo "<div style='padding: 10px 61px; direction: ltr; margin: 10px; border: 1px solid gray;'>";
echo "<code>";
echo 'do_shortcode( "[mkh_search]" )';
echo "<br>";
echo "[mkh_search]";
echo "</code>";
echo "</div>";
echo "<br><br>";
echo "</div>";

if(!get_option('mb_CultureId_code'))
	update_option('mb_CultureId_code', 'IR');


if(!get_option('mb_LocationCultureId_code'))
	update_option('mb_LocationCultureId_code', 'IR');


if(!get_option('mb_lid_code'))
	update_option('mb_lid_code', '1');


$newnonce = wp_create_nonce( 'mkh_nonce' );
$nonce = $_REQUEST['_wpnonce'];
if( current_user_can( 'administrator' ) && wp_verify_nonce( $nonce, 'mkh_nonce' )){
	if (isset($_POST['moaref'])){
		update_option('mb_moaref', sanitize_text_field($_POST['moaref']));
		//echo "با موفقیت ذخیره شد.";
		
	}
	if (isset($_POST['vije'])){
		update_option('mb_vije', sanitize_text_field($_POST['vije']));
		//echo "با موفقیت ذخیره شد.";
		
	}	
	if (isset($_POST['top-text'])){
		update_option('mb_top-text', sanitize_text_field($_POST['top-text']));
		//echo "با موفقیت ذخیره شد.";
		
	}
	if (isset($_POST['CultureId_code'])){
		update_option('mb_CultureId_code', sanitize_text_field($_POST['CultureId_code']));
		//echo "با موفقیت ذخیره شد.";
		
	}		
	if (isset($_POST['LocationCultureId_code'])){
		update_option('mb_LocationCultureId_code', sanitize_text_field($_POST['LocationCultureId_code']));
		//echo "با موفقیت ذخیره شد.";
		
	}	
	if (isset($_POST['lid_code'])){
		update_option('mb_lid_code', sanitize_text_field($_POST['lid_code']));
		//echo "با موفقیت ذخیره شد.";
		
	}	
	if (isset($_POST['font-top-text'])){
		update_option('mb_font-top-text', sanitize_text_field($_POST['font-top-text']));
		//echo "با موفقیت ذخیره شد.";
		
	}
	if (isset($_POST['color-top-text'])){
		update_option('mb_color-top-text', sanitize_text_field($_POST['color-top-text']));
		//echo "با موفقیت ذخیره شد.";
		
	}	
	if (isset($_POST['bot-text'])){
		update_option('mb_bot-text', sanitize_text_field($_POST['bot-text']));
		//echo "با موفقیت ذخیره شد.";
		
	}
	if (isset($_POST['font-bot-text'])){
		update_option('mb_font-bot-text', sanitize_text_field($_POST['font-bot-text']));
		//echo "با موفقیت ذخیره شد.";
		
	}	
	if (isset($_POST['help_link'])){
		update_option('mb_help_link', sanitize_text_field($_POST['help_link']));
		//echo "با موفقیت ذخیره شد.";
		
	}		
	if (isset($_POST['help_link_color'])){
		update_option('mb_help_link_color', sanitize_text_field($_POST['help_link_color']));
		//echo "با موفقیت ذخیره شد.";
		
	}		
	if (isset($_POST['load_bootstrap'])){
		update_option('mb_load_bootstrap', true);
		//echo "با موفقیت ذخیره شد.";
		
	}else{
	    update_option('mb_load_bootstrap', false);
	}
	if (isset($_POST['other_site'])){
		update_option('mb_other_site', sanitize_text_field($_POST['other_site']));
		//echo "با موفقیت ذخیره شد.";
		
	}		
	if (isset($_POST['font-tab-text'])){
		update_option('mb_font-tab-text', sanitize_text_field($_POST['font-tab-text']));
		//echo "با موفقیت ذخیره شد.";
		echo "<div id='setting-error-settings_updated' class='updated settings-error notice is-dismissible'> 
	<p><strong>تنظیمات ذخیره شد.</strong></p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>بستن این اعلان.</span></button></div>";
		
	}
} else {
	echo "permission deny!";
}

?>

<div class="wrap">
	<form action="" method="post">
		<label>کد معرّف</label>
		<input type="text" name="moaref" value="<?php echo get_option('mb_moaref', '1'); ?>">
		<br>		
		<label>فعالسازی بخشهای ویژه</label>
		<input type="text" name="vije" value="<?php echo get_option('mb_vije', ''); ?>">
		<br>		
		<?php if ( get_option( "mb_vije" ) == "salamsalam*"){ ?>
		<label>CultureId</label>
		<input type="text" name="CultureId_code" value="<?php echo get_option('mb_CultureId_code', 'IR'); ?>">
		<br>
		<label>LocationCultureId</label>
		<input type="text" name="LocationCultureId_code" value="<?php echo get_option('mb_LocationCultureId_code', 'IR'); ?>">
		<br>		
		<label>LID</label>
		<input type="text" name="lid_code" value="<?php echo get_option('mb_lid_code', '1'); ?>">
		<br>	
		<?php } ?>
		<label>متن بالایی</label>
		<input type="text" name="top-text" value="<?php echo get_option('mb_top-text', 'مولتی جستجوی کالا از مرکزبازار و استعلام قیمت از مأمورخرید'); ?>">
		<br>
		<label>فونت متن بالایی</label>
		<input type="text" name="font-top-text" value="<?php echo get_option('mb_font-top-text', '13px'); ?>">
		<br>
		<label>رنگ متن بالایی</label>
		<input type="text" name="color-top-text" class="color-picker" value="<?php echo get_option('mb_color-top-text', '#004bfe'); ?>">
		<br>		
		<label>متن پایینی</label>
		<input type="text" name="bot-text" value="<?php echo get_option('mb_bot-text', 'تهیه و رسیدن به قیمت واقعی هر کالا یا خدمات در لحظه از هزاران متخصص و عرضه کننده'); ?>">
		<br>
		<label>فونت متن پایینی</label>
		<input type="text" name="font-bot-text" value="<?php echo get_option('mb_font-bot-text', '12px'); ?>">
		<br>		
		<label>فونت تبها</label>
		<input type="text" name="font-tab-text" value="<?php echo get_option('mb_font-tab-text', '15px'); ?>">
		<br>	
		<label>لینک راهنما</label>
		<input type="text" name="help_link" value="<?php echo get_option('mb_help_link', 'http://markazbazar.com/motor'); ?>">
		<br>		
		<label>رنگ لینک راهنما</label>
		<input type="text" name="help_link_color" value="<?php echo get_option('mb_help_link_color', 'red'); ?>">
		<br>		
		<label>وب سرویس دلخواه برای قرارگیری در موتور جستجو</label>
		<input type="text" name="other_site" value="<?php echo get_option('mb_other_site', ''); ?>">
		<br>		
		<span>برای اینکه بتوانید سایت دلخواه خود را در نتایج جستجوی موتورجستجو قرار دهید لازم است تا آدرس وبسرویس آنرا در فیلد بالا وارد کنید</span>
		<br>
		<span>در انتهای وبسرویس کلمه مورد نظر ارسال میشود<span>
		<br>
		<span>نتایج باید به صورت زیر برگردانده شود:</span>
		<br>
		<span>Array [ {"link":"http://test","title":"title test"}, Object, ... ]</span>
		<br>		
		<label>لود بوت‌استرپ (بطور معمول نیازی نیست!)</label>
		<input type="checkbox" name="load_bootstrap" <?php checked( '1', get_option( 'mb_load_bootstrap' ) ); ?>>
		<br>				
		<input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo $newnonce ?>" />
		<input type="submit" value="ذخیره">
	</form>
</div>

<?php

}
 
function mkh_js_adds_to_the_head() {
    wp_register_script( 'add-js', plugin_dir_url( __FILE__ ) . 'javascript.js', array('jquery'),'',true  ); 
    wp_enqueue_script( 'add-js' );
	$other_site = get_option('mb_other_site', '');
	wp_localize_script( "add-js", "other_site", $other_site);
	
	$CultureId = get_option('mb_CultureId_code', '');
	wp_localize_script( "add-js", "CultureId", $CultureId);			
	
	$LocationCultureId = get_option('mb_LocationCultureId_code', '');
	wp_localize_script( "add-js", "LocationCultureId", $LocationCultureId);		
	
	$lid = get_option('mb_lid_code', '');
	wp_localize_script( "add-js", "lid", $lid);	
	
	//wp_enqueue_script( 'bootstapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', false, null );
}
add_action( 'wp_enqueue_scripts', 'mkh_js_adds_to_the_head' ); 


 
function mkh_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style1', $plugin_url . 'stylesheet.css' );

}
add_action( 'wp_enqueue_scripts', 'mkh_load_plugin_css' );
 
 
function mkh_add_search( $atts ) {
	//wp_enqueue_script('jquery');
	if ( get_option( "mb_load_bootstrap" ) == true){
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), '3.3.4', true );	
    }
//wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
?>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script>
function addURL(element)
{
    jQuery(element).attr('href', function() {
		if (this.href.includes("repId")){
			return this.href;
		}else{
			return this.href + '&repId=<?php echo get_option('mb_moaref', '1') ?>';
		}
    });
}
</script>
<?php

return "<div class='mamoorkharid' style='max-width: 600px;'>
  <ul class='nav nav-tabs'>
	<li class='tooltips' style='float: right; position:absolute; font-size:".get_option('mb_font-top-text')."; color:".get_option('mb_color-top-text')."'>".get_option('mb_top-text')."<span class='tooltipstext'>
	<br>مولتی جستجو
<br>این موتور تمامی کارهای روزمره خرید و فروش شما را به نحواحسنت انجام میدهد<br>
از انتخاب بهترین کالا یا خدمات از هزاران عرضه کننده مرکزبازار تا رسیدن به بهترین قیمت توسط مامورخرید و عرضه مستقیم کالا یا خدمات
	</span></li>
	<li class='active tooltips'><a href='#menu1002' style='font-size:".get_option('mb_font-tab-text')."; border-top-right-radius: 0; border-right: 1px solid #ccc;'>سفارش</a><span class='tooltipstext'>
	چنانچه کالا یا خدمات خود را مشخص کرده اید و بدنبال قیمت واقعی آن هستید پس از کلیک این دکمه، نام یا گروه شغلی کالا یا خدمات را در کادر درج و به مامورخرید سفارش دهید.<br>
پس از چند لحظه با پیشنهادات عرضه کنندگان روبرو و بعد انتخاب بدون واسطه خرید کنید.
	</span></li>
    <li class='tooltips'><a href='#menu1001' style='font-size:".get_option('mb_font-tab-text')."; border-top-right-radius: 0;border-top-left-radius: 0;'>ثبت شغل</a><span class='tooltipstext'>
	صاحب هرشغل و یا حرفه ای که هستید، نام گروه شغلی خود را پس از کلیک روی اینجا در کادر وارد کرده و با ثبت نام در مامورخرید برایتان مشتری بفرستیم
	</span></li>
	<li class='tooltips'><a href='#menu1003' style='font-size:".get_option('mb_font-tab-text')."; border-top-left-radius: 0; border-left: 1px solid #ccc;'>جستجوی کالا</a><span class='tooltipstext'>
	برای انتخاب، کالا یا خدمات درخواستی خود اینجا را کلیک و سپس نام کالا یا خدمات مورد نظر را درج نمایید
	</span></li>
   
  </ul>

  <div class='tab-content'>
	<span class='search-icon'>
		<button  type='button' style='cursor:pointer'>
			<img src='". plugin_dir_url( __FILE__ ) ."search.png'>
		</button>
	</span>
    <div id='menu1002' class='tab-pane fade in active'>
		<form>
		<input type='text' name='searchinrequest' placeholder='برای سفارش کالا یا خدمات کلمه مورد نظر را جستجو نمایید'>
		 <div id='livesearchrequest' class='search-result' style=''></div>
		</form>	        
    </div>
    <div id='menu1001' class='tab-pane fade'>
		<form>
		<input type='text' name='searchinjob' placeholder='برای ثبت شغل مورد نظر خود کلمه ای تایپ کنید'>
		 <div id='livesearchjob' class='search-result' style=''></div>
		</form>	  
    </div>
    <div id='menu1003' class='tab-pane fade'>
		<form>
		<input type='text' name='searchinproducts' placeholder='برای جستجوی کالا مورد نظر کلمه ای تایپ نمایید'>
		 <div id='livesearchproducts' class='search-result' style=''></div>
		</form>	  
    </div>	
  </div>
  <div style='color: #ccc;'>
  	<a style='float: right; color: #ccc; font-size:".get_option('mb_font-bot-text')."; width: 100%;text-align: center;'>".get_option('mb_bot-text')."</a>
	<a  target='_blank' href='".get_option('mb_help_link')."' style='float: left; color: ".get_option('mb_help_link_color')."; font-size:10px'>معرّفی و راهنمایی مولتی موتور</a>
  </div>
</div>";




}

add_shortcode( 'mkh_search', 'mkh_add_search' );

 
?>