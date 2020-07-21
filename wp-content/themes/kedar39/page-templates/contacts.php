<?php
/*
Template Name: Contacts
*/
get_header(); ?>

<div class="kedar-hero kedar-hero--plain">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <h1 class="section-title"><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<?php $maps = get_field('kontakty','options'); ?>
<?php if( $maps ): ?>
<div class="contacts contacts_page">
    <div class="kedar-wrap">
        <div class="contacts__info">
            <div class="contacts__info-item">
                <div class="contacts__info-text"><?php echo $maps['phone']['mark']; ?></div>
                <a href="tel:<?php echo preg_replace('~\D~', '', $maps['phone']['text']); ?>" class="contacts__info-link"><?php echo $maps['phone']['text']; ?></span></a>
            </div>
            <div class="contacts__info-item">
                <div class="contacts__info-text"><?php echo $maps['email']['mark']; ?></div>
                <a href="mailto:<?php echo $maps['email']['text']; ?>" class="contacts__info-link"><?php echo $maps['email']['text']; ?></a>
            </div>
        </div>
        <div class="contacts__maps">
            <div class="contacts__maps-item">
                <a href="<?php echo $maps['map-1']['link']; ?>" class="contacts__map js-map" id="map1" data-coordX="54.721827569963125" data-coordY="20.49614099999998">
                    <img src="<?php echo $maps['map-1']['image']; ?>" alt="Map image">
                </a>
                <div class="contacts__address">
                    <h3><?php echo $maps['map-1']['title']; ?></h3>
                    <p><?php echo $maps['map-1']['description']; ?></p>
                </div>
            </div>
            <div class="contacts__maps-item">
                <a href="<?php echo $maps['map-2']['link']; ?>" class="contacts__map js-map" id="map2" data-coordX="54.64770826683654" data-coordY="20.543433244702598">
                    <img src="<?php echo $maps['map-2']['image']; ?>" alt="Map image">
                </a>
                <div class="contacts__address">
                    <h3><?php echo $maps['map-2']['title']; ?></h3>
                    <p><?php echo $maps['map-2']['description']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<section class="cta">
    <div class="kedar-wrap">
        <h2 class="section-title">Заказать звонок</h2>
        <form action="" class="form">
            <div class="form__fields">
                <label for="" class="form__label">
                    Имя *
                    <input type="text" class="form__input" required>
                </label>
                <label for="" class="form__label">
                    E-mail *
                    <input type="email" class="form__input" required placeholder="alexuder@somemail.ru">
                </label>
                <label for="" class="form__label">
                    Телефон
                    <input type="tel" class="form__input" placeholder="+7 (952) 056-16-70">
                </label>
                <label for="" class="form__label form__label--big">
                    Оставьте комментарий:
                    <textarea type="text" class="form__input form__textarea" placeholder="Можно ли сделать стеклянную крышу?"></textarea>
                </label>
            </div>
            <p class="form__policy">Нажимая кнопку «Отправить», Вы принимаете условия <a href="">пользовательского соглашения</a></p>
            <button type="submit" class="btn form__btn">Отправить</button>
        </form> 
    </div>
</section>

<?php
get_footer();