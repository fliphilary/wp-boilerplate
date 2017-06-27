<?php get_header(); ?>

  <?php get_template_part('partials/nav','header'); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile ?>

  <?php get_template_part('partials/nav','footer'); ?>

<?php get_footer(); ?>
