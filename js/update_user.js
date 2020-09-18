var form = document.forms.update;
var uname = document.getElementById("uname");
var old_pass = document.getElementById("old_pass");

form.onload = check_username();
form.omload = check_password();    

function check_username(){
uname.onblur =function(){

    var name=uname.value.toUpperCase();
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

function check_password(){
    old_pass.onblur =function(){

        var name=uname.value.toUpperCase();
        var old=old_pass.value;
        var param="name="+name+"&pass="+old;
        var xhr =new XMLHttpRequest();
        xhr.open('POST','../check_password_ajax.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(param);
        xhr.onload = function(){
            if(this.status == 200){
                document.getElementById("old_pass_err").innerHTML = this.responseText;
            }else if(this.status == 404){
              console.log("404 - NOT FOUND");
            }
          };
    }
    }