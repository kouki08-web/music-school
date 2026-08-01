                                <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>
                                <nav class="blog-details__nav">
                                    <?php if (!empty($prev_post)): ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="blog-details__nav-item blog-details__nav-item--prev">
                                        <div class="blog-details__nav-label">◀ 前の記事</div>
                                        <div class="blog-details__nav-content">
                                            <div class="blog-details__nav-image">
                                                <?php if (has_post_thumbnail($prev_post->ID)): ?>
                                                <?php echo get_the_post_thumbnail($prev_post->ID); ?>
                                                <?php else: ?>
                                                <picture>
                                                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/blog_list-03-pc.jpg">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog_list-03-sp.jpg" alt="前の記事">
                                                </picture>
                                                <?php endif; ?>
                                            </div>
                                            <div class="blog-details__nav-body">
                                                <p class="blog-details__nav-title"><?php echo wp_trim_words($prev_post->post_title, 25, '...'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (!empty($next_post)): ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="blog-details__nav-item blog-details__nav-item--next">
                                        <div class="blog-details__nav-label">次の記事 ▶</div>
                                        <div class="blog-details__nav-content">
                                            <div class="blog-details__nav-image">
                                                <?php if (has_post_thumbnail($next_post->ID)): ?>
                                                <?php echo get_the_post_thumbnail($next_post->ID); ?>
                                                <?php else: ?>
                                                <picture>
                                                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/blog_list-03-pc.jpg">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog_list-03-sp.jpg" alt="次の記事">
                                                </picture>
                                                <?php endif; ?>
                                            </div>
                                            <div class="blog-details__nav-body">
                                                <p class="blog-details__nav-title"><?php echo wp_trim_words($next_post->post_title, 25, '...'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </nav>