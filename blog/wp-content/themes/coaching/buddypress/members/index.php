<?php
/**
 * BuddyPress - Members
 *
 * @package    BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires at the top of the members directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_before_directory_members_page' ); ?>

	<div id="buddypress">

		<?php

		/**
		 * Fires before the display of the members.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_directory_members' ); ?>

		<div class="buddypress-left">
			<div class="item-list-tabs" role="navigation">
				<ul>
					<li class="selected" id="members-all">
						<a href="<?php bp_members_directory_permalink(); ?>"><?php printf( wp_kses( __( 'All Members <span>%s</span>', 'coaching' ), array( 'span' => array() ) ), bp_get_total_member_count() ); ?></a>
					</li>

					<?php if ( is_user_logged_in() && bp_is_active( 'friends' ) && bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
						<li id="members-personal">
							<a href="<?php echo bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/'; ?>"><?php printf( wp_kses( __( 'My Friends <span>%s</span>', 'coaching' ), array( 'span' => array() ) ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a>
						</li>
					<?php endif; ?>

					<?php

					/**
					 * Fires inside the members directory member types.
					 *
					 * @since 1.2.0
					 */
					do_action( 'bp_members_directory_member_types' ); ?>

				</ul>
			</div><!-- .item-list-tabs -->
		</div>

		<div class="buddypress-content">
			<?php

			/**
			 * Fires before the display of the members content.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_before_directory_members_content' ); ?>

			<div id="members-dir-search" class="dir-search" role="search">
				<?php bp_directory_members_search_form(); ?>
			</div><!-- #members-dir-search -->

			<?php

			/**
			 * Fires before the display of the members list tabs.
			 *
			 * @since 1.8.0
			 */
			do_action( 'bp_before_directory_members_tabs' ); ?>

			<form action="" method="post" id="members-directory-form" class="dir-form">


				<div class="item-list-tabs" id="subnav" role="navigation">
					<ul>
						<?php

						/**
						 * Fires inside the members directory member sub-types.
						 *
						 * @since 1.5.0
						 */
						do_action( 'bp_members_directory_member_sub_types' ); ?>

						<li id="members-order-select" class="last filter">
							<label for="members-order-by"><?php esc_html_e( 'Order By:', 'coaching' ); ?></label>
							<select id="members-order-by">
								<option value="active"><?php esc_html_e( 'Last Active', 'coaching' ); ?></option>
								<option value="newest"><?php esc_html_e( 'Newest Registered', 'coaching' ); ?></option>

								<?php if ( bp_is_active( 'xprofile' ) ) : ?>
									<option value="alphabetical"><?php esc_html_e( 'Alphabetical', 'coaching' ); ?></option>
								<?php endif; ?>

								<?php

								/**
								 * Fires inside the members directory member order options.
								 *
								 * @since 1.2.0
								 */
								do_action( 'bp_members_directory_order_options' ); ?>
							</select>
						</li>
					</ul>
				</div>

				<div id="members-dir-list" class="members dir-list">
					<?php bp_get_template_part( 'members/members-loop' ); ?>
				</div><!-- #members-dir-list -->

				<?php

				/**
				 * Fires and displays the members content.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_directory_members_content' ); ?>



				<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

				<?php

				/**
				 * Fires after the display of the members content.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_after_directory_members_content' ); ?>

			</form><!-- #members-directory-form -->

			<?php

			/**
			 * Fires after the display of the members.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_after_directory_members' ); ?>

		</div>

	</div><!-- #buddypress -->

<?php

/**
 * Fires at the bottom of the members directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_after_directory_members_page' );