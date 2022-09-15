<?php 
/**
 * SnippWiki app
 * LICENSE: Apache
 * @author  Larry Judd & Tradesouthwest
 * @link    https://tradesouthwest.com
 */
include 'header.php';
?>

<div class="container-fluid">
    <div class="row">
    
    <nav class="col-md-2 sidebar">
        <?php include( SNIPP_BASE . 'sidenav.php'); ?>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="border-bottom">
        <article class="viewsnippet">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form" method="post" 
    action="">
    
<hr>

<div class="form-group">
    <p><input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1"></p>
</div>
<br>
<div class="form-group">
    <p><input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3"></p>
</div>	

<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9">
        <p><a href='reset.php'>Forgot your Password?</a></p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-6">
        <p><input type="submit" name="submit_login" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></p>
    </div>
</div>
</form>
</div>
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

<?php
// debug only - shows logged in sessions
display_sessions();
?>

</div>
<?php
//process login form if submitted 
if( isset($_POST['submit_login'] ) ){

    require_once ( SNIPP_BASE . 'db/dbh.php');

    $username = $_POST['username'];
    $password = md5( $_POST['password'] );
    $active   = (int)1;
    $stmt = $dbh->prepare('SELECT * FROM tsw_members 
                            WHERE login_name = :username 
                            AND   login_pass = :password ');
    
    $stmt->bindValue(':username', $username );
    $stmt->bindValue(':password', $password );
    $stmt->bindValue(':active',   $active );
    $result = $stmt->execute();
    if($result){
    
        $row = $result->fetchArray();
    
        $firstname = $row['login_name'];
        $idm       = $row['login_id'];
        $email     = $row['login_email'];

        $email_stripped = alpha_only($email);
        $date_session   = date('mdY-Hi');  
        $user_session   = $email_stripped;
           
        $_SESSION['user_session'] = "$user_session$date_session";  // used for uploads identifier 
        $_SESSION['login_name'] = $firstname;                       // for displaying name
        $_SESSION['login_id'] = $idm;                               // for user id fetching if needed
        $dbh = '';
        $id  = '';
    
redirect('index.php');  
} else {
esc('Wrong username or password.');
}
}
    ?> 
    </article>
        </div>
        
        <div class="btn-toolbar">
            <div class="btn-group">
            <button class="btn btn-sm btn-secondary">Share</button>
            <button class="btn btn-sm btn-secondary">Export</button>
            </div>   
        </div>  
        </main>
      </div>
    </div>
    <?php include ( SNIPP_BASE . 'footer.php' ); ?>
  </body>
</html>