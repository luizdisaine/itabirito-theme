<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>

<div class="container main" id="conteudo" id="content">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
            
         <?php
         
        thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ml-auto">
        <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();
                        
                        get_template_part( 'assets/contents/content-page' );
                        
                        if (have_rows('contato')) { ?>
                        <table class="table table-striped" id="contato_secretaria">
                            <thead>
                                <tr>
                                    <th>Local</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Horário de funcionamento</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php  while (have_rows('contato')) { the_row();
                                $local = get_sub_field('local');
                                $telefone = get_sub_field('telefone');
                                $endereco = get_sub_field('endereco');
                                $horario = get_sub_field('horario_de_funcionamento');
                            ?>
                            <tr>
                                <td><?php echo $local; ?></td>
                                <td><?php echo $telefone; ?></td>
                                <td><?php echo $endereco; ?></td>
                                <td><?php echo $horario; ?></td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                        <?php 
                        } } } ?>
        </div>
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php if( have_rows('slides') ): ?>
    <ul class="slides">
    <?php while( have_rows('slides') ): the_row(); 
        $image = get_sub_field('image');
        ?>
        <li>
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            <p><?php echo acf_esc_html( get_sub_field('caption') ); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

<?php get_footer(); ?>