<?
function gm_video_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'orderby' => 'menu_order',
		'cat' => '',
		'display' => 'excerpt',
	), $atts ) );
	
	$db_args = array(
		'post_type' => 'video',
		'order' => 'ASC',
		'orderby' => $orderby,
		'posts_per_page' => -1,
		'meta_key' => '_thumbnail_id'
	);
	
	if($cat != "") {
		$db_args['tax_query'] = array(
			array(
				'taxonomy' => 'Training',
				'field' => 'slug',
				'terms' => array($cat),
			),
		);
	}

	$video_loop = new WP_Query( $db_args );
	
	$content = "";
	//$count = 1;
	//$i = 0;
	
	if($video_loop->have_posts()) {
		switch($display) {		
			case "content":
				$content .= "<div class=\"video_wrapper\">";
				while( $video_loop->have_posts() ) : $video_loop->the_post();
					$content_filtered = get_the_content();
					$content_filtered = apply_filters('the_content', $content_filtered);
					$content_filtered = str_replace(']]>', ']]&gt;', $content_filtered);
					$content .= "<div class=\"video_single\">";
					$content .= "<h3 class=\"video_title\">".get_the_title()."</h3>";
					$content .= "<div class=\"video_content\">$content_filtered</div>";
					$content .= "</div>";
				endwhile;
				$content .= "</div>";
				break;
				
				
			case "excerpt":
				$content .= '<div class="row">';
				while( $video_loop->have_posts() ) : $video_loop->the_post();
				
					$thumb = get_the_post_thumbnail( get_the_id(), 'video-thumb', array("class" => "img-responsive"));
					$content .= '<div class="col-sm-4">';
					$content .= '<div class="video-item">';
					//$content .= "<a href=\"".get_permalink()."\">".$thumb."</a>";
					$content .= '<a href="#"'.'data-toggle="modal"'.'data-target="#myModal'.get_the_id().'">'.$thumb.'</a>';
					$content .= '<h4 class="text-center video-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
					$content .= '</div></div>';
					
					/*if ($count % 2 == 0) {
						$content .= '<div class="clearfix visible-xs visible-sm"></div>';
					}*/
					
					//if ($count % 4 == 0) {
						//$content .= '<div class="clearfix visible-md visible-lg"></div>';
					//}
					
					//$count++;


					$content .='<div class="modal fade"'.'id="myModal'.get_the_id().'"'.'tabindex="-1"'.'role="dialog"'.'aria-lableledby="myModallabel"'.'aria-hidden="true">';
					$content .='<div class="modal-dialog">';
					$content .='<div class="modal-content">';
					

					$content .='<div class="modal-header">';
					$content .='<a href="#"'.'class="btn close close-btn"'.'data-dismiss="modal">'."close".'</a>';
					$content .='<h4 class="modal-title">'.get_the_title().'</h4>';
					$content .='</div>'; //close modal header

					$content .='<div class="modal-body">';
					//get the content from each video post
					$content .='<div class="embed-container">'.get_the_content().'</div>';
					$content .='</div>'; //close modal body


					$content .= '</div>'; //close modal-content
					$content .= '</div>'; //close modal-dialog
					$content .= '</div>'; //close modal
					//$i++;
				endwhile;
				$content .= '</div>'; //close row
				break;
				
				
			case "list":
				$content .= "<ul class=\"video_wrapper\">";
				while( $video_loop->have_posts() ) : $video_loop->the_post();
					$content .= "<li class=\"video_single\">";
					$content .= "<span class=\"video_title\"><a href=".get_permalink().">".get_the_title()."</a></span>";
					$content .= "</li>";
				endwhile;
				$content .= "</ul>";
				break;
		}
			
	}
	wp_reset_postdata();
	return $content;
				
}
add_shortcode( 'gm_videos', 'gm_video_shortcode' );
