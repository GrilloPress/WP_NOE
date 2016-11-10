<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package sth
 * 
 */
get_header(); ?>

<section class="jumbotron" style="background-image: url('<?php echo CFS()->get( 'jumbotron_img' );?>')">
  <div class="container">
    <div class="col-md-12">
       <h1><?php echo CFS()->get( 'jumbotron_title' );?></h1>
       <p>
        <?php echo CFS()->get( 'jumbotron_subtitle' );?>
       </p>
       <p>
        <?php $jbo_link = CFS()->get( 'jumbotron_btn' );?>
        <a class="btn btn-warning btn-lg" href="<?php echo $jbo_link["url"];?>" title="<?php echo $jbo_link["text"];?>" target="<?php echo $jbo_link["target"];?>" role="button"><?php echo $jbo_link["text"];?></a>  </p>
    </div>
  </div>
</section>


<?php
$featured_pages_published = CFS()->get( 'feature_published' );
if ( $featured_pages_published ) {;?>
<section class="page-feature-container">
  <div class="container">
    <div class="row">
        
        <?php
        
      $featured_pages = array("one", "two", "three", "four");
      foreach ($featured_pages as $fp) { ;?>
      
      
      <div class="col-md-3">
        <div class="page-feature-block">
          
          <?php $image_id = CFS()->get( 'feature_image_' . $fp );
          echo wp_get_attachment_image( $image_id, 'thumbnail', "", array( "class" => "img-marketing" ) );?>
          
          <h4><?php echo CFS()->get('feature_title_' . $fp); ?></h4>

          <?php echo CFS()->get('feature_body_' . $fp); ?>

          <?php $fb_link = CFS()->get( 'feature_link_' . $fp );?>
          <p>
            <a class="btn btn-primary" href="<?php echo $fb_link["url"];?>" title="<?php echo $fb_link["text"];?>" target="<?php echo $fb_link["target"];?>" role="button"><?php echo $fb_link["text"];?></a>
          </p>
          
        </div>
      </div>
      
      <?php } reset($featured_pages);?>
      
      
    </div>
  </div>
</section>
<?php };?>

<?php // Section that publishes a loop of featurettes starting with a conditional if a conditional is set to published in the WP admin
$featurette_published = CFS()->get( 'featurette_published' );
if ( $featurette_published ) {
  $featurettes = CFS()->get( 'featurette_sections' );
  foreach ( $featurettes as $featurette ) { ?>

    <main class="page-featurette-section" role="main">
      <div class="container">

        <div class="row">
          <div class="col-md-offset-2 col-md-8">
            <h2><?php echo $featurette['featurette_header'];?></h2>
            <hr>
          </div>
        </div>

        <?php // Featurette inner loop start
        $featurette_inners = $featurette['featurette_inner'];
        foreach ( $featurette_inners as $featurette_inner ) { ?>

        <div class="col-md-12">
          <div class="page-featurette-section-inner">
            <div class="row">
              <div class="col-md-12">
                <h3><?php echo $featurette_inner['featurette_card_header'];?></h3>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <?php $featurette_image_id = $featurette_inner[ 'featurette_card_image' ];
                echo wp_get_attachment_image( $featurette_image_id, 'large', "", array( "class" => "img-marketing" ) );?>
              </div>
              <div class="col-md-8">
                <?php echo $featurette_inner['featurette_card_body'];?>
              </div>
            </div> 
          </div>
        </div>     
        <?php };?>

      </div>
    </main>
  <?php };
};?>

<section id="primary" class="page-service-marketing-container grey">
  <div class="container">
    <div class="row">
      <section id="main" class="col-md-12">

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
              
            </header><!-- .entry-header -->

            <div class="entry-content">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sth' ),
                  'after'  => '</div>',
                ) );
              ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
              <?php edit_post_link( esc_html__( 'Edit', 'sth' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-footer -->
          </article><!-- #post-## -->

        <?php endwhile; // End of the loop. ?>

        <div class="page-service-marketing-columns">
          <div class="row">
            <div class="col-md-6">
              <div class="page-service-marketing-left">
                <?php echo CFS()->get('marketing_section_left'); ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="page-service-marketing-right">
                <?php echo CFS()->get('marketing_section_right'); ?>
              </div>
            </div>
          </div>
        </div>
        
        </section><!-- #main -->

    </div><!-- #primary -->
    

  </div>
</section>

<section class="pricing-container">
    <div class="container">
      
    
    <div class="row">
      
      <div class="col-md-3 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Sponsor the event?</h3>
          </div>
          <div class="panel-body">
            <p>Are you interested in supporting us host an event that aims to develop skills and support choice?</p>
            <p>If yes, you can <a href="mailto:sheffieldconferences@sth.nhs.uk">get in touch with the conference team via email</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="panel panel-primary panel-featured">
          <div class="panel-heading">
            <h3 class="panel-title">Early-bird tickets</h3>
          </div>
          <div class="panel-body">
            <p>We have opened up a small selection of "early-bird" tickets for North of England Breech Conference 2017.</p>
            <p>These tickets are limited to a select number of customers so get them today!</p>
            <div class="panel-pricing">
              <p class="price">£160</p>
              <p class="sub">(+£43.15 Fee and VAT)</p>
            </div>
            <p>
              <a role="button" target="_blank" href="https://www.eventbrite.co.uk/e/north-of-england-breech-conference-ii-uk-tickets-25481488819" class="btn btn-block btn-warning">Buy ticket</a>
            </p>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Regular ticket</h3>
          </div>
          <div class="panel-body">
            <p>Grab yourself a ticket to our two-day breech conference in Sheffield</p>
            <div class="panel-pricing">
              <p class="price">£195</p>
              <p class="sub">(+£52.46 Fee and VAT)</p>
            </div>
            <p>
              <a role="button" target="_blank" href="https://www.eventbrite.co.uk/e/north-of-england-breech-conference-ii-uk-tickets-25481488819" class="btn btn-block btn-default">Buy ticket</a>
            </p>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>

<section class="page-category-post-list">
  <div class="container">
    <div class="row">
      
        <?php 
        // News post item category
        
        // WP_Query arguments
        $col_args = array (
          
          'category_name' => 'news',
          'posts_per_page' => 3
          
        );
   
        // the query
        $cat_query = new WP_Query( $col_args ); ?>

        <?php if ( $cat_query->have_posts() ) : ?>

          <!-- the loop -->
          <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
          
        <div class="col-md-4">
          <div class="page-category-card">
            <?php if ( has_post_thumbnail() ) :?>
                <a href="<?php the_permalink() ;?>">
                  <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-full')); ?>
                </a>
              <?php else :?>
                <a href="<?php the_permalink() ;?>">
                  <img class="img-responsive" src="<?php echo get_template_directory_uri() . "/images/news.jpg"; ?>" alt="News">
                </a>
              <?php endif ;?>

            <div class="category-label">
              News
            </div>
              <?php the_title( sprintf( '<h3 class="category-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <?php the_excerpt(); ?>
          </div>
      </div>
        
          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>
        
        
        <?php else : ?>

        <?php endif; ?>
        

      </div>
    

  </div>
</section>

<?php get_footer(); ?>