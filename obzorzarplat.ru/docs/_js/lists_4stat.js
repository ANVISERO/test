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
                            Job's TYPE
  **********************************************/
  
  function getJtype(cityId,userId) {
		var strURL="/_admin/moduls/statistics/lists_4stat/findJtype.php?city="+cityId+"&user_id="+userId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('jtypediv').innerHTML=req.responseText;
            document.getElementById('loading_jtype').style.display="none";
            document.getElementById('jtypediv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_jtype').style.display="block";
    document.getElementById('jtypediv').style.display="none";
    }				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
  }

  /*********************************************
                            Job's GROUP
  **********************************************/

  function getJgroup(cityId,factor,factorId,jtypeId) {
		var strURL="/_admin/moduls/statistics/lists_4stat/findJgroup.php?city="+cityId+"&factor="+factor+"&factorId="+factorId+"&jtypeId="+jtypeId;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('jgroupdiv').innerHTML=req.responseText;
            document.getElementById('loading_jgroup').style.display="none";
            document.getElementById('jgroupdiv').style.display="block";
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
    else {
    document.getElementById('loading_jgroup').style.display="block";
    document.getElementById('jgroupdiv').style.display="none";
    }
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
  }

    /*********************************************
                            JOBS
  **********************************************/

  function getJobs(jtype_id,city_id,user_id) {
		var strURL="/_admin/moduls/statistics/lists_4stat/findJobsInJtypeGroup.php?jtype_id="+jtype_id+"&city_id="+city_id+"&user_id="+user_id;
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

   /*********************************************
         Functions for checking lists
  **********************************************/
  function jqCheckAll( id, name, flag )
{
	if (flag == 0)
	{
		$("form#" + id + " INPUT[@name=" + name + "][type='checkbox']").attr('checked', false);
	}
	else
	{
		$("form#" + id + " INPUT[@name=" + name + "][type='checkbox']").attr('checked', true);
	}
}
$('#checkAllAuto').click(
	function()
	{
		$("INPUT[type='checkbox']").attr('checked', $('#checkAllAuto').is(':checked'));
	}
)
function jqCheckAll2( id, div_id)
{
	$( "div#" + div_id + " INPUT[type='checkbox']").attr('checked', $('#' + id).is(':checked'));
}