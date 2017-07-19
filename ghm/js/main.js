function validateForm(){
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var textArea = document.getElementById('textArea').value;
	var validateBox = document.getElementById('validateBox');
	var textAreaCount = textArea.length;
	var radioSelected;
	var inputElements = document.getElementsByClassName('messageCheckbox');
	var checkedTotal = 0;
	var checkedValues="";
	var submit = true;
	for(var i=0; inputElements[i]; ++i){
		
		  if(inputElements[i].checked){
			   checkedValues += inputElements[i].value+" ";
			   checkedTotal++;
		  }
	}
	if(checkedTotal!==2){
		validateBox.innerHTML = "You have to check two checkbox only";
		submit = false;
	}
	if (document.getElementById('radio1').checked) {
	  radioSelected = document.getElementById('radio1').value;
	}
	else if(document.getElementById('radio2').checked) {
	  radioSelected = document.getElementById('radio2').value;
	}
	if(!/^[a-zA-Z]+$/.test(name)){
		validateBox.innerHTML = "Only letters are allowed in name.";
		submit = false;
	}
	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
		validateBox.innerHTML = "Email is not valid.";
		submit = false;
	}
	if(textAreaCount<200||textAreaCount>400){
		validateBox.innerHTML = "Text Area length should be between 200 and 400";
		submit = false;
	}
	if(submit){
		validateBox.innerHTML = "Submitting please wait.";
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  validateBox.innerHTML = this.responseText;
		}
		};
		xhttp.open("POST", "post.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("name="+name+"&email="+email+"&text_area="+textArea+"&radio_selected="+radioSelected+"&check_boxs="+checkedValues);
	}

	
	return false;
}
