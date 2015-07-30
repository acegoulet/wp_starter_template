<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>
		<div class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta">
			    <p>Posted by <?php the_author_posts_link(); ?> on <span class="datetime"><?php the_time('c'); ?> <?php the_time(get_option('date_format')); ?></span>. <a href="#comments"><?php comments_number('No comments','One comment','% comments'); ?></a>.</p>
			</div>
		</div>
		
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		
		<div class="entry-footer">
			<div class="entry-taxonomy">
				<p>Categories: <?php the_category(', '); ?></p>
				<p>Tags: <?php the_tags(); ?></p>
			</div>
			
			<nav class="pagination">
				<p class="next"><?php next_post_link('Next post: %link'); ?></p>
				<p class="previous"><?php previous_post_link('Previous post: %link'); ?></p>				
			</nav>
			
			<div id="comments">
				<?php paginate_comments_links(); ?>
				<?php comments_template(); ?>
			</div>
		</div>
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>