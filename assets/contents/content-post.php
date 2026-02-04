<article id="<?php echo $post->ID ?>" class="estabelecimento col-lg-6">
    <div class="p-3 bg-light mb-3">
        <h6><?php if (get_field('url')) { ?>
            <a href="<?php the_field('url'); ?>" target="_blank"><i class="fas fa-globe me-2"></i><?php the_title(); ?></a><?php } else { the_title(); }?></h6>
            <ul>
                <?php if (get_field('endereco')) { ?>
                <li><i class="fas fa-home me-2"></i><?php the_field('endereco'); ?></li>
                <?php } ?>
                <?php if (get_field('telefone')) { ?>
                <li><i class="fas fa-phone me-2"></i><?php the_field('telefone'); ?></li>
                <?php } ?>
                <?php if (get_field('horario_de_funcionamento')) { ?>
                <li><i class="fas fa-clock me-2"></i><?php the_field('horario_de_funcionamento'); ?></li>
                <?php } ?>
                <?php if (get_field('e-mail')) { ?>
                <li><a href="mailto:<?php the_field('e-mail'); ?>"><i class="fas fa-envelope me-2"></i><?php the_field('e-mail'); ?></a></li>
                <?php } ?>
        </ul>
    </div>
</article>