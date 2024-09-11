<?php get_header(); the_post(); 

$timezoneSydney = new DateTimeZone('Australia/Sydney');

$currentDateTime = new DateTime('now', $timezoneSydney);
?>
<div class="media-page-inner">
<?php   if (post_password_required()) { ?>
          <div class="wrapper padding-top-small padding-bottom-small">
              <div class="container">
                <?php the_field('pre_password_text');
                  the_content(); ?>
              </div>
          </div>  
        <?php } else { ?>

          <div class="wrapper padding-top-small padding-bottom-small">
              <div class="container">
                <?php the_content(); ?>
              </div>
            </div>
          <?php $files = get_field('files');
          if ($files) { ?>
            <div class="wrapper padding-top-small">
              <div class="container">
              <h2>Media Release:</h2>
            <?php foreach ($files as $file) { 
              $downloadLink = $file['url'];
              $downloadTrue = $file['downloadable_file'];
              $liveTime = $file['live_time'] ?: '2000-01-01 00:00:00';
              $liveDateTime = new DateTime($liveTime, $timezoneSydney);
              if($currentDateTime > $liveDateTime) {
            ?>
              <div class="media-page-item media-release-item">
                <p class="h4"><?php echo $file['title']; ?>:</p>
                  <div><a class="ehd-button " href="<?php echo $downloadLink['url']; ?>" target="<?php echo $downloadLink['target']; ?>" <?php if($downloadTrue) { echo 'download'; } ?>><?php echo $downloadLink['title']; ?></a></div>
              </div>
            <?php } ?>
            <?php } // end foreach $files ?>
              </div>
            </div>
          <?php } // end if $files ?>

      
            <?php $media_images = get_field('media_images');
            if ($media_images) { ?>
            <div class="wrapper padding-top-small">
              <div class="container">
              <h2>Images</h2>
              <?php foreach($media_images as $imageItem) {
              
                $image = $imageItem['image'];

                // check if image has a high_res version
                if($imageItem['high_res']) {
                  $highRes = $imageItem['high_res'];
                  $highResText = 'High Res Image';
                  $lowRes = $image['url'];
                } else {
                  $highRes = $image['url'];
                  $highResText = 'Large Image';
                  $lowRes = $image['sizes']['large'];
                }
                $description = $imageItem['description'];
                $photo_credit = $imageItem['photo_credit'];
                $liveTime = $imageItem['live_time'] ?: '2000-01-01 00:00:00';
                $liveDateTime = new DateTime($liveTime, $timezoneSydney);
                if($currentDateTime > $liveDateTime) {
              ?>
                  <div class="media-page-item">
                    <div class="media-page-image">
                      <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                    <div class="media-page-content">
                      <p><?php echo $description; ?><br><small><?php echo $photo_credit; ?></small></p>
                      <div class="ehd-button-wrap">
                        <a class="ehd-button "
                        href="<?php echo $lowRes; ?>" target="_blank">Medium Image</a> <a class="ehd-button " href="<?php echo $highRes; ?>" target="_blank"><?php echo $highResText; ?></a>
                      </div>
                    </div>
                  </div>
                <?php }// end if not livetime ?>
              <?php } // end foreach ?>
              </div>
            </div>
            <?php } // end if images ?>

            <?php $videos = get_field('video');
            if ($videos) { ?>
            <div class="wrapper padding-top-small">
              <div class="container">
              <h2>Videos</h2>
              <?php foreach($videos as $video) { 
                  $liveTime = $video['live_time'] ?: '2000-01-01 00:00:00';
                  $liveDateTime = new DateTime($liveTime, $timezoneSydney);
                  if($currentDateTime > $liveDateTime) {
                ?>
                <div class="media-page-item">
                  <?php if($video['youtube_link']){ ?>
                    <div class="media-page-content">
                      <?php echo $video['youtube_link']; ?>
                    </div>
                  <?php } else if($video['thumbnail']){ ?>
                    <div class="media-page-image">
                      <img src="<?php echo $video['thumbnail']['sizes']['medium']; ?>" alt="<?php echo $video['thumbnail']['alt']; ?>">
                    </div>
                  <?php } ?>
                  
                  <div class="media-page-content">
                    <h5><?php echo $video['title']; ?>:</h5>
                    <p><a class="ehd-button " href="<?php echo $video['download_link']; ?>" target="_blank" download="<?php echo $video['title']; ?>">Download Video</a></p>
                  </div>
                
                </div>
                <?php } // end if livetime ?>
              <?php } // end foreach ?>
              </div>
            </div>
            <?php } // end if images ?>
        <?php } // end if ?>
</div>
<?php get_footer(); ?>