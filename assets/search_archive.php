<form method="get" id="searchform" class="form-group" action="<?php get_page_by_title( 'Programação' ); ?>">
                <input type="text" class="form-control" placeholder="Procurar evento" name="s" id="s" value="<?php the_search_query(); ?>"/>
                <input type="hidden" name="post_type" value="programacao" />
                <input type="hidden" id="searchsubmit" />
            </form>