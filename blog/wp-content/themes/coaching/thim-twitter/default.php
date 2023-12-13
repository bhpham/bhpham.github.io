<div class="thim-twitter">
	<div class="twitter-inner">
		<?php
		if ( $instance['title'] <> '' ) {
			echo ent2ncr( $args['before_title'] . $instance['title'] . '<i class="fa fa-twitter"></i>' . $args['after_title'] );
		}

		$col = 12 / $instance['number'];

		if ( $twitter && is_array( $twitter ) ) : ?>
			<div class="thim-tweets">
				<div class="twitter-item-wrapper row">
					<?php foreach ( $twitter as $tweet ):
						$twitterTime = strtotime( $tweet['created_at'] );

						$twitterTimeStr = date( 'd M Y', $twitterTime );
						$username       = $tweet['user']['screen_name'];
						$displayName    = $tweet['user']['name'];
						$latestTweet    = $tweet['text'];
						$latestTweet    = preg_replace( '/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="https://$1" target="_blank">https://$1</a>', $latestTweet );
						$latestTweet    = preg_replace( '/@([a-z0-9_]+)/i', '<a href="https://twitter.com/$1" target="_blank">@$1</a>', $latestTweet );
						$latestTweet    = preg_replace( '/#([a-z0-9_]+)/i', '<a href="https://twitter.com/hashtag/$1" target="_blank">#$1</a>', $latestTweet );
						?>
						<div class="tweet-item col-sm-<?php echo esc_attr( $col ); ?>">
							<div class="content">
								<?php echo ent2ncr( $latestTweet ); ?>
							</div>
							<div class="tweet-footer">
								<div class="top">
									<a href="https://twitter.com/<?php echo esc_attr( $username ); ?>/status/<?php echo esc_attr( $tweet['id_str'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								</div>
								<div class="bottom">
									<strong><?php echo esc_html( $displayName ); ?></strong>
									<span class="username"><?php echo esc_html__( '@', 'coaching' ) . $username ; ?></span>
									<span class="ago"><?php echo esc_html( thim_time_ago( $twitterTime ) ); ?></span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
