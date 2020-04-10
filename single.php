<?php
    get_header(); 
    while (have_posts()) {
        the_post();
?>

        <main>
            <section id="full-news" class="section">
                <div class="post-box">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <h4>
                        <?php the_time('F j, Y'); ?>
                    </h4>
                    <div>
                        <p>
                            <?php the_content(); ?> 
                        </p>
                    </div>
                </div>
                <div class="full-page-link">
                    <a class="link" href="<?php echo get_permalink(get_page_by_title('News')) ?>" >
                        <strong>SEE ALL THOUGHTS</strong>
                    </a>
                </div>

            </section> 
        </main>





<?php 
    } 
    get_footer(); 
?>