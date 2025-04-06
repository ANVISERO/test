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
                   TARIF REPORTS
  **********************************************/
  
  function getReports(tarifId,userId) {
		var strURL="/_admin/pages/users-b2b-new/lists_ajax/findReports.php?tarifId="+tarifId+"&userId="+userId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('reportsdiv').innerHTML=req.responseText;
            document.getElementById('loading').style.display="none";
            document.getElementById('reportsdiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading').style.display="block";
    document.getElementById('reportsdiv').style.display="none";
    }				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }