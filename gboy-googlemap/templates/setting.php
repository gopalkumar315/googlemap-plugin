<?php
/**
 * Copyright (c) 2017.
 * Plugin Name: Gboy Custom Google Map
 * Plugin URI: https://github.com/gopalkumar315/googlemap-plugin
 * Description: Stylish Google Map
 * Version: 1.0
 * Author: Ehues
 * Author URI: http://ehues.com
 * Text Domain: gboy-custom-google-map
 * Domain Path: /languages
 */
?>

<div class="wrap">
    <h2>Google Map Key</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options') ?>
        <p><strong>Key:</strong><br />
            <input type="text" name="gbgm_key" size="45" value="<?php echo get_option('gbgm_key'); ?>" />
        </p>
        <p><input type="submit" name="Submit" class="button button-primary" value="Update" /></p>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="gbgm_key" />
    </form>
</div>
