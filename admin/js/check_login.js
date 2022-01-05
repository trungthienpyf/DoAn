




function kiemtra(){
	let email = document.getElementById('input_email').value;
	let password = document.getElementById('input_pass').value;
	document.getElementById('input_email').oninput= function(){
		document.getElementById('warning_email').innerText='';
	document.getElementById('input_email').classList.remove('warning');
	}	
	let check_error=false;
	if(email.length===0){
		document.getElementById('warning_email').innerText='Hãy nhập email';	
		document.getElementById('input_email').classList.add('warning');
		check_error =true;
	}else{
		let regaxMail=/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			if(!regaxMail.test(email)){
				document.getElementById('warning_email').innerText='Email không hợp lệ';
				document.getElementById('input_email').classList.add('warning');
				check_error =true;
			}else{
				document.getElementById('warning_email').innerText='';
				document.getElementById('input_email').classList.remove('warning');

			}
	}
	document.getElementById('input_pass').oninput= function(){
		document.getElementById('warning_pass').innerText='';
	document.getElementById('input_email').classList.remove('warning');
	}
	if(password.length===0){
		document.getElementById('warning_pass').innerText='Hãy nhập password';	
		check_error =true;
		
	}else{
			document.getElementById('warning_pass').innerText='';
			document.getElementById('warning_pass').classList.remove('warning');
	}
	if(check_error){
		return false;
	}
}

