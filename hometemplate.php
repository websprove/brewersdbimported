<?php
/**
 * Template Name: Homepage
 * The template for displaying all single posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

	echo "<div style='padding:20px 30px 0; text-align:center;'>";
	echo "<ul style='text-align:left; font-weight:bold;'>Solutions:";
	echo "<li>I used a combination of ACF and CPT UI plugins to add the Custom Fileds and Brewers Post type.</li>";
	echo "<li>I Imported CSV File Data from Brewers DB Github File: <a href='https://github.com/openbrewerydb/openbrewerydb' target='_blank'>(https://github.com/openbrewerydb/openbrewerydb)</a>.</li>";
	echo "<li>I Used WP All Import Plugin to import data from CSV file: <a href='https://www.wpallimport.com/' target='_blank'>(https://www.wpallimport.com/)</a>.</li>";
	echo "<li>I used twenty Twenty-One theme then I created template page for homepage and added a Loop script with a pagination to query the posts.</li>";
	echo "</ul></div>";

/* Start the Loop */
$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $args = array(
        'post_type'         => 'brewers',
        'orderby'           => 'date',
        'order'             => 'ASC',
        'post_status'       => 'publish',
        'posts_per_page'    => 6,
        'paged'             => $paged,
    ); 

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<header class="entry-header alignwide"> 		
	<div class="entry-content">
		<span style="font-size:18px;"><b>Obdb ID:</b> <?php the_field('obdb_id'); ?></span>
		<li><b>Name:</b> <?php the_title(); ?></li>
		<li><b>Brewery Type:</b> <?php the_field('brewery_type'); ?></li>
		<li><b>Street:</b> <?php the_field('street'); ?></li>
		<?php if( get_field('address_2') ): ?><li><b>Address 2:</b> <?php the_field('address_2'); ?></li><?php endif; ?>
		<?php if( get_field('address_3') ): ?><li><b>Address 3:</b> <?php the_field('address_3'); ?></li><?php endif; ?>
		<li><b>City:</b> <?php the_field('city'); ?></li>
		<li><b>State:</b> <?php the_field('state'); ?></li>
		<?php if( get_field('county_province') ): ?><li><b>County Province:</b> <?php the_field('county_province'); ?></li><?php endif; ?>
		<?php if( get_field('postal_code') ): ?><li><b>Postal Code:</b> <?php the_field('postal_code'); ?></li><?php endif; ?>
		<?php if( get_field('website_url') ): ?><li><b>Website Url:</b> <a href="<?php the_field('website_url'); ?>" target="_blank"><?php the_field('website_url'); ?></a></li><?php endif; ?>
		<?php if( get_field('phone') ): ?><li><b>Phone:</b> <?php the_field('phone'); ?></li><?php endif; ?>
		<?php if( get_field('country') ): ?><li><b>Country:</b> <?php the_field('country'); ?></li><?php endif; ?>
	</div><!-- .entry-content -->
</header>
	<?php endwhile; ?> 
	<div class="pagination">
		<?php wp_pagenavi( array( 'query' => $loop ) ); ?>
	</div> 
	<?php if ( get_edit_post_link() ) : ?> 
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php wp_reset_postdata();
	// If comments are open or there is at least one comment, load up the comment template.
	//if ( comments_open() || get_comments_number() ) {
		//comments_template();
	//}
//endwhile; // End of the loop.

get_footer();
