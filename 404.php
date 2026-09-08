<?php get_header(); ?>

        <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/404-pc.jpg">
                                <img class="fv-slide__img" src="<?php echo get_template_directory_uri(); ?>/images/404-sp.jpg" alt="404 Not Found">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h1>404 not found</h1>
                        </div>
                    </div>
                </section>

                <div class="not-found">
                    <div class="inner">
                        <p class="not-found__text">申し訳ございませんが、お探しのページが見つかりませんでした。</p>
                        <p class="not-found__text">お探しのページは一時的に表示ができない状態にあるか、移動または削除された可能性があります。</p>
                        <div class="not-found__btn">
                            <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>