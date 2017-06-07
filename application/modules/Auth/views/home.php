<!DOCTYPE html>
<html lang="en">
<head>
	<title>Success</title>
	<meta name="google-site-verification" content="Fc5Cu5yfvJKy-mPGUnVSwjANd3GK-us6I8hd9y1Ci5Q" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
</head>
<body>

	<div class="row" style="width:800px;margin:0 auto;">
		<div class="col-lg-12">
			<h4>SHARE WITH :</h4>
		</div>
		<a href="http://www.facebook.com/sharer.php?u=http://rhionair3.dev" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/Facebook.png" title="FACEBOOK" />
		</a>
		<a href="http://www.facebook.com/sharer.php?u=http://rhionair3.dev" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/Google.png" title="GOOGLE" />
		</a>
		<a href="https://twitter.com/share?url=http://rhionair3.dev&amp;text=Rhionair3%20Social%20Library&amp;hashtags=rhionair3" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/Twitter.png" title="TWITTER" />
		</a>
		<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://rhionair3.dev" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/LinkedIn.png" title="LINKEDIN" />
		</a>
		<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/Pinterest.png" title="PINTEREST" />
		</a>
		<a href="http://www.tumblr.com/share/link?url=http://rhionair3.dev&amp;title=Rhionair3 Social Library" class="col-lg-2">
			<img src="<?php echo base_url(); ?>assets/images/social/Tumblr.png" title="TUMBLR" />
		</a>
	</div>
	<br/><br/>
	<?php foreach ($providers as $provider => $d) :
			if (!empty($d['user_profile'])) :
				$profile[$provider] = (array)$d['user_profile'];
				?>
	<div class="panel panel-primary" style="width:800px;margin:0 auto;">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$provider?></strong> Profile</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-2">
					<?php
						if( !empty($d['user_profile']->profileURL) ){
					?>
						<a href="<?php echo $d['user_profile']->profileURL; ?>"><img src="<?php echo $d['user_profile']->photoURL; ?>" title="<?php echo $d['user_profile']->displayName; ?>" border="0" style="height: 120px;"></a>
					<?php
						}
						else{
					?>
					<img src="public/avatar.png" title="<?php echo $d['user_profile']->displayName; ?>" border="0" >
					<?php
						}
					?>
				</div>
				<div class="col-lg-10">
							<div class="row">
								<div class="col-lg-4">PROFILE IDENTIFIER</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->identifier; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">PROFILE LINK</div>
								<div class="col-lg-8"><a href="<?php echo $d['user_profile']->profileURL; ?>" class="label label-info" target="_blank">PREVIEW USER PROFILE </a></div>
							</div>
							<div class="row">
								<div class="col-lg-4">DISPLAY NAME</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->displayName; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">DESCRIPTION</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->description; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">FIRST NAME</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->firstName; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">LAST NAME</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->lastName; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">BIRTH DATE</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->birthDay.'-'.$d['user_profile']->birthMonth.'-'.$d['user_profile']->birthYear; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">Email</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->email; ?></div>
							</div>
							<div class="row">
								<div class="col-lg-4">Email</div>
								<div class="col-lg-8"><?php echo $d['user_profile']->email; ?></div>
							</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url(); ?>auth/logout" class="btn btn-danger btn-block">LOGOUT</a>
		</div>
	</div>
			<?php
			endif;
		endforeach;
		?>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

