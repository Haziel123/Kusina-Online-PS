function check(form){
		if(form.uname.value == "" || form.pwd.value == ""){
			alert("Both fields should not be blank.")
			return false;
		}
			if(form.uname.value == "Admin" && form.pwd.value == "Admin"){
				window.open('home.php')
				
				
			}
			else{
				alert("Invalid username and password")
			}
		}