<?php
include 'header.php';
?>
<div style="height: 500px;margin-top:0px;padding-top: 150px;">
    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                the_content();

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </section>
</div>

<?php
include 'footer.php';
?>

