<?php 
require_once 'core/init.php';

// var_dump(Token::check(Input::get('token')));

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,    
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        
        if($validation->passed()) {
            // echo 'Passed';
            $user = new User();

            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'username'	=> Input::get('username'),
                    'password'	=> Hash::make(Input::get('password'), $salt),
                    'salt'		=> $salt,
                    'name'		=> Input::get('name'),
                    'joined'	=> date('Y-m-d H:i:s'),
                    'group'		=> 1,
                ));
                Session::flash('home', 'You have been registered and can now log in!');
                // header('Location: index.php');
                Redirect::to('index.php');
            } catch(Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}


?>

<form action="" method="post">

    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" />
    </div>
    
    <div class="field">
        <label for="password">Choose a password</label>
        <input type="password" id="password" name="password" />
    </div>
    
    <div class="field">
        <label for="password_again">Enter your password again</label>
        <input type="password" id="password_again" name="password_again" />
    </div>
    
    <div class="field">
        <label for="name">Your Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" />
    </div>
    
    <input type="hidden" value="<?php echo Token::generate(); ?>" />
    <input type="submit" value="Register" />
    
</form>