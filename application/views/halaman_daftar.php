<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?></head>

<body id="page-top">
	<div style="display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 100vh;
    ">
		<form name="login_form" id="login_form" method="post" action="
				<?php echo site_url('daftar')?>" class="form_login" style="width: 450px;">
			<input type="hidden" name="_token" value="i7NEgYgUtQPlLjUimrOhIuMIIertkfMwaWBS7ugt">
			<div class="white_block">
				<article>
					<header class="clearfix">
						<h4 class="">Sign Up</h4>
					</header>
					<div class="block-inner">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="required form-control" value="" placeholder="Enter your username...">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="required form-control" value="" placeholder="Enter your username...">
						</div>
						<div class="form-group w_margin">
							<label>Password</label>
							<input name="password" type="password" class="required form-control" style="" placeholder="Enter your password...">
						</div>
						<button type="submit" class="btn btn-large btn-block btn-error text-uppercase " id="submit_login" style="background-color: #555555; color: white;">	<span class="btn-title">Sign up</span>
							<span id="countdown-wrapper" class="circle-outline" style="display: none;">
													<span id="countdown">3</span>
							</span>
						</button>
					</div>
				</article>
			</div>
			<div class="clearfix"></div>
		</form>
	</div>
	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?></body>

</html>