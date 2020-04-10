<?php 
    get_header(); 
    while (have_posts()) {
        the_post(); 
?>

        <main>
            <section id="home" class="section">
                <h1>
                    NATHAN <span class="blue-span">BROWN</span>
                </h1>
                <div class="details">
                    <div class="about">
                        <?php the_content(); ?>
                    </div>
                    <div class="full-page-link">
                        <a class="link" href="<?php echo get_permalink(get_page_by_title('About')); ?>" >
                            <strong>READ FULL BIO</strong>
                        </a>
                    </div>
                    <section class="contact-box">
                        <div>
                            <a
                            class="contact-links"
                            href="https://linkedin.com/in/nathan-a-brown"
                            target="blank"
                            >
                                <i class="fab fa-linkedin contact"></i>
                            </a>
                        </div>
                        <div>
                            <a
                            class="contact-links"
                            href="https://twitter.com/_N8_Brown"
                            target="blank"
                            >
                                <i class="fab fa-twitter-square contact"></i>
                            </a>
                        </div>
                    </section>
                </div>
            </section>

            <section id="news" class="section">
                <h2 class="section-title">THOUGHTS</h2>
                <?php
                    $homepageNews = new WP_Query(array(
                        'posts_per_page' => 4
                    ));
                    
                    while($homepageNews->have_posts()){
                        $homepageNews->the_post(); ?>
                        <div class="post-box">
                            <h3> 
                                <a class="link" href=" <?php echo get_permalink(); ?>"> 
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <h4> 
                                <?php the_time('F j, Y'); ?> 
                            </h4>
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
                            <div class="full-post-link">
                                <a class="link" href="<?php echo get_permalink() ?>" >
                                    <strong>READ MORE</strong>
                                </a>
                            </div>
                        </div>
                    <?php } wp_reset_postdata();
                ?>
                <div class="full-page-link">
                    <a class="link" href="<?php echo get_permalink(get_page_by_title('Thoughts')) ?>" >
                        <strong>SEE ALL THOUGHTS</strong>
                    </a>
                </div>
            </section>

            <section id="portfolio" class="section">
                <h2 class="section-title">PORTFOLIO</h2>
                <?php
                    $homepagePortfolio = new WP_Query(array(
                        'posts_per_page' => 4,
                        'post_type' => 'portfolio'
                    ));
                    
                    while($homepagePortfolio->have_posts()){
                        $homepagePortfolio->the_post(); ?>
                        <div class="project-box">
                            <h3 class="project-title"> <?php the_title(); ?> </h3>
                            <section class="project-details">
                                <div class="screenshot">
                                    <?php the_post_thumbnail(); ?>                                
                                </div>
                                <div class="project-description">
                                    <section class="skill-container">
                                        <div>
                                            <h4 class="skill-title">SKILLS FEATURED:</h4>
                                        </div>
                                        <div>
                                            <?php 
                                                foreach((get_the_category()) as $mySkill){ ?>
                                                    <div class="tooltip">
                                                        <a class="category-icon" href="<?php echo get_category_link(get_cat_ID($mySkill->cat_name)); ?>">
                                                            <i class="fab fa-<?php echo $mySkill->slug ?> skill"></i>
                                                        </a>
                                                        <span class="tooltiptext"> <?php echo $mySkill->name ?> </span>
                                                    </div>
                                                <?php }
                                            ?>
                                        </div>
                                    </section>
                                    <p>  <?php the_content(); ?> </p>

                                    <section class="project-nav">
                                        <?php
                                            
                                            if(post_custom('project-link')){ ?>

                                                <span class="project-links">
                                                    <a
                                                        class="link"
                                                        href="<?php echo post_custom('project-link'); ?>"
                                                        target="blank"
                                                    >
                                                        <strong>
                                                        Go to the project
                                                        </strong>
                                                    </a>
                                                </span>

                                            <?php }

                                            if(post_custom('code-link')){ ?>

                                                <span class="project-links">
                                                    <a
                                                        class="link"
                                                        href="<?php echo post_custom('code-link'); ?>"
                                                        target="blank"
                                                    >
                                                        <strong>
                                                        View the code
                                                        </strong>
                                                    </a>
                                                </span>

                                            <?php }
                                        ?>
                                    </section>
                                </div>
                            </section>
                        </div>
                    <?php } wp_reset_postdata();
                ?>
                <div class="full-page-link">
                    <a class="link" href="<?php echo get_permalink(6); ?>" >
                        <strong>SEE FULL PORTFOLIO</strong>
                    </a>
                </div>
            </section>

            <section id="contact" class="section">
                <h2>CONTACT</h2>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Form") ) : ?>
                <?php endif;?>
            </section>
        </main>


    <?php } 
get_footer(); 

?>