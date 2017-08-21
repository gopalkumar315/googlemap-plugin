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
