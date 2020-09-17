var form = document.forms.registration;
var uname = document.getElementById("uname");

form.onload = check_username();    

function check_username(){
uname.onblur =function(){

    var name=uname.value;
    console.log(name);
    var param="name="+name;
    var xhr =new XMLHttpRequest();
    xhr.open('POST','../check_username_ajax.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(param);
    xhr.onload = function(){
        if(this.status == 200){
            document.getElementById("uname_err").innerHTML = this.responseText;
        }else if(this.status == 404){
          console.log("404 - NOT FOUND");
        }
      };
}
}

form.onsubmit= function(){
    var name = document.getElementsByName("name")[0].value;
    var email = document.getElementsByName("Email")[0].value;
    var uname = document.getElementsByName("uname")[0].value;
    var pass = document.getElementsByName("pass")[0].value;
    var con_pass = document.getElementsByName("con_pass")[0].value;
    var phone = document.getElementsByName("phone")[0].value;
    var nid = document.getElementsByName("nid")[0].value;
    var address = document.getElementsByName("address")[0].value;
    

    if(name == ""){
        document.getElementById("name_err").innerHTML = "name can not be empty";
        return false;
    }
    else{
        document.getElementById("name_err").innerHTML = "";
    }
    if(email == ""){
        document.getElementById("email_err").innerHTML = "email can not be empty";
        return false;
    }else{
        document.getElementById("email_err").innerHTML = ""; 
    }
    if(uname == ""){
        document.getElementById("uname_err").innerHTML = "username can not be empty";
        return false;
    }else{
        document.getElementById("uname_err").innerHTML = "";
    }
    if(pass == ""){
        document.getElementById("pass_err").innerHTML="password can not be empty";
        return false;
    }else{
        document.getElementById("pass_err").innerHTML = ""; 
    }
    if(con_pass == ""){
        document.getElementById("conf_pass_err").innerHTML = "confirm password can not be empty";
        return false;
    }else{
        document.getElementById("conf_pass_err").innerHTML = "";
    }
    if(nid == ""){
        document.getElementById("nid_err").innerHTML = "nid can not be empty";
        return false;
    }else{
        document.getElementById("nid_err").innerHTML = ""; 
    }
    if(phone == ""){
        document.getElementById("phn_err").innerHTML = "phone can not be empty";
        return false;
    }else{
        document.getElementById("phn_err").innerHTML = "";
    }
    if(address == ""){
        document.getElementById("add_err").innerHTML = "address can not be empty";
        return false;
    }else{
        document.getElementById("add_err").innerHTML = "";
    }
    if(pass != con_pass){
        document.getElementById("pass_err").innerHTML = "password and confirm password does not match"; 
        return false;
    }
};





