function reg(){
    var a = document.getElementById("regusername").value;
    var b = document.getElementById("regpassword").value;
    if (!!a && !!b){
        x1 = new XMLHttpRequest();
        x1.open("GET","register.php?a="+a+"&b="+b,true);
    	x1.send();
        x1.onreadystatechange=function() {
    		if(x1.readyState==4 && x1.status==200) {
    			document.getElementById("checkaja").innerHTML = x1.responseText;
    		}
    	}
        //opening the login page
        window.open("login.html")
    }
    else{
        document.getElementById("checkaja").innerHTML = "failed";
    }
    
}
function regpage(){
    window.open("registerpage.html");
}
function loginpge(){
    window.open("login.html");
}
function login(){
    var username = document.getElementById("logusername");
    var password = document.getElementById("logpassword");
    sessionStorage.setItem("username", username.value);
    sessionStorage.setItem("password", password.value);
    username = username.value;
    password = password.value;
    x1 = new XMLHttpRequest();
    x1.open("GET","login.php?username="+username+"&password="+password,true);
	x1.send();
	x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("checkaja").innerHTML = x1.responseText;
		}
	}
	
	var passlog = "<?php echo $name?>";
}

function findasset(){
    var asset_id = document.getElementById("asset_id").value;
    x1 = new XMLHttpRequest();
    x1.open("GET","findasset.php?asset_id="+asset_id,true);
	x1.send();
	x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("assetshow").innerHTML = x1.responseText;
		}
	}
	
	var passlog = "<?php echo $name?>";
}
function checkingidpass(){
    var username = sessionStorage.getItem('username');
    var password = sessionStorage.getItem('password');
    if (username == null || password == null){
        document.getElementById("blockanythingside").style.display="block";
    }
    else{
    }
}
function greet(){
    document.getElementById("greetings").innerHTML= "Welcome Creators -> " + sessionStorage.getItem('username');
}
function addPge(){
    window.open("addproduct.html")
}
function addS(){
    document.getElementById("checkaja").innerHTML = "In Progress...";
    let asset = document.getElementById("asset").files[0]; //file input
    let formData = new FormData();
    formData.append("asset", asset);
    var asset_name = document.getElementById("asset_name").value;
    var addpusername = sessionStorage.getItem('username');
    var addppassword = sessionStorage.getItem('password');
    formData.append("asset_name", asset_name);
    formData.append("addpusername", addpusername);
    formData.append("addppassword", addppassword);
    x1 = new XMLHttpRequest();
    x1.open("POST","addS.php",true);
    x1.send(formData);
    x1.onreadystatechange=function() {
    	if(x1.readyState==4 && x1.status==200) {
    		document.getElementById("checkaja").innerHTML = x1.responseText;
    	}
    }
    
}
function yourSlist(){
    var susername = sessionStorage.getItem('username');
    var spassword = sessionStorage.getItem('password');
    req1 = new XMLHttpRequest();
    req1.open("GET","yourSlist.php?susername="+susername+"&spassword="+spassword,true);
    req1.send();
    req1.onreadystatechange=function() {
    	if(req1.readyState==4 && req1.status==200) {
    		document.getElementById("yourSlist").innerHTML = req1.responseText;
    	}
    }
}