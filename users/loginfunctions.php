<?php
ob_start();
define("HOST", "localhost"); // The host you want to connect to.
define("USER", "root"); // The database username.
define("PASSWORD", "root"); // The database password. 
define("DATABASE", "ecoabsor_master"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE)
 or die ("Could not connect to server ... \n" . mysql_error ());
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.

function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        if(!isset($_SESSION)){session_start();} // Start the php session
        session_regenerate_id();
}

function login($email, $password, $mysqli) {
   // Using prepared Statements means that SQL injection is not possible. 
   if ($stmt = $mysqli->prepare("SELECT UserID, Username, FirstName, LastName, Password, Permissions, Admin FROM Users WHERE Email = ? LIMIT 1")) { 
      $stmt->bind_param('s', $email); // Bind "$email" to parameter.
      $stmt->execute(); // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($user_id, $username, $firstname, $lastname, $db_password, $permissions, $admin); // get variables from result.
      $stmt->fetch();

      if($stmt->num_rows == 1) { // If the user exists

        if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
            // Password is correct!
          $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
          $_expires = strtotime( '+120 days' );
          $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
          $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
          setcookie('UserID', $user_id, $_expires, "/");
          setcookie('Username', $username, $_expires, "/");
          setcookie('login_string', hash('sha512', $password.$user_browser), $_expires, "/");
          setcookie('Permissions', $permissions, $_expires, "/");
          setcookie('FirstName', $firstname, $_expires, "/");
          setcookie('LastName', $lastname, $_expires, "/");
          setcookie('Admin', $admin, $_expires, "/");
          // Login successful.
          return true;    
      } else {
        // No user exists. 
        return false;
      }
	  } else {
      // No user exists. 
     return false;
    }
	}
}

function login_check($mysqli) {
   // Check if all session variables are set
   if(isset($_COOKIE['UserID'], $_COOKIE['Username'], $_COOKIE['login_string'], $_COOKIE['Permissions'], $_COOKIE['FirstName'], $_COOKIE['LastName'])) {
     $permissions = $_COOKIE['Permissions'];
     $user_id = $_COOKIE['UserID'];
     $login_string = $_COOKIE['login_string'];
     $username = $_COOKIE['Username'];
	   $firstname = $_COOKIE['FirstName'];
	   $lastname = $_COOKIE['LastName'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
     if ($stmt = $mysqli->prepare("SELECT Password FROM Users WHERE UserID = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}
?>