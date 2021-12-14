<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
	<div class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
		<div class="bg-light p-5 col-md-4" style="box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);">
			<h3 class="">Send Email</h3>
			<div class="col-md-7">
				<form method="POST" action="send_email.php">
					<hr style="border-top:1px dotted #ccc;" />
					<div class="form-group">
						<label>Sender Email:</label>
						<input type="email" class="form-control" name="emailPengirim" required="required" />
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="pass" required="required" />
					</div>
					<br>
					<br>
					<div class="form-group">
						<label>Email to:</label>
						<input type="email" class="form-control" name="email" required="required" />
					</div>
					<div class="form-group">
						<label>Subject :</label>
						<input type="text" class="form-control" name="subject" required="required" />
					</div>
					<div class="form-group">
						<label>Message :</label>
						<textarea type="text" class="form-control" name="message" required="required"></textarea>
					</div>
					<br>
					<button name="send" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Send</button>
				</form>
				<br />
				<?php
				if (isset($_SESSION['status'])) {
					if ($_SESSION['status'] == "ok") {
				?>
						<div class="alert alert-info"><?php echo $_SESSION['result'] ?></div>
					<?php
					} else {
					?>
						<div class="alert alert-danger"><?php echo $_SESSION['result'] ?></div>
				<?php
					}

					unset($_SESSION['result']);
					unset($_SESSION['status']);
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>