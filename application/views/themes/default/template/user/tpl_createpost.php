<?php echo $header_view;?>
<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-right">
		<div class="main-content controller-job action-new">
			<div class="bg-fill widget-PostJob clearfix">
				<header class="clearfix">
					<h1> Tạo bài viết mới
                    <aside class="below" style=" width: 500px;">
						Chia sẽ những quan điểm, những trí thức hoặc kinh nghiệm, cùng nhau tạo ra những giá trị cộng đồng
                    </aside>
					</h1>
				</header>
			<hr/>
			<?php echo form_open_multipart('user/article/create', array('name' => 'createpost')); ?>
				
                <div class="prepend-top clearfix form-group">
					<div>
						<label for="post_category">Chọn chuyên mục</label>    
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 gutter-bottom" id="parent_cate">
							<select class="form-control" name="post_data[category_id]" id="post_category" aria-describedby="tooltip64319">
								<option value="">Chọn</option>
                                <?php foreach($categories as $row){ ?>
                                    <option value="<?php echo $row->term_id; ?>" <?php echo ($row->term_id == $category_id )? 'selected' : ''; ?>><?php echo $row->name; ?></option>  
                                <?php } ?>
								
							</select> 
                            <?php if(!empty($error_catgory)){?>
                            <div class="tooltip  state-error fade bottom in" id="tooltip64319" style=" left: 119.5px; display: block;">
                                <div class="tooltip-arrow"></div>
                                <i class="fa fa fa-warning"></i>
                                <div class="tooltip-inner"><?php echo $error_catgory; ?></div>
                            </div>   
                            <?php } ?>                
						</div>

						<div class="col-xs-12 col-sm-6 gutter-bottom" id="sub_cate">
				        <?php if(!empty($category_id) && count($sub_categoroies) > 0){?>
                            <select class="form-control" data-preselected="" name="post_data[subcate_id]" id="post_subcate_id">
                                
                        		<?php foreach($sub_categoroies as $row){?>
                                    <option value="<?php echo $row->term_id; ?>" <?php echo (!empty($subcate_id) && $row->term_id == $subcate_id )? "selected" : ""; ?> ><?php echo $row->name; ?></option>  
                                <?php } ?>						
                            </select>        
                        
                            <?php } ?>     
						</div>
					</div>
				</div>
                
				<div class="form-group prepend-top error">
					<label class="pull-left required" for="post_title">Tiêu đề bài viết</label>
					<input type="text"  name="post_data[title]" value="<?php echo $title; ?>" id="post_title" class="form-control form-control clear" placeholder="tên bài viết.." maxlength="85" aria-describedby="tooltip58097"/>
				    <?php if(!empty($error_title)){?>
                    <div class="tooltip  state-error fade bottom in" id="tooltip58097" style="left: 338.5px; display: block;">
                        <div class="tooltip-arrow"></div>
                        <i class="fa fa fa-warning"></i>
                        <div class="tooltip-inner"><?php echo $error_title; ?></div>
                    </div>
                    <?php } ?>
                </div>

				

				<div class="mergeinput-container row"></div>

				<div class="form-group prepend-top">
					<label class="pull-left required" for="Post_proj_desc">Nội dung</label>
					
					<textarea id="editor" name="post_data[content]" class="form-control autoresized-textarea clear" rows="7" id="Post_proj_desc" aria-describedby="tooltip677449"><?php echo $content; ?></textarea>    
				    <?php if(!empty($error_content)){?>
                    <div class="tooltip  state-error fade bottom in" id="tooltip677449" style="left: 338.5px; display: block;">
                        <div class="tooltip-arrow"></div>
                        <i class="fa fa fa-warning"></i>
                        <div class="tooltip-inner"><?php echo $error_content; ?></div>
                    </div>
                    <?php } ?>
                </div>

				<div class="prepend-top form-group" style="margin-top: 65px;">
					<div>
						<label class="pull-left" for="Post_thumb">Ảnh đại diện</label> 
					     
                        <div class="clear"></div>
					</div>
					<div class="widget-jsModuleAttachFiles clearfix" id="attachFiles-box-job-attachment" data-id="job-attachment">
						<ul class="attachFiles-list ">
						</ul>
						<div class="attachFiles-dropArea only-upload ">
							<div class="attachFiles-normalOptions">
                                <input type="file" id="Post_thumb" name="thumb" value="<?php echo $thumb; ?>" aria-describedby="tooltip677423"/>
					           <?php if(!empty($error_thumb)){?>
                               <div class="tooltip  state-error fade bottom in" id="tooltip677423" style="left: 40px; display: block;">
                                    <div class="tooltip-arrow"></div>
                                    <i class="fa fa fa-warning"></i>
                                    <div class="tooltip-inner"><?php echo $error_thumb; ?></div>
                                </div> 
                                <?php } ?>    
                            </div>
							
						</div>
    
					
				</div>
			</div>

    		<div class="prepend-top call-to-action toggle-advanced" data-hook="show-advanced">
    			+ Bài viết sẽ bị xóa nếu thông tin bài viết không phù hợp hoặc trái pháp luật
            </div>
            <input type="hidden" value="topnav_loggedout" name="ref" id="ref" />
            <div class="clearfix prepend-top append-bottom">
                <a id="btPostJob" class="tall btn btn-inverted btn-job col-xs-12 col-sm-6 col-md-4 " >Đăng</a>
            </div>
							
        </form>
    </div>
    <!--div id="project_onsite_not_avail" role="dialog" tabindex="-1" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header"> <button data-dismiss="modal" class="close" name="yt1" type="button">&times;</button>Post remote Job</div>
				    <div class="modal-body">
				        <div class="onsite-not-avail-body">
				            There are not enough available Freelancers for on-site work in your area.    <br/>
				            Would you like to post this Job and work with Freelancers remotely?
				        </div>
				    </div>
				    <div class="modal-footer">
				        <button data-dismiss="modal" class="btn btn-inverted btn-job btn-job-onsite-na" name="yt0" type="button">POST JOB</button></div>
                </div>
        </div>
    </div-->
					   
    </div>
    <aside class="right-column sidebar-job-new offcanvas-sidebar">
        <h3 class="sidebar-header">Hướng dẫn</h3>
            <div class="lifted-corners with-handles">
				<div class="handles"></div>
                <div>
                    <ul class="numbered-tips">
                        <li class="clearfix">Chọn một chuyên mục cho bài viết.</li>
				        <li class="clearfix">Bài viết nên có ảnh đại diện để thu hút đọc giả.</li>
				        <li class="clearfix">Bài viết sẽ bị xóa nếu chứa những thông tin không phù hợp.</li>
                    </ul>
                </div>
            </div>
    </aside>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/themes/default/js/trumbowygEditor2.0/ui/trumbowyg.min.css" />
<script src="<?php echo base_url();?>assets/themes/default/js/trumbowygEditor2.0/trumbowyg.min.js"></script>

<script>
    $(document).ready(function () { 
        $('#editor').trumbowyg();
        
        $('#post_category').change(function(){
	   
       var cate_id = $('#post_category').val();
       
       $.ajax({
            url : "<?php echo $ajax_link; ?>",
            type: "POST",
            dateType: "html",
            data : {cate_id : cate_id },
            
            success : function (result){
                if(result != '')
                {
                    $("#post_subcate_id").remove();
                    $('#sub_cate').append(result);
                }
                
            }
       });

	});
    
    $('#btPostJob').click(function(){
       /* if($('#post_category').val() == '')
        {
            alert('Bạn chưa chọn danh mục!');
        }
        else if($('#post_title').val() == '' )
        {
            alert('Bạn cần nhập tiêu đề bài viết!');
        }
        else if($('#editor').val() == ''){
            alert('Bạn cần nhập nội dung bài viết!')
        }
        else{
            
        }*/
        $("form[name='createpost']").submit();
    });
    
    
    
    });

</script>
