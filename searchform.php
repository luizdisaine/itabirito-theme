
<?php 
/**
*Template Name: Search Form*
**/ ?>

  <?php if (!wp_is_mobile()) { ?>
    <form action="<?php echo site_url(); ?>" method="get" accept-charset="utf-8" id="busca" role="search" class="form-group row ms-auto col-8 me-1 my-auto">
    <div class="col">
      <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php echo _e( 'Insira os termos de pesquisa','pmi' ); ?>" class="form-control" />
      <button type="submit" id="searchsubmit" class="btn btn-transparent"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    
   
  <?php } else { ?>
    <form action="<?php echo site_url(); ?>" method="get" accept-charset="utf-8" id="busca" role="search" class="form-group <?php if(is_front_page()) {echo 'form-inline ' ;} ?>container">
  
  <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php echo _e( 'Insira os termos de pesquisa','pmi' ); ?>" class="form-control col-8 mx-auto" />
    
  <?php } ?>    

</form>