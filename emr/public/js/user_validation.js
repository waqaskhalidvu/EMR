function validate(){
			var name = document.getElementById("username").value;
			var pass = document.getElementById("password").value;
			
			if (name == 'doctor' && pass == 'doctor'){
					window.location = "doctor_home";
				}else if(name == 'receptionist' && pass == 'receptionist'){
					window.location = "receptionist_home";
					
				}else if(name == 'lab_manager' && pass == 'lab_manager'){
					window.location = "labmanager_home";
					
				}else if(name == 'accountant' && pass == 'accountant'){
					window.location = "accountant_home";
					
				}else if(name == 'admin' && pass == 'admin'){
					window.location = "admin_home";
					
				}else{
					alert("Invalid UserName or Password!");
				}
				
			}