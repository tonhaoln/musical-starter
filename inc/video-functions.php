<?php
function get_video($video) {
	$pos = strpos($video, 'you');
	if ($pos === false) {
		$vidDetails = get_vimeo_details($video);
	} else {
		$vidDetails = get_youtube_details($video);
	}
	return $vidDetails;
}


function get_vimeo_details($video_url) {
	$videoId = preg_replace("/\D/", "",$video_url);
	if($videoId) {
	$transName = 'videoDetails_'.$videoId;
	$vidDetails = get_transient( $transName );

	if ( false === $vidDetails ) {
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));

		$image = $hash[0]['thumbnail_large'];
		$video_url = $hash[0]['url'];

		$vidDetails = array();
		$vidDetails['image'] = $image;
		$vidDetails['video'] = $video_url.'&amp;autoplay=1';
    $vidDetails['video_id'] = $videoId;
		$vidDetails['type'] = 'vimeo';
    


		set_transient( $transName, $vidDetails, 24 * HOUR_IN_SECONDS );
	}
	return $vidDetails;
 
	}
}

function get_youtube_details($video_url) {
	$sec_check = strpos($video_url, 'https');
	if ($sec_check === false) {
		$video_url = str_replace("http","https",$video_url);
	}
	$you_check = strpos($video_url, 'youtube');
	if ($you_check === false) {
		$videoId =  str_replace("https://youtu.be/","",$video_url);
	} else {
		$videoId =  str_replace("https://www.youtube.com/watch?v=","",$video_url);
	}

  $videoId = explode("?", $videoId)[0];

	$transName = 'videoDetails_'.$videoId;
	$vidDetails = get_transient( $transName );

	if ( false === $vidDetails ) {
  		$image = 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';

		// check if max res exists, if not, get hqdefault
		if(!@getimagesize($image)){
			$image = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
		}
		
		// check if hqdefault exists, if not, get mqdefault
		if(!@getimagesize($image)){
			$image = 'https://img.youtube.com/vi/' . $videoId . '/mqdefault.jpg';
		}
		
		$video_url = 'http://www.youtube.com/embed/' . $videoId;

		$vidDetails = array();
		$vidDetails['image'] = $image;
		$vidDetails['video'] = $video_url;
    $vidDetails['video_id'] = $videoId;
		$vidDetails['type'] = 'youtube';
	}

	set_transient( $transName, $vidDetails, 24 * HOUR_IN_SECONDS );

	return $vidDetails;
}
