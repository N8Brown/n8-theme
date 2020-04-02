<?php
/*
Template Name: About
Author: Nathan Brown
Version: 1.0
 */ 
    get_header(); 
    while (have_posts()) {
        the_post();
?>

        <main>
            <section id="home" class="section">
                <div class="post-box">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <div>
                        <p> <?php the_content(); ?> </p>
                    </div>
                </div>
            </section>
        </main>

<?php }
    get_footer();
?>