<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }
        #floating-panel {
            position: absolute;
            top: 80px;
            left: 1%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            min-height: 400px;
            max-width: 30%;
        }
        .hover-highlight:hover{
            background-color: #95BCFD;
            cursor: pointer;
        }
        .location-item{
            float: left;
            margin-left: 31px;
        }


    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?php echo config_item('asset_url'). 'default/css'?>/font-awesome.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo config_item('asset_url'); ?>default/js/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="<?php echo config_item('asset_url'); ?>default/css/cropper.min.css"/>
    <link rel="stylesheet" href="<?php echo config_item('asset_url'); ?>default/css/custom.css"/>

    <script src="<?php echo config_item('asset_url'); ?>default/js/custom-autocomplete.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/cropper/cropper.min.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/main.js"></script>
</head>
<body>
    <div id="floating-panel">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" id="filterLocationInput" class="form-control" />
            <span class="input-group-addon"><i class="fa fa-caret-down"></i></span>
        </div>
        <div class="row hover-highlight">
            <a data-value="0" tabindex="-1" style="overflow:hidden; text-decoration: none">
                <i class="fa fa-map-marker fa-2x" style="float: left; padding-left: 26px"></i>
                <span style="display:block; width:305px;">
                    <strong>?� N?ng, Vi?t Nam</strong><br>
                    <span class="lists-items-address" style="font-size: 9px">07 Quang Trung, Hai Chau, Da Nang</span>
                </span>
            </a>
        </div>
        <div class="row hover-highlight">
            <a data-value="0" tabindex="-1" style="overflow:hidden; text-decoration: none">
                <i class="fa fa-map-marker fa-2x" style="float: left; padding-left: 26px"></i>
                <span style="display:block; width:305px;">
                    <strong>?� N?ng, Vi?t Nam</strong><br>
                    <span class="lists-items-address" style="font-size: 9px">07 Quang Trung, Hai Chau, Da Nang</span>
                </span>
            </a>
        </div>
        <div id="locationAppendDiv"></div>
        <div style="position: absolute; bottom: 0; left: 75px; margin-bottom:10px" >
            <a class="btn btn-primary" onclick="openCreateLocationDialog();"><i class="fa fa-plus-circle"></i>&nbsp;Create Location</a>
        </div>
    </div>
    <div id="map"></div>

    <!-- Boopstrap dialog -->
    <div id="collectionDialogModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="channelDlActionTitle">
                        <i class="fa fa-edit"></i><span id="headerDialog">Tạo bộ sưu tập</span>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="collectionDialogModalBody">
                        <form id="collection-form" method="post" action="addcollection">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Tên bộ sưu tập*</label>
                                </div>
                                <div class="col-sm-9">
                                    <input id="titleCollection" type="text" name="post_data[title]" class="form-control" value="" placeholder="Ex: �?ầu tư nhà đất"/>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-sm-3">
                                    <label>Mô tả bộ sưu tập</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="descriptionCollection" name="post_data[description]" placeholder="Mô tả ngắn v�? bộ sưu tập của bạn"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-sm-3">
                                    <label>Bảo mật</label>
                                </div>
                                <div class="col-sm-9">
                                    <div style="float: left">
                                        <lable><input id="chkPublic" onclick="selectBM($(this), $('#chkPrivate'));" checked="checked" type="radio"/>Hiển thị với m�?i ngư�?i (public)</lable>
                                    </div>
                                    <div style="float: left; padding-left: 10px;">
                                        <lable><input id="chkPrivate" onclick="selectBM($(this), $('#chkPublic'));" type="radio"/>Chỉ với tôi (private)</lable>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="collectionSubmitBtn" onclick="$('#collection-form').submit();" type="submit" class="btn btn-primary" style="float: right" value="Tạo bộ sưu tập" />
                </div>
                <input type="hidden" id="editCollectionId" value="" />
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Search popup -->
    <div id="SearchModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container-fluid">
                    <form id="search-form" method="post" action="planyourtrip">
                        <div class="row" align="center">
                            <h3>Plan your trip</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon black_marker"></span>
                                    <input id="startLocation" type="text" class="form-control no-border-left" placeholder="Start" aria-describedby="basic-addon1">
                                    <span class="input-group-addon black_marker"></span>
                                    <input id="destLocation" type="text" class="form-control no-border-left" placeholder="Destination" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-warning">GO!</button>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 15px;">
                            <span>Show me</span>
                            <input type="checkbox" style="margin: 10px 0 10px 10px;"/><span>Hotel</span><span class="icon-hotel" style="padding-left: 19px;"></span>
                            <input type="checkbox" style="margin: 10px 0 10px 10px;"/><span>Attraction</span><span class="icon-camera" style="padding-left: 19px;"></span>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        google.maps.event.addListenerOnce(map, 'idle', function(){
            $('#SearchModal').modal('show');
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAzV6NPRGyNVB0y6FufjTEnHIeXayxs2k&callback=initMap"></script>
<script type="text/javascript">
    $('#filterLocationInput').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?filter_model=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            location_name : item['location_name'],
                            location_address: item['location_address'],
                            location_icon : item['location_icon']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            var html = '<div class="row hover-highlight">';
            html += '<a data-value="0" tabindex="-1" style="overflow:hidden; text-decoration: none">';
            html += '<i class="fa fa-map-marker fa-2x" style="float: left; padding-left: 26px"></i>';
            html += '<span style="display:block; width:305px;">';
            html += '<strong>�?à Nẵng, Việt Nam</strong><br>';
            html += '<span class="lists-items-address" style="font-size: 9px">07 Quang Trung, Hai Chau, Da Nang</span>';
            html += '</span></a></div>';
            html += '<div id="locationAppendDiv"></div>';
            $('#locationAppendDiv').replaceWith(html);
        }
    });

    $('#SearchModal #startLocation').autocomplete({
        htmlTemplate : '<li style="width: 100%;"><i class="{{icon}}"><span>{{name}}</span></li>',
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?filter_model=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            location_name : item['location_name'],
                            location_address: item['location_address'],
                            location_icon : item['location_icon']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            var html = '<div class="row hover-highlight">';
            html += '<a data-value="0" tabindex="-1" style="overflow:hidden; text-decoration: none">';
            html += '<i class="fa fa-map-marker fa-2x" style="float: left; padding-left: 26px"></i>';
            html += '<span style="display:block; width:305px;">';
            html += '<strong>�?à Nẵng, Việt Nam</strong><br>';
            html += '<span class="lists-items-address" style="font-size: 9px">07 Quang Trung, Hai Chau, Da Nang</span>';
            html += '</span></a></div>';
            html += '<div id="locationAppendDiv"></div>';
            $('#locationAppendDiv').replaceWith(html);
        }
    });

    $('#SearchModal #destLocation').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?filter_model=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            location_name : item['location_name'],
                            location_address: item['location_address'],
                            location_icon : item['location_icon']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            var html = '<div class="row hover-highlight">';
            html += '<a data-value="0" tabindex="-1" style="overflow:hidden; text-decoration: none">';
            html += '<i class="fa fa-map-marker fa-2x" style="float: left; padding-left: 26px"></i>';
            html += '<span style="display:block; width:305px;">';
            html += '<strong>�?à Nẵng, Việt Nam</strong><br>';
            html += '<span class="lists-items-address" style="font-size: 9px">07 Quang Trung, Hai Chau, Da Nang</span>';
            html += '</span></a></div>';
            html += '<div id="locationAppendDiv"></div>';
            $('#locationAppendDiv').replaceWith(html);
        }
    });

    function openCreateLocationDialog(){
        $('#collectionDialogModal').modal('show');
    }
</script>
</body>
</html>