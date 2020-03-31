<?php
$site_url = get_site_url();
$twitter_text = get_the_title();
$twitter_link = urlencode($site_url."/?p=".$post->ID);
$popup_height = 400;
$popup_width = 500;

$facebook_link = "https://www.facebook.com/sharer/sharer.php?u=".$site_url ."/?p=".$post->ID;
$twitter_link  = "http://www.twitter.com/intent/tweet?text=".$twitter_text."&url=".$twitter_link;
$google_link   = "https://plus.google.com/share?url=".$site_url."/?p=".$post->ID;
$linkedin_link = "https://www.linkedin.com/shareArticle?url=".$site_url ."/?p=".$post->ID;
?>
<h6 class="share-header">Share:</h6>
<div class="social-buttons">
    <a target="_blank" onclick="window.open('<?php echo $facebook_link; ?>', 'newwindow', 'width=<?php echo $popup_width; ?>, height=<?php echo $popup_height; ?>'); return false;"><div class="citizen-facebook citizen-social-icon"></div></a>
    <a target="_blank" onclick="window.open('<?php echo $twitter_link; ?>', 'newwindow', 'width=<?php echo $popup_width; ?>, height=<?php echo $popup_height; ?>'); return false;"><div class="citizen-twitter citizen-social-icon"></div></a>
    <a target="_blank" onclick="window.open('<?php echo $google_link; ?>', 'newwindow', 'width=<?php echo $popup_width; ?>, height=<?php echo $popup_height; ?>'); return false;"><div class="citizen-googleplus citizen-social-icon"></div></a>
   <?php /* <a target="_blank" onclick="window.open('<?php echo $linkedin_link; ?>', 'newwindow', 'width=<?php echo $popup_width; ?>, height=<?php echo $popup_height; ?>'); return false;"><div class="citizen-linkedin citizen-social-icon"></div></a> */ ?>
</div>