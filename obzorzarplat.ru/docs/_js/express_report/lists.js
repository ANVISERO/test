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
                var strURL="/_admin/moduls/express_report/lists_ajax/findJobDescript.php?job="+jobId;
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
  
  function getCity(jobId,jtypeId) {
		var strURL="/_admin/moduls/express_report/lists_ajax/findCity.php?job="+jobId+"&jtype="+jtypeId;
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

  /****************************************************
        CHANGE 2 BLOCKS: CITY AND JOB DESCRIPTION
  ****************************************************/

 function getBlocksCityJobDescript(jobId,jtypeId)
 {
    getJobDescript(jobId);
    getCity(jobId,jtypeId);
 }
  

/*********************************************
                            JOB
  **********************************************/
  
  function getJob(jtypeId) {		
		var strURL="/_admin/moduls/express_report/lists_ajax/findJob.php?jtype="+jtypeId;
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
        CHANGE 3 BLOCKS: JOB, CITY AND JOB DESCRIPTION
  ****************************************************/

 function getBlocksJobCityJobDescript(jtypeId)
 {
    getJob(jtypeId);
    getCity('',jtypeId);
 }

 function testform(){
text="";
if(document.zp.jtype.value==""){text=text+'Должностную группу;\n';}
if(document.zp.job.value==""){text=text+'Должность;\n';}
if(document.zp.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.zp.action='/servis/zp/?step=2';
document.zp.submit();
}}

    function testform1(){
text="";
if(document.zp.jtype.value==""){text=text+'Должностную группу;\n';}
if(document.zp.job.value==""){text=text+'Должность;\n';}
if(document.zp.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.zp.action='/servis/otchet/';
document.zp.submit();
}}