<?php 
require('./blog/wp-blog-header.php'); 
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Blog</title>

<meta name="description" content="Belgian Photographer Romain Menke" />
<meta name="keywords" content="
  romain,menke,romainmenke,portrait,fashion,mode,portret,
  belgisch,fotograaf,belgium,belgian,photographer" />

<link href="http://www.romainmenke.com/stylesheets/style.css" rel="stylesheet" type="text/css" />

<script
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"
  ></script>





</head>

<body class="blog">
	


<div id="parent">


	<div id="blog">
			<div id="apDiv14">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_date('','<h2>','</h2>'); ?>
	
				<div class="post" id="post-<?php the_ID(); ?>">
	 				<h3 class="storytitle"><?php the_title(); ?></h3>
					<div class="meta"><?php the_author() ?> @ <?php the_time() ?> </div>
	
					<div class="storycontent">
						<?php the_content(__('(more...)')); ?>
					</div>
				</div>

				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<div id="photography-box">
	<div id="photography-menu" class="class2 fade">
	<div class="menu-item">
		<div id="portraits">
  			<a href="../portraits.html" class="portraits">PORTRAITS</a>
		</div>
	</div>
	<div class="menu-item">
		<div id="commission">
  			<a href="../commission.html" class="commission">COMMISSION</a>
		</div>
	</div>
	<div class="menu-item">
		<div id="free-work">
  			<a href="../free-work.html" class="free-work">FREE WORK</a>
		</div>
	</div>
	<div class="menu-item">
		<div id="about">
  			<a href="../about.html" class="about">ABOUT</a>
		</div>
	</div>
	<div class="menu-item">
		<div id="contact">
  			<a href="../contact.html" class="contact">CONTACT</a>
		</div>
	</div>
	<div class="menu-item">
		<div id="blog-menu">
  			<a href="../blog.php" class="blog">BLOG</a>
		</div>
	</div>
	<div class="menu-item">
      	<a href="http://www.facebook.com/romainmenke.photographer" target="_blank">FACEBOOK</a>
	</div>
	</div>
</div>



<div class="footer">
	<span class="class4">
		<a href="http://www.romainmenke.com">belgian photographer romain menke</a>
	</span>
</div>










<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23153571-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</body>
</html>
