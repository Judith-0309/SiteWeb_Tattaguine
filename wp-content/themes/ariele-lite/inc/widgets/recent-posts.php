<?php

class Ariele_Recent_Posts extends WP_Widget {

  private $orderby;
  
  /**
   * Constructor.
   */
  public function __construct() {
  
    parent::__construct( 'ariele-recent-posts', esc_html__( 'Recents Posts with Thumbnails', 'ariele-lite' ), array(
      'classname'   => 'ariele-recent-posts',
      'description' => esc_html__( 'Use this widget to list your recent posts.', 'ariele-lite' ),
    ) );

    $this->orderby = array(
     'date'         => esc_html__( 'date', 'ariele-lite' ), 
     'comments_num' => esc_html__( 'number of comments', 'ariele-lite' ),
     'random'       => esc_html__( 'random', 'ariele-lite' )
    );

  }
  
  
  /**
   * Output the HTML for this widget.
   *
   * @access public
   *
   * @param array $args     An array of standard parameters for widgets in this theme.
   * @param array $instance An array of settings for this widget instance.
   */
  public function widget( $args, $instance ) {
  
    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    $title = ( ! empty( $instance['title'] ) ) ? strip_tags( $instance['title'] ) : esc_html__( 'Recent Posts', 'ariele-lite' );
  
    $query_args = array(
      'order'          => 'DESC',
      'posts_per_page' => $number,
      'no_found_rows'  => true,
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'post__not_in'   => get_option( 'sticky_posts' )
    );
    
    $query_args['tax_query'] = array();
    
    if( ! empty( $instance['category'] ) ){
      $query_args['tax_query'][] = array(
          'taxonomy' => 'category',
          'terms'    => absint( $instance['category'] ),
          'field'    => 'term_id'
      );
    }
    
    if( ! empty( $instance['tags'] ) ) {
      $tags = explode( ',', $instance['tags'] );
      $query_args['tax_query'][] = array(
          'taxonomy' => 'post_tag',
          'terms'    => $tags,
          'field'    => 'name'
      );
    }

    if( count( $query_args['tax_query'] ) > 1 ){
      $query_args['tax_query']['relation'] = 'AND';
    }

    $orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
    
    switch ($orderby) {
      case 'comments_num':
        $query_args['orderby'] = 'comment_count';
        break;
      case 'random':
        $query_args['orderby'] = 'rand';
        break;
    }

    $recent_posts = new WP_Query( $query_args );

    if ( $recent_posts->have_posts() ) :
      $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

      echo $args['before_widget'];
      
      if ( ! empty( $title ) ) {
        printf( '%s%s%s', $args['before_title'], $title, $args['after_title'] );
      } 
    ?>

<ul class="ariele-recent-posts">
    <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

    <li class="ariele-recent-post-item">

        <?php if ( has_post_thumbnail() ) : ?>
        <div class="recent-post-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ariele-lite-recent-thumbnail', array('class' => 'recent-post-image')); ?></a>
        </div>
        <?php else : ?>
        <div class="recent-post-thumbnail">
            <img src="<?php echo esc_url( get_template_directory_uri()); ?>/images/no-recent.png" alt="<?php the_title_attribute(); ?>" />
        </div>
        <?php endif; ?>
		
        <header class="widget-post-content">
            <?php 
            if( ! get_the_title() ) {
              $format = get_post_format();
              $default_title = ( ! $format || $format == 'standard' ) ? esc_html__( 'Untitled Post', 'ariele-lite' ) : get_post_format_string( $format );
            }
          ?>
            <h5 class="recent-title"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : printf( $default_title ); ?></a></h5>
            <?php 
            if( $show_date ) {
              printf( '<p class="recent-post-date">%s</p>', get_the_date() );
            } 
          ?>

        </header>
    </li>

    <?php endwhile; ?>
</ul>

<?php
      echo $args['after_widget'];

      // Reset the post globals as this query will have stomped on it.
      wp_reset_postdata();
    endif;
  }
  
  /**
   * Deal with the settings when they are saved by the admin.
   *
   * Here is where any validation should happen.
   *
   * @param array $new_instance New widget instance.
   * @param array $instance     Original widget instance.
   * @return array Updated widget instance.
   */
  function update( $new_instance, $instance ) {
    $instance['title']  = strip_tags( $new_instance['title'] );
    $instance['number'] = ( !empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 5;
    
    if( array_key_exists( $new_instance['orderby'], $this->orderby ) ){
      $instance['orderby'] = $new_instance['orderby'];
    }

    $instance['category']   = isset( $new_instance['category'] ) ? absint( $new_instance['category'] ) : 0;
    $instance['tags']       = strip_tags( $new_instance['tags'] );
    $instance['show_date']  = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
    return $instance;
  }
  
  /**
   * Display the form for this widget on the Widgets page of the Admin area.
   *
   * @param array $instance
   */
  function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 
      'title'      => '', 
      'number'     => 5, 
      'orderby'    => 'date',
      'category'   => 0,
      'tags'       => '',
      'show_date'  => true
    ) );
  ?>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ariele-lite' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'ariele-lite' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo absint( $instance['number'] ); ?>" size="3"></p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order by:', 'ariele-lite' ); ?></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
        <?php foreach ( $this->orderby as $slug => $name ) : ?>
        <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $instance['orderby'], $slug ); ?>><?php echo esc_html( $name ); ?></option>
        <?php endforeach; ?>
    </select>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category:', 'ariele-lite' ); ?></label>
    <?php
        wp_dropdown_categories( array(
          'show_option_all' => esc_html__( 'All Categories', 'ariele-lite' ),
          'selected'        => absint( $instance['category'] ),
          'name'            => esc_attr( $this->get_field_name( 'category' ) ),
          'id'              => esc_attr( $this->get_field_id( 'category' ) ),
          'class'           => 'widefat'
        ) );
      ?>
</p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>"><?php esc_html_e( 'Tags (separated by commas):', 'ariele-lite' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tags' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['tags'] ); ?>"></p>

<p><input class="checkbox" type="checkbox" <?php checked( $instance['show_date'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
    <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'ariele-lite' ); ?></label></p>

<?php
  }
}

?>
