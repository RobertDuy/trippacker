<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-right">
    <div class="main-content controller-member action-edit">
        <div class="append-bottom">
            <form id="member-edit-form" action="update_profile" method="post">
                <div style="display:none">
                    <input type="hidden" value="5c2696c5a2b1244f11d3a184cc47c3f866772c5c" name="YII_CSRF_TOKEN"/>
                </div>    
                <header class="clearfix">
                    <h1>
                        Edit your Profile <aside class="below">Fill in your profile information</aside>
                    </h1>
                </header>
                <div class="gutter-top form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_fname">First Name</label>
                        <input class="form-control" name="post_data[fname]" id="MemberProfile_fname" type="text" value="<?php echo $_SESSION['user_fname'];?>"/>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_lname">Last Name</label>
                        <input class="form-control popover-toggle"  name="post_data[lname]" id="MemberProfile_lname" type="text" value="<?php echo $_SESSION['user_lname'];?>"/>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="gutter-top form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_career">Career</label>
                        <input class="form-control" name="post_data[cus_career]" id="MemberProfile_career" type="text" value="<?php echo $_SESSION['cus_career'];?>"/>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_company">Company</label>
                        <input class="form-control popover-toggle"  name="post_data[cus_company]" id="MemberProfile_company" type="text" value="<?php echo $_SESSION['cus_company'];?>"/>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label id="edit-cover-image" class="clearfix" for="MemberProfile_coverImage">Cover image<span class="discreet">(recommended)</span></label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" ><i class="color-info fa fa-question-circle"></i></span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" title="Help tip"><i class="color-info fa fa-question-circle"></i></span>
                    <div style="display: none !important;" id="help-content-5618998b57678"></div>
                    <div>
                        <div class="widget-jsModuleAttachFiles clearfix ImageCrop-enabled" id="attachFiles-box-MemberProfile_coverImage" data-id="MemberProfile_coverImage" style="position: relative;">
                            <ul class="attachFiles-list ">
                                <li class="attach-success" style="opacity: 1; width: 60px;" data-category="other" id="cover_710651">
                                    <a href="#" class="remove" title="Remove">Remove</a>
                                    <div class="attachFiles-item">
                                        <img alt="undefined - " class="preview" id="coverImg" style="cursor: pointer"
                                             src="<?php echo config_item('wp_home_url'). '/'. $_SESSION['cus_cover'];?>"/>
                                    </div>
                                </li>
                            </ul>
                            <div class="attachFiles-dropArea only-upload" id="attachFiles-dropArea-1" style="display: none; position: relative;">
                                <div class="attachFiles-normalOptions">
                                    <span class="attachFiles-dragSupport">Drop files here or</span>
                                    <a class="call-to-action attachFiles-pick _attachFiles-link" href="#" id="attachFiles-pick-1" style="position: relative; z-index: 1;">
                                    Browse<br/></a> to add attachments        
                                </div>
                                <div class="attachFiles-maxFiles">Max<br/> Files </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pull-left" for="MemberProfile_images">
                        Profile picture<span class="discreet">(recommended)</span>
                    </label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" >
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" data-content-selector="#profile-image-suggestion" data-trigger="click" title="Help tip">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <div style="display: none !important;" id="help-content-5618998b58203"></div>        
                    <div class="clear"></div>
                    <div>
                        <div class="widget-jsModuleAttachFiles clearfix" id="attachFiles-box-MemberProfile_images" data-id="MemberProfile_images" style="position: relative;">
                            <ul class="attachFiles-list ">
                                <li class="attach-success" style="opacity: 1; width: 60px;" data-category="other" id="710651">
                                    <a href="#" class="remove" title="Remove">Remove</a>
                                    <div class="attachFiles-item">
                                        <?php
                                            $userAvatar = $_SESSION['cus_avatar'];
                                            if(strpos($userAvatar, 'http') === false){
                                                $userAvatar = config_item('wp_home_url'). '/' . $_SESSION['cus_avatar'];
                                            }
                                        ?>
                                        <img alt="undefined - " id="avatarImg" style="cursor: pointer" class="preview" style="" src="<?= $userAvatar; ?>">
                                    </div>
                                </li>
                            </ul>
                            <div class="attachFiles-dropArea only-upload  " id="attachFiles-dropArea-2" style="display: none; position: relative;">
                                <div class="attachFiles-normalOptions">
                                    <span class="attachFiles-dragSupport">Drop files here or </span>
                                        <a class="call-to-action attachFiles-pick _attachFiles-link" href="#" id="attachFiles-pick-2" style="position: relative; z-index: 1;">
                                            Browse<br/>
                                        </a> to add attachments        
                                </div>
                                <div class="attachFiles-maxFiles">Max<br/> Files </div>
                            </div>
                        </div>
                    </div>    
                </div>
                 <div class="form-group">
                    <label class="clearfix" for="MemberProfile_about">About You</label>
                    <textarea class="form-control popover-toggle" rows="10" placeholder="Introduce yourself..." name="post_data[cus_description]" id="MemberProfile_about"><?= $_SESSION['cus_description']?></textarea>
                    <script>
                        var desValue = $('#MemberProfile_about').val();
                        if(desValue.trim() == ''){
                            $('#MemberProfile_about').val('');
                        }
                    </script>
                 </div>
                 <div class="form-group">
                    <label class="pull-left" for="MemberProfile_skillsString">Your profile skills</label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" title="">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" title="Help tip">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                           
                    <div class="clear"></div>
                    <div class="select2-container select2-container-multi clear form-control" id="s2id_MemberProfile_skillsString">
                        <ul class="select2-choices" style="display: inline-block; float: left" >
                            <?php foreach($user_interested as $interested) { ?>
                                <li class="select2-search-choice" value="<?= $interested['term_id'] ?>">
                                    <div><?= $interested['name'] ?></div>
                                    <a href="/chu-de/<?php echo $interested['slug']?>" class="select2-search-choice-close" tabindex="-1" name="post_data['interested'][]"></a>
                                </li>
                            <?php } ?>
                        </ul>
                        <input type="text" style="border: none; padding-top:9px; display: inline-block; float: left" id="post-tag-autocomplete"/>
                    </div>
                    <p class="contact-skills">
                        Can't find a skill? 
                        <a id="skill-suggestion-trigger-selector" 0="Contact us" href="#">Contact us</a> to add it.        
                    </p>
                    </div>
                    <div class="form-group">
                        <label class="clearfix" id="location-city-anchor" for="MemberProfile_location_city">Location (city)</label>
                        <div class="widget-jsModuleLocationCombo" id="widget-jsModuleLocationCombo-profile-edit-location">
                            <select id="post_country" name="post_data[country]" class="form-control">
                                <option value="vn" selected>VietNam, VN</option>
                                <option value="sg">Singapore, SG</option>
                                <option value="us">United State, US</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="action-declineDialog-submit tall col-xs-4 btn btn-pph" id="edit-profile-submit" type="submit" name="yt3" value="Done"/>        
                        <div class="clear"></div>
                    </div>
            </form>
        </div>
    </div>
    <aside class="right-column sidebar-member-edit offcanvas-sidebar">
        <div class="clearfix append-bottom">
            <h3 class="sidebar-header">Seller Tips</h3>
            <div class="lifted-corners with-handles">
                <div class="handles"></div>
                <div>
                    <ul class="numbered-tips">
                        <li class="clearfix">Tell your personal story, how you got to being a freelancer. There is no substitute for the real ‘you’ story :)</li>
                        <li class="clearfix">Reveal your passion and drive. What gets you up in the morning?</li>
                        <li class="clearfix">Why did you choose to become a freelancer?</li>
                        <li class="clearfix">Upload a high quality cover image and a real photo of yourself to engage Buyers</li>
                        <li class="clearfix">Keep it real!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <h3 class="sidebar-header">What to avoid</h3>
            <div class="lifted-corners with-handles">
                <div class="handles"></div>
                <div>
                    <ul class="numbered-tips">
                        <li class="clearfix">No corporate boring stuff... keep your Profile light and ‘human’. Buyers don’t hire a ‘resume’ they want to hire a person.</li>
                        <li class="clearfix">No logos or imagery</li>
                        <li class="clearfix">No contact details. The integrity of the PPH system is paramount to our community.</li>
                        <li class="clearfix">No resumes or CVs...keep it real!</li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/default/css/fileinput.min.css" />
