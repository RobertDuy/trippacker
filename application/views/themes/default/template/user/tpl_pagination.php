<?php
require_once config_item('home_dir') . '/c/application/utils/CommonUtils.php';
?>
<!-- The Loop -->
<?php $index = 0; ?>
<?php if(sizeof($postAuthors) > 0) { ?>
    <?php foreach($postAuthors as $post){ ?>
        <div class="col-xs-12 col-sm-6 col-md-4 hourlie-tile-container">
            <div class="clearfix hourlie-tile js-listing-tile  with-member-info">
                <div class="image-container">
                    <a class="" title="<?= $post['title'];?>" href="<?php echo config_item('wp_home_url') .'/'. CommonUtils::remove_vietnamese_accents($post['title']). '_post-'. $post['post_id']. '.html'?>">
                        <img width="260" height="124" alt="Capture" class="attachment-260x195 wp-post-image" src="<?php echo config_item('wp_home_url'). '/wp-content/uploads/'. $post['thumb_img']?>">
                    </a>
                    <div class="stats-container clearfix">
                        <div class="pull-left rating">
                            <i class="fpph fpph-thumb-up"></i>
                            <span>Vote:</span>
                            <span class="rating-value"><?= (isset($post['post_vote']))? $post['post_vote']: 99 ?></span>
                        </div>
                        <div class="pull-right sales">
                            <i class="fpph fpph-buyer-activity"></i>
                            <span>View:</span>
                            <span class="sales-value">1999</span>
                        </div>
                    </div>
                </div>
                <div class="title-container">
                    <a style="word-wrap: break-word;" class="color-hourlie js-paragraph-crop" title="<?= $post['title'];?>" href="<?php echo config_item('wp_home_url') .'/'. CommonUtils::remove_vietnamese_accents($post['title']). '_post-'. $post['post_id']. '.html'?>">
                        <?= $post['title']; ?>
                    </a>
                </div>
                <div class="profile-container stretch clearfix">
                    <div class="col-xs-8 no-padding-right">
                        <div class="user-image-container pull-left">
                            <?php $authorAvatar = $post['author_avatar'];
                            if(strpos($authorAvatar, 'http') === false){
                                $authorAvatar = config_item('wp_home_url'). '/'. $authorAvatar;
                            }
                            ?>
                            <a title="<?= $post['author']?>">
                                <img width="30" height="30" alt="<?= $post['author']?>" src="<?= $authorAvatar;?>" class="user-avatar user-avatar-xs">
                            </a>
                        </div>
                        <div class="user-info pull-left">
                            <a class="clearfix user-name crop" title="<?= $post['author']?>"><?= $post['author']?></a>
                            <span class="user-country clearfix crop"><?= $post['cus_city'];?></span>
                        </div>

                    </div>
                    <div style="font-size: 12px;line-height: 2.5;" class="col-xs-4 price-container price-tag text-right">
                        <span><?php echo (isset($post['post_vote']))? $post['post_vote'] : 30 ;?></span><sup> votes</sup>
                    </div>
                </div>
            </div>
        </div>
        <?php $index++; }}else{ ?>
    Hi?n t?i b?n ch?a vi?t bài vi?t nào. <a href="#">Vi?t ngay</a>
<?php } ?>
<!-- End Loop -->