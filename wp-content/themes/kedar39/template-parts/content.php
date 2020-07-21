<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kedar
 */

?>

<div class="kedar-hero product-hero kedar-hero--plain">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <h1 class="section-title section-title_left section-title_nodecor display-mobile"><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="product">
    <div class="kedar-wrap">
        <div class="product__top">
            <div class="product__gallery">
                <div class="product__gallery-top swiper-container js-gallery-top">
                    <div class="swiper-wrapper">
                        <?php if( have_rows('gallery') ) : ?>
                            <?php while( have_rows('gallery') ) : the_row(); ?>
                                <?php
                                    $image = get_sub_field('image');
                                    $image_url = $image['sizes']['large'];
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $image_url; ?>" alt="gallery-image">
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-prev product__btn-prev">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.5" cx="23" cy="23" r="21" fill="#F2F2F2"/>
                            <path d="M25 31L17 22.5L25 14" stroke="#6A6A6A" stroke-width="3" stroke-linecap="round"/>
                        </svg>                            
                    </div>
                    <div class="swiper-button-next product__btn-next">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.5" cx="23" cy="23" r="21" transform="rotate(-180 23 23)" fill="#F2F2F2"/>
                            <path d="M21 15L29 23.5L21 32" stroke="#6A6A6A" stroke-width="3" stroke-linecap="round"/>
                        </svg>                            
                    </div>
                </div>
                <div class="product__gallery-thumbs swiper-container js-gallery-thumbs">
                    <div class="swiper-wrapper">
                        <?php if( have_rows('gallery') ) : ?>
                            <?php while( have_rows('gallery') ) : the_row(); ?>
                                <?php
                                    $image = get_sub_field('image');
                                    $image_url = $image['sizes']['thumbnail'];
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $image_url; ?>" alt="gallery-image">
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="product__desc">
                <h1 class="hidden-mobile"><?php the_title(); ?></h1>
                <div class="product__desc-props">
                <?php if( have_rows('parametrs') ) : ?>
                    <?php while( have_rows('parametrs') ) : the_row(); ?>
                    <p><?php the_sub_field('title'); ?> <span><?php the_sub_field('description'); ?></span></p>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <div class="product__price-wrap">
                    <?php $price = get_field('price'); ?>
                    <?php if( $price['sale'] ): ?>
                        <div class="product__price-old">
                            <?php echo $price['price_old']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="product__price-new"><span class="js-price"><?php echo $price['price_base']; ?></span></div>
                </div>
                <a href="#" class="btn product__desc-btn">Заказать</a>
            </div>
        </div>
    </div>
</div>

