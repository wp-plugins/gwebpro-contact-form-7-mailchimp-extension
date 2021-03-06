<?php
function wpcf7_mch_save_mailchimp($args) {
	update_option( 'cf7_mch_'.$args->id, $_POST['wpcf7-mailchimp'] );
}
add_action( 'wpcf7_after_save', 'wpcf7_mch_save_mailchimp' );


function add_mch_meta () {
	if ( wpcf7_admin_has_edit_cap() ) 
	{
		add_meta_box( 'cf7cmdiv', __( 'Mailchimp Settings <a href="http://www.gwebpro.com/gwebpro-mailchimp-cf7-extension" class="helping-hand" target="_blank">Need Help?</a>', 'wpcf7' ),
			'wpcf7_mch_add_mailchimp', 'cfseven', 'cf7_mch', 'core',
			array(
				'id' => 'wpcf7-cf7',
				'name' => 'cf7_mch',
				'use' => __( 'Use Mail Chimp', 'wpcf7' ) ) );
	}
}
add_action( 'wpcf7_add_meta_boxes', 'add_mch_meta' );


function show_mch_metabox($cf) {
	do_meta_boxes( 'cfseven', 'cf7_mch', $cf );
}
add_action( 'wpcf7_admin_after_mail_2', 'show_mch_metabox' );


