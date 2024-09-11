<?php 
 

  $args = wp_parse_args($args);
  $video_url = $args['video_url'];
  $video_image = $args['video_image'];

   if($video_url){
      $video_details = get_video($video_url);
    } else {
      $video_details = [];
    }

  $videoPlaceholderImage = false;
  if($video_image){
    $videoPlaceholderImage = $video_image['url'];
  }

?>
<?php if($video_url){ ?>
    <div class="video-container">
      <?php if($video_details['type'] === 'youtube'){  ?>
        <lite-youtube videoid="<?php echo $video_details['video_id']; ?>" playlabel="Play" <?php if($videoPlaceholderImage) { echo 'style="background-image: url(\''.$videoPlaceholderImage.'\');"'; } ?>></lite-youtube>
      <?php } else { ?>
        <lite-vimeo videoid="<?php echo $video_details['video_id']; ?>" <?php if($videoPlaceholderImage) { echo 'style="background-image: url(\''.$videoPlaceholderImage.'\');"'; } ?>></lite-vimeo>
      <?php } ?>
    </div>

<?php } ?>