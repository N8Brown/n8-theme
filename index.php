<?php 
    get_header(); 
?>
        <main>
            <section id="home" class="section">
                <h2 class="section-title">THOUGHTS</h2>
                <?php
                    while (have_posts()) {
                        the_post();
                ?>
                    <div class="post-box">
                        <h3> 
                            <a class="link" href=" <?php echo get_permalink(); ?>"> 
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <h4> <?php the_time('F j, Y'); ?> </h4>
                        <div>
                            <p> <?php 
                                if(has_excerpt()){
                                    echo get_the_excerpt();
                                }
                                else{
                                    echo wp_trim_words(get_the_content(), 50);
                                }
                            ?> </p>
                        </div>
                        <div class="full-page-link">
                            <a class="link" href="<?php echo get_permalink() ?>" >
                                <strong>READ MORE</strong>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </main>
<?php
    get_footer(); 
?>