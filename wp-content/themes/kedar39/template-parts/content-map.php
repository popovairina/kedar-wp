    <?php $maps = get_field('kontakty', 'options'); ?>
    <?php if( $maps ): ?>
    <section class="contacts">
        <div class="kedar-wrap">
            <h2 class="section-title"><?php echo $maps['title']; ?></h2>
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
    </section>
    <?php endif; ?>