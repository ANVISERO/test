function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				req = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }

  
  /*********************************************
                            SPHERE
  **********************************************/
  
  function getSphere(cityId) {		
		var strURL="/_admin/moduls/reports/summary/lists_ajax/findSphere.php?city="+cityId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('spherediv').innerHTML=req.responseText;
            document.getElementById('loading').style.display="none";
            document.getElementById('spherediv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading').style.display="block";
    document.getElementById('spherediv').style.display="none";
    }				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }
  
  /*********************************************
                            STAFF
  **********************************************/
  
  function getStaff(cityId) {		
		var strURL="/_admin/moduls/reports/summary/lists_ajax/findStaff.php?city="+cityId;
                var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('staffdiv').innerHTML=req.responseText;
             document.getElementById('loading').style.display="none";
            document.getElementById('staffdiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
        else {
    document.getElementById('loading').style.display="block";
    document.getElementById('staffdiv').style.display="none";
    }			
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }
  
  /*********************************************
                            TURNOVER
  **********************************************/
  
  function getTurnover(cityId) {		
		var strURL="/_admin/moduls/reports/summary/lists_ajax/findTurnover.php?city="+cityId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('turnoverdiv').innerHTML=req.responseText;
             document.getElementById('loading').style.display="none";
            document.getElementById('turnoverdiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
        else {
    document.getElementById('loading').style.display="block";
    document.getElementById('turnoverdiv').style.display="none";
    }			
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }

   /*********************************************
                            LOAD BLOCK
  **********************************************/

  function loadBlock(Id,user_id) {
		var strURL="/_admin/moduls/reports/summary/lists_ajax/loadBlock.php?Id="+Id+"&user_id="+user_id;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('block').innerHTML=req.responseText;
             document.getElementById('loading_block').style.display="none";
            document.getElementById('block').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
        else {
    document.getElementById('loading_block').style.display="block";
    document.getElementById('block').style.display="none";
    }
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
  }

    /*********************************************
                            JOBS
  **********************************************/

  function getJobs(jtype_id,city_id,factor,factor_id,user_id) {
		var strURL="/_admin/moduls/reports/summary/lists_ajax/findJobs.php?jtype_id="+jtype_id+"&city_id="+city_id+"&factor="+factor+"&factor_id="+factor_id+"&user_id="+user_id;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById(jtype_id).innerHTML=req.responseText;
             document.getElementById(jtype_id+'loading').style.display="none";
            document.getElementById(jtype_id).style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
        else {
    document.getElementById(jtype_id+'loading').style.display="block";
    document.getElementById(jtype_id).style.display="none";
    }
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
  }