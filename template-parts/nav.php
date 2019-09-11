<div class="row sticky-top navbaramendments">
    <div class="container-fluid aresized">
        <nav class="navbar navbar-expand-md navbar-light nav">
            <div class="navbar-brand"><span class="logospan"><?php echo get_custom_logo(); ?></span></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php  /* menu */
                        wp_nav_menu( array(
                                'menu'              => 'menu-1',
                                'theme_location'    => 'menu-1',
                                'depth'             => 5,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'navbarsExample04',
                                'menu_class'        => 'nav nav-pills justify-content-center d-flex align-items-center',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                     ); ?>
        </nav>
    </div>
</div>