<footer class="footer">
            <div class="footer__nav">
                <nav class="footer__nav-link">
                    <ul>
                        <li><a href="./index.html">ホーム</a></li>
                        <li><a href="<?php echo esc_url(home_url('/plan/')); ?>">料金</a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>">ブログ</a></li>
                        <li><a href="./result_list.html">卒業実績</a></li>
                    </ul>
                </nav>
            </div>
            <a href="./index.html" class="footer__image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/footer-icon.svg" alt="フッターアイコン">
            </a>
            <div class="footer__copyright">
                <p class="copyright">Copyright © 0000 KITAMURA music school Inc. <br class="sp">All Rights</p>
            </div>
            <div class="footer__sns">
                <ul>
                    <li><a href="#" class="sns-icon" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="twitter"></a></li>
                    <li><a href="#" class="sns-icon" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="facebook"></a></li>
                    <li><a href="#" class="sns-icon" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.svg" alt="youtube"></a></li>
                    <li><a href="#" class="sns-icon" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg" alt="instagram"></a></li>
                </ul>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>