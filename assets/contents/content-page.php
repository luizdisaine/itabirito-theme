    <?php
    
    $turismo = [ 'roteiro', 'ponto-turistico', 'atracao' ];

    if (is_post_type_archive() && !is_post_type_archive( $turismo ) && !is_post_type_archive( 'noticia' ) && !is_post_type_archive( 'secretaria' ) && !is_post_type_archive( 'conselho' ) && !is_post_type_archive('oficio') && !is_post_type_archive( 'conta' ) && !is_post_type_archive( 'licitacao' ) && !is_post_type_archive( 'convenio' ) && !is_post_type_archive('plano')) { ?>
    <article id="post-<?php echo $post->ID ?>" class="entry-item">
        <h4><?php the_title(); ?></h4>
        <?php the_content(  );  ?>
    </article>
    <?php } elseif (is_post_type_archive( $turismo )) { ?>
    <article id="post-<?php echo $post->ID ?>" class="entry-item mb-3">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail', ['class' => 'float-left me-3']);
            } else {
                echo '<img src="'.get_template_directory_uri().'/img/no-thumb.png" class="float-left me-3" width="150">';
            } ?>
        </a>
        <h4><?php the_title(); ?></h4>
        <?php the_excerpt(  ); ?>
    </article>
    <div class="clearfix mb-3"></div>
    <?php } elseif (is_post_type_archive( 'oficio' ) || is_post_type_archive( 'plano' )) { ?>
    <article id="post-<?php echo $post->ID ?>" class="entry-item mb-3">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php the_excerpt(  ); ?>
    </article>
    <div class="clearfix"></div>
    <?php } elseif (is_post_type_archive( 'secretaria' ) OR is_post_type_archive( 'conselho' )) { ?>
    <div class="card item">
        <div class="card-header" id="heading<?php echo $post->ID ?>">
            <h5 class="mb-0 d-flex">
                <button class="btn btn-link text-left" data-bs-toggle="collapse"
                    data-bs-target="#collapse<?php echo $post->ID ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php the_title(); ?>
                </button>
                <a href="<?php the_permalink(); ?>" class="ms-auto my-auto"><i
                        class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </h5>
        </div>

        <div id="collapse<?php echo $post->ID ?>" class="collapse" aria-labelledby="heading<?php echo $post->ID ?>"
            data-bs-parent="#accordion">
            <div class="card-body">
                <?php
                
                $sec = get_field('secretario');
                if ($sec) {
                    $sec_name = $sec['secretario_nome'];
                    $sec_mail = $sec['secretario_mail'];
                    echo '<p class="secretario"><label class="me-2">'.__('Responsável','pmi').'</label><a href="mailto:'.$sec_mail.'">'.$sec_name.'</a></p>';
                }
                
                the_content();
                    if (is_post_type_archive( 'secretaria')) {
                        if (have_rows('contato')) {
                            echo '<h4>Contatos</h4>';
                            echo '<table class="table table-striped"><thead class="thead-dark"><tr><th>Local</th><th>Telefone</th><th>Endereço</th><th>Horário de funcionamento</th></tr></thead><tbody>';
                            while (have_rows('contato')) { the_row(); ?>
                <tr>
                    <td><?php the_sub_field('local') ?></td>
                    <td><?php the_sub_field('telefone') ?></td>
                    <td><?php the_sub_field('endereco') ?></td>
                    <td><?php the_sub_field('horario_de_funcionamento') ?></td>
                </tr>
                <?php }
                            echo '</tbody></table>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php } elseif (is_post_type_archive( 'licitacao' ) OR is_post_type_archive( 'conta' ) OR is_post_type_archive( 'convenio' )) {
        if (get_field('arquivo')) {
            $file = get_field('arquivo');
        }
        ?>
    <article id="post-<?php echo $post->ID ?>">
        <h6><strong><?php the_field('ano'); ?></strong> - <?php if(!empty($file)) { ?>
            <a href="<?php echo $file['url']; ?>"><?php the_title(); ?></a>
            <?php } else { the_title(); } ?>
        </h6>
    </article>
    <?php } elseif (is_singular('plano')) { ?>
    <article id="post-<?php echo $post->ID ?>">
        <?php the_content(); 
                    if(get_field('pdf')) {
                        $pdf = get_field('pdf');
                    ?>
        <a href="<?php echo $pdf; ?>" class="btn btn-success d-block mb-1"><i class="fas fa-file-alt me-2"></i>Baixe o
            arquivo</a>
        <?php } ?>
    </article>
    <?php } elseif (is_archive() || is_category()) { ?>
    <article id="post-<?php echo $post->ID ?>">
        <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
            } else {
                echo '<img src="'.get_template_directory_uri().'/img/no-thumb.png">';
            } ?>
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <?php the_excerpt(  ); ?>
    </article>
    <?php } elseif (is_search()) { ?>
    <article id="post-<?php echo $post->ID ?>">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <?php the_excerpt(  ); ?>
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"
            class="btn btn-secondary btn-sm ms-auto d-block">Ver resultado<i class="fas fa-arrow-alt-circle-right ms-2"></i></a>
        <hr>
    </article>
    <div class="clearfix mb-4"></div>
    <?php } elseif (is_page()) { ?>
    <article id="post-<?php echo $post->ID ?>" class="entry-item">
        <?php the_content(  ); ?>
    </article>
    <?php } else { ?>
    <article id="post-<?php echo $post->ID ?>" class="entry-item">
        <?php the_content(); ?>
    </article>
    <?php } ?>