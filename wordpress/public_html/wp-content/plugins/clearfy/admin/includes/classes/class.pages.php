<?php

	/**
	 * Page template class
	 * Author: Webcraftic <wordpress.webraftic@gmail.com>
	 * Version: 1.0.0
	 */
	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}

	class WCL_Page extends Wbcr_FactoryPages407_ImpressiveThemplate {

		/**
		 * @param WCL_Plugin $plugin
		 */
		public function __construct(WCL_Plugin $plugin)
		{
			parent::__construct($plugin);
		}

		/**
		 * Requests assets (js and css) for the page.
		 *
		 * @see Wbcr_FactoryPages407_AdminPage
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function assets($scripts, $styles)
		{
			parent::assets($scripts, $styles);

			$this->styles->add(WCL_PLUGIN_URL . '/admin/assets/css/general.css');

			/**
			 * Allows you to enqueue scripts to the internal pages of the plugin.
			 * $this->getResultId() - page id + plugin name = quick_start-wbcr_clearfy
			 * @since 1.3.0
			 */
			do_action('wbcr_clearfy_page_enqueue_scripts', $this->getResultId(), $scripts, $styles);
		}

		/**
		 * @param $option_name
		 * @param bool $default
		 * @return mixed|void
		 */
		public function getOption($option_name, $default = false)
		{
			return $this->plugin->getOption($option_name, $default);
		}

		/**
		 * @param $option_name
		 * @param $value
		 * @return bool
		 */
		public function updateOption($option_name, $value)
		{
			return $this->plugin->updateOption($option_name, $value);
		}

		/**
		 * @param $option_name
		 * @return bool
		 */
		public function deleteOption($option_name)
		{
			return $this->plugin->deleteOption($option_name);
		}
	}

	