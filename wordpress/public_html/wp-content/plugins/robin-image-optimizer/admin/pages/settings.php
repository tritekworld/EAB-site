<?php
	
	/**
	 * The page Settings.
	 *
	 * @since 1.0.0
	 */
	
	// Exit if accessed directly
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	/**
	 * Класс отвечает за работу страницы настроек
	 * @author Eugene Jokerov <jokerov@gmail.com>
	 * @copyright (c) 2018, Webcraftic
	 * @version 1.0
	 */
	class WIO_SettingsPage extends Wbcr_FactoryPages407_ImpressiveThemplate {
		
		/**
		 * The id of the page in the admin menu.
		 *
		 * Mainly used to navigate between pages.
		 * @see FactoryPages407_AdminPage
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $id = 'io_settings'; // Уникальный идентификатор страницы
		public $page_menu_dashicon = 'dashicons-admin-generic'; // Иконка для закладки страницы, дашикон
		public $page_parent_page = null; // Уникальный идентификатор родительской страницы

		/**
		 * @param Wbcr_Factory406_Plugin $plugin
		 */
		public function __construct( Wbcr_Factory406_Plugin $plugin ) {
			// Заголовок страницы
			$this->menu_title = __( 'Main Settings', 'robin-image-optimizer' );
			parent::__construct( $plugin );
			$this->hooks();
		}

		/**
		 * Подменяем простраинство имен для меню плагина, если активирован плагин Clearfy
		 * Меню текущего плагина будет добавлено в общее меню Clearfy
		 * @return string
		 */
		public function getMenuScope() {
			if(defined('WBCR_CLEARFY_PLUGIN_ACTIVE')) {
				$this->page_parent_page = 'image_optimizer';
				return 'wbcr_clearfy';
			}

			return $this->plugin->getPluginName();
		}
		
		public function hooks() {
			add_action( 'wp_ajax_wio_restore_backup', array( $this, 'ajaxRestoreBackup' ) );
			add_action( 'wp_ajax_wio_clear_backup', array( $this, 'ajaxClearBackupDir' ) );
			add_action( 'wp_ajax_wio_settings_update_level', array( $this, 'ajaxUpdateLevel' ) );
		}
		
		/**
		 * AJAX обработчик массовой оптимизации изображений со страницы статистики
		 */
		public function ajaxRestoreBackup() {
			check_admin_referer( 'wio-iph' );
			$max_process_per_request = 5;
			$total = $_POST['total'];
			$media_library = WIO_Plugin::app()->getMediaLibrary();
			if ( $total == '?' ) {
				$total = $media_library->getOptimizedCount();
			}
			$restored_data = $media_library->restoreAllFromBackup( $max_process_per_request );
			
			$restored_data['total'] = $total;
			if ( $total ) {
				$restored_data['percent'] = 100 - ( $restored_data['remain'] * 100 / $total );
			} else {
				$restored_data['percent'] = 0;
			}
			// если изображения закончились - посылаем команду завершения
			if ( $restored_data['remain'] <= 0 ) {
				$restored_data['end'] = true;
			}
			wp_send_json( $restored_data );
		}
		
		/**
		 * AJAX обработчик очистки папки с бекапами
		 */
		public function ajaxClearBackupDir() {
			check_admin_referer( 'wio-iph' );
			$backup = WIO_Plugin::app()->getBackup();
			$backup->removeBackupDir();
			wp_send_json( true );
		}
		
		/**
		 * AJAX обработчик массовой сохранения уровня сжатия
		 */
		public function ajaxUpdateLevel() {
			check_admin_referer( 'wio-iph' );
			$level = $_POST['level'];
			if ( ! $level ) {
				die();
			}
			if ( ! in_array( $level, array( 'normal', 'aggresive', 'ultra' ) ) ) {
				die();
			}
			WIO_Plugin::app()->updateOption( 'image_optimization_level' , $level );
			die();
		}
		
		/**
		 * Подключаем скрипты и стили для страницы
		 *
		 * @see Wbcr_FactoryPages407_AdminPage
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function assets( $scripts, $styles ) {
			parent::assets( $scripts, $styles );
			$this->scripts->add( WIO_PLUGIN_URL . '/admin/assets/js/restore-backup.js' );

			// Add Clearfy styles for HMWP pages
			if( defined('WBCR_CLEARFY_PLUGIN_ACTIVE') ) {
				$this->styles->add(WCL_PLUGIN_URL . '/admin/assets/css/general.css');
			}
		}


		/**
		 * Выводим предупреждения
		 *
		 */
		protected function warningNotice() {
			$upload_dir = wp_upload_dir();
			if ( ! is_writable( $upload_dir['basedir'] ) ) {
				$this->printErrorNotice( __( 'Folder wp-content/uploads/ is unavailable for writing', 'robin-image-optimizer' ) );
			}
			$wio_backup = $upload_dir['basedir'] . '/wio_backup/';
			if ( file_exists( $wio_backup ) and ! is_writable( $wio_backup ) ) {
				$this->printErrorNotice( __( 'Folder wp-content/uploads/wio-backup/ is unavailable for writing', 'robin-image-optimizer' ) );
			}
			if ( defined( 'DISABLE_WP_CRON' ) and DISABLE_WP_CRON == true ) {
				$this->printErrorNotice( __( 'Cron is disabled in wp-config.php', 'robin-image-optimizer' ) );
			}
		}
		
		
		/**
		 * Метод должен передать массив опций для создания формы с полями.
		 * Созданием страницы и формы занимается фреймворк
		 *
		 * @since 1.0.0
		 * @return mixed[]
		 */
		public function getOptions() {
			$options = array();

			$options[] = array(
				'type' => 'html',
				'html' => '<div class="wbcr-factory-page-group-header"><strong>' . __( 'Main Settings', 'robin-image-optimizer' ) . '</strong><p>' . __( 'This section you can set main images optimization settings.', 'robin-image-optimizer' ) . '</p></div>'
			);
			
			$options[] = array(
				'type' => 'dropdown',
				'name' => 'image_optimization_server',
				'title' => __('Optimization server', 'robin-image-optimizer'),
				'data' => array(
					array(
						'resmush',
						__('Server 1 (recommended) - image size limit up to 5 MB', 'robin-image-optimizer'),

					),
					array(
						'smushpro',
						__('Server 2 - image size limit up to 1 MB', 'robin-image-optimizer')
					)
				),
				'layout' => array('hint-type' => 'icon', 'hint-icon-color' => 'grey'),
				'hint' => __('We use several free servers for image optimization and can’t fully guarantee their stable performance. The server can be not available in some countries due to the political reasons. There is a solution: if one of the servers is not available or can’t optimize the image, you can try to switch to the alternative server. Each server has individual limitations for image weight and optimization level. By default, you have the best server with minimum limitations.', 'robin-image-optimizer'),
				'default' => 'resmush',
			);  

			// Радио переключатель
			$options[] = array(
				'type'  => 'dropdown',
				'name'  => 'image_optimization_level',
				'way'   => 'buttons',
				'title' => __( 'Compression mode', 'robin-image-optimizer' ),
				'data'  => array(
					array(
						'normal',
						__( 'Normal', 'robin-image-optimizer' ),
						__( 'This mode provides lossless compression and your images will be optimized without visible changes. If you want an ideal image quality, we recommend this mode. The size of the files will be reduced approximately 2 times. If this is not enough for you, try other modes.', 'robin-image-optimizer' )
					),
					array(
						'aggresive',
						__( 'Medium', 'robin-image-optimizer' ),
						__( 'This mode provides an ideal optimization of your images without significant quality loss. The file size will be reduced approximately 5 times with a slight decrease in image quality. In most cases that cannot be seen with the naked eye.', 'robin-image-optimizer' )
					),
					array(
						'ultra',
						__( 'High', 'robin-image-optimizer' ),
						__( 'This mode will use all available optimization methods for maximum image compression. The file size will be reduced approximately 7 times. The quality of some images may deteriorate slightly. Use this mode if you need the maximum weight reduction, and you are ready to accept the loss of image quality.', 'robin-image-optimizer' )
					)
				),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Select the compression mode appropriate for your case.', 'robin-image-optimizer' ),
				'default' => 'normal',
				/*'events' => array(
					'disable_certain_post_types_comments' => array(
						'show' => '.factory-control-disable_comments_for_post_types, #wbcr-clearfy-comments-base-options'
					),
					'enable_comments' => array(
						'show' => '#wbcr-clearfy-comments-base-options',
						'hide' => '.factory-control-disable_comments_for_post_types'
					),
					'disable_comments' => array(
						'hide' => '.factory-control-disable_comments_for_post_types, #wbcr-clearfy-comments-base-options'
					)
				)*/
			);

			// Переключатель
			$options[] = array(
				'type'    => 'checkbox',
				'way'     => 'buttons',
				'name'    => 'auto_optimize_when_upload',
				'title'   => __( 'Auto optimization on upload', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Automatically compress all images that you upload directly to the WordPress media library, when editing pages and posts or using themes and plugins.', 'robin-image-optimizer' ),
				'default' => false
			);

			// Переключатель
			$options[] = array(
				'type'    => 'checkbox',
				'way'     => 'buttons',
				'name'    => 'backup_origin_images',
				'title'   => __( 'Backup images', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Before optimizing, all your images will be saved in a separate folder for future recovery.', 'robin-image-optimizer' ),
				'default' => true
			);
			
			// Переключатель
			$options[] = array(
				'type'    => 'checkbox',
				'way'     => 'buttons',
				'name'    => 'error_log',
				'title'   => __( 'Error Log', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Enable error logging. The log will be displayed on a separate tab.', 'robin-image-optimizer' ),
				'default' => false
			);
			
			// восстановление
			$options[] = array(
				'type' => 'html',
				'html' => array( $this, 'rollbackButton' ),
			);

			// Переключатель
			$options[] = array(
				'type'    => 'checkbox',
				'way'     => 'buttons',
				'name'    => 'save_exif_data',
				'title'   => __( 'Leave EXIF data', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'EXIF is information stored in photos: camera model, shutter speed, exposure compensation, ISO, GPS, etc. By default, the plugin removes EXIF extended data. If your project is dedicated to photography and you need to display this data, then enable this option.', 'robin-image-optimizer' ),
				'default' => true
			);

			$options[] = array(
				'type' => 'html',
				'html' => '<div class="wbcr-factory-page-group-header"><strong>' . __( 'Optimization', 'robin-image-optimizer' ) . '</strong><p>' . __( 'Here you can specify additional image optimization options.', 'robin-image-optimizer' ) . '</p></div>'
			);

			// Переключатель
			$options[] = array(
				'type'     => 'checkbox',
				'way'      => 'buttons',
				'name'     => 'resize_larger',
				'title'    => __( 'Resizing large images', 'robin-image-optimizer' ),
				'layout'   => array('hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'     => __( 'When you upload images from a camera or stock, they may be too high resolution and it is not necessary for web. The option allows you to automatically change images resolution on upload.', 'robin-image-optimizer' ),
				'default'  => false,
				// когда чекбокс включен показываем поле с классом .factory-control-resize_larger_w
				'eventsOn' => array(
					'show' => '.factory-control-resize_larger_w'
				),
				// когда чекбокс выключен, скрываем поле с классом .factory-control-resize_larger_w
				'eventsOff' => array(
					'hide'  => '.factory-control-resize_larger_w'
				)
			);

			// Текстовое поле
			$options[] = array(
				'type'    => 'textbox',
				'name'    => 'resize_larger_w',
				'title'   => __( 'Enter the maximum size (px)', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Set the maximum images resolution on the long side. For horizontal images, this will be the width, and for vertical images - the height. The resolution of the images will be changed proportionally according to the set value.', 'robin-image-optimizer' ),
				'default' => '1600'
			);
			
			// получаем зарегистрированные размеры изображений
			$wp_image_sizes = wio_get_image_sizes();
			$wio_image_sizes = array();
			foreach( $wp_image_sizes as $key => $value ) {
				$wio_image_sizes[] = array(
					$key,
					$key . ' - ' . $value['width'] . 'x' . $value['height'],
				);
			}

			$options[] = array(
				'type'    => 'list',
				'way'     => 'checklist',
				'name'    => 'allowed_sizes_thumbnail',
				'title'   => __( 'Optimize thumbnails', 'robin-image-optimizer' ),
				'data'    => $wio_image_sizes,
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Choose which sizes of thumbnails should be optimized and uncheck those that do not need optimization.', 'robin-image-optimizer' ),
				'default' => 'thumbnail,medium'
			);
			
			// cron
			$options[] = array(
				'type' => 'html',
				'html' => '<div class="wbcr-factory-page-group-header"><strong>' . __( 'Scheduled optimization', 'robin-image-optimizer' ) . '</strong><p>' . __( 'Schedule your images optimization.', 'robin-image-optimizer' ) . '</p></div>'
			);
			
			// автооптимизация
			$options[] = array(
				'type'      => 'checkbox',
				'way'       => 'buttons',
				'name'      => 'image_autooptimize_mode',
				'title'     => __( 'Enable Scheduled Optimization', 'robin-image-optimizer' ),
				'layout'    => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'      => __( 'You can enable image optimization on schedule. The plugin will optimize specified number of images automatically after selected time.', 'robin-image-optimizer' ),
				'default'   => false,
				'eventsOn'  => array(
					'show' => '#wbcr-io-shedule-options'
				),
				'eventsOff' => array(
					'hide' => '#wbcr-io-shedule-options'
				)
			);

			$group_items[] = array(
				'type'   => 'dropdown',
				'way'    => 'buttons',
				'name'   => 'image_autooptimize_shedule_time',
				'data'   => array(
					array( 'wio_1_min', __( '1 min', 'robin-image-optimizer' ) ),
					array( 'wio_2_min', __( '2 min', 'robin-image-optimizer' ) ),
					array( 'wio_5_min', __( '5 min', 'robin-image-optimizer' ) ),
					array( 'wio_10_min', __( '10 min', 'robin-image-optimizer' ) ),
					array( 'wio_30_min', __( '30 min', 'robin-image-optimizer' ) ),
					array( 'wio_hourly', __( 'Hour', 'robin-image-optimizer' ) ),
					array( 'wio_daily', __( 'Day', 'robin-image-optimizer' ) ),
				),
				'default' => 'wio_5_min',
				'title'   => __( 'Run every', 'robin-image-optimizer' ),
				'hint'    => __( 'Select time at which the task will be repeated.', 'robin-image-optimizer' )
			);


			$group_items[] = array(
				'type'    => 'textbox',
				'name'    => 'image_autooptimize_items_number_per_interation',
				'title'   => __( 'Images per iteration', 'robin-image-optimizer' ),
				'layout'  => array( 'hint-type' => 'icon', 'hint-icon-color' => 'grey' ),
				'hint'    => __( 'Specify the number of images that will be optimized during the job. For example, if you enter 5 and select 5 min, the plugin will optimize 5 images every 5 minutes.', 'robin-image-optimizer' ),
				'default' => '3'
			);

			$options[] = array(
				'type'  => 'div',
				'id'    => 'wbcr-io-shedule-options',
				'items' => $group_items
			);

			$formOptions = array();
			
			$formOptions[] = array(
				'type'  => 'form-group',
				'items' => $options,
				//'cssClass' => 'postbox'
			);
			
			return apply_filters( 'wbcr_wio_settings_form_options', $formOptions );
		}
		
		/**
		 * Кнопка восстановления изображений
		 *
		 */
		public function rollbackButton() {
			?>
				<div class="form-group form-group-checkbox  factory-control-save_exif_data">
					<label for="wbcr_io_save_exif_data" class="col-sm-6 control-label">
						<?php _e( 'Manage backups', 'robin-image-optimizer' ); ?>
						<span class="factory-hint-icon factory-hint-icon-grey" data-toggle="factory-tooltip" data-placement="right" title="" data-original-title="<?php _e( 'You can restore the original images from a backup or clear them.', 'robin-image-optimizer' ); ?>">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAQAAABKmM6bAAAAUUlEQVQIHU3BsQ1AQABA0X/komIrnQHYwyhqQ1hBo9KZRKL9CBfeAwy2ri42JA4mPQ9rJ6OVt0BisFM3Po7qbEliru7m/FkY+TN64ZVxEzh4ndrMN7+Z+jXCAAAAAElFTkSuQmCC" alt="">
						</span>
					</label>
					<input type="hidden" value="<?php echo wp_create_nonce( 'wio-iph' ) ?>" id="wio-iph-nonce">
					<div class="control-group col-sm-6">
						<div class="factory-buttons-way btn-group">
							<a class="btn btn-default" id="wio-restore-backup-btn" data-confirm="<?php _e( 'Are you sure?', 'robin-image-optimizer' ); ?>" href="#"><?php _e( 'Restore', 'robin-image-optimizer' ); ?></a>
							<a class="btn btn-default" id="wio-clear-backup-btn" data-confirm="<?php _e( 'Are you sure that you want to clear image backups folder?', 'robin-image-optimizer' ); ?>" href="#"><?php _e( 'Clear Backup', 'robin-image-optimizer' ); ?></a>
						</div>
						<div class="progress" id="wio-restore-backup-progress" style="display:none;">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
								
							</div>
						</div>
						<p id="wio-restore-backup-msg" style="display:none;"><?php _e( 'Restore completed.', 'robin-image-optimizer' ); ?></p>
						<p id="wio-clear-backup-msg" style="display:none;"><?php _e( 'The backup folder was cleared.', 'robin-image-optimizer' ); ?></p>
					</div>
				</div>
			
			<?php
		}

	}
