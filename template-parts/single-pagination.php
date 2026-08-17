                                <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                $prefix = $args['prefix'] ?? 'blog-details__nav';
                                ?>
                                <nav class="<?php echo esc_attr($prefix); ?>">
                                    <?php if (!empty($prev_post)): ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="<?php echo esc_attr($prefix); ?>-item <?php echo esc_attr($prefix); ?>-item--prev">
                                        <div class="<?php echo esc_attr($prefix); ?>-label">◀ 前の記事</div>
                                        <div class="<?php echo esc_attr($prefix); ?>-content">
                                            <div class="<?php echo esc_attr($prefix); ?>-image">
                                                <?php if (has_post_thumbnail($prev_post->ID)): ?>
                                                <?php echo get_the_post_thumbnail($prev_post->ID); ?>
                                                <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="前の記事">
                                                <?php endif; ?>
                                            </div>
                                            <div class="<?php echo esc_attr($prefix); ?>-body">
                                                <p class="<?php echo esc_attr($prefix); ?>-title"><?php echo wp_trim_words($prev_post->post_title, 25, '...'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (!empty($next_post)): ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="<?php echo esc_attr($prefix); ?>-item <?php echo esc_attr($prefix); ?>-item--next">
                                        <div class="<?php echo esc_attr($prefix); ?>-label <?php echo esc_attr($prefix); ?>-label--next">次の記事 ▶</div>
                                        <div class="<?php echo esc_attr($prefix); ?>-content">
                                            <div class="<?php echo esc_attr($prefix); ?>-image">
                                                <?php if (has_post_thumbnail($next_post->ID)): ?>
                                                <?php echo get_the_post_thumbnail($next_post->ID); ?>
                                                <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="次の記事">
                                                <?php endif; ?>
                                            </div>
                                            <div class="<?php echo esc_attr($prefix); ?>-body">
                                                <p class="<?php echo esc_attr($prefix); ?>-title"><?php echo wp_trim_words($next_post->post_title, 25, '...'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </nav>
