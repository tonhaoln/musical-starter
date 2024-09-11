<?php 
  $post_id          = get_the_ID();
  $cityTitle        = get_the_title();
  $status           = get_field('status');
  $dates            = get_field('dates');
  $theatre          = get_field('theatre');
  $theatre_address  = get_field('theatre_address');
  $map_link         = get_field('map_link');
?>

<div class="city-header-container">
    <h1><?php echo $cityTitle; ?></h1>
    <div class="date-theatre">
      <h2>
        <?php 
          if($dates){
            echo "<span class='dates fine-text'>$dates</span>";
          }
          if($dates && $theatre){
            echo ' &#8226; ';
          } 
          if($theatre){
            echo "<span class='theatre fine-text'>$theatre</span>";
          } ?>
      </h2>
      <?php 
        if($theatre_address){
          echo  "<p>";
            echo $theatre_address;
            if($map_link){
              echo " - <a href='$map_link' target='_blank'>View Map</a>";
            }
          echo  "</p>";
        }
      ?>
    </div>
  </div>