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
    <?php
        $Styles = array(
                '0' => 'Default',
                '1' => 'Shades of Grey',
                '2' => 'Greyscale',
                '3' => 'Light Gray',
                '4' => 'Midnight Commander',
                '5' => 'Blue water',
                '6' => 'Icy Blue',
                '7' => 'Bright and Bubbly',
                '8' => 'Pale Dawn',
                '9' => 'Paper',
                '10' => 'Blue Essence',
                '11' => 'Apple Maps-esque',
                '12' => 'Subtle Grayscale',
                '13' => 'Retro',
                '14' => 'Hopper',
                '15' => 'Red Hues',
                '16' => 'Ultra Light with labels',
                '17' => 'Unsaturated Browns',
                '18' => 'Light Dream',
                '19' => 'Neutral Blue',
                '20' => 'MapBox',
                '21' => 'Yogax Blue',
        );

    ?>
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

        <p><strong>Address (Show in info window):</strong><br />
            <textarea name="address" id="" cols="49" rows="5"><?php echo @$mapData->address; ?></textarea>
        </p>

        <p> <strong>Map Style:</strong><br />
            <select name="style">
                <?php foreach($Styles as $key => $value):?>
                    <option value="<?php echo $key;?>" <?php echo (@$mapData->style == $key)? 'selected="selected"':''; ?>><?php echo $value;?></option>
                <?php endforeach;?>
            </select>
        </p>

        <p><strong>Custom Json Map Style:</strong><br />
            <textarea name="custom_style" cols="49" rows="5"><?php echo stripslashes(@$mapData->custom_style); ?></textarea>
        </p>

        <p><strong>Map Type:</strong><br />
            <select name="map_type">
                <option value="roadmap"  <?php echo (@$mapData->map_type == 'roadmap')?'selected="selected"':'';?>>Road Map</option>
                <option value="satellite" <?php echo (@$mapData->map_type == 'satellite')?'selected="selected"':'';?> >Satellite</option>
                <option value="hybrid"    <?php echo (@$mapData->map_type == 'hybrid')?'selected="selected"':'';?>>Hybrid</option>
                <option value="terrain"   <?php echo (@$mapData->map_type == 'terrain')?'selected="selected"':'';?>>Terrain</option>
            </select>
        </p>

        <p><strong>Zoom:</strong><br />
           <input type="number" min="0" name="zoom" value="<?php echo @$mapData->zoom; ?>" required="required" />
        </p>

        <p><strong>Height (in px):</strong><br />
            <input type="text" name="height" size="45" value="<?php echo (@$mapData->height)?@$mapData->height.'px':''; ?>" required="required" />
        </p>

        <p><strong>Scroll: </strong> <br>
            <select name="scroll" id="">
                <option value="1" <?php echo (@$mapData->scroll == 1)?'selected="selected"':'';?>> Yes </option>
                <option value="0" <?php echo (@$mapData->scroll == 0)?'selected="selected"':'';?>> No </option>
            </select>
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

