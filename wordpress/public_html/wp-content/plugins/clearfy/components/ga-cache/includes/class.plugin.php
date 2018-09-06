<?php
	/**
	 * Hide my wp core class
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright (c) 19.02.2018, Webcraftic
	 * @version 1.0
	 */

	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}

	if( !class_exists('WGA_Plugin') ) {
		
		if( !class_exists('WGA_PluginFactory') ) {
			if( defined('LOADING_CYRLITERA_AS_ADDON') ) {
				class WGA_PluginFactory {
					
				}
			} else {
				class WGA_PluginFactory extends Wbcr_Factory406_Plugin {
					
				}
			}
		}
		
		class WGA_Plugin extends WGA_PluginFactory {
			
			/**
			 * @var Wbcr_Factory406_Plugin
			 */
			private static $app;
			
			/**
			 * @var bool
			 */
			private $as_addon;
			
			/**
			 * @param string $plugin_path
			 * @param array $data
			 * @throws Exception
			 */
			public function __construct($plugin_path, $data)
			{
				$this->as_addon = isset($data['as_addon']);
				
				if( $this->as_addon ) {
					$plugin_parent = isset($data['plugin_parent'])
						? $data['plugin_parent']
						: null;
					
					if( !($plugin_parent instanceof Wbcr_Factory406_Plugin) ) {
						throw new Exception('An invalid instance of the class was passed.');
					}
					
					self::$app = $plugin_parent;
				} else {
					self::$app = $this;
				}
				
				if( !$this->as_addon ) {
					parent::__construct($plugin_path, $data);
				}

				$this->setTextDomain();
				$this->setModules();
				
				$this->globalScripts();
				
				if( is_admin() ) {
					$this->initActivation();
					$this->adminScripts();
				}
			}
			
			/**
			 * @return Wbcr_Factory406_Plugin
			 */
			public static function app()
			{
				return self::$app;
			}

			protected function setTextDomain()
			{
				// Localization plugin
				load_plugin_textdomain('simple-google-analytics', false, dirname(WGA_PLUGIN_BASE) . '/languages/');
			}
			
			protected function setModules()
			{
				if( !$this->as_addon ) {
					self::app()->load(array(
						array('libs/factory/bootstrap', 'factory_bootstrap_406', 'admin'),
						array('libs/factory/forms', 'factory_forms_407', 'admin'),
						array('libs/factory/pages', 'factory_pages_407', 'admin'),
						array('libs/factory/notices', 'factory_notices_405', 'admin'),
						array('libs/factory/clearfy', 'factory_clearfy_203', 'all')

					));
				}
			}

			protected function initActivation()
			{
				require_once(WGA_PLUGIN_DIR . '/admin/activation.php');
				self::app()->registerActivation('WGA_Activation');
			}

			private function registerPages()
			{
				if( $this->as_addon ) {
					return;
				}
				self::app()->registerPage('WGA_CachePage', WGA_PLUGIN_DIR . '/admin/pages/ga_cache.php');
				self::app()->registerPage('WGA_MoreFeaturesPage', WGA_PLUGIN_DIR . '/admin/pages/more-features.php');
			}
			
			private function adminScripts()
			{
				require(WGA_PLUGIN_DIR . '/admin/options.php');
				require(WGA_PLUGIN_DIR . '/admin/boot.php');

				$this->registerPages();
			}
			
			private function globalScripts()
			{
				require(WGA_PLUGIN_DIR . '/includes/classes/class.configurate-ga.php');
				new WGA_ConfigGACache(self::$app);
			}
		}
	}