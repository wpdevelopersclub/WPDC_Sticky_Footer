<?php if ( $this->is_user_logged_in ) : ?>
	<a href="https://wpdevelopersclub.com/member-dashboard/" class="panel-item dashboard" data-tooltip="<?php _e( 'Your Dashboard', 'wpdc' ); ?>">
		<i class="fa fa-cog"></i>
	</a>

<?php else: ?>
	<a href="https://wpdevelopersclub.com/join-the-wordpress-developers-club/" class="panel-item join" data-tooltip="<?php _e( 'Join WPDC', 'wpdc' ); ?>">
		<?php _e( 'Join', 'wpdc' ); ?>
	</a>
<?php endif; ?>