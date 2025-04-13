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

function set_login_sessions ( $user_number, $remember )
	{

		//start the session
		session_start();

		//set the sessions
		$_SESSION['user_number'] = $user_number;
		$_SESSION['logged_in'] = TRUE;

		//do we have "remember me"?
		if ( $remember ) {
			setcookie ( "user_number", $user_number, time() + 60*60*24*7,"/");
		}else{
                    setcookie ( "user_number", $user_number,'0','/');
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

   function checkLogin ( $levels,$link )
	{
       
    session_start ();
		$kt = explode ( ' ', $levels );

		if ($_SESSION['logged_in']== FALSE) {

			$access = FALSE;

			if ( isset ( $_COOKIE['user_number'] ) ) {//if we have a cookie

				$query =  mysqli_query($link,'SELECT id FROM for_users_corporat_login WHERE session_id = "'.$_COOKIE['user_number'].'"');

				if ( mysqli_num_rows($query) == 1 ) {//only one user can match that query

					//let's see if we pass the validation, no monkey business
						//we set the sessions so we don't repeat this step over and over again
						$_SESSION['user_number'] = $_COOKIE["user_number"];
						$_SESSION['logged_in'] = TRUE;
						//now we check the level access, we might not have the permission
						if ( in_array ( get_level_access ( $_SESSION['user_number'],$link ), $kt ) ) {
							//we do?! horray!
							$access = TRUE;
						}
					}
			}
		}
		else {
                        $access = FALSE;
			if ( in_array ( get_level_access ( $_SESSION['user_number'],$link ), $kt ) ) {
                            setcookie ( "user_number", $_SESSION['user_number'],'0','/');

                            //check if cookies enabled
                            if(isset($_COOKIE["user_number"])){
                               $access = TRUE;
                            }else{
                                $access=FALSE;
                            }
			}
                        
		}

		if ( $access == FALSE ) {
			header ( "Location: /login/");
		}
	}

//-------------------------------------------------------------------------------------//
// check the access to the reports

        
function checkReport($report_id,$link){

    $date_now=date('Y-m-d');
    $user=mysqli_query($link,"SELECT id,date_finish from for_users_corporat where id = (select user_id from for_users_corporat_login
                    WHERE session_id='".$_SESSION["user_number"]."') ");

   while($row=mysqli_fetch_array($user)){
        $user_id=$row["id"];
        $date_finish=date('Y-m-d',strtotime($row["date_finish"]));
    }

//Общеотраслевой обзор. Отчеты
    $report_type_tarif_q=mysqli_query($link,"SELECT id FROM for_report_type WHERE id='$report_id' AND (id IN(
    SELECT report_id from for_tarif_reports where tarif_id=(
        SELECT tarif_id from for_users_corporat WHERE id='$user_id'))
    OR id IN(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id'))");
        if(mysqli_num_rows($report_type_tarif_q)=='1' AND $date_finish>=$date_now){return true;}
        else{return false;}
}

//-------------------------------------------------------------------------------------//
// check the access to the survey


function checkSurvey($survey_id,$link){

    $survey_id=intval($survey_id);
    $user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login
                    WHERE session_id='".$_SESSION["user_number"]."' "),0,0);

//Другие обзоры
    $users_survey_q=mysqli_query($link,"SELECT user_id from for_users_corporat_surveys where user_id='$user_id'
                                AND survey_id='$survey_id'");
    if(mysqli_num_rows($users_survey_q)=='1'){
        return true;
    }else{
        return false;
    }
}

	// ------------------------------------------------------------------------

  	/**
	 * get_level_access
	 *
	 * Returns the level access of a given user
	 *
	 * @user_number	varchar
	 * @return 	int
	 */

	function get_level_access ( $user_number,$link )
	{

            $user_number=mysqli_real_escape_string($link,  $user_number);
            $row = mysqli_result(mysqli_query($link,"SELECT levelaccess FROM for_users_corporat WHERE id = (SELECT user_id from for_users_corporat_login
                                            WHERE session_id='$user_number')"),0,0);
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
		if ( isset ( $_COOKIE['user_number'] ) ) {
			/**
			 * uncomment the following line if you wish to remove all cookies
			 * (don't forget to comment ore delete the following 2 lines if you decide to use clear_cookies)
			 */
			//clear_cookies ();
			setcookie ( "user_number", '', time() - 60*60*24*7,"/");
		}

		//redirect the user to the default "logout" page
		header ( "Location: /login/" );
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
				setcookie ( $name, '', time() - 60*60*24*7 );
				setcookie ( $name, '', time() - 60*60*24*7, '/' );
			}
		}
	}
?>