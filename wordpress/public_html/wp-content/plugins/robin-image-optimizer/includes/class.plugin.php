<?php
	/**
	 * Основной класс плагина
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright (c) 19.02.2018, Webcraftic
	 * @version 1.0
	 */

	// Exit if accessed directly
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if( ! class_exists( 'WIO_Plugin' ) ) {
		if( ! class_exists( 'WIO_PluginFactory' ) ) {
			// Этот плагин может быть аддоном плагина Clearfy, если он загружен, как аддон, то мы не подключаем фреймворк,
			// а наследуем функции фреймворка от плагина Clearfy. Если плагин скомпилирован, как отдельный плагин, то он использует собственный фреймворк для работы.
			// Константа LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON утсанавливается в классе libs/factory/core/includes/Wbcr_Factory406_Plugin

			if( defined( 'LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON' ) ) {
				class WIO_PluginFactory {
					
				}
			} else {
				class WIO_PluginFactory extends Wbcr_Factory406_Plugin {
					
				}
			}
		}
		
		class WIO_Plugin extends WIO_PluginFactory {
			
			/**
			 * @var Wbcr_Factory406_Plugin
			 */
			private static $app;
			
			/**
			 * @var bool
			 */
			private $as_addon;
			
			/**
			 * @var WIO_Cron
			 */
			private $cron;
			
			/**
			 * @var WIO_Media_Library
			 */
			private $media_library;
			
			/**
			 * @var WIO_Image_Processor_Resmush
			 */
			private $image_processor;
			
			/**
			 * @var WIO_Image_Statistic
			 */
			private $statistic;
			
			/**
			 * @var WIO_Logger
			 */
			private $logger;
			
			/**
			 * @var WIO_Backup
			 */
			private $backup;
			
			/**
			 * @param string $plugin_path
			 * @param array $data
			 * @throws Exception
			 */
			public function __construct( $plugin_path, $data ) {
				$this->as_addon = isset( $data['as_addon'] ) ? true : false;
				
				if( $this->as_addon ) {
					$plugin_parent = isset( $data['plugin_parent'] ) ? $data['plugin_parent'] : null;
					
					if( ! ( $plugin_parent instanceof Wbcr_Factory406_Plugin ) ) {
						throw new Exception( __( 'An invalid instance of the class was passed.', 'robin-image-optimizer' ) );
					}

					// Если плагин загружен, как аддон, то мы передаем в app ссылку на класс родителя
					self::$app = $plugin_parent;
				} else {
					// Если плагин самостоятельный, то записываем в app сслыку на текущий класс
					self::$app = $this;

					parent::__construct( $plugin_path, $data );
				}
				
				$this->init();
				$this->setTextDomain();
				$this->setModules();
				
				if( is_admin() ) {
					$this->initActivation();
					add_action('plugins_loaded', array($this, 'adminScripts'));
				}
			}
			
			/**
			 * Подключение необходимых php файлов и инициализация
			 *
			 * @return void
			 */
			protected function init() {
				require_once( WIO_PLUGIN_DIR . '/includes/functions.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.attachment.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.media-library.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.image-processor-abstract.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.image-processor-resmush.php' ); // resmush api
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.image-processor-smushpro.php' ); // smushpro api
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.cron.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.image-statistic.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.backup.php' );
				require_once( WIO_PLUGIN_DIR . '/includes/classes/class.logger.php' );
				
				$this->media_library = new WIO_Media_Library;
				$this->cron = new WIO_Cron;
			}
			
			/**
			 * Статический метод для быстрого доступа к информации о плагине, а также часто использумых методах.
			 *
			 * Пример:
			 * WIO_Plugin::app()->getOption()
			 * WIO_Plugin::app()->updateOption()
			 * WIO_Plugin::app()->deleteOption()
			 * WIO_Plugin::app()->getPluginName()
			 *
			 * @return Wbcr_Factory406_Plugin
			 */
			public static function app() {
				return self::$app;
			}

			// todo: перенести этот медот в фреймворк
			protected function setTextDomain()
			{
				// Localization plugin
				//load_plugin_textdomain('robin-image-optimizer', false, dirname(WIO_PLUGIN_BASE) . '/languages/');

				$domain = 'robin-image-optimizer';
				$locale = apply_filters('plugin_locale', is_admin()
					? get_user_locale()
					: get_locale(), $domain);
				$mofile = $domain . '-' . $locale . '.mo';

				if( !load_textdomain($domain, WIO_PLUGIN_DIR . '/languages/' . $mofile) ) {
					load_muplugin_textdomain($domain);
				}
			}

			/**
			 * Подключаем модули фреймворка
			 */
			protected function setModules() {
				if( ! $this->as_addon ) {
					self::app()->load( array(
						// Модуль отвечает за подключение скриптов и стилей для интерфейса
						array( 'libs/factory/bootstrap', 'factory_bootstrap_406', 'admin' ),
						// Модуль отвечает за создание форм и полей
						array( 'libs/factory/forms', 'factory_forms_407', 'admin' ),
						// Модуль отвечает за создание шаблонов страниц плагина
						array( 'libs/factory/pages', 'factory_pages_407', 'admin'),
						// Модуль в котором хранится общий функционал плагина Clearfy и его аддонов
						array( 'libs/factory/clearfy', 'factory_clearfy_203', 'all' )
					) );
				}
			}

			/**
			 * Инициализируем активацию плагина
			 */
			protected function initActivation()
			{
				include_once(WIO_PLUGIN_DIR . '/admin/activation.php');
				$this->registerActivation('WIO_Activation');
			}

			/**
			 * Регистрируем страницы плагина
			 */
			private function registerPages() {

				$admin_path = WIO_PLUGIN_DIR . '/admin/pages';

				// Пример основной страницы настроек
				self::app()->registerPage( 'WIO_SettingsPage', $admin_path . '/settings.php' );

				// Пример внутренней страницы настроек
				self::app()->registerPage( 'WIO_StatisticPage', $admin_path . '/statistic.php' );
				
				if ( self::app()->getOption( 'error_log' , false ) ) {
					self::app()->registerPage( 'WIO_LogPage', $admin_path . '/log.php' );
				}
			}

			/**
			 * Подключаем функции бекенда
			 */
			public function adminScripts() {
				require(WIO_PLUGIN_DIR . '/admin/boot.php');
				$this->registerPages();
			}

			/**
			 * Метод возвращает объект, отвечающий за оптимизацию изображений через API сторонних сервисов
			 *
			 * @return WIO_Image_Processor_Resmush
			 */
			public function getImageProcessor() {
				if ( ! $this->image_processor ) {
					$server = $this->getOption( 'image_optimization_server' , 'resmush' );
					switch( $server ) {
						case 'resmush':
							$this->image_processor = new WIO_Image_Processor_Resmush();
							break;
						case 'smushpro':
							$this->image_processor = new WIO_Image_Processor_Smushpro();
							break;
						default:
							$this->image_processor = new WIO_Image_Processor_Resmush();
							break;
					} 
				}
				return $this->image_processor;
			}
			
			/**
			 * Метод возвращает объект, отвечающий за работу со статистическими данными по оптимизации изображений
			 *
			 * @return WIO_Image_Statistic
			 */
			public function getImageStatistics() {
				if ( ! $this->statistic ) {
					$this->statistic = new WIO_Image_Statistic();
				}
				return $this->statistic;
			}
			
			/**
			 * Метод возвращает объект, отвечающий за работу логами
			 *
			 * @return WIO_Logger
			 */
			public function getLogger() {
				if ( ! $this->logger ) {
					$this->logger = new WIO_Logger();
				}
				return $this->logger;
			}
			
			/**
			 * Метод возвращает объект, отвечающий за работу с резервными копиями
			 *
			 * @return WIO_Backup
			 */
			public function getBackup() {
				if ( ! $this->backup ) {
					$this->backup = new WIO_Backup();
				}
				return $this->backup;
			}
			
			/**
			 * Метод возвращает объект, отвечающий за работу с медиабиблиотекой
			 *
			 * @return WIO_Media_Library
			 */
			public function getMediaLibrary() {
				return $this->media_library;
			}
		}
	}
