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
    global $wpdb;
    $table_name = $wpdb->prefix . 'gbgm_list';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $wpdb->delete($table_name,array('id' => $id));
    }
    $AllResult = $wpdb->get_results("SELECT * FROM $table_name order by id desc");
?>
<div class="wrap">
    <h1 class="wp-heading-inline">Google Maps</h1>
    <a href="admin.php?page=gm_add" class="page-title-action">Add New</a>

    <table id="GMList" class="table table-striped">
        <thead>
            <tr>
                <th width="3%">#</th>
                <th width="15%">Title</th>
                <th width="15%">Shortcode</th>
                <th width="10%">Latitude</th>
                <th width="10%">Latitude</th>
                <th width="20%">Address</th>
                <th width="10%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php if($AllResult):?>
            <?php foreach($AllResult as $row):?>
                <tr>
                    <td> <?php echo $row->id;?></td>
                    <td> <?php echo $row->title;?> </td>
                    <td> [googlemap id="<?php echo $row->id;?>" ] </td>
                    <td> <?php echo $row->latitude;?> </td>
                    <td> <?php echo $row->longitude;?> </td>
                    <td> <?php echo $row->address;?> </td>
                    <td>
                        <?php if($row->status == 0):?>
                            <label class="label label-xs label-danger"> Disabled </label>
                        <?php else:?>
                            <label class="label label-xs label-success"> Enabled </label>
                        <?php endif;?>
                    </td>
                    <td>
                        <a href="admin.php?page=gm_edit&id=<?php echo $row->id; ?>">Edit</a>
                        <a href="admin.php?page=gm_list&id=<?php echo $row->id; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        <a href="admin.php?page=gm_duplicate&id=<?php echo $row->id; ?>&noheader=true">Duplicate</a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr class="text-center"> <td colspan="7"> No Result Found </td>  </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('#GMList').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>

<style>
    table th {
        text-align:left;
    }
</style>
