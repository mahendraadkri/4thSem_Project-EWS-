
<?php 
error_reporting(0);
require_once('top.php');

if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>

		<?php
		require_once('index.php');
		?>	
	
	<?php
}

if(!empty($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='admin/index.php';
	</script>
	<?php
}

?>

<?php
require_once "connection.inc.php";
require_once "validation.php";
require_once "db.php";


if (isset($_POST["register_submit"])){
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$mobile = $_REQUEST['mobile'];
	$password = $_REQUEST['password'];


	if (!validateName($name)) {
        die("Enter valid name!!");
     }

	if (!validateMobile($mobile)) {
        die("Enter valid phone!!");
    }
	if (empty($email) || empty($password) || empty($name) || empty($mobile) ) {
        die("Please fill all the fields!");
    }
	if(!validateEmail($email)){
		echo "Invalide Email";
		die;
	}
	$user = where('users', 'email', '=', $email, false);

    if ($user) {
        die("Email has already been taken!");
    }
	create('users', [
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

?>



<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login/Register</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        
		<!-- Start login form -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post" action=" ">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="login_email" id="login_email" placeholder="Your Email" style="width:100%" required>
										</div>
										<span class="field_error" id="login_email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password" id="login_password" placeholder="Your Password" style="width:100%" required>
										</div>
										<span class="field_error" id="login_password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" >Login</button>
									</div>
								</form>
								<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
			
				<!-- End of Login form -->
				<!-- Start Register form -->
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="register-form" method="POST" action="">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name" style="width:100%" required>
										</div>
										<span class="field_error" id="name_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" id="email" placeholder="Your Email" style="width:100%" required>
										</div>
										<span class="field_error" id="email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="mobile" id="mobile" placeholder="Your Mobile" style="width:100%" required>
										</div>
										<span class="field_error" id="mobile_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" id="password" placeholder="Your Password" style="width:100%" required>
										</div>
										<span class="field_error" id="password_error"></span>
									</div>
									
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" name="register_submit">Register</button>
									</div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                        <script>
                            
                        </script>
					</div>
				</div>
					
            </div>
			<!--End Of Registration Form  -->
         </section> 
<?php require_once('footer.php')?>     
