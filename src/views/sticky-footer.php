<section id="sticky-footer" class="sticky-footer is-collapsed">
	<div class="wrap">
		<button type="button" class="sticky-footer-handle"></button>
	</div>

	<div class="sticky-footer-panel">
		<div class="wrap">
			<div class="sticky-footer-nav-items">
				<?php
				foreach( $this->config['views']['panels'] as $panel_view ) {
					if ( is_readable( $panel_view ) ) {
						include $panel_view;
					}
				}
				?>
			</div>
		</div>
	</div>
</section>