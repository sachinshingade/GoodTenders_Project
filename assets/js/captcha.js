	//Captcha JS File 

	function validation()
	{
		if(document.form1.chk.value=="")
		{
			document.getElementById("error").innerHTML="Enter Captcha!";
			document.form1.chk.focus();
			return false;
		}

		if(document.form1.ran.value!=document.form1.chk.value)
		{
			document.getElementById("error").innerHTML="Captcha Not Matched!";
			document.form1.chk.focus();
			return false;
		}
		return true;
	}

	function validation_log()
	{
		if(document.form_log.chk.value=="")
		{
			document.getElementById("error").innerHTML="Enter Captcha!";
			document.form_log.chk.focus();
			return false;
		}

		if(document.form_log.ran.value!=document.form_log.chk.value)
		{
			document.getElementById("error").innerHTML="Captcha Not Matched!";
			document.form_log.chk.focus();
			return false;
		}
		return true;
	}

	function validation_publish()
	{
		if(document.publish.chk.value=="")
		{
			document.getElementById("error").innerHTML="Enter Captcha!";
			document.publish.chk.focus();
			return false;
		}

		if(document.publish.ran.value!=document.publish.chk.value)
		{
			document.publish.chk.focus();
			document.getElementById("error").innerHTML="Captcha Not Matched!";
			document.publish.chk.focus();
			return false;
		}
		return true;
	}

	function captch() 
	{
    	var x = document.getElementById("ran")
    	x.value = Math.floor((Math.random() * 10000) + 1);
	}