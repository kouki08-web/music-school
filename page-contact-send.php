<?php get_header(); ?>

        <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/contact-pc.jpg">
                                <img class="fv-slide__img" src="<?php echo get_template_directory_uri(); ?>/images/contact-sp.jpg" alt="お問い合わせ">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h2>お問い合わせ</h2>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <div class="contact-send">
                    <div class="inner">
                        <div class="contact-send__contents">
                            <p class="contact-send__text">お問い合わせいただきありがとうございました。<br>内容確認後、担当者よりメールにてご連絡いたします。</p>
                            <div class="contact-send__btn">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホームへ戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img class="pagetop__icon" src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" width="68" height="68" alt="ページトップへ戻る">
        </a>

        <?php get_footer(); ?>