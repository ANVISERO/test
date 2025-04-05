/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	var code = $("#code");
	var email = $("#email");
	
	//On blur
	email.blur(validateEmail);
	code.blur(validateCode);
	//On key press
	email.keyup(validateEmail);
	code.keyup(validateCode);

	//On Submitting
	form.submit(function(){
		if(validateCode() & validateEmail())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("Пожалуйста, укажите верный адрес электронной почты.");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Пожалуйста, укажите верный адрес электронной почты.");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validateCode(){
		//if it's NOT valid
		if(code.val().length < 4){
			code.addClass("error");
			codeInfo.text("We want names with more than 3 letters!");
			codeInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			code.removeClass("error");
			codeInfo.text("What's your name?");
			codeInfo.removeClass("error");
			return true;
		}
	}
	
});