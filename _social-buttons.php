<?php 
$socialLinks = array(
			//keys here double as font awesome names
			"facebook"     => get_option( 'facebook_url' , false),
			"twitter"      => get_option( 'twitter_url' , false),
			"google-plus"   => get_option( 'googleplus_url' , false),
			"instagram"    => get_option( 'instagram_url' , false),
			"pinterest-p"  => get_option( 'pinterest_url' , false),
			"linkedin"     => get_option( 'linkedin_url' , false),
			"youtube-play" => get_option( 'youtube_url' , false)
);
?>
<div class="social-buttons">
  <?php foreach ($socialLinks as $key => $value): ?>
    <?php if($value): ?>
      <a href="<?php echo $value; ?>" target="_blank">
        <i class="fa fa-<?php echo $key; ?>" aria-hidden="true"></i> &nbsp;
      </a>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

