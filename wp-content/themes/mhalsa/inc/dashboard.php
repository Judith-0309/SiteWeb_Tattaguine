<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'mhalsa_create_menu' ) ) {
	add_action( 'admin_menu', 'mhalsa_create_menu' );
	/**
	 * Adds our "Mhalsa" dashboard menu item
	 *
	 */
	function mhalsa_create_menu() {
		$mhalsa_page = add_theme_page( 'Mhalsa', 'Mhalsa', apply_filters( 'mhalsa_dashboard_page_capability', 'edit_theme_options' ), 'mhalsa-options', 'mhalsa_settings_page' );
		add_action( "admin_print_styles-$mhalsa_page", 'mhalsa_options_styles' );
	}
}

if ( ! function_exists( 'mhalsa_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Mhalsa dashboard page
	 *
	 */
	function mhalsa_options_styles() {
		wp_enqueue_style( 'mhalsa-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), MHALSA_VERSION );
	}
}

if ( ! function_exists( 'mhalsa_settings_page' ) ) {
	/**
	 * Builds the content of our Mhalsa dashboard page
	 *
	 */
	function mhalsa_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="mhalsa-masthead clearfix">
					<div class="mhalsa-container">
						<div class="mhalsa-title">
							<a href="<?php echo esc_url(MHALSA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Mhalsa', 'mhalsa' ); ?></a> <span class="mhalsa-version"><?php echo esc_html( MHALSA_VERSION ); ?></span>
						</div>
						<div class="mhalsa-masthead-links">
							<?php if ( ! defined( 'MHALSA_PREMIUM_VERSION' ) ) : ?>
								<a class="mhalsa-masthead-links-bold" href="<?php echo esc_url(MHALSA_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'mhalsa' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(MHALSA_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'mhalsa' ); ?></a>
                            <a href="<?php echo esc_url(MHALSA_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'mhalsa' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * mhalsa_dashboard_after_header hook.
				 *
				 */
				 do_action( 'mhalsa_dashboard_after_header' );
				 ?>

				<div class="mhalsa-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * mhalsa_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'mhalsa_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'mhalsa-settings-group' ); ?>
									<?php do_settings_sections( 'mhalsa-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="mhalsa_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'mhalsa' )
										);
										?>
									</div>

									<?php
									/**
									 * mhalsa_inside_options_form hook.
									 *
									 */
									 do_action( 'mhalsa_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Blog' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Colors' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Copyright' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Demo Import' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Hooks' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Import / Export' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Page Header' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Spacing' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Typography' => array(
											'url' => MHALSA_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => MHALSA_THEME_URL,
									)
								);

								if ( ! defined( 'MHALSA_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox mhalsa-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'mhalsa' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated mhalsa-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'mhalsa' ); ?></a>
													</div>
												</div>
												<div class="mhalsa-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * mhalsa_options_items hook.
								 *
								 */
								do_action( 'mhalsa_options_items' );
								?>
							</div>

							<div class="mhalsa-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="mhalsa_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'mhalsa' )
									);
									?>
								</div>

								<?php
								/**
								 * mhalsa_admin_right_panel hook.
								 *
								 */
								 do_action( 'mhalsa_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Mhalsa documentation', 'mhalsa' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'mhalsa' ); ?></p>
                                    <a href="<?php echo esc_url(MHALSA_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Mhalsa documentation', 'mhalsa' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'mhalsa' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'mhalsa' ); ?></p>
                                    <a href="<?php echo esc_url(MHALSA_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'mhalsa' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'mhalsa' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Mhalsa theme, show it to the world with Your review. Your feedback helps a lot.', 'mhalsa' ); ?></p>
                                    <a href="<?php echo esc_url(MHALSA_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'mhalsa' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'mhalsa_admin_errors' ) ) {
	add_action( 'admin_notices', 'mhalsa_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function mhalsa_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_mhalsa-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'mhalsa-notices', 'true', esc_html__( 'Settings saved.', 'mhalsa' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'mhalsa-notices', 'imported', esc_html__( 'Import successful.', 'mhalsa' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'mhalsa-notices', 'reset', esc_html__( 'Settings removed.', 'mhalsa' ), 'updated' );
		}

		settings_errors( 'mhalsa-notices' );
	}
}
