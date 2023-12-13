<?php
$theme_options_data = get_theme_mods();
?>
<!-- <div class="main-menu"> -->
<div class="<?php echo get_theme_mod( 'thim_header_size', 'default' ) == 'full_width' ? 'header_full' : 'container'; ?>">
	<div class="row">
		<div class="col-sm-2 column_logo new_update">
			<div class="tm-table">
				<div class="width-logo table-cell sm-logo">
					<?php
					do_action( 'thim_logo' );
					do_action( 'thim_sticky_logo' );
					?>
				</div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="58.5px" height="119.985px" viewBox="0 0 58.5 119.985" enable-background="new 0 0 58.5 119.985" xml:space="preserve">
                        <image display="none" overflow="visible" width="60" height="120" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEASABIAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA
                        EAMCAwYAAAJFAAACpwAAA9z/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX
                        Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa
                        JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIAHgAPAMBIgACEQEDEQH/
                        xACgAAEAAgMBAAAAAAAAAAAAAAAABgcCAwUEAQADAQEBAAAAAAAAAAAAAAAABAUDAgEQAAEDBAMB
                        AQAAAAAAAAAAAAMgAgQQARIFERMGFDARAAIBAQQIBgIDAAAAAAAAAAECAxEwIRIiADFRcYGxMgRB
                        YcFyghORoiMUJBIAAQMACQQDAAAAAAAAAAAAASARAgAhMUFRYXGREoGxUoLBMkL/2gAMAwEAAhED
                        EQAAAPXMa/7zqEmCT4AAV3lirRp9uj8gmVQ40AK7FeN65zXc4Tc9gUdAK7FeMkkb6OWszE2oAV2K
                        8Zli8LA2cnrS64c9V2K8YA7Esr6eovbAs3XYrxgBJozvz0nrDOZUrsV44AAdiUCrf//aAAgBAgAB
                        BQCQK17IKzB9ZbUGbkND24urKZw6pWZs4vzW/X9H/9oACAEDAAEFAIxr2cgT82VhvQB2JUDdkysN
                        /LahJg/m3FW9nzf/2gAIAQEAAQUA1u3kQCBMM4l+Z2F2EWMjxEiSWyoy/LS+WL1cr5J/4aqT9OvX
                        5WRyxehP0bNbHuG8BWmCvzcnu16/NSumcsRXhLHMyQBfl5mYVwZb4coJRmEvR7m0O/0A6v/aAAgB
                        AgIGPwDnEVi3MJMdtERl6lEhk+yTHAoEvKrqEGN9o1o16Itb+sHbvT//2gAIAQMCBj8A4SNRsyKY
                        y31RKHsPlETm26YyxCDDxrGhQJXWHSj3Ik/1q44s/an/2gAIAQEBBj8AGYvAeuIm6m1dh0WaI4o3
                        FVNgexkOSSrRV8G8RxsFkQ0dCGU7CL9I+4TVItabD4jgbCXs2N6/yJuNzelhDMTRQ2F/a1xsYZSa
                        thwv7lynlYT9sT0kSKN+VuQsIqmiy1jPy1ftSwV1uZCGB8xfpHMvTIoYcRWw+onNAxX4nMOdgYWO
                        WdafJbx62CSoaPGwZd4NdI506ZFDDjYP2bnNFnj9p1/g87CPuEvwHMNqnWNFljOJHAZT5Gw/rdwf
                        87GqtrwE+h0+77F+qlceIYab9P/Z" transform="matrix(0.9999 0 0 0.9999 -122.9937 -131.9937)">
                        </image>
                    <path fill="<?php echo get_theme_mod( 'thim_body_primary_color' );?>" d="M0,0c0,0,14.326,0,29.996,59.993s25.837,58.633,28.504,59.992H0V0z"/>
                    </svg>
			</div>
		</div>
		<div class="col-sm-10 column_right">
            <?php if ( isset( $theme_options_data['thim_toolbar_show'] ) && $theme_options_data['thim_toolbar_show'] == '1' ) { ?>
			<div class="toolbar" id="toolbar">
				<div class="row">
					<div class="col-md-6 col-sm-9 col-xs-12 hidden-sm hidden-xs">
						<?php dynamic_sidebar( 'top_menu_left' ); ?>
					</div>
					<div class="col-md-6 col-sm-3 col-xs-12 menu_right_position">
						<?php dynamic_sidebar( 'top_menu_right' ); ?>
					</div>
				</div>
			</div>
            <?php }?>
			<div class="navigation">
				<nav class="width-navigation table-cell table-right">
					<?php get_template_part( 'inc/header/main-menu' ); ?>
				</nav>
				<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
			</div>
		</div>
	</div>
</div>