<script src="<?php echo base_url();?>assets/themes/default/js/bootstrap-fileinput/plugins/canvas-to-blob.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/default/js/bootstrap-fileinput/fileinput.min.js"></script>

<!-- MODEL BOOPSTRAP -->
<div id="coverDialogModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="channelDlActionTitle">
                    <i class="fa fa-edit"></i>Cover Image
                </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="coverDialogModalBody">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="cover-form" method="post" enctype="multipart/form-data" action="uploadfile">
                                <input type="hidden" name="image_type" value="cover" />
                                <input type="file" id="img_cover" name="coverfile"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- MODEL AVATAR BOOPSTRAP -->
<div id="avatarDialogModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="channelDlActionTitle">
                    <i class="fa fa-edit"></i>Avatar Image
                </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="avatarDialogModalBody">
                    <div class="row">
                        <form id="avatar-form" method="post" enctype="multipart/form-data" action="uploadfile">
                            <input type="hidden" name="image_type" value="avatar" />
                            <input type="file" id="img_avatar" name="avatarfile"/>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $('#coverImg').bind('click', function(){
        $('#coverDialogModal').modal('show');
    });

    $('#avatarImg').bind('click', function(){
        $('#avatarDialogModal').modal('show');
    });

    $("#img_cover").fileinput({
        initialPreview: [
        ],
        overwriteInitial: false,
        maxFileSize: 1000,
        initialCaption: "",
        previewSettings: {
            image: {width: "auto", height: "389px"}
        },
        layoutTemplates: {
            close : ""
        },
        uploadLabel : "OK",
        allowedFileTypes : ['image'],
        allowedFileExtensions : ['jpg', 'gif', 'png']
    });

    $("#img_avatar").fileinput({
        initialPreview: [
        ],
        overwriteInitial: false,
        maxFileSize: 1000,
        initialCaption: "",
        previewSettings: {
            image: {width: "auto", height: "389px"}
        },
        layoutTemplates: {
            close : ""
        },
        uploadLabel : "OK",
        allowedFileTypes : ['image'],
        allowedFileExtensions : ['jpg', 'gif', 'png']
    });

    $('#img_avatar').on('fileloaded', function(event, file, previewId, index, reader) {
        var $image = $('#avatarDialogModalBody img.file-preview-image');
        $image.cropper();
    });

    // SUBMIT AVATAR FORM ===================================
    $('#avatar-form').ajaxForm({
        url : $(this).attr('action'), // or whatever
        type : "POST",
        dataType : 'json',
        data : $(this).serialize(),
        beforeSubmit : function(arr, $form, options){
            var $image = $('#avatarDialogModalBody img.file-preview-image');
            var result = $image.cropper('getCroppedCanvas');
            arr.push({
                name: 'avatar_data',
                value: result.toDataURL()
            });
            return true;
        },
        success : function (json){
            if(json.status){
                var d = new Date();
                $('#avatarImg').attr('src', json.coverUrl+ "?" + d.getTime());
                $('#avatarDialogModal').modal('hide');
            }else{
                alert(json.message);
            }
        }
    });

    // SUBMIT COVER FORM ======================================
    $('#cover-form').ajaxForm({
        url : $(this).attr('action'), // or whatever
        type : "POST",
        dataType : 'json',
        data : $(this).serialize(),
        success : function (json){
            if(json.status){
                $('#coverImg').attr('src', json.coverUrl);
                $('#coverDialogModal').modal('hide');
            }else{
                alert(json.message);
            }
        }
    });

    // SUBMIT EDIT PROFILE FORM =============================
    $('#member-edit-form').ajaxForm({
        url : $(this).attr('action'),
        type : "POST",
        dataType : 'json',
        data : $(this).serialize(),
        beforeSubmit : function(arr, $form, options){
            var interestedArray = [];
            var listLI = $('#s2id_MemberProfile_skillsString li');
            for(var i=0 ; i < listLI.length; i++){
                var value = $(listLI[i]).attr('value');
                interestedArray.push(value);
            }
            arr.push({
                name : 'post_data[interested]',
                value:  interestedArray.toString()
            });
            for(var j=0; j < arr.length; j++){
                if(arr[j].name == 'post_data[cus_description]'){
                    arr[j].value = arr[j].value.trim();
                    break;
                }
            }
            return true;
        },
        success: function(json){
            if(json.status){
                alert(json.message);
            }
        }
    });

    $('#post-tag-autocomplete').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: '<?php echo config_item('base_url'); ?>ajax/get_wp_post_tag?filter_model=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['term_name'],
                            value: item['term_id'],
                            slug : item['term_slug']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            var html = '<li class="select2-search-choice" value="'+ item['value'] +'">'+
                       '<div>'+ item['label'] + '</div>'+
                            '<a tabindex="-1" class="select2-search-choice-close" href="/chu-de/'+ item['slug'] +'"></a>'+
                       '</li>';
            $(this).parent().find('ul.select2-choices').append(html);
        }
    });

</script>