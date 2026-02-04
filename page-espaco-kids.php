<?php
get_header(); // Include the header.php file
?>

<div class="container-fluid bg-azul py-5" id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
            <?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    <?php endwhile;
else :
    echo '<p>No content found</p>';
endif; ?>
            </div>
        </div>
    </div>
</div>

<?php 
get_footer(); // Include the footer.php file
?>