<div class="product__info">
    <div class="kedar-wrap">
        <div class="product__options">
            <div class="product__tab-wrap">
                <div class="product__tab active" data-tab="1"><?php the_field('description_tab'); ?></div>
                <?php if( get_field('addition_options') ): ?>
                    <div class="product__tab" data-tab="2"><?php the_field('additional_tab'); ?></div>
                <?php endif; ?>
                <div class="product__tab" data-tab="3"><?php the_field('blurprint_tab'); ?></div>
            </div>
            <div class="product__content-wrap">
                <div class="product__content active" data-tab="1">
                <?php if( have_rows('item_description') ) : ?>
                    <?php while( have_rows('item_description') ) : the_row(); ?>

                    <div class="product__option-wrap">
                        <div class="product__option-name"><?php the_sub_field('title'); ?></div>
                        <div class="product__option-desc">
                            <ul>
                                <?php while( have_rows('description') ): the_row(); ?>
                                    <li><?php the_sub_field('item'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <?php if( get_field('addition_options') ): ?>
                <div class="product__content" data-tab="2">
                    <form action="" class="product-form">

                        <div class="product-form__category-wrap">
                            <div class="product-form__category product-form__category--scroll">
                                <div class="product-form__title">Основа</div>
                                <div class="product-form__fields column-6">
                                    <input type="radio" name="foundation" id="foundation-1" data-name="Круглая 3 м" data-price="390000">
                                    <label for="foundation-1" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Round-3m.png" alt=""></span>
                                        <span class="product-label__name">Круглая <br>3 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                    <input type="radio" name="foundation" id="foundation-2" data-name="Круглая 3 м" data-price="390000">
                                    <label for="foundation-2" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Round-4.png" alt=""></span>
                                        <span class="product-label__name">Круглая <br>4,6 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                    <input type="radio" checked="true" name="foundation" id="foundation-3" data-name="Круглая 6 м" data-price="390000">
                                    <label for="foundation-3" class="product-form__label product-label selected">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Round-6m.png" alt=""></span>
                                        <span class="product-label__name">Круглая <br>6 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                    <input type="radio" name="foundation" id="foundation-4" data-name="Круглая 3 м" data-price="390000">
                                    <label for="foundation-4" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Qudro-3m.png" alt=""></span>
                                        <span class="product-label__name">Квадро <br>3 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                    <input type="radio" name="foundation" id="foundation-5" data-name="Круглая 3 м" data-price="390000">
                                    <label for="foundation-5" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Qudro-4.png" alt=""></span>
                                        <span class="product-label__name">Квадро <br>4,6 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                    <input type="radio" name="foundation" id="foundation-6" data-name="Круглая 3 м" data-price="390000">
                                    <label for="foundation-6" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Qudro-6m.png" alt=""></span>
                                        <span class="product-label__name">Квадро <br>6 м</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="product-form__category-wrap">
                            <div class="product-form__category">
                                <div class="product-form__title">Тип печи</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="furnace-type" id="furnace-type-1" data-name="Круглая 3 м" data-price="3000">
                                    <label for="furnace-type-1" class="product-form__label product-label selected">
                                        <span class="product-label__name">С топкой в парной</span>
                                        <span class="product-label__price">3 000 ₽</span>
                                    </label>
                                    <input type="radio" name="furnace-type" id="furnace-type-2" data-name="Круглая 3 м" data-price="3000">
                                    <label for="furnace-type-2" class="product-form__label product-label">
                                        <span class="product-label__name">С выносной топкой на улицу</span>
                                        <span class="product-label__price">3 000 ₽</span>
                                    </label>
                                    <input type="radio" name="furnace-type" id="furnace-type-3" data-name="Круглая 3 м" data-price="3000">
                                    <label for="furnace-type-3" class="product-form__label product-label">
                                        <span class="product-label__name"> С выносной топкой в смежное помещение</span>
                                        <span class="product-label__price">3 000 ₽</span>
                                    </label>
                                </div>
                            </div>

                            <div class="product-form__category">
                                <div class="product-form__title">Печи</div>
                                <div class="product-form__fields column-4 furnace">
                                    <input type="radio" checked="true" name="furnace" id="furnace-1" data-name="Круглая 3 м">
                                    <label for="furnace-1" class="product-form__label product-label selected">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Aurora.png" alt=""></span>
                                        <span class="product-label__name">Aurora</span>
                                    </label>
                                    <input type="radio" name="furnace" id="furnace-2" data-name="Круглая 3 м" data-price="190000">
                                    <label for="furnace-2" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Grill.png" alt=""></span>
                                        <span class="product-label__name">Grill D Aurora Trio</span>
                                        <span class="product-label__price">190 000 ₽</span>
                                    </label>
                                    <input type="radio" name="furnace" id="furnace-3" data-name="Круглая 3 м" data-price="250000">
                                    <label for="furnace-3" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Cometa.png" alt=""></span>
                                        <span class="product-label__name">Grill D Cometa Vega Long</span>
                                        <span class="product-label__price">250 000 ₽</span>
                                    </label>
                                    <input type="radio" name="furnace" id="furnace-4" data-name="Круглая 3 м" data-price="390000">
                                    <label for="furnace-4" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Cometa-Stone.png" alt=""></span>
                                        <span class="product-label__name">Grill D Cometa Vega Stone</span>
                                        <span class="product-label__price">390 000 ₽</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="product-form__category-wrap">
                            <div class="product-form__category">
                                <div class="product-form__title">Двери</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="doors" id="doors-1" data-name="Круглая 3 м">
                                    <label for="doors-1" class="product-form__label product-label selected">
                                        <span class="product-label__name">Деревянная</span>
                                    </label>
                                    <input type="radio" name="doors" id="doors-2" data-name="Круглая 3 м" data-price="5000">
                                    <label for="doors-2" class="product-form__label product-label">
                                        <span class="product-label__name">Металлическая</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="product-form__category-wrap">

                            <div class="product-form__category">
                                <div class="product-form__title">Тип кровли</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="roof-type" id="roof-type-1" data-name="Круглая 3 м" data-price="5000">
                                    <label for="roof-type-1" class="product-form__label product-label selected">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/roof-1.png" alt=""></span>
                                        <span class="product-label__name">Соната</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="radio" name="roof-type" id="roof-type-2" data-name="Круглая 3 м" data-price="5000">
                                    <label for="roof-type-2" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/roof-2.png" alt=""></span>
                                        <span class="product-label__name">Кантри</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="radio" name="roof-type" id="roof-type-3" data-name="Круглая 3 м" data-price="5000">
                                    <label for="roof-type-3" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/roof-3.png" alt=""></span>
                                        <span class="product-label__name">Кадриль</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                </div>
                            </div>

                            <div class="product-form__category">
                                <div class="product-form__title">Цвет кровли</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="roof-color" id="roof-color-1" data-name="Круглая 3 м">
                                    <label for="roof-color-1" class="product-form__label product-label selected">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/color-1.png" alt=""></span>
                                        <span class="product-label__name">Серый</span>
                                    </label>
                                    <input type="radio" name="roof-color" id="roof-color-2" data-name="Круглая 3 м">
                                    <label for="roof-color-2" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/color-2.png" alt=""></span>
                                        <span class="product-label__name">Коричневый</span>
                                    </label>
                                    <input type="radio" name="roof-color" id="roof-color-3" data-name="Круглая 3 м">
                                    <label for="roof-color-3" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/color-3.png" alt=""></span>
                                        <span class="product-label__name">Зеленый</span>
                                    </label>
                                    <input type="radio" name="roof-color" id="roof-color-4" data-name="Круглая 3 м">
                                    <label for="roof-color-4" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/color-4.png" alt=""></span>
                                        <span class="product-label__name">Бордовый</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="product-form__category-wrap">

                            <div class="product-form__category">
                                <div class="product-form__title">Внешнее покрытие</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="out" id="out-1" data-name="Круглая 3 м">
                                    <label for="out-1" class="product-form__label product-label selected">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/out-1.png" alt=""></span>
                                        <span class="product-label__name">1</span>
                                    </label>
                                    <input type="radio" name="out" id="out-2" data-name="Круглая 3 м">
                                    <label for="out-2" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/out-2.png" alt=""></span>
                                        <span class="product-label__name">2</span>
                                    </label>
                                    <input type="radio" name="out" id="out-3" data-name="Круглая 3 м">
                                    <label for="out-3" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/out-3.png" alt=""></span>
                                        <span class="product-label__name">3</span>
                                    </label>
                                    <input type="radio" name="out" id="out-4" data-name="Круглая 3 м">
                                    <label for="out-4" class="product-form__label product-label">
                                        <span class="product-label__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/out-4.png" alt=""></span>
                                        <span class="product-label__name">4</span>
                                    </label>
                                </div>
                            </div>

                            <div class="product-form__category">
                                <div class="product-form__title">Внутренняя обработка парной</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="in" id="in-1" data-name="Круглая 3 м">
                                    <label for="in-1" class="product-form__label product-label selected">
                                        <span class="product-label__name">Льняное масло</span>
                                    </label>
                                    <input type="radio" name="in" id="in-2" data-name="Круглая 3 м">
                                    <label for="in-2" class="product-form__label product-label">
                                        <span class="product-label__name">Фирменное восковое покрытие</span>
                                    </label>
                                    <input type="radio" name="in" id="in-3" data-name="Круглая 3 м" data-price="5000">
                                    <label for="in-3" class="product-form__label product-label">
                                        <span class="product-label__name">Pinotex лак для сауны</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                </div>
                            </div>

                            <div class="product-form__category">
                                <div class="product-form__title">Освещение</div>
                                <div class="product-form__fields column-4">
                                    <input type="radio" checked="true" name="light" id="light-1" data-name="Круглая 3 м">
                                    <label for="light-1" class="product-form__label product-label selected">
                                        <span class="product-label__name">Светильники с абажуром</span>
                                    </label>
                                    <input type="radio" name="light" id="light-2" data-name="Круглая 3 м">
                                    <label for="light-2" class="product-form__label product-label">
                                        <span class="product-label__name">Светильники точечные</span>
                                    </label>
                                </div>
                            </div>

                            <div class="product-form__category">
                                <div class="product-form__title">Дополнительно</div>
                                <div class="product-form__fields check-fields column-4">
                                    <input type="checkbox" name="add" id="add-1" data-name="Круглая 3 м" data-price="5000">
                                    <label for="add-1" class="product-form__label product-label">
                                        <span class="product-label__name">Насос для воды</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="checkbox" name="add" id="add-2" data-name="Круглая 3 м" data-price="5000">
                                    <label for="add-2" class="product-form__label product-label">
                                        <span class="product-label__name">Бак для воды в Рундуке 150 л</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="checkbox" name="add" id="add-3" data-name="Круглая 3 м" data-price="5000">
                                    <label for="add-3" class="product-form__label product-label">
                                        <span class="product-label__name">Смеситель + тропический душ Бойлер 50 л</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="checkbox" name="add" id="add-4" data-name="Круглая 3 м" data-price="5000">
                                    <label for="add-4" class="product-form__label product-label">
                                        <span class="product-label__name">Складная кровать</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                    <input type="checkbox" name="add" id="add-5" data-name="Круглая 3 м" data-price="5000">
                                    <label for="add-5" class="product-form__label product-label">
                                        <span class="product-label__name">1200x1000 (комната отдых)</span>
                                        <span class="product-label__price">5 000 ₽</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="product-form__comment">
                            <label for="comment" class="product-form__comment-label"><strong>Хотите добавить что-то еще?</strong>
                                Мы готовы внести любые ваши пожелания в проект.</label>
                            <textarea name="comment" id="comment" class="product-form__comment-area" placeholder="Хочу установить 2 панорамных стекла и пивной кран"></textarea>
                        </div>


                    </form>
                </div>
                <?php endif; ?>
                <div class="product__content" data-tab="3">Чертеж</div>
            </div>
        </div>
    </div>
</div>

<div class="product-total">
    <div class="kedar-wrap">
        <div class="product-total__wrap">
            <div class="product-total__text">Итого: <span class="product-total__sum"><span class="js-total">0</span> ₽</span></div>
            <button type="submit" class="btn product-total__btn">Заказать</button>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        jQuery('#foundation-4').click(function(e){
            var data = {
                'action': 'getproduct', // это идентификатор чтоб бек понимал
                'productID': '882', // параметы которые надо передать на бек, к примеру ID продукта чтоб его грузить
                'custom': 'customValue',
            }

            var ajaxurl = '/wp-admin/admin-ajax.php';

            jQuery.ajax({
                url: ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function(){
                    console.log('Request pending');
                },
                success:function(data){
                    // Отобразить на сайте
                    console.log(data);
                }
            });
        });
    });


</script>