<?php

	/**
	 * Activator for the Robin image optimizer
	 *
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright (c) 09.09.2017, Webcraftic
	 * @see Factory406_Activator
	 * @version 1.0
	 */

	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}

	class WIO_Activation extends Wbcr_Factory406_Activator {

		/**
		 * Runs activation actions.
		 *
		 * @since 1.0.0
		 */
		public function activate()
		{
			WIO_Plugin::app()->updateOption('image_optimization_server', 'resmush');
			WIO_Plugin::app()->updateOption('backup_origin_images', 1);
			WIO_Plugin::app()->updateOption('save_exif_data', 1);
		}

		/**
		 * Runs activation actions.
		 *
		 * @since 1.0.0
		 */
		public function deactivate()
		{
			if( wp_next_scheduled('wio_optimize_images') ) {
				wp_clear_scheduled_hook('wio_optimize_images');
			}
		}
	}
