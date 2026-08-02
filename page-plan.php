<?php get_header(); ?>

        <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/plan-pc.jpg">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/plan-sp.jpg" alt="プラン・料金">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h1>プラン・料金</h1>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <section class="plan-overview">
                    <div class="inner">
                        <h2 class="plan-overview__title">料金体系</h2>
                        <div class="plan-overview__fee-items">
                            <div class="plan-overview__fee-item">入会金 39,000円</div>
                            <span class="plan-overview__fee-plus"></span>
                            <div class="plan-overview__fee-item">月額料金</div>
                        </div>
                        <p class="plan-overview__desc">きたむらミュージックスクールでは、個人に合わせたサポートを行う完全オーダーメイドのプランを用意しており、サポート内容により月額料金が異なります。担当者があなたに最適なプランを提案いたしますので、お気軽にお問い合わせください。※すべての料金は税込価格となります。</p>
                    </div>
                </section>

                <section class="plan-table">
                    <div class="inner">
                        <h2 class="plan-table__title">プラン内容・月額料金</h2>
                        <div class="plan-table__wrapper">
                            <table class="plan-table__table">
                                <colgroup>
                                    <col class="plan-table__col-label">
                                    <col class="plan-table__col-plan plan-table__col-basic">
                                    <col class="plan-table__col-spacer">
                                    <col class="plan-table__col-plan">
                                    <col class="plan-table__col-plan">
                                </colgroup>
                                <thead>
                                    <tr class="plan-table__head-row">
                                        <th class="plan-table__head-cell--label"></th>
                                        <th class="plan-table__head-cell">
                                            <div class="plan-table__head-black plan-table__head-basic">ベーシック<br class="sp">プラン</div>
                                        </th>
                                        <th class="plan-table__head-spacer"></th>
                                        <th class="plan-table__head-cell">
                                            <div class="plan-table__head-red plan-table__head-standard">
                                                <span class="plan-table__badge">おすすめ</span>
                                                スタンダードプラン
                                            </div>
                                        </th>
                                        <th class="plan-table__head-cell">
                                            <div class="plan-table__head-black plan-table__head-premium">プレミアム<br class="sp">プラン</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="plan-table__label">月額料金</td>
                                        <td>39,000円</td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended is-price">59,000円</td>
                                        <td>128,000円</td>
                                    </tr>
                                    <tr>
                                        <td class="plan-table__label">マンツーマン授業</td>
                                        <td><span class="plan-table__dot"></span><span class="plan-table__sub-text">週１回</span></td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended"><span class="plan-table__dot"></span><span class="plan-table__sub-text">週２回</span></td>
                                        <td><span class="plan-table__dot"></span><span class="plan-table__sub-text">無制限</span></td>
                                    </tr>
                                    <tr>
                                        <td class="plan-table__label">ビジネス基本講座</td>
                                        <td><span class="plan-table__dot"></span></td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended"><span class="plan-table__dot"></span></td>
                                        <td><span class="plan-table__dot"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="plan-table__label">練習ROOM利用</td>
                                        <td><span class="plan-table__dot"></span><span class="plan-table__sub-text">月10時間</span></td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended"><span class="plan-table__dot"></span><span class="plan-table__sub-text">月20時間</span></td>
                                        <td><span class="plan-table__dot"></span><span class="plan-table__sub-text">無制限</span></td>
                                    </tr>
                                    <tr>
                                        <td class="plan-table__label">ビジネスコンサル</td>
                                        <td><span class="plan-table__dash"></span></td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended"><span class="plan-table__dot"></span><span class="plan-table__sub-text">月２回</span></td>
                                        <td><span class="plan-table__dot"></span><span class="plan-table__sub-text">月３回</span></td>
                                    </tr>
                                    <tr>
                                        <td class="plan-table__label">コミュニティ<br class="sp">参加資格</td>
                                        <td><span class="plan-table__dash"></span></td>
                                        <td class="plan-table__spacer"></td>
                                        <td class="is-recommended"><span class="plan-table__dash"></span></td>
                                        <td><span class="plan-table__dot"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="plan-table__scrollbar">
                            <div class="plan-table__scrollbar-thumb"></div>
                        </div>
                        <p class="plan-table__note">※各サービスは１回ごとのオプション追加が可能です。詳しくは事務局までお問い合わせください。</p>
                    </div>
                </section>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
<?php get_footer(); ?>