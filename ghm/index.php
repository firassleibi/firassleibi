<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GHM Form</title>
</head>

<body>
	<form onSubmit="return validateForm()">
    	<input name="name" id="name" placeholder="Name" type="text" required/>
        <input name="email" id="email" placeholder="Email" type="email" required/>
        <br/><br/>
        <textarea id="textArea" name="textArea" placeholder="Your text here..."></textarea>
        <br/><br/>
        <label>Yes</label><input value="yes" id="radio1" type="radio" name="radioGroup1" checked/>
        <label>No</label><input value="no" id="radio2" type="radio" name="radioGroup1"/>
        <br/><br/>
        <p>Please check two only:</p>
        <br/>
        <label>Option 1</label><input value="option1" class="messageCheckbox" type="checkbox" name="checkGroup1"/>
        <label>Option 2</label><input value="option2" class="messageCheckbox" type="checkbox" name="checkGroup1"/>
        <label>Option 3</label><input value="option3" class="messageCheckbox" type="checkbox" name="checkGroup1"/>
        <br/><br/>
        <div id="validateBox"></div>
        <input name="submit" type="submit" value="submit"/>
    </form>
    <script src="js/main.js"></script>
</body>
</html>
