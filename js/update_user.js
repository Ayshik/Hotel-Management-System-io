var form = document.forms.update;
var old_pass = document.getElementById("old_pass");
form.onload = check_password();

function check_password(){
    old_pass.onblur =function(){
        var old=old_pass.value;
        var param="pass="+old;
        var xhr =new XMLHttpRequest();
        xhr.open('POST','../check_password_ajax.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(param);
        xhr.onload = function(){
            if(this.status == 200){
                document.getElementById("error_message").innerText = this.responseText;
            }else if(this.status == 404){
              console.log("404 - NOT FOUND");
            }
          };
    }
    }