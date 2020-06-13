//First Letter Checking.....
function first_letter_check(name){
		if(name.charCodeAt(0) <= 57 || (name.charCodeAt(0)>=97 && name.charCodeAt(0)<=122)){
			return true;
		}
}

//Digit Checking
function digit_check(num){
	for(var i=0;i<num.length;i++){
		if(num.charCodeAt(i)<48)
		{
			return true;
		}
		else if(num.charCodeAt(i)>57)
		{
			return true;
		}
	}
}

//Letter Checking
function letter_check(name){
	for(var i=0;i<name.length;i++){
		if(name.charCodeAt(i)>=48 && name.charCodeAt(i)<=57){
			return true;
	   }
   }
}

//SPECIAL cheracter check...........
function special_character_check(name){
	for(var i=0;i<name.length;i++){
		if((name.charCodeAt(i)>=0 && name.charCodeAt(i)<=45) || (name.charCodeAt(i)==47) || (name.charCodeAt(i)>=58 && name.charCodeAt(i)<=64) || (name.charCodeAt(i)>=91 && name.charCodeAt(i)<=96) || (name.charCodeAt(i)>=123)){
			return true;;
		}
	}
}

//Email validation
function email_check(email){
	var count=0;
	var countLetter=0;
	var countLetter2=0;
	var valid=1;
	var countDot=0;
	for (var i=0; i < email.length ; i++) { 
		if(email.charCodeAt(i)==64){
			if(i<1){
				valid=0;
				break;
		    }
			else{
				for (var j=i; j<email.length ; j++) {
					if(email.charCodeAt(j)==46){
						countDot++;
						for (var k=j-1; k>i ; k--) {
							countLetter++;
						}
						for (var k=j+1; k<email.length ; k++) {
							countLetter2++;
						}
					}
				}   
				if(countLetter<1 || countDot>1 || countLetter2<1){
					valid=0;
				}
			}
		}
		if(email.charCodeAt(i)==46){
			for (var j=0; j < email.length ; j++) { 
				if(email.charCodeAt(j)==64){
					count=1;  
				}
			}
			if(count!=1){
				count=0;
				valid=0;
			}
		}  
	}
				
	for (var i=0; i <email.length ; i++) { 
		if(email.charCodeAt(i)==64 || email.charCodeAt(i)==46){
			count++;
		}
	}
	if(count==0 && valid==1){
		valid=0;
	}
	if (valid==1 && count>1 && countDot==1) {
		return false;
	}
	else{			
		return true;	
	}
}




function validation(){
	var name=document.getElementById("name");
	var email=document.getElementById("email");

	//First Name 
	if(name.value==""){
		document.getElementById("name_err").innerHTML = "Can not be empty";
	}
	else if(first_letter_check(name.value)){
		document.getElementById("name_err").innerHTML = "Must start with uppercase";
	}
	else if(special_character_check(name.value)){
		document.getElementById("name_err").innerHTML = "Cannot contain special character";
	}
	else if(letter_check(name.value)){
		document.getElementById("name_err").innerHTML = "Cannot contain number";
	}
	else{
		document.getElementById("name_err").innerHTML = "";
		document.getElementById("name").innerHTML = name;
	}

	
	//Email
	if(email.value==""){
		document.getElementById("email_err").innerHTML = "Can not be empty";
	}
	else if(email_check(email.value)){
		document.getElementById("email_err").innerHTML = "invalid";
	}
	else{
		document.getElementById("email_err").innerHTML = "";
		document.getElementById("email").innerHTML = email;
	}
	

	


}