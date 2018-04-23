<?php
/**
 * Plugin Name:   Enhance the wp_get_archive() function.
 * Description:   Support the '_exclude_terms' parameter.
 * Plugin URI:    https://wordpress.stackexchange.com/a/170535/26350
 * Plugin Author: birgire
 * Version:       0.0.1
 */

add_action( 'init', function() {
        $o = new WPSE_Archive_With_Exclude;
        $o->init( $GLOBALS['wpdb'] );
});

class WPSE_Archive_With_Exclude
{
    private $db = null;

    public function init( wpdb $db )
    {
        if( ( $this->db = $db ) instanceof wpdb )
            add_filter( 'getarchives_where', 
                array( $this, 'getarchives_where' ), 10, 2 );
    }

    public function getarchives_where( $where, $r )
    {                                                               
        if( isset( $r['_exclude_terms'] ) )
        {   
            $_exclude_terms = $r['_exclude_terms'];

            if( is_string( $_exclude_terms ) )
                $_exclude_terms = explode( ',', $_exclude_terms );

            if( is_array( $_exclude_terms ) )
                $where .= $this->get_excluding_sql( $_exclude_terms );   
        }
        return $where;
    }

    private function get_excluding_sql( Array $terms )
    {
        $terms_csv = join( ',', array_map( 'absint', $terms ) );

        return " AND ( {$this->db->posts}.ID NOT IN 
            ( SELECT object_id FROM {$this->db->term_relationships} 
            WHERE term_taxonomy_id IN ( $terms_csv ) ) )";
    }

} // end class