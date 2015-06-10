<?php if ( $this->user_logged_in ) : ?>
	<a href="https://wpdevelopersclub.com/join-the-wordpress-developers-club/" class="panel-item join" title="Join the WP Developers Club - the Club for WordPress Developers">
		<?php _e( 'Join', 'wpdevsclub' ); ?>
	</a>
<?php else: ?>
	<a href="https://wpdevelopersclub.com/member-dashboard/" class="panel-item dashboard" title="Join the WP Developers Club - the Club for WordPress Developers">
		<i class="fa fa-cog"></i>
	</a>
<?php endif; ?>