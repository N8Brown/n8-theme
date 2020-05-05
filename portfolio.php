<?php
/*
Template Name: Portfolio
Author: Nathan Brown
Version: 1.0
 */ 
    include("skills.php");
    get_header(); 
    while (have_posts()) {
        the_post();
?>
        <main>
            <section id="full-portfolio" class="section">
                <h2 class="section-title">PORTFOLIO</h2>
                <div class="portfolio-details">
                    <p class="about"> <?php the_content(); ?> </p>
                </div>
                <div > 
                    <h3 class="skills-heading">Skills</h3>
                    <p class="portfolio-details">I currently use Visual Studio Code as my primary text editor and I generally use the MAMP stack for my development projects. If I am working on something Wordpress related though, I tend to use Local by Flywheel. In addition to these, below are the primary tools and languages that I work with.</p>
                    <div class="skills-programming">
                        <h4 class="skills-heading">PROGRAMMING LANGUAGES & TOOLS </h4>
                        <?php foreach($skills as $skill){ 
                            if($skill["type"] == "programming"){ ?>
                            <div class="tooltip">
                                <img class="main-skill" src="<?php echo get_theme_file_uri($skill['icon']); ?>" alt="<?php echo $skill['name']; ?>">
                                <span class="tooltiptext"> <?php echo $skill['name']; ?> </span>
                            </div>
                        <?php }} ?>
                    </div>
                    <div class="skills-design">
                        <h4 class="skills-heading">DESIGN TOOLS</h4>
                        <?php foreach($skills as $skill){ 
                            if($skill["type"] == "design"){ ?>
                            <div class="tooltip">
                                <img class="main-skill" src="<?php echo get_theme_file_uri($skill['icon']); ?>" alt="<?php echo $skill['name']; ?>">
                                <span class="tooltiptext"> <?php echo $skill['name']; ?> </span>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </section>
            <section id="projects" class="section">
                <h2 class="section-title">PROJECTS</h2>
                <div class="portfolio-details">
                    <p>I enjoy making things, especially if it requires problem solving and trying out new methods to get to the finished product. Below is a collection of projects that have challenged me and forced me to learn new things, best exemplify a particular skill set, or is simply something that I really enjoyed working on and am proud of.</p>
                </div>
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
                                                            <img class="main-skill" src="<?php echo get_theme_file_uri('icons/'.$mySkill->slug.'.svg'); ?>" alt="<?php echo $mySkill->name ?>">
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