<?php
include 'code/connection.inc.php';

$msg = '';
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM registration WHERE email='$email'";
	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		$msg = "EMAIL ID ALREADY EXISTS";
	} else {
		$insert_sql = "INSERT INTO registration (name,email,password) VALUES('$name','$email','$secure_pwd')";
		$insert_qury = mysqli_query($conn, $insert_sql);
		header('location:login.php');
	}
}

?>









<?php include 'include_common/header.php'; ?>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				<div class="text-center my-1">
					<img src="https://scontent.fagr1-2.fna.fbcdn.net/v/t1.6435-9/188527506_3030408003862822_4707290448087594937_n.png?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=VFuAr-yb8_4AX9i7bfV&_nc_ht=scontent.fagr1-2.fna&oh=80217f2c33b2c5c7cc911d29670d4038&oe=60E15281" alt="logo" width="150">
				</div>
				<div class="card shadow-lg">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>

					<div class="card-body p-5">
						<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="name">Name</label>
								<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
								<div class="invalid-feedback">
									Name is required
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" value="" required>
								<div class="invalid-feedback">
									Email is invalid
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="password">Password</label>
								<input id="password" type="password" class="form-control" name="password" required>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>
							<p class="form-text text-muted mb-3">
								By registering you agree with our terms and condition.
							</p>
							<div class="align-items-center d-flex">
								<button type="submit" name="submit" class="btn btn-primary ms-auto">
									Register
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer py-3 border-0">
						<div class="text-center">
							Already have an account? <a href="login.php" class="text-dark">Login</a>
						</div>
					</div>
				</div>
				<div class="text-center mt-5 text-muted">
					Copyright &copy; 2019 &mdash; CodingHax
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include 'include_common/footer.php'

?>
