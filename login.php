<?php 

require_once 'core/init.php';

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)
		));

		if($validation->passed()) {
			// Login user
			$user = new User();

			$remember = (Input::get('remember') === 'on') ? true : false;
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);

			if($login) {
				// echo 'Success';
				Redirect::to('index.php');
			} else {
				echo '<p>Sorry, logging in failed';
			}

		} else {
			foreach($validation-errors() as $error) {
				echo $error, '<br>';
			}
		}

	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off" />
	</div>
	<div class="field">
		<label for="password">Password</label>
		<input type="passowrd" name="password" id="password" autocomplete="off" />
	</div>
	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember" />
			Remember me
		</label>
	</div>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
	<input type="submit" value="login" />
</form>