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
		$_SESSION['admin_user_id'] = $user_id;
                $_SESSION['admin_psw']=md5($password);
		$_SESSION['admin_logged_in'] = TRUE;

		//do we have "remember me"?
		if ( $remember ) {
			setcookie ( "admin_cookie_id", $user_id, time() + 60*60*24*1,"/_admin");
			setcookie ( "admin_authenticate", md5 ($password), time() + 60*60*24*1,"/_admin");
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
    global $link;
    session_start ();
		$kt = explode ( ' ', $levels );

		if ($_SESSION['admin_logged_in']== FALSE) {

			$access = FALSE;
                        $error="don't login";

			if ( isset ( $_COOKIE['admin_cookie_id'] ) ) {//if we have a cookie

				$query =  mysqli_query($link,'SELECT * FROM for_users_corporat WHERE id = '.$_COOKIE['cookie_id']);

				if ( mysqli_num_rows($query) == 1 ) {//only one user can match that query
					while($row = mysqli_fetch_array($query)){

					//let's see if we pass the validation, no monkey business
					if ( $_COOKIE['admin_authenticate'] == $row["password"] ) {
						//we set the sessions so we don't repeat this step over and over again
						$_SESSION['admin_user_id'] = $row["id"];
                                                $_SESSION['admin_psw']=$row["password"];
						$_SESSION['admin_logged_in'] = TRUE;
						}
						//now we check the level access, we might not have the permission
						if ( in_array ( get_level_access ( $_SESSION['admin_user_id'], $_SESSION['admin_psw'] ), $kt ) ) {
							//we do?! horray!
							$access = TRUE;
						}
					}
				}
			}else{$error.=" and cookie unset";}
		}
		else {
			$access = FALSE;
                        $error="not access";
                        
			if ( in_array ( get_level_access ( $_SESSION['admin_user_id'], $_SESSION['admin_psw'] ), $kt ) ) {
				$access = TRUE;
			}
		}

		if ( $access == FALSE ) {
                    header ( "Location: /_admin/login/");
		}
	}


	// ------------------------------------------------------------------------

  	/**
	 * get_level_access
	 *
	 * Returns the level access of a given user
	 *
	 * @param	string
	 * @access	public
	 * @return 	string
	 */

	function get_level_access ( $user_id, $password )
	{
    global $link;
		$row = mysqli_result(mysqli_query($link,"SELECT levelaccess FROM for_users_corporat WHERE id = '$user_id ' AND password='$password'"),0,0);
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
		if ( $_SESSION['admin_logged_in'] == TRUE )
		{
			//unset the sessions (all of them - array given)
			unset ( $_SESSION['admin_logged_in'] );
                        unset ( $_SESSION['admin_user_id'] );
                        unset($_SESSION['admin_psw']);
			//destroy what's left
			session_destroy ();
		}

		//It is safest to set the cookies with a date that has already expired.
		if ( isset ( $_COOKIE['admin_cookie_id'] ) && isset ( $_COOKIE['admin_authenticate'] ) ) {
			/**
			 * uncomment the following line if you wish to remove all cookies
			 * (don't forget to comment ore delete the following 2 lines if you decide to use clear_cookies)
			 */
			//clear_cookies ();
			setcookie ( "admin_cookie_id", '', time() - 60*60*24*1,"/_admin");
			setcookie ( "admin_authenticate", '', time() - 60*60*24*1,"/_admin" );
		}

		//redirect the user to the default "logout" page
		header ( "Location: /_admin/login/" );
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
				setcookie ( $name, '', time() - 60*60*24*1, '/_admin' );
			}
		}
	}
?>