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
        #smallerMap{
            height: 270px;
            width: 345px;
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
    <link rel="stylesheet" href="<?php echo config_item('asset_url'); ?>default/js/trumbowygEditor2.0/ui/trumbowyg.min.css"/>

    <script src="<?php echo config_item('asset_url'); ?>default/js/custom-autocomplete.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/cropper/cropper.min.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/trumbowygEditor2.0/trumbowyg.min.js"></script>
    <script src="<?php echo config_item('asset_url'); ?>default/js/main.js"></script>
</head>
<body>
    <!--NAV BAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Logo</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Map</a></li>
                    <li><a href="#about">Trips</a></li>
                    <li><a href="#contact">Stories</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">My Trips</a></li>
                    <li class="dropdown">
                        <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Avatar</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider" role="separator"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div id="floating-panel">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" id="filterLocationInput" class="form-control" />
            <span class="input-group-addon"><i class="fa fa-caret-down"></i></span>
        </div>
        <ul class="listItemLocation">
            <li class="hover-highlight">
                <div class="lists-items ui-menu-item">
                    <a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">
                        <img align="left" class="location_img" src="<?php echo config_item('asset_url');?>default/images/Map-Marker-Marker-Outside-Azure.png">
                    <span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">Da Nang, Viet Nam<br>
                        <span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">82/10 Dien Bien Phu, phuong 17, Quan Binh Thanh</span>
                    </span>
                    </a>
                </div>
            </li>
            <li class="hover-highlight">
                <div class="lists-items ui-menu-item">
                    <a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">
                        <img align="left" class="location_img" src="<?php echo config_item('asset_url');?>default/images/Map-Marker-Marker-Outside-Azure.png">
                    <span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">Da Nang, Viet Nam<br>
                        <span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">82/10 Dien Bien Phu, phuong 17, Quan Binh Thanh</span>
                    </span>
                    </a>
                </div>
            </li>
            <li class="hover-highlight">
                <div class="lists-items ui-menu-item">
                    <a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">
                        <img align="left" class="location_img" src="<?php echo config_item('asset_url');?>default/images/Map-Marker-Marker-Outside-Azure.png">
                    <span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">Da Nang, Viet Nam<br>
                        <span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">82/10 Dien Bien Phu, phuong 17, Quan Binh Thanh</span>
                    </span>
                    </a>
                </div>
            </li>
            <li class="hover-highlight">
                <div class="lists-items ui-menu-item">
                    <a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">
                        <img align="left" class="location_img" src="<?php echo config_item('asset_url');?>default/images/Map-Marker-Marker-Outside-Azure.png">
                    <span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">Da Nang, Viet Nam<br>
                        <span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">82/10 Dien Bien Phu, phuong 17, Quan Binh Thanh</span>
                    </span>
                    </a>
                </div>
            </li>
        </ul>
        <div id="locationAppendDiv"></div>
        <!--<div style="position: absolute; bottom: 0; left: 75px; margin-bottom:10px" >
            <a class="btn btn-primary" onclick="openCreateLocationDialog();"><i class="fa fa-plus-circle"></i>&nbsp;Create Location</a>
        </div>-->
    </div>
    <div id="map"></div>

    <!-- Boopstrap dialog -->
    <div id="collectionDialogModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true" data-width="600px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid" id="collectionDialogModalBody">
                        <div class="row">
                            <div class="col-md-2" style="padding: 0">
                                <a href="javascript:void(0)" style="text-decoration: none" class="trip-image-holder">
                                    <img title="Cancel" src="<?php echo config_item('asset_url');?>default/images/phatquang.jpg" style="width: 110px; height: 85px; cursor: pointer"/>
                                    <img title="Okie" src="<?php echo config_item('asset_url');?>default/images/pencil-01-32.png" style="position: absolute; top: 30px; left: 70px; cursor: pointer"/>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <span for="text" style="float: left; margin-top: 6px; margin-right: 25px;">Name:</span>
                                    <div style="width: 81%;" class="input-group">
                                        <input type="text" class="text-input form-control" style="border-right: medium none;border-left: medium none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span for="text" style="float: left; margin-top: 6px; margin-right: 11px;">Address:</span>
                                    <div style="width: 81%;" class="input-group">
                                        <input type="text" class="text-input form-control" style="border-right: medium none;border-left: medium none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src="<?php echo config_item('asset_url');?>default/images/free-09-64.png" style="cursor: pointer"/>
                                <img src="<?php echo config_item('asset_url');?>default/images/ok-64.png" style="cursor: pointer"/>
                            </div>
                        </div>
                        <div style="padding-top: 3px;" class="row">
                            <div class="form-group">
                                <span for="text" style="float: left; margin-top: 6px; margin-right: 30px;">Type of location:</span>
                                <div style="width: 53%;" class="input-group">
                                    <select class="form-control" style="border-left: none; border-right: none; border-top: none;">
                                        <option value="one">Attraction</option>
                                        <option value="two">Accommodation</option>
                                        <option value="three">Entertainment</option>
                                        <option value="four">Food & Drink</option>
                                        <option value="five">Night light</option>
                                        <option value="five">Sport</option>
                                        <option value="five">Shopping</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <strong>Introduce about this place</strong>
                            <textarea id="editor" class="form-control autoresized-textarea clear" rows="7">
                            </textarea>
                        </div>
                        <div class="row item-tag">
                            <span>VietNam</span>
                            <span>Da Nang</span>
                        </div>
                        <div class="row" style="padding-top: 15px">
                            <div class="form-group">
                                <label style="float: left; margin-top: 6px; margin-right: 20px;" for="text">Add Tag</label>
                                <div class="input-group" style="width: 89%;">
                                    <input type="text" class="text-input form-control" style=" border-left: medium none; border-right: medium none; border-top: medium none;">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="min-height: 300px">
                            <div class="col-md-6" style="height: 290px; padding: 0">
                                <strong>Add picture</strong>
                                <hr style="margin-top:5px" />
                                <div>
                                    <img src="<?php echo config_item('asset_url');?>default/images/phatquang.jpg" style="width: 110px"/>
                                    <img src="<?php echo config_item('asset_url');?>default/images/free-09-64.png" style="position: absolute; top: 30px; width: 28px; left: 98px;"/>
                                </div>
                                <div style="float: right; position: absolute; bottom: 0; right: 0;">
                                    <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus"></i>Add image</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <strong>Drap map to set location</strong>
                                <div id="smallerMap" style="margin-top: 5px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            zoom: 15,
            disableDefaultUI: true
        });
        var smallerMap = new google.maps.Map(document.getElementById('smallerMap'), {
            center: {lat: 10.8180369, lng: 106.67040779999999},
            zoom: 15,
            disableDefaultUI: true
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
    var assetUrl = '<?php echo config_item('asset_url');?>';
    $('#collectionDialogModal #editor').trumbowyg();

    $('#filterLocationInput').autocomplete({
        htmlTemplate : '<li class="lists-items ui-menu-item" data-value="{{dataValue}}">'+
                            '<a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">'+
                                '<img align="left" class="location_img" src="'+ assetUrl + 'default/images/Map-Marker-Marker-Outside-Azure.png">'+
                                '<span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">{{locationName}}<br>'+
                                    '<span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">{{locationAddress}}</span>'+
                                '</span>'+
                            '</a>'+
                        '</li>',
        buttonTemplate : '<li class="lists-items ui-menu-item" data-value="createTripDialog"><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Create Location</a></li>',
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?maxResult=10&filter_model=' +  encodeURIComponent(request),
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
            var html = '<div class="hover-highlight">'+
                            '<div class="lists-items ui-menu-item">'+
                                '<a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">'+
                                '<img align="left" class="location_img" src="'+ assetUrl +'default/images/Map-Marker-Marker-Outside-Azure.png">'+
                                '<span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">'+ item.location_name +'<br>'+
                                '<span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">'+ item.location_address +'</span>'+
                                '</span>'+
                                '</a>'+
                                '</div>'+
                            '</div><div id="locationAppendDiv"></div>';
            $('#locationAppendDiv').replaceWith(html);
        }
    });

    $('#SearchModal #startLocation').autocomplete({
        htmlTemplate : '<li class="lists-items ui-menu-item" data-value="{{dataValue}}">'+
            '<a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">'+
            '<img align="left" class="location_img" src="'+ assetUrl + 'default/images/Map-Marker-Marker-Outside-Azure.png">'+
            '<span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">{{locationName}}<br>'+
            '<span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">{{locationAddress}}</span>'+
            '</span>'+
            '</a>'+
            '</li>',
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?maxResult=5&filter_model=' +  encodeURIComponent(request),
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
            // TODO:
        }
    });

    $('#SearchModal #destLocation').autocomplete({
        htmlTemplate : '<li class="lists-items ui-menu-item" data-value="{{dataValue}}">'+
            '<a class="lists-items-link" style="text-decoration: none" tabindex="-1" data-value="0" href="javascript:void(0)">'+
            '<img align="left" class="location_img" src="'+ assetUrl + 'default/images/Map-Marker-Marker-Outside-Azure.png">'+
            '<span style="word-wrap: break-word; white-space: nowrap; text-overflow: ellipsis; overflow-x: hidden;">{{locationName}}<br>'+
            '<span style="font-weight: normal; font-size: 9px; color: gray;" class="lists-items-address">{{locationAddress}}</span>'+
            '</span>'+
            '</a>'+
            '</li>',
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_complete_filter?maxResult=5&filter_model=' +  encodeURIComponent(request),
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
            // TODO
        }
    });

    function openCreateLocationDialog(){
        $('#collectionDialogModal').modal('show');
    }
</script>
</body>
</html>