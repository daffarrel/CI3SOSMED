<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="google-site-verification" content="Fc5Cu5yfvJKy-mPGUnVSwjANd3GK-us6I8hd9y1Ci5Q" />
		<title>CODEIGNITER SOCIAL LIBRARY</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<style type="text/css">
			a.col-lg-2 img {
				width:100%;
				height: auto;
			}
		</style>
	</head>
	<body>
		<div class="row" style="margin-top: 60px;">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">SOCIAL LOGIN PAGE</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<p>LOGIN WITH :</p>
								<div class="row">
									<?php
										// Output the enabled services and change link/button if the user is authenticated.
										$this->load->helper('url');
										foreach($providers as $provider => $data) {
											echo "<div class='col-xs-3'>";
											echo "	<a href='auth/login/".$provider."' class='login'>";
											echo "		<img src='".base_url()."/assets/images/social/".$provider.".png' />";
											echo "	</a>";
											echo "</div>";
										}
									?>
								</div>
							</div>
							<div class="col-xs-12">
								<form method="post" action="">
									<br/>
									<div class="form-group">
										<label for="username"> Username</label>
										<input type="text" class="form-control" name="username" placeholder="Username">
									</div>
									<div class="form-group">
										<label for="username"> Password</label>
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-primary btn-block"> SUBMIT</button>
					</div>
				</div>

				<div class="row">
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
			</div>
		</div>
		<?php
		// Output the profiles of each logged in service
		foreach ($providers as $provider => $d) :
			if (!empty($d['user_profile'])) :
				$profile[$provider] = (array)$d['user_profile'];
				?>
				<fieldset>
		        <legend><strong><?=$provider?></strong> Profile</legend>
		        <table width="100%">
		          <tr>
		            <td width="150" valign="top" align="center">
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
					</td>
		            <td align="left"><table width="100%" cellspacing="0" cellpadding="3" border="0">
		                <tbody>
						<?php
						foreach ($d['user_profile'] as $key=>$value) :
							if ($value =="") {
								continue;
							}
						?>
		                  <tr>
		                  	<td class="pItem"><strong><?=ucfirst($key)?>:</strong> <?=(filter_var($value, FILTER_VALIDATE_URL) !== false) ?  '<a href="'.$value.'" target="_blank">'.$value.'</a>' : $value;?></td>
		                  </tr>
						<?php endforeach; ?>
		                </tbody>
		              </table>
					  </td>
		          </tr>
		        </table>
		      </fieldset>
			<?php
			endif;
		endforeach;
		?>
		</p>
		
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
