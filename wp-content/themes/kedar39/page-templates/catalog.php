<?php
/*
Template Name: Catalog
*/
get_header(); ?>

<div class="kedar-hero catalog-hero" style="background-image: url('<?php the_field('bg-image'); ?>');">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <h1 class="kedar-hero__title"><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<div class="catalog">
    <div class="kedar-wrap">
        <div class="cards column-2">
        <?php if( have_rows('items') ) : ?>
            <?php while( have_rows('items') ) : the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>" class="card">
                    <div class="card__img"><img src="<?php the_sub_field('image'); ?>" alt="Product image"></div>
                    <div class="card__body">
                        <div class="card__body-wrap">
                            <div class="card__desc"><?php the_sub_field('title'); ?></div>
                            <div class="card__price"><?php the_sub_field('description'); ?></div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();