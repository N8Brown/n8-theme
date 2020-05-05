<?php
    get_header();
    while (have_posts()) {
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
                    <?php foreach((get_the_category()) as $mySkill){ ?>
                        <div class="tooltip">
                            <a class="category-icon" href="<?php echo get_category_link(get_cat_ID($mySkill->cat_name)); ?>">
                                <img class="main-skill" src="<?php echo get_theme_file_uri('icons/'.$mySkill->slug.'.svg'); ?>" alt="<?php echo $mySkill->name ?>">
                            </a>
                            <span class="tooltiptext"> <?php echo $mySkill->name ?> </span>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <p>  <?php the_content(); ?> </p>

            <section class="project-nav">
                <?php if(post_custom('project-link')){ ?>
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
                    <?php } ?>
            </section>
        </div>
    </section>
</div>

<?php } get_footer(); ?>