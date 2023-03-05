<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package citygovt
 */

if ( ! function_exists( 'citygovt_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function citygovt_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'citygovt' ),
			$time_string
		);

	}
endif;


if ( ! function_exists( 'citygovt_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function citygovt_posted_by() {
		echo sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'citygovt' ),
			esc_html( get_the_author() )
		);

	}
endif;

/*
*	Comments Counter showing in post list and post details
*/
if ( ! function_exists( 'citygovt_comments_count' ) ) :

	function citygovt_comments_count($suffix = null) {

		if ( get_comments_number( get_the_ID() ) == 0 ) {

			$comments_count = '<a href="' . esc_url( get_permalink() ) . '" ><span class="fa fa-comment"></span>' . $suffix . get_comments_number( get_the_ID() ) . esc_html__( ' comments', 'citygovt' ) . '</a>';

		} elseif ( get_comments_number( get_the_ID() ) > 1 ) {
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '" ><span class="fa fa-comment"></span>' . $suffix . get_comments_number( get_the_ID() ) . esc_html__( ' comments', 'citygovt' ) . '</a>';
		} else {
        
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '#comments" ><span class="fa fa-comment"></span>' . $suffix . get_comments_number( get_the_ID() ) . esc_html__( ' comment', 'citygovt' ) . '</a>';
		
		}

		echo sprintf( esc_html( '%s' ), $comments_count ); // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'citygovt_comments_count_two' ) ) :

	function citygovt_comments_count_two() {

		if ( get_comments_number( get_the_ID() ) == 0 ) {
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '" ><span class="fa fa-comment"></span>' . get_comments_number( get_the_ID() ) . '</a>';
		} elseif ( get_comments_number( get_the_ID() ) > 1 ) {
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '" ><span class="fa fa-comment"></span>' . get_comments_number( get_the_ID() ) . '</a>';
		} elseif ( get_comments_number( get_the_ID() ) < 10 ) {
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '" ><span class="fa fa-comment"></span>' . '0'.get_comments_number( get_the_ID() ) . '</a>';
		}else {
			$comments_count = '<a href="' . esc_url( get_permalink() ) . '#comments" ><span class="fa fa-comment"></span>' . get_comments_number( get_the_ID() ) . '</a>';
		}
		echo sprintf( esc_html( '%s' ), $comments_count ); // WPCS: XSS OK.
	}
endif;

/*
*	Category list showing in tags section
*/
if ( ! function_exists( 'citygovt_category_list' ) ) :

	function citygovt_category_list() {
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ', '  );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '' . esc_html__( ' %1$s', 'citygovt' ) . '', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

endif;




/*
*	Category list showing in tags section
*/
if ( ! function_exists( 'citygovt_tag_list' ) ) :

	function citygovt_tag_list() {
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'citygovt' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags">' . esc_html__( '%1$s', 'citygovt' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;



if ( ! function_exists( 'citygovt_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function citygovt_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
		</a>

			<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'citygovt_comments' ) ) {

	function citygovt_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );
		$args['reply_text'] = esc_html__( 'Reply', 'citygovt' );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		$comment_class = empty( $args['has_children'] ) ? '' : 'parent';
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( 'comment comment-box ' . $comment_class . ' ' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
			<div class="comment-item">
				<?php } else { ?>
			<div class="comment-item yes-ping">
				<?php } ?>
				<?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
				<div class="author-thumb">
					<figure class="thumb"><?php print get_avatar( $comment, 115, null, null, array( 'class' => array() ) ); ?></figure>
				</div> 
				<?php } ?>
				<div class="info">
					<span class="name"><?php echo get_comment_author_link(); ?>,</span>
					<span class="date"><?php echo get_comment_date( 'M d, Y' ); ?></span>
				</div>
				<div class="text"><?php comment_text(); ?></div>
				<div class="reply-link">
					<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'citygovt' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
								)
							)
						);
					?>
				</div>
			</div>
		<?php
	}
}


function citygovt_posts_nav() {
	$total = wp_count_posts()->publish;
	if ( $total > 1 ) {
		?>
		<div class="post-controls">
			<div class="inner clearfix">
		<?php
		the_post_navigation(
			array(
				'prev_text'          => '<span class="icon flaticon-back"></span><span class="txt">' . esc_html( '%title' ) . '</span>',
				'next_text'          => '<div class="next-post"><span class="icon flaticon-next"></span><span class="txt">' . esc_html( '%title' ) . '</span></div>',
			)
		);
		?>
			</div>
		</div>
		<?php
	}
}


function citygovt_related_event() {

	$post_categories = get_the_terms( get_the_ID(), 'tribe_events_cat' );
	$post_tags       = get_the_terms( get_the_ID(), 'post_tag' );

	$get_posts = array();

	$not___in   = array();
	$not___in[] = get_the_ID();

	if ( $post_categories ) {
		$rp_args = tribe_get_events(
			array(
				'posts_per_page' => 2,
				'exclude'        => get_the_ID(),
				'cat'            => $post_categories[0]->slug,
				'post__not_in'   => $not___in,
			)
		);

		$related_posts_temp = new WP_Query( $rp_args );

		if ( $related_posts_temp->have_posts() ) {
			$get_posts[] = $related_posts_temp;
		}
	}

	if ( $post_tags ) {
		$rp_args = tribe_get_events(
			array(
				'posts_per_page' => 2,
				'exclude'        => get_the_ID(),
				'tag_id'         => $post_tags[0]->slug,
				'post__not_in'   => $not___in,
			)
		);

		$related_posts_temp = new WP_Query( $rp_args );

		if ( $related_posts_temp->have_posts() ) {
			$get_posts[] = $related_posts_temp;
		}
	}
	?>
		
	<div class="related-posts">
		<h2><?php esc_html_e( 'Related Events', 'citygovt' ); ?></h2>
		<div class="row clearfix">
				<?php
				foreach ( $get_posts as $post ) {
					?>
				<div class="event-block-three col-md-6 col-sm-12">
					<div class="inner-box">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="image-box">
							<figure class="image"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail(); ?></a></figure>
						</div>
						<?php } ?>
						<div class="lower-box">
							<div class="content-box">
								<div class="date-box">
									<div class="date"><span
											class="day"><?php echo tribe_get_start_date( $post->ID, false, 'd' ); ?></span><span
											class="month"><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span>
									</div>
								</div>
								<div class="content">
									<div class="cat-info"><?php the_terms( $post->ID, 'tribe_events_cat', ' ' ); ?></div>
									<h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
									<div class="location"><?php echo tribe_get_address(); ?></div>
									<div class="read-more"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'citygovt' ); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>
	<?php
}
