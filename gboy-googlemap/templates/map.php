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

if (isset($attr['id'])):
    global $wpdb;
    $id = $attr['id'];

    $table_name = $wpdb->prefix . 'gbgm_list';
    $mapData = $wpdb->get_row("SELECT * FROM $table_name where id = $id and status = 1");
    $mapId = 'gbgm_map_' . uniqid();

    if ($mapData):?>
        <div id="<?php echo $mapId; ?>" style="height:<?php echo $mapData->height; ?>px;"></div>
        <script>
            function initMap_<?php echo $mapData->id;?>() {

                <?php $style = $mapData->style; ?>

                <?php if($mapData->custom_style != ''):?>
                    var style = <?php echo stripslashes($mapData->custom_style);?>;
                <?php else: ?>

                    <?php if($style == 0): ?>
                        var style = [];
                    <?php endif;?>

                    <?php if($style == 1): ?>
                        var style= [{"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"saturation": 36},{"color": "#000000"},{"lightness": 40}]},{"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"visibility": "on"},{"color": "#000000"},{"lightness": 16}]},{"featureType": "all", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#000000"},{"lightness": 20}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#000000"},{"lightness": 17},{"weight": 1.2}]},{"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 20}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 21}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#000000"},{"lightness": 17}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#000000"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 18}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 16}]},{"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 19}]},{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#000000"},{"lightness": 17}]}];
                    <?php endif;?>

                    <?php if($style == 2): ?>
                        var style= [{"featureType": "all", "elementType": "all", "stylers": [{"saturation": -100},{"gamma": 0.5}]}];
                    <?php endif;?>

                    <?php if($style == 3): ?>
                        var style= [{"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#d3d3d3"}]},{"featureType": "transit", "stylers": [{"color": "#808080"},{"visibility": "off"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"visibility": "on"},{"color": "#b3b3b3"}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}]},{"featureType": "road.local", "elementType": "geometry.fill", "stylers": [{"visibility": "on"},{"color": "#ffffff"},{"weight": 1.8}]},{"featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{"color": "#d7d7d7"}]},{"featureType": "poi", "elementType": "geometry.fill", "stylers": [{"visibility": "on"},{"color": "#ebebeb"}]},{"featureType": "administrative", "elementType": "geometry", "stylers": [{"color": "#a7a7a7"}]},{"featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}]},{"featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}]},{"featureType": "landscape", "elementType": "geometry.fill", "stylers": [{"visibility": "on"},{"color": "#efefef"}]},{"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#696969"}]},{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"visibility": "on"},{"color": "#737373"}]},{"featureType": "poi", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "off"}]},{"featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{"color": "#d6d6d6"}]},{"featureType": "road", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{},{"featureType": "poi", "elementType": "geometry.fill", "stylers": [{"color": "#dadada"}]}];
                    <?php endif;?>

                    <?php if($style == 4): ?>
                        var style= [{"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"color": "#ffffff"}]},{"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"color": "#000000"},{"lightness": 13}]},{"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#000000"}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#144b53"},{"lightness": 14},{"weight": 1.4}]},{"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#08304b"}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#0c4152"},{"lightness": 5}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#000000"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#0b434f"},{"lightness": 25}]},{"featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{"color": "#000000"}]},{"featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{"color": "#0b3d51"},{"lightness": 16}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#000000"}]},{"featureType": "transit", "elementType": "all", "stylers": [{"color": "#146474"}]},{"featureType": "water", "elementType": "all", "stylers": [{"color": "#021019"}]}];
                    <?php endif;?>

                    <?php if($style == 5): ?>
                        var style= [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"}]},{"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]},{"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]},{"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100},{"lightness": 45}]},{"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"}]},{"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]},{"featureType": "water", "elementType": "all", "stylers": [{"color": "#46bcec"},{"visibility": "on"}]}];
                    <?php endif;?>

                    <?php if($style == 6): ?>
                        var style= [{"stylers": [{"hue": "#2c3e50"},{"saturation": 250}]},{"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 50},{"visibility": "simplified"}]},{"featureType": "road", "elementType": "labels", "stylers": [{"visibility": "off"}]}];
                    <?php endif;?>

                    <?php if($style == 7): ?>
                        var style= [{"featureType": "water", "stylers": [{"color": "#19a0d8"}]},{"featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{"color": "#ffffff"},{"weight": 6}]},{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#e85113"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#efe9e4"},{"lightness": -40}]},{"featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{"color": "#efe9e4"},{"lightness": -20}]},{"featureType": "road", "elementType": "labels.text.stroke", "stylers": [{"lightness": 100}]},{"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"lightness": -100}]},{"featureType": "road.highway", "elementType": "labels.icon"},{"featureType": "landscape", "elementType": "labels", "stylers": [{"visibility": "off"}]},{"featureType": "landscape", "stylers": [{"lightness": 20},{"color": "#efe9e4"}]},{"featureType": "landscape.man_made", "stylers": [{"visibility": "off"}]},{"featureType": "water", "elementType": "labels.text.stroke", "stylers": [{"lightness": 100}]},{"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"lightness": -100}]},{"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"hue": "#11ff00"}]},{"featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{"lightness": 100}]},{"featureType": "poi", "elementType": "labels.icon", "stylers": [{"hue": "#4cff00"},{"saturation": 58}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"visibility": "on"},{"color": "#f0e4d3"}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#efe9e4"},{"lightness": -25}]},{"featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{"color": "#efe9e4"},{"lightness": -10}]},{"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "simplified"}]}];
                    <?php endif;?>

                    <?php if($style == 8): ?>
                        var style= [{"featureType": "administrative", "elementType": "all", "stylers": [{"visibility": "on"},{"lightness": 33}]},{"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2e5d4"}]},{"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#c5dac6"}]},{"featureType": "poi.park", "elementType": "labels", "stylers": [{"visibility": "on"},{"lightness": 20}]},{"featureType": "road", "elementType": "all", "stylers": [{"lightness": 20}]},{"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#c5c6c6"}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#e4d7c6"}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#fbfaf7"}]},{"featureType": "water", "elementType": "all", "stylers": [{"visibility": "on"},{"color": "#acbcc9"}]}];
                    <?php endif;?>

                    <?php if($style == 9): ?>
                        var style= [{"featureType": "administrative", "elementType": "all", "stylers": [{"visibility": "off"}]},{"featureType": "landscape", "elementType": "all", "stylers": [{"visibility": "simplified"},{"hue": "#0066ff"},{"saturation": 74},{"lightness": 100}]},{"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "simplified"}]},{"featureType": "road", "elementType": "all", "stylers": [{"visibility": "simplified"}]},{"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "off"},{"weight": 0.6},{"saturation": -85},{"lightness": 61}]},{"featureType": "road.highway", "elementType": "geometry", "stylers": [{"visibility": "on"}]},{"featureType": "road.arterial", "elementType": "all", "stylers": [{"visibility": "off"}]},{"featureType": "road.local", "elementType": "all", "stylers": [{"visibility": "on"}]},{"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "simplified"}]},{"featureType": "water", "elementType": "all", "stylers": [{"visibility": "simplified"},{"color": "#5f94ff"},{"lightness": 26},{"gamma": 5.86}]}];
                    <?php endif;?>

                    <?php if($style == 10): ?>
                         var style= [{"featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{"visibility": "on"},{"color": "#e0efef"}]},{"featureType": "poi", "elementType": "geometry.fill", "stylers": [{"visibility": "on"},{"hue": "#1900ff"},{"color": "#c0e8e8"}]},{"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 100},{"visibility": "simplified"}]},{"featureType": "road", "elementType": "labels", "stylers": [{"visibility": "off"}]},{"featureType": "transit.line", "elementType": "geometry", "stylers": [{"visibility": "on"},{"lightness": 700}]},{"featureType": "water", "elementType": "all", "stylers": [{"color": "#7dcdcd"}]}];
                    <?php endif;?>

                    <?php if($style == 11): ?>
                        var style= [{"featureType": "landscape.man_made", "elementType": "geometry", "stylers": [{"color": "#f7f1df"}]},{"featureType": "landscape.natural", "elementType": "geometry", "stylers": [{"color": "#d0e3b4"}]},{"featureType": "landscape.natural.terrain", "elementType": "geometry", "stylers": [{"visibility": "off"}]},{"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "off"}]},{"featureType": "poi.business", "elementType": "all", "stylers": [{"visibility": "off"}]},{"featureType": "poi.medical", "elementType": "geometry", "stylers": [{"color": "#fbd3da"}]},{"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#bde6ab"}]},{"featureType": "road", "elementType": "geometry.stroke", "stylers": [{"visibility": "off"}]},{"featureType": "road", "elementType": "labels", "stylers": [{"visibility": "off"}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffe15f"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#efd151"}]},{"featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}]},{"featureType": "road.local", "elementType": "geometry.fill", "stylers": [{"color": "black"}]},{"featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{"color": "#cfb2db"}]},{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#a2daf2"}]}];
                    <?php endif;?>

                    <?php if($style == 12): ?>
                        var style= [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
                    <?php endif;?>

                    <?php if($style == 13): ?>
                        var style= [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-17},{"gamma":0.36}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}];
                    <?php endif;?>

                    <?php if($style == 14): ?>
                        var style= [{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#165c64"},{"saturation":34},{"lightness":-69},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#b7caaa"},{"saturation":-14},{"lightness":-18},{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"hue":"#cbdac1"},{"saturation":-6},{"lightness":-9},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#8d9b83"},{"saturation":-89},{"lightness":-12},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#d4dad0"},{"saturation":-88},{"lightness":54},{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#bdc5b6"},{"saturation":-89},{"lightness":-3},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#bdc5b6"},{"saturation":-89},{"lightness":-26},{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"hue":"#c17118"},{"saturation":61},{"lightness":-45},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#8ba975"},{"saturation":-46},{"lightness":-28},{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"hue":"#a43218"},{"saturation":74},{"lightness":-51},{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#3a3935"},{"saturation":5},{"lightness":-57},{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"hue":"#cba923"},{"saturation":50},{"lightness":-46},{"visibility":"on"}]}];
                    <?php endif;?>

                    <?php if($style == 15): ?>
                        var style= [{"stylers":[{"hue":"#dd0d0d"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]}];
                    <?php endif;?>

                    <?php if($style == 16): ?>
                        var style= [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];
                    <?php endif;?>

                    <?php if($style == 17): ?>
                        var style= [{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}];
                    <?php endif;?>

                    <?php if($style == 18): ?>
                        var style= [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}];
                    <?php endif;?>

                    <?php if($style == 19): ?>
                        var style= [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}];
                    <?php endif;?>

                    <?php if($style == 20): ?>
                        var style= [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}];
                    <?php endif;?>

                    <?php if($style == 21): ?>
                        var style= [{"featureType":"all","elementType":"all","stylers":[{"color":"#000000"}]},{"featureType":"all","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#ebf3f9"},{"saturation":"5"},{"lightness":"-2"}]},{"featureType":"all","elementType":"labels","stylers":[{"color":"#ff0000"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"color":"#ff0000"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20},{"color":"#434e5f"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"weight":2},{"gamma":0.8},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"},{"color":"#00c8ff"},{"weight":"0.20"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"gamma":"1.31"},{"color":"#ccdaef"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":"12"},{"lightness":"-80"},{"color":"#7084a2"},{"visibility":"off"},{"gamma":"8.13"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]}];
                    <?php endif;?>
                <?php endif;?>



                var myLatlng = new google.maps.LatLng(<?php echo $mapData->latitude;?>, <?php echo $mapData->longitude;?>);
                var map = new google.maps.Map(document.getElementById('<?php echo $mapId;?>'), {
                    zoom: <?php echo ($mapData->zoom)?$mapData->zoom:12;?>,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.<?php echo strtoupper($mapData->map_type);?>,
                    styles: style,
                    scrollwheel: <?php echo ($mapData->scroll)?'true':'false';?>,
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
        <script>
            window.addEventListener("load", initMap_<?php echo $mapData->id;?>, false);
        </script>
    <?php endif; ?>
<?php endif; ?>


