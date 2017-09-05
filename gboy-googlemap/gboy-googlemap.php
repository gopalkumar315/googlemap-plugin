<?php
/**
 * Copyright (c) 2017.
 * Plugin Name: Google Map
 * Plugin URI: http://googleboy.in
 * Description: Stylish Google Map
 * Version: 1.0
 * Author: Gopal Kumar
 * Author URI: http://googleboy.in
 */

// Plugin Folder Path
if (!defined('GM_PATH')) {
    define('GM_PATH', plugin_dir_path(__FILE__));
}

// Plugin Folder URL
if (!defined('GM_URL')) {
    define('GM_URL', plugin_dir_url(__FILE__));
}

if (!class_exists('GM_Plugin')) {

    /**
     * The Main Class
     */
    class GM_Plugin
    {
        /**
         * Plugin Version
         *
         * @since 1.0.0
         * @var string
         */
        const VERSION = '1.0.0';

        protected $db;

        /**
         * Instance of class
         *
         * @access protected
         * @since 1.0.0
         *
         */
        protected static $instance = null;


        /**
         * CFD_Plugin constructor.
         *
         * @access private
         * @since 1.0.0
         */
        private function __construct()
        {
            global $wpdb;
            add_action('admin_menu', array($this, 'admin_menu'));
            // enqueue admin script
            add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
            $this->db = $wpdb;
            self::init();
        }

        /**
         * Initialize actions
         * @access public
         * @return null
         */
        public function init() {
            add_action('admin_post_gm_save', array($this, 'gm_save'));
            add_shortcode('googlemap', array($this, 'embed_map'));
        }

        /**
         * Map Page called by Short Code
         * @access public
         * @return null
         */
        public function embed_map($attr = array()) {
            include wp_normalize_path(GM_PATH . '/templates/map.php');
        }

        /**
         * Save Data
         * @access public
         * @return null
         */
        public function gm_save() {
            $table_name = $this->db->prefix . "gbgm_list";
            if ($_POST) {
                $postData = $_POST;
                unset($postData['action']);
                unset($postData['Submit']);
                $postData['created_at'] = date('Y-m-d H:i:s');
                $postData['height'] = preg_replace('/(%)|(px)/', '', $postData['height']);

                if ($id = $_POST['id']) {
                    unset($postData['id']);
                    $this->db->update($table_name, $postData, array('id' => $id));
                } else {
                     $this->db->insert($table_name, $postData);
                     $id = $this->db->insert_id;
                }
            }
            wp_redirect(admin_url('/admin.php?page=gm_edit&id='.$id));
        }

        /**
         * Return the instance of class
         * @access public
         * @return Object A Single Instance of the class
         */
        public static function get_instance()
        {
            if (null === self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function gm_add() {
            include_once wp_normalize_path(GM_PATH . '/templates/add.php');
        }

        /**
         * Setting Options Page Template
         * @access public
         * return null
         */
        public function setting() {
            include_once wp_normalize_path(GM_PATH . '/templates/setting.php');
        }

        /**
         * Google Map List View
         * @access public
         * return null
         */
        public function gm_list() {
            include_once wp_normalize_path(GM_PATH . '/templates/list.php');
        }

        /**
         * add admin assets
         * @access public
         * @return null
         */
        public function admin_assets($hook) {
            if ($hook != 'google-map_page_gm_list') {
                return '';
            }
            wp_enqueue_style('gm_datatable_css', GM_URL . 'css/datatable.min.css', false, 1.1);
            wp_enqueue_script('gm_datatable_js', GM_URL . 'js/datatable.min.js', false, 1.1);
        }

        /**
         * GM Admin Menu
         * @access public
         */
        public function admin_menu() {
            add_menu_page(__('Google Map'), 'Google Map', 'manage_options', 'gm_setting', array($this, 'setting'), 'dashicons-chart-pie', 72);
            add_submenu_page('gm_setting', 'Setting', 'Setting', 'manage_options', 'gm_setting', array($this, 'setting'));
            add_submenu_page('gm_setting', 'List', 'List', 'manage_options', 'gm_list', array($this, 'gm_list'));
            add_submenu_page(null, '', '', 'administrator', 'gm_add', array($this, 'gm_add'));
            add_submenu_page(null, '', '', 'administrator', 'gm_edit', array($this, 'gm_add'));
        }

    }
}

// load the instance of plugin
add_action('plugins_loaded', array('GM_Plugin', 'get_instance'));

/**
 * setup database
 * @return void
 */
function gbgm_list_table()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'gbgm_list';

    $sql = "CREATE TABLE $table_name (
		id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) DEFAULT '' NOT NULL,
		latitude VARCHAR(255) DEFAULT '' NOT NULL,
		longitude VARCHAR(255) DEFAULT '' NOT NULL,
		address TEXT DEFAULT '' NOT NULL,
		style VARCHAR(255) DEFAULT '' NOT NULL,
		custom_style TEXT DEFAULT '' NOT NULL,
		map_type VARCHAR(255) DEFAULT '' NOT NULL,
		zoom  INT DEFAULT 0 NOT NULL,
		scroll  INT DEFAULT 0 NOT NULL,
		height VARCHAR(255) DEFAULT '' NOT NULL,
		icon VARCHAR(255) DEFAULT '' NOT NULL,
		status INT DEFAULT 0 NOT NULL,		
		created_at DATETIME, 
		UNIQUE KEY id (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'gbgm_list_table');
