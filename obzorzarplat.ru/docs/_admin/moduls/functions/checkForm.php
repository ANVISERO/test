<?

function valid_email($email){
  return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
}

// ------------------------------------------------------------------------
	
	/**
	 * Create a Random String
	 *
	 * Useful for generating passwords or hashes.
	 *
	 * @access	public
	 * @param	string 	type of random string.  Options: alunum, numeric, nozero, unique
	 * @param	none
	 * @return	string
	 */
	 
	 
	function random_string ( $type = 'alnum', $len = 8 )
	{					
		switch ( $type )
		{
			case 'alnum'	:
			case 'numeric'	:
			case 'nozero'	:
			
					switch ($type)
					{
						case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							break;
						case 'numeric'	:	$pool = '0123456789';
							break;
						case 'nozero'	:	$pool = '123456789';
							break;
					}
	
					$str = '';
					for ( $i=0; $i < $len; $i++ )
					{
						$str .= substr ( $pool, mt_rand ( 0, strlen ( $pool ) -1 ), 1 );
					}
					return $str;
			break;
			case 'unique' : return md5 ( uniqid ( mt_rand () ) );
			break;
		}
	}

	// ------------------------------------------------------------------------
  
  
	/**
	 * Check unique
	 *
	 * Performs a check to determine if one parameter is unique in the database
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
 
 
	function checkUnique ($tbl_name,$field, $compared )
	{

		$query =mysqli_query($link, "SELECT * FROM ".$tbl_name." WHERE " . $field . " = " . $compared);

		if (mysqli_num_rows($query)==1) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	// ------------------------------------------------------------------------
	
	/**
	 * Validate if numeric
	 *
	 * Validates string against numeric characters
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
 
 
	function numeric ( $str )
	{
		return ( ! ereg ( "^[0-9\.]+$", $str ) ) ? FALSE : TRUE;
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Validate if alfa numeric
	 *
	 * Validates string against alpha numeric characters
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
 
	function alpha_numeric ( $str )
	{
		return ( ! preg_match ( "/^([-a-z0-9])+$/i", $str ) ) ? FALSE : TRUE;
	}
	
	// ------------------------------------------------------------------------

?>