<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kedar
 */

get_header(); ?>

<?php
    if(is_category( 'catalog' )):
        $query = new WP_Query( array( 'pagename' => 'catalog' ) );
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'page-templates/catalog' );
        }
        wp_reset_postdata();
    else:
?>

<div class="kedar-hero kedar-hero--plain">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <h1 class="section-title section-title_left section-title_nodecor"><?php the_archive_title(); ?></h1>
        </div>
    </div>
</div>
<div class="category">
    <div class="kedar-wrap">
        <div class="cards column-3">
            <?php if ( have_posts() ) : ?>
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
                ?>
                <a href="<?php the_permalink(); ?>" class="card">
                    <div class="card__img"><img src="<?php the_post_thumbnail_url(); ?>" alt="thumbnail"></div>
                    <div class="card__body">
                        <h3 class="card__name"><?php the_title(); ?></h3>
                        <div class="card__info">
                            <p>Длина корпуса:<span> 3 м</span></p>
                            <p>Диаметр:<span> 2,4 м</span></p>
                            <p>Секций:<span> 1</span></p>
                        </div>
                        <div class="card__price-full">
                            Стоимость: <span>80 000 ₽</span>
                        </div>
                        <span href="" class="btn btn-o card__btn">Подробнее</span>
                    </div>
                </a>

                <?php
                    endwhile;
                    else : echo "";
                    endif;
                ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php get_footer();