function wpcf7_mch_add_mailchimp($args) {
	$cf7_mch_defaults = array();
	$cf7_mch = get_option( 'cf7_mch_'.$args->id, $cf7_mch_defaults );
	
?>  

<div class="mail-fields">

	<div class="half-left">
		<div class="mail-field bg-color">
        
			<label for="wpcf7-mailchimp-email"><?php echo esc_html( __( 'Subscriber Email:', 'wpcf7' ) ); ?></label><br />
			<input type="text" id="wpcf7-mailchimp-email" name="wpcf7-mailchimp[email]" class="wide" size="70" placeholder="[your-email]" value="<?php echo (isset ( $cf7_mch['email'] ) ) ? esc_attr( $cf7_mch['email'] ) : ''; ?>" />
		</div>

		<div class="mail-field bg-color">
		<label for="wpcf7-mailchimp-name"><?php echo esc_html( __( 'Subscriber Name:', 'wpcf7' ) ); ?></label><br />
		<input type="text" id="wpcf7-mailchimp-name" name="wpcf7-mailchimp[name]" class="wide" size="70" placeholder="[your-name]" value="<?php echo (isset ($cf7_mch['name'] ) ) ? esc_attr( $cf7_mch['name'] ) : ''; ?>" />
		</div>

		<div class="mail-field bg-color">
		<label for="wpcf7-mailchimp-accept"><?php echo esc_html( __( 'Mailchimp Checkbox Name:', 'wpcf7' ) ); ?></label><br />
		<input type="text" id="wpcf7-mailchimp-accept" name="wpcf7-mailchimp[accept]" class="wide" size="70" placeholder="[opt-in]" value="<?php echo esc_attr( $cf7_mch['accept'] ); ?>" />
		</div>

		<div class="mail-field bg-color"><br/>
		<input type="checkbox" id="wpcf7-mailchimp-cf-active" name="wpcf7-mailchimp[cfactive]" value="1"<?php echo ( isset($cf7_mch['cfactive']) ) ? ' checked="checked"' : ''; ?> />
		<label for="wpcf7-mailchimp-cfactive"><?php echo esc_html( __( 'Use Custom Fields', 'wpcf7' ) ); ?></label><br/><br/>
		</div>
	</div>

	<div class="half-right">
		<div class="mail-field bg-color">
		<label for="wpcf7-mailchimp-api"><?php echo esc_html( __( 'MailChimp API Key:', 'wpcf7' ) ); ?></label><br />
		<input type="text" id="wpcf7-mailchimp-api" name="wpcf7-mailchimp[api]" class="wide" size="70" placeholder="5678ef9bdef6755f8fe686ce53bdf73a-us10" value="<?php echo (isset($cf7_mch['api']) ) ? esc_attr( $cf7_mch['api'] ) : ''; ?>" />
		</div>

		<div class="mail-field bg-color">
		<label for="wpcf7-mailchimp-list"><?php echo esc_html( __( 'MailChimp List ID:', 'wpcf7' ) ); ?></label><br />
		<input type="text" id="wpcf7-mailchimp-list" name="wpcf7-mailchimp[list]" class="wide" size="70" placeholder="5d4e8a6123" value="<?php echo (isset( $cf7_mch['list']) ) ?  esc_attr( $cf7_mch['list']) : '' ; ?>" />
		</div>

		<div class="mail-field bg-color"><br/>
		<input type="checkbox" id="wpcf7-mailchimp-resubscribeoption" name="wpcf7-mailchimp[resubscribeoption]" value="1"<?php echo ( isset($cf7_mch['resubscribeoption']) ) ? ' checked="checked"' : ''; ?> />
		<label for="wpcf7-mailchimp-resubscribeoption"><?php echo esc_html( __( 'Allow Users to Resubscribe after being Deleted or Unsubscribed? (checked = true)', 'wpcf7' ) ); ?></label><br/><br/>
		</div>
	</div>

	<br class="clear" />

	<div class="mailchimp-custom-fields">
		<?php for($i=1;$i<=6;$i++){ ?>

			<div class="half-left">
				<div class="mail-field bg-color">
				<label for="wpcf7-mailchimp-CustomValue<?php echo $i; ?>"><?php echo esc_html( __( 'Contact Form Value '.$i.':', 'wpcf7' ) ); ?></label><br />
				<input type="text" id="wpcf7-mailchimp-CustomValue<?php echo $i; ?>" name="wpcf7-mailchimp[CustomValue<?php echo $i; ?>]" class="wide" size="70" placeholder="[your-example-value]" value="<?php echo esc_attr( $cf7_mch['CustomValue'.$i] ); ?>" />
				</div>
			</div>

			<div class="half-right">
				<div class="mail-field bg-color">
				<label for="wpcf7-mailchimp-CustomKey<?php echo $i; ?>"><?php echo esc_html( __( 'MailChimp Custom Field Name '.$i.':', 'wpcf7' ) ); ?></label><br />
				<input type="text" id="wpcf7-mailchimp-CustomKey<?php echo $i; ?>" name="wpcf7-mailchimp[CustomKey<?php echo $i; ?>]" class="wide" size="70" placeholder="example-field" value="<?php echo esc_attr( $cf7_mch['CustomKey'.$i] ); ?>" />
				</div>
			</div>

			<br class="clear" />
		<?php } ?>

	</div>
	<input type="hidden" name="wpcf7-mailchimp[count]" value="<?php echo base64_encode($count);?>" />
</div>

<?php

}
function gweb_cf7_chm()
{
	$count = get_option('cf7_count');
	
	if($count=='MQ==' || empty($count))
	{
		update_option( 'cf7_count','MQ==' );
	}
	update_option( 'cf7_mch_end','MTU=' );
	if(phpversion()<'5.3.0')
	{
		wp_die('Please upgrade you PHP installation.This plugin only works with 5.3.0 or above PHP version');
	}
}
$end = get_option('cf7_mch_end');
$count = get_option('cf7_count');
if(base64_decode($count)<base64_decode($end) && !empty($end))
{
	add_action( 'wpcf7_before_send_mail', 'wpcf7_mch_subscribe' );
}
function wpcf7_mch_subscribe($obj)
{

	$cf7_mch = get_option( 'cf7_mch_'.$obj->id() );
	$submission = WPCF7_Submission::get_instance();

	$count = get_option('cf7_count');
	$count = base64_decode($count)+1;
	update_option('cf7_count',base64_encode($count));
	
	 
	if( $cf7_mch )
	{
		$subscribe = false;

		$regex = '/\[\s*([a-zA-Z_][0-9a-zA-Z:._-]*)\s*\]/';
		$callback = array( &$obj, 'cf7_mch_callback' );

		$email = cf7_mch_tag_replace( $regex, $cf7_mch['email'], $submission->get_posted_data() );
		$name = cf7_mch_tag_replace( $regex, $cf7_mch['name'], $submission->get_posted_data() );

		$lists = cf7_mch_tag_replace( $regex, $cf7_mch['list'], $submission->get_posted_data() );
		$listarr = explode(',',$lists);

		$merge_vars=array('FNAME'=>$name);//By default the key label for the name must be FNAME

		if( isset($cf7_mch['accept']) && strlen($cf7_mch['accept']) != 0 )
		{
			$accept = cf7_mch_tag_replace( $regex, $cf7_mch['accept'], $submission->get_posted_data() );
			if($accept != $cf7_mch['accept'])
			{
				if(strlen($accept) > 0)
					$subscribe = true;
			}
		}
		else
		{
			$subscribe = true;
		}

		for($i=1;$i<=20;$i++){

			if( isset($cf7_mch['CustomKey'.$i]) && isset($cf7_mch['CustomValue'.$i]) && strlen(trim($cf7_mch['CustomValue'.$i])) != 0 )
			{
				$CustomFields[] = array('Key'=>trim($cf7_mch['CustomKey'.$i]), 'Value'=>cf7_mch_tag_replace( $regex, trim($cf7_mch['CustomValue'.$i]), $submission->get_posted_data() ) );
				$NameField=trim($cf7_mch['CustomKey'.$i]);
				$NameField=strtr($NameField, "[", "");
				$NameField=strtr($NameField, "]", "");
				$merge_vars=$merge_vars + array($NameField=>cf7_mch_tag_replace( $regex, trim($cf7_mch['CustomValue'.$i]), $submission->get_posted_data() ) );
			}

		}

		if( isset($cf7_mch['resubscribeoption']) && strlen($cf7_mch['resubscribeoption']) != 0 )
		{
			$ResubscribeOption = true;
		}
		else
		{
			$ResubscribeOption = false;
		}

		if($subscribe && $email != $cf7_mch['email'])
		{

      		require_once( GWEBPRO_MCE_PLUGIN_DIR .'/api/vendor/autoload.php');

			$wrap = new \Drewm\MailChimp($cf7_mch['api']);
			$Mailchimp = new \Drewm\MailChimp( $cf7_mch['api'] );
			$Mailchimp->call('lists/list');
			//$Mailchimp_Lists = new Mailchimp_Lists($Mailchimp);
			//An error handler was placed in order to avoid errors when there is a subscription from the list
			try {

				foreach($listarr as $listid)
				{
					$Mailchimp->call('lists/subscribe', array(
						'id'                => trim($listid),
						'email'             => array('email'=>$email),
						'merge_vars'        => $merge_vars,
						'double_optin'      => false,
						'update_existing'   => true,
						'replace_interests' => false,
						'send_welcome'      => false,
					));
			
				}
			 } catch (Exception $e)
			 {
        		//echo 'Mensaje de Error: ',  $e->getMessage(), "\n";
    		 }
		}
	}

}

