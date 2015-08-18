<button type="button" class="panel-item share" data-tooltip="<?php _e( 'Share', 'wpdevsclub' ); ?>"  data-subpanel="sticky-footer-subpanel-share">
	<i class="fa fa-share-alt"></i>
</button>
<div id="sticky-footer-subpanel-share" class="subpanel">
	<ul>
		<li class="share-twitter">
			<a rel="nofollow" class="share-twitter share-icon" href="<?php echo $this->permalink; ?>?share=twitter&amp;nb=1" target="_blank" title="Click to share on Twitter">
				<i class="fa fa-twitter"></i><span>Twitter</span>
			</a>
		</li>
		<li class="share-google-plus-1">
			<a rel="nofollow" class="share-google-plus-1 share-icon" href="<?php echo $this->permalink; ?>?share=google-plus-1&amp;nb=1" target="_blank" title="Click to share on Google+">
				<i class="fa fa-google-plus"></i><span>Google</span>
			</a>
		</li>
		<li class="share-facebook">
			<a rel="nofollow" class="share-facebook share-icon" href="<?php echo $this->permalink; ?>?share=facebook&amp;nb=1" target="_blank" title="Share on Facebook">
				<i class="fa fa-facebook"></i><span>Facebook</span>
			</a>
		</li>
		<li class="share-pinterest">
			<a rel="nofollow" class="share-pinterest share-icon" href="<?php echo $this->permalink; ?>?share=pinterest&amp;nb=1" target="_blank" title="Click to share on Pinterest">
				<i class="fa fa-pinterest-p"></i><span>Pinterest</span>
			</a>
		</li>
		<li class="share-linkedin">
			<a rel="nofollow" class="share-linkedin share-icon" href="<?php echo $this->permalink; ?>?share=linkedin&amp;nb=1" target="_blank" title="Click to share on LinkedIn">
				<i class="fa fa-linkedin"></i><span>LinkedIn</span>
			</a>
		</li>
		<li class="share-email share-service-visible">
			<a rel="nofollow" class="share-email share-icon" href="<?php echo $this->permalink; ?>?share=email&amp;nb=1" target="_blank" title="Click to email this to a friend">
				<i class="fa fa-envelope-o"></i><span>Email</span>
			</a>
		</li>
	</ul>
</div>