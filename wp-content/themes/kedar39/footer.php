<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kedar
 */

?>

    <div class="popup js-popup">
        <div class="popup__body">
            <div class="popup__content js-popup-content"></div>
            <button class="popup__close js-popup-close"><i class="icon-close"></i></button>
        </div>
    </div>

    <div class="popup js-popup-form popup-form">
        <div class="popup__body">
            <div class="popup__content">
                <h2 class="section-title popup-form__title">Заказать звонок</h2>
                <form action="" class="form">
                    <div class="form__fields">
                        <label for="" class="form__label">
                            Имя *
                            <input type="text" class="form__input" required placeholder="Александр">
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
            <button class="popup__close js-popup-form-close"><i class="icon-close"></i></button>
        </div>
    </div>

</main>
<footer class="footer">
    <div class="footer__policy">
        <div class="kedar-wrap">
            <div class="footer__wrap">
                <p><?php the_field('copir-text', 'options'); ?></p>
                <nav class="footer__socials">
                    <ul class="footer__socials-list">
                        <?php if(get_field('facebook', 'options')): ?>
                        <li>
                            <a href="<?php the_field('facebook', 'options'); ?>"><i class="icon-facebook"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if(get_field('instagramm', 'options')): ?>
                        <li>
                            <a href="<?php the_field('instagramm', 'options'); ?>"><i class="icon-instagram"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if(get_field('vk', 'options')): ?>
                        <li>
                            <a href="<?php the_field('vk', 'options'); ?>"><i class="icon-vk"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php $copir = get_field('privacy', 'options'); ?>
                <p><a href="<?php echo $copir['link']; ?>"><?php echo $copir['title']; ?></a></p>
            </div>
        </div>
    </div>
    <div class="footer__dev">
        <div class="kedar-wrap">
            <?php $brandlif = get_field('brandlif', 'options'); ?>
            <?php echo $brandlif['title']; ?><a href='<?php echo $brandlif['link']; ?>' target="blank"> Brandlif</a></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
	</body>
</html>
