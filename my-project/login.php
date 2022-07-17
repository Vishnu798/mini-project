<?php
include 'code/connection.inc.php';
$msg = '';

if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$secure_pwd'";

	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		
		$_SESSION['USER_LOGIN'] = $email;
		

		header('LOCATION:index.php');
	} else {
		$msg = 'Please Enter the correct Details';
	}
}

?>

<?php include 'include_common/header.php'; ?>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				<div class="text-center my-3">
					<img src="https://scontent.fagr1-2.fna.fbcdn.net/v/t1.6435-9/188527506_3030408003862822_4707290448087594937_n.png?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=VFuAr-yb8_4AX9i7bfV&_nc_ht=scontent.fagr1-2.fna&oh=80217f2c33b2c5c7cc911d29670d4038&oe=60E15281" alt="logo" width="150">
				</div>
				<div class="card shadow-lg">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>
					<div class="card-body p-5">
						<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								<div class="invalid-feedback">
									Name is invalid
								</div>
							</div>

							<div class="mb-3">
								<div class="mb-2 w-100">
									<label class="text-muted" for="password">Password</label>
								</div>
								<input id="password" type="password" name="password" class="form-control" required>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>

							<div class="d-flex align-items-center">
								<button type="submit" name="submit" class="btn btn-primary ms-auto">
									Login
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer py-3 border-0">
						<div class="text-center">
							Don't have an account? <a href="register.php" class="text-dark">Create One</a>
						</div>
					</div>
				</div>
				<div class="text-center mt-5 text-muted">
					<p>for my cute bndi 🥰</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'include_common/footer.php'; ?>