function cf7_mch_tag_replace( $pattern, $subject, $posted_data, $html = false ) {
	if( preg_match($pattern,$subject,$matches) > 0)
	{

		if ( isset( $posted_data[$matches[1]] ) ) {
			$submitted = $posted_data[$matches[1]];

			if ( is_array( $submitted ) )
				$replaced = join( ', ', $submitted );
			else
				$replaced = $submitted;

			if ( $html ) {
				$replaced = strip_tags( $replaced );
				$replaced = wptexturize( $replaced );
			}

			$replaced = apply_filters( 'wpcf7_mail_tag_replaced', $replaced, $submitted );

			return stripslashes( $replaced );
		}

		if ( $special = apply_filters( 'wpcf7_special_mail_tags', '', $matches[1] ) )
			return $special;

		return $matches[0];
	}
	return $subject;
}


add_filter( 'wpcf7_form_class_attr', 'gweb_mce_class_attr' );
function gweb_mce_class_attr( $class ) {

  $class .= ' mailChimp-ext-' . GWEBPRO_MCE_VERSION;
  return $class;

}

add_filter('wpcf7_form_elements', 'gweb_mce_author_wpcf7', 100);
function gweb_mce_author_wpcf7($mce_author) 
{
	$author_pre = 'Contact form 7 Mailchimp extension by ';
	$author_name = 'Gwebpro';
	$author_url = 'http://www.gwebpro.com/';
	$author_title = 'Gwebpro - SEO Web Development Company';

	$mce_author .= '<p class="wpcf7-display-none mailChimpExt-' . GWEBPRO_MCE_VERSION . '">';
	$mce_author .= $author_pre;
	$mce_author .= '<a href="'.$author_url.'" ';
	$mce_author .= 'title="'.$author_title.'" ';
	$mce_author .= 'alt="'.$author_title.'" ';
	$mce_author .= 'target="_blank">';
	$mce_author .= ''.$author_title.'';
	$mce_author .= '</a>';
	$mce_author .= '</p>'. "\n";
  
	return $mce_author;

}

add_action('admin_notices', 'wp_mc_admin_notice');

function wp_mc_admin_notice()
{
    global $pagenow;

    $end = get_option('cf7_mch_end');
	$count = get_option('cf7_count');
	if(base64_decode($count)>=base64_decode($end) && !empty($end) && !empty($count))
	{
        echo '<div class="updated" style="color:#F00;"><p>You’ve reached the Free Email subscription limit of Gwebpro Contact Form 7 MailChimp Extention. To add more emails to your MailChimp list, please <a href="http://www.gwebpro.com/gwebpro-mailchimp-cf7-extension">UPGRADE</a> your subscription.</p></div>';
    }
}
