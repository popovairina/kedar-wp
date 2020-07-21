<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kedar
 */

get_header();
?>

<div class="kedar-hero kedar-hero--plain">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <nav class="kedar-hero__breadcrumbs">
                <ul>
                    <li><a href="">Главная</a></li>
                    <li><a href="">Оплата и доставка</a></li>
                </ul>
            </nav>
            <h1 class="section-title"><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<div class="delivery">
    <div class="kedar-wrap">
    	<?php the_content(); ?>
    </div>
</div>
<?php endwhile; // end of the loop. ?>

<?php
get_footer();