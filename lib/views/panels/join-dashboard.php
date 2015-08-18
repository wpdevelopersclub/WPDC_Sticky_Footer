<?php if ( $this->user_logged_in ) : ?>
	<a href="https://wpdevelopersclub.com/join-the-wordpress-developers-club/" class="panel-item join" data-tooltip="<?php _e( 'Join WPDC', 'wpdevsclub' ); ?>">
		<?php _e( 'Join', 'wpdevsclub' ); ?>
	</a>
<?php else: ?>
	<a href="https://wpdevelopersclub.com/member-dashboard/" class="panel-item dashboard" data-tooltip="<?php _e( 'Your Dashboard', 'wpdevsclub' ); ?>">
		<i class="fa fa-cog"></i>
	</a>
<?php endif; ?>