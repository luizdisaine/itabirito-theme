<?php if (is_post_type_archive('selecao') || is_tax( 'tipo_selecao' )) { ?>

<article id="post-<?php echo $post->ID ?>" class="entry-item mb-2 selecao">
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
<?php the_excerpt(  ); ?>
</article>

<?php } elseif (is_singular('selecao')) { ?>

<article id="post-<?php echo $post->ID ?>" class="entry-item">
<?php the_content(); ?>
<?php if(get_field('documentos')) {
    while(have_rows('documentos')) { the_row();
        $file = get_sub_field('arquivo');
    ?>
        <a href="<?php echo $file['url']; ?>>" class="btn btn-success d-block mb-1" target="_blank"><i class="fas fa-file-alt mr-2"></i><?php echo $file['name']; ?></a>
    <?php }
} ?>
</article>

<?php } ?>