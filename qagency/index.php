<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qagency
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
					$args = array(  
						'post_type' => 'slider',
						'post_status' => 'publish',
					);

					$posts = get_posts( $args);
			

		if ( $posts ) :
?>
			<!-- Start Banner Hero -->
			<div class="banner-wrapper bg-light">
				<div id="index_banner" class="banner-vertical-center-index container-fluid pt-5" style="background-image: url(<?php echo get_theme_mod('slider_image') == "" ? get_bloginfo('template_url') . "/assets/img/banner-bg-01.jpg" : get_theme_mod('slider_image');?>)">
		
					<!-- Start slider -->
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
						<ol class="carousel-indicators">
							<?php 
							for($i = 0; $i < count($posts); $i++) {
								?>
								<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" <?php echo $i == 0 ? 'class="active"' : ''; ?> ></li>
							<?php
							}
							?>
						</ol>
						<div class="carousel-inner">
						<?php 
							for($i = 0; $i < count($posts); $i++) {

								?>
															<div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
		
		<div class="py-5 row d-flex align-items-center">
			<div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
				<h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
					<?php echo $posts[$i]->post_title;?>
			  </h1>
				<p class="banner-body text-muted py-3 mx-0 px-0">
				<?php echo $posts[$i]->post_content;?>
			  </p>
				<a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#" role="button">Get Started</a>
			</div>
		</div>

	</div>
								<?php
							}
							?>



						</div>
						<a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
							<i class='bx bx-chevron-left'></i>
							<span class="visually-hidden">Previous</span>
						</a>
						<a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
							<i class='bx bx-chevron-right'></i>
							<span class="visually-hidden">Next</span>
						</a>
					</div>
					<!-- End slider -->
		
				</div>
			</div>
			<!-- End Banner Hero -->
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );


		endif;
		?>
    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <h2 class="h2 text-center col-12 py-5 semi-bold-600">Services</h2>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                    <i class='bx bx-gift h3 mt-1'></i>
                </div>
                <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                    <h2 class="h3 pb-4 typo-space-line">Make Success for future</h2>
                </div>
            </div>
            <p class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
                You are free to use this template for your commercial or business websites. You are not allowed to re-distribute this template ZIP file on any template collection websites. It is too easy to illegally copy and repost this template.
            </p>
        </div>
		<?php
							$args = array(  
								'post_type' => 'service',
								'post_status' => 'publish',
							);
		

							$services = new WP_Query( $args ); 
							

							$types = get_terms( array(
								'taxonomy' => 'project_type',
								'hide_empty' => false,
							) );
							$types = array_map(function ($o) { return $o->name; }, $types);

							$lowertypes = array_map('strtolower', $types);
							
						
		?>
        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="#" data-filter=".project">All</a>
                    </li>
					<?php
					foreach( $types as $type) :
					?>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".<?php echo strtolower($type);?>"><?php echo $type;?></a>
                    </li>
					<?php endforeach; ?>
					
                </ul>
            </div>
        </div>

    </section>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
			<?php while ( $services->have_posts() ) : $services->the_post(); 
			$term_obj_list = get_the_terms( get_the_ID(), 'project_type' );
			$term_obj_list = array_map(function ($o) { return $o->name; }, $term_obj_list);
							// print_r($types);
							$slowertypes = array_map('strtolower', $term_obj_list);
							$classes = implode(" ", $slowertypes);
			?>
            <!-- Start Recent Work -->
            <div class="col-xl-3 col-md-4 col-sm-6 project <?php echo $classes; ?>">
                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="service card-img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300"><?php echo the_title();?></span>
                            <p class="card-text"><?php echo the_content();?></p>
                        </div>
                    </div>
                </a>
            </div><!-- End Recent Work -->
			<?php endwhile; ?>


        </div>
    </section>
    <!-- End Service -->


	 <!-- Start View Work -->
	 <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-box bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">Great transformations successful</h3>
                    <p class="light-300">Quis ipsum suspendisse ultrices gravida.</p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="#" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">View Our Work</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End View Work -->

	<?php
							$args = array(  
								'post_type' => 'work',
								'post_status' => 'publish',
							);
		

							$works = new WP_Query( $args ); 
							

							
						
		?>

    <!-- Start Recent Work -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Recent Works</h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">

			<?php while ( $services->have_posts() ) : $services->the_post();  ?>
                <!-- Start Recent Work -->
                <div class="col-md-4 mb-3">
                    <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                <h3 class="card-title light-300"><?php echo the_title();?></h3>
                                <p class="card-text"><?php echo the_content();?></p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->
				<?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- End Recent Work -->

	</main><!-- #main -->

<?php
get_footer();
