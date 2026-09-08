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
                            <h1>お問い合わせ</h1>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <div class="contact-form">
                    <div class="inner">
                        <p class="contact-form__intro">当校に関するご質問・ご相談・資料請求は下記のフォームからお気軽にお問い合わせください。<br>通常３営業日以内にメールにてご連絡させていただきます。</p>

                        <?php
                        if (have_posts()) :
                        while (have_posts()) : the_post();
                            remove_filter('the_content', 'wpautop');
                            the_content();
                        endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>