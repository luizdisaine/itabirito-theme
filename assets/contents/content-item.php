<article id="<?php echo $post->ID ?>" class="entry-item">
    <h4><?php the_title(); ?></h4>
    <?php the_content(); ?>
    <?php if (have_rows('documentos')) { ?>
        <ul class="doc-list">
        <?php while(have_rows('documentos')) { the_row();
            $arquivo = get_sub_field('arquivo'); ?>
            <li>
            <a href="<?php echo $arquivo['url']; ?>" class="btn btn-outline-success d-flex" target="_blank"><i class="far fa-file-alt ms-3 my-auto"></i><span><?php echo $arquivo['title']; ?></span></a>
            </li>
        <?php } ?>
        </ul>
        <?php } ?>
</article>