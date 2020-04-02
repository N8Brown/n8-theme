<?php
/*
Template Name: Portfolio
Author: Nathan Brown
Version: 1.0
 */ 
    get_header(); 
    while (have_posts()) {
        the_post();
?>
        <main>
            <section id="full-portfolio" class="section">
                <h2 class="section-title">PORTFOLIO</h2>
                <div class="details">
                    <p class="about"> <?php the_content(); ?> </p>
                </div>
            </section>
            <section id="projects" class="section">
                <h2 class="section-title">PROJECTS</h2>
                <?php
                    $portfolio = new WP_Query(array(
                        'post_type' => 'portfolio'
                    ));                  
                    while($portfolio->have_posts()){
                        $portfolio->the_post(); ?>
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
                                        <div class="skills-container">
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
            </section>
        </main>
<?php }
    get_footer(); 
?>