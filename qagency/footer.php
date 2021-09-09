<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qagency
 */

?>
	<footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.html">
                        <i class='bx bx-buildings bx-sm text-light'></i>
                        <span class="text-light h5"><?php echo bloginfo( 'name' );?></span>
                    </a>
                    <p class="text-light my-lg-4 my-2">
					<?php echo bloginfo( 'description' );?>
                    </p>
                    <ul class="list-inline footer-icons light-300">
						<?php if(get_theme_mod( 'client_info_social_fb' ) != "") : ?>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="<?php echo get_theme_mod( 'client_info_social_fb' ); ?>">
                                <i class='bx bxl-facebook-square bx-md'></i>
                            </a>
                        </li>
						<?php endif; ?>

						<?php if(get_theme_mod( 'client_info_social_li' ) != "") : ?>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="<?php echo get_theme_mod( 'client_info_social_li' ); ?>">
                                <i class='bx bxl-linkedin-square bx-md'></i>
                            </a>
                        </li>
						<?php endif; ?>

						<?php if(get_theme_mod( 'client_info_social_wa' ) != "") : ?>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="<?php echo get_theme_mod( 'client_info_social_wa' ); ?>">
                                <i class='bx bxl-whatsapp-square bx-md'></i>
                            </a>
                        </li>
						<?php endif; ?>

						<?php if(get_theme_mod( 'client_info_social_me' ) != "") : ?>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="<?php echo get_theme_mod( 'client_info_social_me' ); ?>">
                                <i class='bx bxl-medium-square bx-md'></i>
                            </a>
                        </li>
						<?php endif; ?>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Our Company</h2>
					<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu-footer',
					'container'            => 'ul',
					'menu_class'           => 'list-unstyled text-light light-300',
					'link_class'  => 'text-decoration-none text-light',
					'list_item_class' => 'pb-2',
					'before' => "<i class='bx-fw bx bxs-chevron-right bx-xs'></i>",
				)
			);
			?>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Our Works</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Branding</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Business</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Marketing</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Social Media</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Digital Solution</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Graphic</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">For Client</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bx-phone bx-xs'></i><a class="text-decoration-none text-light py-1" href="tel:<?php echo get_theme_mod('client_info_phone') == "" ? "010-020-0340" : get_theme_mod('client_info_phone');?>"><?php echo get_theme_mod('client_info_phone') == "" ? "010-020-0340" : get_theme_mod('client_info_phone');?></a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bx-mail-send bx-xs'></i><a class="text-decoration-none text-light py-1" href="mailto:<?php echo get_theme_mod('client_info_email') == "" ? "info@company.com" : get_theme_mod('client_info_email');?>"><?php echo get_theme_mod('client_info_email') == "" ? "info@company.com" : get_theme_mod('client_info_email');?></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-primary py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-start text-center text-light light-300">
                            © Copyright 2015-<?php echo date('Y');?> Purple Buzz Company. All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-end text-center text-light light-300">
                            Designed by <a rel="sponsored" class="text-decoration-none text-light" href="https://templatemo.com/" target="_blank"><strong>TemplateMo</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div><!-- #page -->

    <!-- Bootstrap -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
<?php wp_footer(); ?>

</body>
</html>
