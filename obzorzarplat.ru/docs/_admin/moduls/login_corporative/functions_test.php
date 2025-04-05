<?php

	/**
	 * Validate if email
	 *
	 * Determines if the passed param is a valid email
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */

	function valid_email ( $str )
	{
		return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * set_login_sessions - sets the login sessions
	 *
	 * @access	public
	 * @param	string
	 * @return	none
	 */

function set_login_sessions ( $user_id, $password, $remember )
	{

		//start the session
		session_start();

		//set the sessions
		$_SESSION['user_id'] = $user_id;
                $_SESSION['psw']=md5($password);
		$_SESSION['logged_in'] = TRUE;

		//do we have "remember me"?
		if ( $remember ) {
			setcookie ( "cookie_id", $user_id, time() + 60*60*24*1,"/");
			setcookie ( "authenticate", md5 ($password), time() + 60*60*24*1,"/");
		}
	}


	// ------------------------------------------------------------------------
        	/**
	 * set_login_sessions - sets the login sessions
	 *
	 * @access	public
	 * @param	string
	 * @return	none
	 */

function set_login_sessions_simple ( $user_id, $password, $remember )
	{

		//start the session
		session_start();

		//set the sessions
		$_SESSION['simple_user_id'] = $user_id;
                $_SESSION['simple_psw']=md5($password);
		$_SESSION['simple_logged_in'] = TRUE;

		//do we have "remember me"?
		if ( $remember ) {
			setcookie ( "simple_cookie_id", $user_id, time() + 60*60*24*1,"/");
			setcookie ( "simple_authenticate", md5 ($password), time() + 60*60*24*1,"/");
		}
	}


	// ------------------------------------------------------------------------

  /**
	 * checkLogin
	 *
	 * Applies restrictions to visitors based on membership and level access
	 * Also handles cookie based "remember me" feature
	 *
	 * @access	public
	 * @param	string
	 * @return	bool TRUE/FALSE
	 */

   function checkLogin ( $levels )
	{
       
    session_start ();
		$kt = split ( ' ', $levels );

		if ($_SESSION['logged_in']== FALSE) {

			$access = FALSE;

			if ( isset ( $_COOKIE['cookie_id'] ) ) {//if we have a cookie

				$query =  mysqli_query($link,'SELECT * FROM for_users_corporat WHERE id = '.$_COOKIE['cookie_id']);

				if ( mysqli_num_rows($query) == 1 ) {//only one user can match that query
					while($row = mysqli_fetch_array($query)){

					//let's see if we pass the validation, no monkey business
					if ( $_COOKIE['authenticate'] == $row["password"] ) {
						//we set the sessions so we don't repeat this step over and over again
						$_SESSION['user_id'] = $row["id"];
                                                $_SESSION['psw']=$row["password"];
						$_SESSION['logged_in'] = TRUE;
						}
						//now we check the level access, we might not have the permission
						if ( in_array ( get_level_access ( $_SESSION['user_id'], $_SESSION['psw'] ), $kt ) ) {
							//we do?! horray!
							$access = TRUE;
						}
					}
				}
			}
		}
		else {
			$access = FALSE;

			if ( in_array ( get_level_access ( $_SESSION['user_id'], $_SESSION['psw'] ), $kt ) ) {
				$access = TRUE;
			}
		}

		if ( $access == FALSE ) {
			header ( "Location: /business/login/");
                        echo($_SESSION['logged_in']);
		}
	}

function checkReport($report_id){
   $date_now=date('Y-m-d');
    $user=mysqli_query($link,"SELECT * from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' ");
while($row=mysqli_fetch_array($user)){
    $user_id=$row["id"];
    $date_finish=$row["date_finish"];
}

//отчеты, предусмотренные тарифом
$report_type_tarif_q=mysqli_query($link,"SELECT * from for_tarif_reports where tarif_id=(
                                    SELECT tarif_id from for_users_corporat WHERE id='$user_id')");
while($row=mysqli_fetch_array($report_type_tarif_q))
{
    if($row["report_id"]==$report_id AND $date_finish>=$date_now){return true;}
}

//дополнительные отчеты не предусмотренные тарифом
$report_type_q=mysqli_query($link,"SELECT * from for_users_corporat_report_type where user_id='$user_id'");

while($row=mysqli_fetch_array($report_type_q))
{
    if($row["report_type_id"]==$report_id AND $date_finish>=$date_now){return true;}
}
}

	// ------------------------------------------------------------------------

 /**
	 * checkLoginUsers
	 *
	 * Applies restrictions to visitors based on membership and level access
	 * Also handles cookie based "remember me" feature
	 *
	 * @access	public
	 * @param	string
	 * @return	bool TRUE/FALSE
	 */

   function checkLoginUsers ( $levels )
	{

    session_start ();
		$kt = split ( ' ', $levels );

		if ($_SESSION['simple_logged_in']== FALSE) {

			$access = FALSE;

			if ( isset ( $_COOKIE['simple_cookie_id'] ) ) {//if we have a cookie

				$query =  mysqli_query($link,'SELECT * FROM for_users WHERE id = '.$_COOKIE['cookie_id']);

				if ( mysqli_num_rows($query) == 1 ) {//only one user can match that query
					while($row = mysqli_fetch_array($query)){

					//let's see if we pass the validation, no monkey business
					if ( $_COOKIE['simple_authenticate'] == $row["pas"] ) {
						//we set the sessions so we don't repeat this step over and over again
						$_SESSION['simple_user_id'] = $row["id"];
                                                $_SESSION['simple_psw']=$row["pas"];
						$_SESSION['simple_logged_in'] = TRUE;
						}
						//now we check the level access, we might not have the permission
						if ( in_array ( get_level_access_users ( $_SESSION['simple_user_id'], $_SESSION['simple_psw'] ), $kt ) ) {
							//we do?! horray!
							$access = TRUE;
						}
					}
				}
			}
		}
		else {
			$access = FALSE;

			if ( in_array ( get_level_access_users ( $_SESSION['simple_user_id'], $_SESSION['simple_psw'] ), $kt ) ) {
				$access = TRUE;
			}
		}

		if ( $access == FALSE ) {
			header ( "Location: /login/");
		}
	}


	// ------------------------------------------------------------------------

  	/**
	 * get_level_access
	 *
	 * Returns the level access of a given user
	 *
	 * @user_id	int
	 * @password	string
	 * @return 	int
	 */

	function get_level_access ( $user_id, $password )
	{
		$row = mysqli_result(mysqli_query($link,"SELECT levelaccess FROM for_users_corporat WHERE id = '$user_id ' AND password='$password'"),0,0);
		return $row;
	}

// ------------------------------------------------------------------------

	/**
	 * get_level_access_users
	 *
	 * Returns the level access of a given user
	 *
	 * @user_id	int
	 * @password	string
	 * @return 	int
	 */

	function get_level_access_users( $user_id, $password )
	{
		$row = mysqli_result(mysqli_query($link,"SELECT levelaccess FROM for_users WHERE id = '$user_id ' AND pas='$password'"),0,0);
		return $row;
	}

// ------------------------------------------------------------------------

	/**
	 * logout
	 *
	 * Handles logouts
	 *
	 * @param	none
	 * @access	public
	 */

	function logout ()
	{
		//session must be started before anything
		session_start ();

		//if we have a valid session
		if ( $_SESSION['logged_in'] == TRUE )
		{
			//unset the sessions (all of them - array given)
			unset ( $_SESSION );
			//destroy what's left
			session_destroy ();
		}

		//It is safest to set the cookies with a date that has already expired.
		if ( isset ( $_COOKIE['cookie_id'] ) && isset ( $_COOKIE['authenticate'] ) ) {
			/**
			 * uncomment the following line if you wish to remove all cookies
			 * (don't forget to comment ore delete the following 2 lines if you decide to use clear_cookies)
			 */
			//clear_cookies ();
			setcookie ( "cookie_id", '', time() - 60*60*24*1,"/");
			setcookie ( "authenticate", '', time() - 60*60*24*1,"/" );
		}

		//redirect the user to the default "logout" page
		header ( "Location: /business/login/" );
	}

	// ------------------------------------------------------------------------

	/**
	 * clear_cookies
	 *
	 * Clears the cookies
	 * Not used by default but present if needed
	 *
	 * @param	none
	 * @access	public
	 */

	function clear_cookies ()
	{
		// unset cookies
		if ( isset( $_SERVER['HTTP_COOKIE'] ) ) {
			$cookies = explode ( ';', $_SERVER['HTTP_COOKIE'] );
			//loop through the array of cookies and set them in the past
			foreach ( $cookies as $cookie ) {
				$parts = explode ( '=', $cookie );
				$name = trim ( $parts [ 0 ] );
				setcookie ( $name, '', time() - 60*60*24*1 );
				setcookie ( $name, '', time() - 60*60*24*1, '/' );
			}
		}
	}
?>