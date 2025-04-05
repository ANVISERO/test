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
                            Period
  **********************************************/
  
  function getPeriod(cityId) {		
		var strURL="/_admin/moduls/preds/market_tendencies/lists_MarketTend/findPeriod.php?city="+cityId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('perioddiv').innerHTML=req.responseText;
            document.getElementById('loading').style.display="none";
            document.getElementById('perioddiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading').style.display="block";
    document.getElementById('perioddiv').style.display="none";
    }				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }
  