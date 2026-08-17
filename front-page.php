<?php get_header(); ?>
            <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/fv-pc.jpg">
                                <img class="fv-slide__img" src="<?php echo get_template_directory_uri(); ?>/images/fv-sp.jpg" alt="「音楽で生きる」を叶えるミュージックスクール">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h2>「音楽で生きる」<br class="sp">を叶える<br>ミュージックスクール</h2>
                        </div>
                    </div>
                </section>

                <section class="about">
                    <div class="inner">
                        <div class="about__contents">
                            <h2 class="about__title">全人類、<br class="sp">ミュージシャン計画。</h2>
                            <p class="about__lead">私たちは音楽を愛するすべての人が、音楽に熱狂できる世界を目指しています。</p>
                            
                            <div class="about__keywords">
                                <picture class="about__arc">
                                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/about-pc.svg">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/about-sp.svg" alt="曲線の装飾">
                                </picture>

                                <div class="about__diagram">
                                    <div class="about__arrow"></div>

                                    <ul class="about__list">
                                        <li>
                                            <span class="en red-text">Enthusiasm</span>
                                            <span class="dot"></span>
                                            <span class="ja">熱狂し</span>
                                        </li>
                                        <li>
                                            <span class="en red-text">Envision</span>
                                            <span class="dot"></span>
                                            <span class="ja">想像し</span>
                                        </li>
                                        <li>
                                            <span class="en red-text">Effulgent</span>
                                            <span class="dot"></span>
                                            <span class="ja">輝く存在へ</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>

                <section class="greeting">
                    <div class="greeting__contents">
                        <h2 class="greeting__title">音楽業界初！<br>収益化までサポートする<br class="sp">ミュージックスクール</h2>
                        <p class="greeting__text">楽器や作詞作曲などの<br class="sp">技術・知識はもちろんのこと<br>自分で稼ぎつづけるための<br class="sp">ビジネス面もサポートします！</p>
                    </div>
                </section>

                <section class="reason">
                    <div class="inner">
                        <div class="reason__contents">
                            <h2 class="reason__title">きたむらミュージック<br class="sp">スクールが選ばれる理由</h2>
                            <div class="reason__items">
                                <div class="reason__item reason-item">
                                    <div class="reason-item__image">
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/reason01-pc.jpg">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/reason01-sp.jpg" alt="技術面はプロによるマンツーマン授業！">
                                        </picture>
                                    </div>
                                    <div class="reason-item_catch">
                                        <h3>技術面はプロによるマンツーマン授業！</h3>
                                        <p>第一線で活躍するプロによるマンツーマン授業で、きめ細かな技術指導が受けられます。</p>
                                    </div>
                                </div>

                                <div class="reason__item reason-item">
                                    <div class="reason-item__image">
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/reason02-pc.jpg">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/reason02-sp.jpg" alt="収益化するためのビジネスサポート！">
                                        </picture>
                                    </div>
                                    <div class="reason-item_catch">
                                        <h3>収益化するためのビジネスサポート！</h3>
                                        <p>コンセプト設計や集客方法、マーケティングリサーチなど、音楽で稼ぎつづけるための方法やマインドセットをサポートするクラスをご用意。</p>
                                    </div>
                                </div>

                                <div class="reason__item reason-item">
                                    <div class="reason-item__image">
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/reason03-pc.jpg">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/reason03-sp.jpg" alt="収益化するためのビジネスサポート！">
                                        </picture>
                                    </div>
                                    <div class="reason-item_catch">
                                        <h3>24時間365日使える練習ROOMを完備！</h3>
                                        <p>一年中使える個室の練習ROOMを完備しているため、お仕事帰りや合間の時間も自由に練習が可能です。　（アプリで予約が必要です）</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="voice">
                    <div class="inner">
                        <div class="voice__contents">
                            <h2 class="voice__title">生徒さんたちの声</h2>
                            <div class="swiper voice__swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $args = array(
                                        'post_type' => 'result',
                                        'posts_per_page' => 6,
                                    );
                                    $the_query = new WP_Query($args);
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();
                                    ?>

                                    <div class="swiper-slide voice__item voice-item">
                                        <a href="<?php the_permalink(); ?>" class="voice-item__link">
                                        <div class="voice-item__image">
                                            <span class="voice-item__photo">
                                                <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <div class="voice-item__text">
                                            <h3><?php the_field('job'); ?>&emsp;<?php the_field('name'); ?>さん</h3>
                                            <p><?php echo wp_trim_words(get_the_content(), 42, '...'); ?></p>
                                        </div>
                                        </a>
                                    </div>
                                        <?php
                                            endwhile;
                                        endif;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="voice-btn-prev"></div>
                        <div class="voice-btn-next"></div>
                    </div>
                </section>

                <section class="guide">
                    <div class="inner">
                        <div class="guide__contents">
                            <h2 class="guide__title">ご利用の流れ</h2>
                            <div class="guide__items">
                                <div class="guide__item guide-item">
                                    <h3 class="guide-item__title">お問い合わせ</h3>
                                    <p class="guide-item__text">まずはフォームまたはメールにてお問い合わせください。<br>ヒアリングの日程を調整します。</p>
                                </div>

                                <div class="guide__item guide-item">
                                    <h3 class="guide-item__title">ヒアリング</h3>
                                    <p class="guide-item__text">現在の技術面や将来の目標などをお伺いします。<br>悩みや不安な事もお気軽にご相談ください。</p>
                                </div>

                                <div class="guide__item guide-item">
                                    <h3 class="guide-item__title">プランのご提案</h3>
                                    <p class="guide-item__text">ライフスタイルや目標によって最適なプランをご提案します。<br>継続できるようサポートいたします。</p>
                                </div>

                                <div class="guide__item guide-item">
                                    <h3 class="guide-item__title">ご入学</h3>
                                    <p class="guide-item__text">お申し込み完了後、レッスンがスタートします。<br>マンツーマン指導なので、いつからでもスタートが可能です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="question">
                    <div class="inner">
                        <div class="question__contents">
                            <h2 class="question__title">よくあるご質問</h2>
                            <div class="accordion-area">
                                <dl class="qa-list">
                                    <dt class="qa-title">
                                        <span class="qa-title__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/question.svg" alt="質問"></span>
                                        どのような生徒さんがどれぐらいの期間で稼いでいますか？
                                    </dt>
                                    <dd class="qa-text">
                                        <div class="qa-text__inner">
                                            <span class="qa-text__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/anser.svg" alt="回答"></span>
                                            回答テキスト1回答テキスト1回答テキスト1回答テキスト1回答テキスト1回答テキスト1
                                        </div>
                                    </dd>
                                    <dt class="qa-title">
                                        <span class="qa-title__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/question.svg" alt="質問"></span>
                                        途中でプランを変更することは可能ですか？
                                    </dt>
                                    <dd class="qa-text">
                                        <div class="qa-text__inner">
                                            <span class="qa-text__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/anser.svg" alt="回答"></span>
                                            途中でプラン変更も可能です。毎月15日までに申請すれば翌月からプランが変更となります。
                                        </div>
                                    </dd>
                                    <dt class="qa-title">
                                        <span class="qa-title__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/question.svg" alt="質問"></span>
                                        入学金などの分割払いはできますか？
                                    </dt>
                                    <dd class="qa-text">
                                        <div class="qa-text__inner">
                                            <span class="qa-text__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/anser.svg" alt="回答"></span>
                                            回答テキスト3回答テキスト3回答テキスト3回答テキスト3回答テキスト3回答テキスト3
                                        </div>
                                    </dd>
                                    <dt class="qa-title">
                                        <span class="qa-title__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/question.svg" alt="質問"></span>
                                        休学することも可能ですか？
                                    </dt>
                                    <dd class="qa-text">
                                        <div class="qa-text__inner">
                                            <span class="qa-text__icon"><img src="<?php echo get_template_directory_uri(); ?>/images/anser.svg" alt="回答"></span>
                                            回答テキスト4回答テキスト4回答テキスト4回答テキスト4回答テキスト4回答テキスト4
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="top-blog">
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type'      => 'blog',
                        'taxonomy'        => 'blog_recommend',
                        'term'            => 'recommend',
                        'orderby'         => 'date',
                        'order'           => 'DESC'
                    );
                    $the_query = new WP_Query($args);
                    ?>

                    <div class="inner">
                        <div class="blog__contents">
                            <h2 class="blog__title">ブログ</h2>
                            <div class="blog__items">
                                <?php
                                if ($the_query->have_posts()) :
                                    while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="blog__item blog-item">
                                        <a href="<?php the_permalink(); ?>" class="blog-item__link">
                                            <div class="blog-item__image">
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                                if (!empty($terms) && !is_wp_error($terms)) :
                                                ?>
                                                    <span class="blog-item__category"><?php echo esc_html($terms[0]->name); ?></span>
                                                <?php endif; ?>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <p class="blog-item__text"><?php echo esc_html(get_the_title()); ?></p>
                                            <div class="blog-item__date">
                                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="blog-list-btn">
                                <a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>">ブログ一覧へ</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
<?php get_footer(); ?>