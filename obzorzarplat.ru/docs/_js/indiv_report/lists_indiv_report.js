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
                            JOB DESCRIPTION
  **********************************************/

  function getJobDescript(jobId) {
                var strURL="/_admin/moduls/indiv_report/lists_ajax/findJobDescript.php?job="+jobId;
		var req = getXMLHTTP();

                                		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
                                                document.getElementById('job_descript').innerHTML=req.responseText;
            document.getElementById('job_descript').style.display="block";
            document.getElementById('loading_job_descript').style.display="none";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_job_descript').style.display="block";
    document.getElementById('job_descript').style.display="none";
    }
			}
                        req.open("GET", strURL, true);
                        req.send(null);
		}
  }



/*********************************************
                            CITY
  **********************************************/

  function getCity(jobId,jtypeId,styleId) {
		var strURL="/_admin/moduls/indiv_report/lists_ajax/findCity.php?job="+jobId+"&jtype="+jtypeId+"&style="+styleId;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('citydiv').innerHTML=req.responseText;
                                                /*document.getElementById('job_descript').innerHTML=req.responseText;*/
            document.getElementById('loading_city').style.display="none";
            document.getElementById('citydiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_city').style.display="block";
    document.getElementById('citydiv').style.display="none";
    }
			}
			req.open("GET", strURL, true);
                        req.send(null);
		}


  }


/*********************************************
                            JOB
  **********************************************/
  
  function getJob(jtypeId,styleId) {		
		var strURL="/_admin/moduls/indiv_report/lists_ajax/findJob.php?jtype="+jtypeId+"&style="+styleId;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('jobdiv').innerHTML=req.responseText;
            document.getElementById('loading_job').style.display="none";
            document.getElementById('jobdiv').style.display="block";
            document.getElementById('job_descript').style.display="none";
            document.getElementById('loading_job_descript').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_job').style.display="block";
    document.getElementById('jobdiv').style.display="none";
    document.getElementById('job_descript').style.display="none";
    document.getElementById('loading_job_descript').style.display="none";
    }
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
  }


  /****************************************************
        CHANGE 2 BLOCKS: CITY AND JOB DESCRIPTION
  ****************************************************/

 function getBlocksCityJobDescript(jobId,jtypeId,styleId)
 {
    getJobDescript(jobId);
    getCity(jobId,jtypeId,styleId);
 }

   /*********************************************
                            SPHERE
  **********************************************/

  function getSphere(jobId,cityId) {
		var strURL="/_admin/moduls/indiv_report/lists_ajax/findSphere.php?city="+cityId+"&job="+jobId;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('spherediv').innerHTML=req.responseText;
            document.getElementById('loading_sphere').style.display="none";
            document.getElementById('spherediv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_sphere').style.display="block";
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

  function getStaff(jobId,cityId,sphereId) {
		var strURL="/_admin/moduls/indiv_report/lists_ajax/findStaff.php?city="+cityId+"&job="+jobId+"&sphere="+sphereId;
                var req = getXMLHTTP();



		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('staffdiv').innerHTML=req.responseText;
             document.getElementById('loading_staff').style.display="none";
            document.getElementById('staffdiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
        else {
    document.getElementById('loading_staff').style.display="block";
    document.getElementById('staffdiv').style.display="none";
    }
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
  }

 /****************************************************
        CHANGE 2 BLOCKS: SPHERE AND STAFF
  ****************************************************/

 function getSphereStaff(jobId,cityId)
 {
    getSphere(jobId,cityId);
    getStaff(jobId,cityId,"0");
 }

 /****************************************************
        CHANGE 3 BLOCKS: JOB, CITY AND JOB DESCRIPTION
  ****************************************************/
 
  function getBlocksJobCityJobDescript(jtypeId,styleId)
 {
    getJob(jtypeId,styleId);
    getCity('',jtypeId,styleId);
 }
