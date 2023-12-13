<?php

	function theblogger_gallery_type__slider($atts)
	{
		extract(shortcode_atts(array('ids'     => "",
									 'orderby' => "",
									 'link'    => "",
									 'size'    => 'thumbnail'), $atts));
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			if ($orderby == 'rand')
			{
				shuffle($items_in_array);
			}
			
			$output .= '<div class="owl-carousel" data-items="1" data-loop="true" data-center="false" data-mouse-drag="true" data-nav="true" data-dots="true" data-autoplay="false" data-autoplay-speed="600" data-autoplay-timeout="2000">';
			
				if (is_page_template('page_template-full.php') || is_page_template('page_template-medium.php') || is_singular('portfolio'))
				{
					$size = 'theblogger_image_size_7';
				}
				else
				{
					$size = 'theblogger_image_size_1';
				}
				
				foreach ($items_in_array as $item)
				{
					$image 		   = wp_get_attachment_image_src($item, $size);
					$image_alt 	   = get_post_meta($item, '_wp_attachment_image_alt', true);
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = '<p class="owl-title">' . $image_caption . '</p>';
					}
					
					$output .= '<div>';
					$output .= '<img alt="' . esc_attr($image_alt) . '" src="' . esc_url($image[0]) . '">';
					$output .= $image_caption;
					$output .= '</div>';
				}
			
			$output .= '</div>';
		}
		
		return $output;
	}
	
	
	function theblogger_gallery_type__grid($atts)
	{
		extract(
			shortcode_atts(
				array(
					'ids'     => "",
					'orderby' => "",
					'link'    => "",
					'size'    => 'thumbnail'
				),
				$atts
			)
		);
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = "";
			
			if (is_array($items_with_commas))
			{
				$items_in_array = $items_with_commas;
			}
			else
			{
				$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			}
			
			if ($orderby == 'rand')
			{
				shuffle($items_in_array);
			}
			
			$output .= '<div class="gallery ' . (($link == "") ? 'link-to-attachment-page' : 'link-to-' . $link) . '">';
			
				foreach ($items_in_array as $item)
				{
					$image_big = "";
					$image_big_width_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_7'); // magnific-popup-width
					
					if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
					{
						$image_big = $image_big_width_cropped[0];
					}
					else
					{
						$image_big_height_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_8'); // magnific-popup-height
						$image_big = $image_big_height_cropped[0];
					}
					
					$image_small = "";
					
					if ($size == 'full')
					{
						$image_small = wp_get_attachment_image_src($item, 'theblogger_image_size_1'); // gallery-type-grid
					}
					else
					{
						$image_small = wp_get_attachment_image_src($item, 'theblogger_image_size_6'); // gallery-type-grid
					}
					
					$image_alt 	   = get_post_meta($item, '_wp_attachment_image_alt', true);
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = '<figcaption class="wp-caption-text gallery-caption">' . $image_caption . '</figcaption>';
					}
					
					if ($link == 'file')
					{
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<a href="' . esc_url($image_big) . '">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</a>';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
					elseif ($link == 'none')
					{
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
					else
					{
						$attachment_page = get_attachment_link($item);
						
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<a href="' . esc_url($attachment_page) . '">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</a>';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
				}
			
			$output .= '</div>';
		}
		
		return $output;
	}
	
	
	function theblogger_portfolio_page__lightbox_gallery($atts)
	{
		extract(shortcode_atts(array('ids'     => "",
									 'orderby' => "",
									 'link'    => "",
									 'size'    => 'thumbnail'), $atts));
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			if ($orderby == 'rand')
			{
				shuffle($items_in_array);
			}
			
				$first_item = true;
				global $theblogger_portfolio_item_has_feat_img;
				$feat_img = $theblogger_portfolio_item_has_feat_img;
				global $theblogger_portfolio_page_grid_type__lightbox_gallery;
				
				foreach ($items_in_array as $item)
				{
					$image_big = "";
					$image_big_width_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_7'); // magnific-popup-width
					
					if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
					{
						$image_big = $image_big_width_cropped[0];
					}
					else
					{
						$image_big_height_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_8'); // magnific-popup-height
						$image_big = $image_big_height_cropped[0];
					}
					
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = 'title="' . esc_attr($image_caption) . '"';
					}
					
					if ($first_item)
					{
						if ($feat_img)
						{
							$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '">' . theblogger_portfolio_item_feat_img__lightbox_gallery($theblogger_portfolio_page_grid_type__lightbox_gallery) . '</a>';
						}
						else
						{
							$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '">' . get_the_title() . '</a>';
						}
						
						$first_item = false;
					}
					else
					{
						$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '"></a>';
					}
				}
		}
		
		return $output;
	}
	
	
	function theblogger_post_gallery($output = "", $atts, $content = false, $tag = false)
	{
		$new_output = $output;
		
		if ((is_page_template('page_template-portfolio.php') || is_tax('portfolio-category')) && has_post_format('gallery'))
		{
			$new_output = theblogger_portfolio_page__lightbox_gallery($atts);
		}
		else
		{
			$gallery_type = get_option('theblogger_gallery_type' . '__' . get_the_ID(), 'grid');
			
			if ($gallery_type == 'slider')
			{
				$new_output = theblogger_gallery_type__slider($atts);
			}
			else
			{
				$new_output = theblogger_gallery_type__grid($atts);
			}
		}
		
		return $new_output;
	}
	
	add_filter('post_gallery', 'theblogger_post_gallery', 10, 4);

?>