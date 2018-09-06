<?php
	
	/**
	 * The page Error logs
	 *
	 * @since 1.0.0
	 */
	
	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}
	
	/**
	 * Класс отвечает за работу страницы логов
	 * @author Eugene Jokerov <jokerov@gmail.com>
	 * @copyright (c) 2018, Webcraftic
	 * @version 1.0
	 */
	class WIO_LogPage extends Wbcr_FactoryPages407_ImpressiveThemplate {
		
		/**
		 * The id of the page in the admin menu.
		 *
		 * Mainly used to navigate between pages.
		 * @see FactoryPages407_AdminPage
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $id = 'io_logs'; // Уникальный идентификатор страницы
		public $page_menu_dashicon = 'dashicons-admin-tools'; // Иконка для закладки страницы, дашикон
		public $page_parent_page = null; // Уникальный идентификатор родительской страницы
		public $type = 'page';
		
		/**
		 * @param Wbcr_Factory406_Plugin $plugin
		 */
		public function __construct(Wbcr_Factory406_Plugin $plugin)
		{
			$this->menu_title = __('Error Log', 'robin-image-optimizer');
			parent::__construct($plugin);
		}

		/**
		 * Подменяем простраинство имен для меню плагина, если активирован плагин Clearfy
		 * Меню текущего плагина будет добавлено в общее меню Clearfy
		 * @return string
		 */
		public function getMenuScope()
		{
			if( defined('WBCR_CLEARFY_PLUGIN_ACTIVE') ) {
				$this->page_parent_page = 'image_optimizer';

				return 'wbcr_clearfy';
			}

			return $this->plugin->getPluginName();
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

			// Add Clearfy styles for HMWP pages
			if( defined('WBCR_CLEARFY_PLUGIN_ACTIVE') ) {
				$this->styles->add(WCL_PLUGIN_URL . '/admin/assets/css/general.css');
			}
		}
		
		// Метод позволяет менять заголовок меню, в зависимости от сборки плагина.
		public function getMenuTitle()
		{
			return defined('LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON')
				? __('Image optimizer', 'robin-image-optimizer')
				: __('Error Log', 'robin-image-optimizer');
		}
		
		/**
		 * Вывод страницы лога
		 */
		public function showPageContent()
		{
			$logger = WIO_Plugin::app()->getLogger();
			?>
			<div class="wbcr-factory-page-group-header" style="margin-top:0;">
				<strong><?php _e('Error Log', 'robin-image-optimizer') ?></strong>
				
				<p>
					<?php _e('In this section, you can track image optimization errors. Sending this log to us, will help in solving possible optimization issues.', 'robin-image-optimizer') ?>
				</p>
			</div>
			
			<div class="wbcr-factory-page-group-body" style="padding:20px">
				<textarea style="width:70%; height:800px;">
					<?php echo esc_attr($logger->get()); ?>
				</textarea>
			</div>
		<?php
		}
	}
