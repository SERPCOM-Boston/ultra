<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wp-bootstrap-starter' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'wp-bootstrap-starter' ); ?>">
    </label>
    <button type="submit" class="search-submit btn btn-primary" style="margin-top: -5px;" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-bootstrap-starter' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
