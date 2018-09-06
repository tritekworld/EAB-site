<?php
	/**
	 * Admin boot
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright Webcraftic 25.05.2017
	 * @version 1.0
	 */

	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}

	/**
	 * Виджет отзывов
	 *
	 * @param string $page_url
	 * @param string $plugin_name
	 * @return string
	 */
	function wio_rating_widget_url($page_url, $plugin_name)
	{
		if( !defined('LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON') && ($plugin_name == WIO_Plugin::app()->getPluginName()) ) {
			return 'https://wordpress.org/support/plugin/robin-image-optimizer/reviews/#new-post';
		}

		return $page_url;
	}

	add_filter('wbcr_factory_pages_407_imppage_rating_widget_url', 'wio_rating_widget_url', 10, 2);

	/**
	 * Widget with the offer to buy Clearfy Business
	 *
	 * @param array $widgets
	 * @param string $position
	 * @param Wbcr_Factory406_Plugin $plugin
	 */
	function wio_donate_widget($widgets, $position, $plugin)
	{
		if( $plugin->getPluginName() == WIO_Plugin::app()->getPluginName() ) {
			$buy_premium_url = 'https://clearfy.pro/pricing/?utm_source=wordpress.org&utm_campaign=wbcr_robin_image_optimizer&utm_content=widget';

			ob_start();
			?>
			<div id="wbcr-clr-go-to-premium-widget" class="wbcr-factory-sidebar-widget">
				<p>
					<strong><?php _e('Donation', 'clearfy'); ?></strong>
				</p>

				<div class="wbcr-clr-go-to-premium-widget-body">
					<p><?php _e('<b>Clearfy Business</b> is a paid package of components for the popular free WordPress plugin named Clearfy. You get access to all paid components at one price.', 'clearfy') ?></p>

					<p><?php _e('Paid license guarantees that you can download and update existing and future paid components of the plugin.', 'clearfy') ?></p>
					<a href="<?= $buy_premium_url ?>" class="wbcr-clr-purchase-premium" target="_blank" rel="noopener">
                        <span class="btn btn-gold btn-inner-wrap">
                        <i class="fa fa-star"></i> <?php printf(__('Upgrade to Clearfy Business for $%s', 'clearfy'), 19) ?>
	                        <i class="fa fa-star"></i>
                        </span>
					</a>
				</div>
			</div>
			<?php

			$widgets['donate_widget'] = ob_get_contents();
			ob_end_clean();
		}

		return $widgets;
	}

	add_filter('wbcr_factory_pages_407_imppage_get_widgets', 'wio_donate_widget', 10, 3);



