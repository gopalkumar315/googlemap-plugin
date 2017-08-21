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

global $wpdb;
$table_name = $wpdb->prefix . 'gbgm_list';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $mapData = $wpdb->get_row("SELECT * FROM $table_name where id = $id");
}
?>

<div class="wrap">
    <h2><?php echo (@$mapData)?'Update':'Add'; ?> Google Map</h2>
    <form method="post" action="<?php echo admin_url( 'admin-post.php?action=gm_save' ); ?>">

        <p><strong>Title:</strong><br />
            <input type="text" name="title" size="45" required="required" value="<?php echo @$mapData->title?>" />
        </p>

        <p><strong>Latitude:</strong><br />
            <input type="text" name="latitude" size="45" value="<?php echo @$mapData->latitude; ?>" required="required" />
        </p>

        <p><strong>Longitude:</strong><br />
            <input type="text" name="longitude" size="45" value="<?php echo @$mapData->longitude; ?>" required="required" />
        </p>

        <p><strong>Address:</strong><br />
            <textarea name="address" id="" cols="49" rows="5"><?php echo @$mapData->address; ?></textarea>
        </p>

        <p><strong>Style:</strong><br />
            <input type="text" name="style" size="45" value="<?php echo @$mapData->style; ?>" />
        </p>

        <p><strong>Height (in px):</strong><br />
            <input type="text" name="height" size="45" value="<?php echo (@$mapData->height)?@$mapData->height.'px':''; ?>" required="required" />
        </p>        

        <p><strong>Icon Url:</strong><br />
            <input type="text" name="icon" size="45" value="<?php echo @$mapData->icon; ?>" />
            <input type="hidden" name="action" size="45" value="gm_save" />
        </p>

        <p><strong>Status:</strong><br />
            <select name="status">
                <option value="1" <?php echo (@$mapData->status)?'selected=selected':''; ?>>Enabled</option>
                <option value="0" <?php echo (@$mapData->status)?:'selected=selected'; ?>>Disabled</option>
            </select>
        </p>
        
        <?php if(@$mapData):?>
            <input type="hidden" name="id" value="<?php echo @$mapData->id; ?>">
        <?php endif;?>

        <p><input type="submit" name="Submit" class="button button-primary" value="Update" /></p>
    </form>
</div>

