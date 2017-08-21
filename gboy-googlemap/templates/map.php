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
if (isset($attr['id'])):
    global $wpdb;
    $id = $attr['id'];

    $table_name = $wpdb->prefix . 'gbgm_list';
    $mapData = $wpdb->get_row("SELECT * FROM $table_name where id = $id and status = 1");
    $mapId = 'gbgm_map_' . uniqid();

    if($mapData):?>
        <div id="<?php echo $mapId;?>" style="height:<?php echo $mapData->height;?>px;"></div>
        <script>
            function initMap_<?php echo $mapData->id;?>() {
                var style= [{"featureType":"all","elementType":"all","stylers":[{"color":"#000000"}]},{"featureType":"all","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#ebf3f9"},{"saturation":"5"},{"lightness":"-2"}]},{"featureType":"all","elementType":"labels","stylers":[{"color":"#ff0000"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"color":"#ff0000"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20},{"color":"#434e5f"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"weight":2},{"gamma":0.8},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"},{"color":"#00c8ff"},{"weight":"0.20"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"gamma":"1.31"},{"color":"#ccdaef"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":"12"},{"lightness":"-80"},{"color":"#7084a2"},{"visibility":"off"},{"gamma":"8.13"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]}];
                var myLatlng = new google.maps.LatLng(<?php echo $mapData->latitude;?>, <?php echo $mapData->longitude;?>);
                var map = new google.maps.Map(document.getElementById('<?php echo $mapId;?>'), {
                    zoom: 15,
                    center: myLatlng,
                    mapTypeId  : google.maps.MapTypeId.ROADMAP,
//                    styles: style,
                    scrollwheel: false,
                });

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    icon: "<?php echo $mapData->icon;?>",
                    map_icon_label: '<span class="map-icon map-icon-postal-code-prefix"></span>'
                });

                <?php if($mapData->address != ''):?>

                var contentString = <?php echo json_encode($mapData->address);?>;
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                infowindow.open(map, marker);
                <?php endif;?>
            }
        </script>
        <?php $gmScript = 'https://maps.googleapis.com/maps/api/js?callback=initMap_'.$mapData->id;?>
        <?php if($key = get_option('gbgm_key')):?>
            <?php $gmScript.= '&key='.$key; ?>
        <?php endif;?>
        <script async defer src="<?php echo $gmScript;?>"></script>
    <?php endif;?>
<?php endif; ?>




