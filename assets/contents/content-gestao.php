<article id="<?php echo $post->ID ?>" class="entry-item">
    <?php the_content(); ?>
    <?php if (get_field('arquivo')) {
        $arquivo = (get_field('arquivo')); ?>
        <ul class="doc-list gestao">
            <li>
            <a href="<?php echo $arquivo['url']; ?>" class="btn btn-outline-success d-flex flex-row justify-content-center w-100" target="_blank"><i class="far fa-file-alt me-2 my-auto"></i><span class="my-auto"><?php echo $arquivo['title']; ?></span></a>
            </li>
        </ul>
        <?php } ?>
</article>