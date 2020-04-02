<?php 
    get_header(); 
?>
        <main>
            <section id="home" class="section">
                <h2 class="section-title"> <?php 
                    if(is_category()){
                        single_cat_title();
                    }
                ?> </h2>
                <?php
                    if(get_post_type() == 'portfolio'){
                        while(have_posts()) {
                            the_post();
                ?>
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

                <?php
                        }
                    }
                    else{
                    while (have_posts()) {
                        the_post();
                ?>
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
                <?php }} ?>
            </section>
        </main>
<?php
    get_footer(); 
?>