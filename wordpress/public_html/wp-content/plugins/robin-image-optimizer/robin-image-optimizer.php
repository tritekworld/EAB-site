<?php
	/**
	 * Plugin Name: Webcraftic Robin image optimizer
	 * Plugin URI: https://wordpress.org/plugins/robin-image-optimizer/
	 * Description: Optimize images without losing quality, speed up your website load, improve SEO and save money on server and CDN bandwidth.
	 * Author: Webcraftic <wordpress.webraftic@gmail.com>
	 * Version: 1.0.8
	 * Text Domain: image-optimizer
	 * Domain Path: /languages/
	 * Author URI: https://clearfy.pro
	 */

	// Exit if accessed directly
	if( !defined('ABSPATH') ) {
		exit;
	}

	/**
	 * Уведомление о том, что этот плагин используется уже в составе плагина Clearfy, как его компонент.
	 * Мы блокируем работу этого плагина, чтобы не вызывать конфликт.
	 */
	if( defined('WIO_PLUGIN_ACTIVE') || (defined('WCL_PLUGIN_ACTIVE') && !defined('LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON')) ) {
		function wbcr_wio_admin_notice_error()
		{
			?>
			<div class="notice notice-error">
				<p><?php _e('We found that you have the "Clearfy - wordpress optimization plugin" plugin installed, this plugin already has disable comments functions, so you can deactivate plugin "Image optimizer"!', 'robin-image-optimizer'); ?></p>
			</div>
		<?php
		}

		add_action('admin_notices', 'wbcr_wio_admin_notice_error');

		return;
	} else {

		// Устанавливаем контстанту, что плагин уже используется
		define('WIO_PLUGIN_ACTIVE', true);

		// Директория плагина
		define('WIO_PLUGIN_DIR', dirname(__FILE__));

		// Относительный путь к плагину
		define('WIO_PLUGIN_BASE', plugin_basename(__FILE__));

		// Ссылка к директории плагина
		define('WIO_PLUGIN_URL', plugins_url(null, __FILE__));

		

		// Этот плагин может быть аддоном плагина Clearfy, если он загружен, как аддон, то мы не подключаем фреймворк,
		// а наследуем функции фреймворка от плагина Clearfy. Если плагин скомпилирован, как отдельный плагин, то он использует собственный фреймворк для работы.
		// Константа LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON утсанавливается в классе libs/factory/core/includes/Wbcr_Factory406_Plugin

		if( !defined('LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON') ) {
			// Фреймворк - отвечает за интерфейс, содержит общие функции для серии плагинов и готовые шаблоны для быстрого развертывания плагина.
			require_once(WIO_PLUGIN_DIR . '/libs/factory/core/boot.php');
		}

		// Основной класс плагина
		require_once(WIO_PLUGIN_DIR . '/includes/class.plugin.php');

		// Класс WIO_Plugin создается только, если этот плагин работает, как самостоятельный плагин.
		// Если плагин работает, как аддон, то класс создается родительским плагином.

		if( !defined('LOADING_ROBIN_IMAGE_OPTIMIZER_AS_ADDON') ) {
			new WIO_Plugin(__FILE__, array(
				'prefix' => 'wbcr_io_',
				// префикс для базы данных и полей формы
				'plugin_name' => 'wbcr_image_optimizer',
				// имя плагина, как уникальный идентификатор
				'plugin_title' => __('Webcraftic Robin image optimizer', 'robin-image-optimizer'),
				// заголовок плагина
				'plugin_version' => '1.0.8',
				// текущая версия плагина
				'required_php_version' => '5.2',
				// минимальная версия php для работы плагина
				'required_wp_version' => '4.2',
				// минимальная версия wp для работы плагина
				'plugin_build' => 'free',
				// сборка плагина
				'updates' => WIO_PLUGIN_DIR . '/updates/'
			));
		}
	}
