<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', 'theme-text-domain' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
    ),
	
	// Here all section add
	
    'sections'        => array( 
      array(
        'id'          => 'header_option',
        'title'       => __( 'Header option', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'doctor_option',
        'title'       => __( 'Doctor option', 'theme-text-domain' )
      ), 
	  array(
        'id'          => 'style_option',
        'title'       => __( 'Style Options', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'style_all_color',
        'title'       => __( 'All Color', 'me-text-domain' )
      ),
	  array(
        'id'          => 'font_family',
        'title'       => __( 'Font Family', 'me-text-domain' )
      ),
	  array(
        'id'          => 'social_links',
        'title'       => __( 'Social Links', 'me-text-domain' )
      ),
	  array(
        'id'          => 'footer_all_option',
        'title'       => __( 'Footer Options', 'me-text-domain' )
      ),
    ),
	
	// All option adding
	
    'settings'        => array( 
		array(
        'id'          => 'header_option_logo',
        'label'       => __( 'Upload your logo', 'theme-text-domain' ),
        'desc'        =>__('You can change your logo', 'madico'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  /**
	  
	  use: data call
	  
	  <?php echo ot_get_option('id');?>
	  
	  **/
      array(
        'id'          => 'header_option_one',
        'label'       => __( 'Background', 'theme-text-domain' ),
        'desc'        =>__('You can change your header image background. and color... Please upload this image size( width: 800px; height: 650px; )', 'madico'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),   
	  array(
        'id'          => 'header_option_Colorpicker',
        'label'       => __( 'My Colorpicker', 'theme-text-domain' ),
        'desc'        =>__('You can change your header image background. and color... Please upload this image size( width: 800px; height: 650px; )', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  
	  /****
	  
	  use: and data call:::::
	  
	 <?php $header_option_one = ot_get_option( 'header_option_one', array() ); ?> 
	
	.my_class{
		background-color: <?php if($header_option_one['background-color']){echo $header_option_one['background-color'] ; }else{ echo '#ffffff';} ?>;
		background-repeat:<?php if($header_option_one['background-repeat']){echo $header_option_one['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
		background-attachment:<?php if($header_option_one['background-attachment']){echo $header_option_one['background-attachment'] ; }else{ echo 'fixed';} ?>;
		background-position:<?php if($header_option_one['background-position']){echo $header_option_one['background-position'] ; }else{ echo 'top';} ?>;
		background-image:url(<?php if($header_option_one['background-image']){echo $header_option_one['background-image'] ; }else{ echo get_template_directory_uri().'/img/dummy/bg1.jpg';} ?>) ;
		background-size:<?php if($header_option_one['background-size']){echo $header_option_one['background-size'] ; }else{ echo '100%';} ?> ;
	}
	  
	  ****/
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  array(
        'id'          => 'header_option_phone',
        'label'       => __( 'Write your phone number', 'theme-text-domain' ),
        'desc'        =>__('You can change your top header phone number', 'madico'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  /***
	  
		use=text: and condition:-
		
			<?php $phone_no = ot_get_option('header_option_phone'); ?>

				<?php if($phone_no): ?>  This is condition... if have post..

				use-one-data-call: <p class="bold text-right">Call us now <?php echo $phone_no; ?></p>
				use-two-data-call: <p class="bold text-right">Call us now <?php echo ot_get_option ('header_option_phone'); ?></p>
				

			<?php endif; ?> condition End..
	  
	  ***/
	   array(
        'id'          => 'top_header_option_phone',
        'label'       => __( 'You can show or hide top header', 'theme-text-domain' ),
        'desc'        =>__('You can show or hide top header', 'madico'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  /***
	  Use=on-off: 
	  
	  <?php if ( ot_get_option('top_header_option_phone') != "off" ) { ?>
			
			-----here your content------
	
	  <?php } ?>
	  
	  ***/
	  
	  
	   array(
        'id'          => 'doctor_option_one',
        'label'       => __( 'on-off', 'theme-text-domain' ),
        'desc'        =>__('You can show or hide doctor option', 'madico'),
        'std'         => 'off',
        'type'        => 'Select',
        'section'     => 'doctor_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'theme-text-domain' ),
            'src'         => ''
          ), 
		  array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-text-domain' ),
            'src'         => ''
          ),
          
        )
      ),
	  
	  /***
	  use and data call:
	  
	<?php $any_id = ot_get_option('option tree id'); ?>
	
	<?php if($any_id == 'yes'): ?>
	
			-----Here your content---------
	
	<?php endif; ?>
	  
	  
	  ***/
	   array(
        'id'          => 'style_option_one',
        'label'       => __( 'Css', 'theme-text-domain' ),
        'desc'        =>__('You can change your stylesheet', 'madico'),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'style_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
	  
	  /***
	  
		use: and data call::
		
		<style>
			<?php echo ot_get_option('style_option_one'); ?>
		</style>
	  
	  ***/
	  array(
        'id'          => 'javaScript_option_one',
        'label'       => __( 'JavaScript', 'theme-text-domain' ),
        'desc'        =>__('You can change your JavaScript', 'madico'),
        'std'         => '',
        'type'        => 'JavaScript',
        'section'     => 'style_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  /***
	  
	  use: and data call:::
	  
	  <?php echo ot_get_option('javaScript_option_one'); ?>
	  
	  ***/
	  
	  
	  array(
        'id'          => 'menu_color',
        'label'       => __( 'Menu Color', 'theme-text-domain' ),
        'desc'        =>__('You can change your menu color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  /***
	  
		use: and data call
		
		color:<?php echo ot_get_option('menu_color'); ?>;
	  
	  ***/
	  array(
        'id'          => 'menu_color_hover',
        'label'       => __( 'Menu hover Color', 'theme-text-domain' ),
        'desc'        =>__('You can change your menu hover color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker-Opacity',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
	  array(
        'id'          => 'body_color',
        'label'       => __( 'Body Color', 'theme-text-domain' ),
        'desc'        =>__('You can change your body color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker-Opacity',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'header_top_color',
        'label'       => __( 'Header top color', 'theme-text-domain' ),
        'desc'        =>__('You can change your header top color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker-Opacity',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_widget_color',
        'label'       => __( 'Footer Widget Color', 'theme-text-domain' ),
        'desc'        =>__('You can change your footer widget color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker-Opacity',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_color',
        'label'       => __( 'Footer Background Color', 'theme-text-domain' ),
        'desc'        =>__('You can change your footer Background Color', 'madico'),
        'std'         => '',
        'type'        => 'Colorpicker-Opacity',
        'section'     => 'style_all_color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'font_family_typography',
        'label'       => __( 'Font Family', 'theme-text-domain' ),
        'desc'        =>__('You can change your font family', 'madico'),
        'std'         => '',
        'type'        => 'Typography',
        'section'     => 'font_family',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'font_family_google_fonts',
        'label'       => __( 'Google Fonts', 'theme-text-domain' ),
        'desc'        =>__('You can change your Google Fonts', 'madico'),
        'std'         => '',
        'type'        => 'Google-Fonts',
        'section'     => 'font_family',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
			'label'       => 'Team Social',
			'id'          => 'team_links',
			'type'        => 'list-item',
			'section'     => 'social_links',
			'desc'     => 'Click here add new button... You can ad more social link',
			'settings'    => array(
		array(
			'id'        => 'social_icon_name',
			'label'     => 'Social Icon Name',
			'type'      => 'text',
			'desc'      => __('Please use fontawesome name', 'madico'),
			),
		array(
			'id'        => 'social_link_url',
			'label'     => 'Social Network link',
			'type'      => 'text',
			'desc'      => __('Please input your social link', 'madico'),
			),
			)          
		),
		
		
/***

use and data call::::

	<?php
		$socialicon = ot_get_option('team_links', array());
	?>
	<?php
		if( ! empty( $socialicon )){
		foreach( $socialicon as $socialicon ){
		echo '<li class="social-'.$socialicon['social_icon_name'].'"><a href="'.$socialicon['social_link_url'].'"><i class="fa fa-'.$socialicon['social_icon_name'].'"></i></a></li>';
		}
	}
	?>

***/
	  array(
        'id'          => 'footer_copy_text',
        'label'       => __( 'Footer Copyright Text', 'theme-text-domain' ),
        'desc'        =>__('You can change your Footer Copyright Text', 'madico'),
        'std'         => '',
        'type'        => 'Textarea',
        'section'     => 'footer_all_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',

      ),
	  
	  array(
        'id'          => 'demo_radio',
        'label'       => __( 'Radio', 'theme-text-domain' ),
        'desc'        => __( 'The Radio option type displays a group of choices. It allows the user to choose one and will return that value as a string for use in a custom function or loop.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'footer_all_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'theme-text-domain' ),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => __( 'No', 'theme-text-domain' ),
            'src'         => ''
          ),
        )
      ),
	  
	  
	  /****
	  use: and data call
	  
			<?php $any_id = ot_get_option('option tree id'); ?>

				<?php if($any_id == 'yes'): ?>

				-----Here your content---------

			<?php endif; ?>
	  
	  
	  
	  ***/
	   array(
        'id'          => 'layout_select',
        'label'       => __( 'Layout Select', 'theme-text-domain' ),
        'desc'        =>__('You can do it... layout change', 'madico'),
        'std'         => '',
        'type'        => 'Select',
        'section'     => 'header_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		'choices'     => array( 
          array(
            'value'       => 'Boxsize',
            'label'       => __( 'Box size', 'theme-text-domain' ),
            'src'         => ''
          ), 
		  array(
            'value'       => 'Fullwidesize',
            'label'       => __( 'Full wide', 'theme-text-domain' ),
            'src'         => ''
          ),
          
        )
      ),
	  
	  /***
	  use and data call:
	  
	<?php $any_id = ot_get_option('layout_select'); ?>
	
	<?php if($any_id == 'Boxsize'): ?>
	
			-----Here your content---------
	
	<?php endif; ?>
	
	**********************************
	
	<?php $any_id = ot_get_option('layout_select'); ?>
	
	<?php if($any_id == 'Fullwidesize'): ?>
	
			-----Here your content---------
	
	<?php endif; ?>
	  
	  
	  ***/
	  
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}