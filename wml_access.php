<!DOCTYPE html>
<html lang='en'>
  <head>
      <meta charset="UTF-8" /> 
      <title>World Music Listing: Forgot Your Password?</title>
      <link rel="stylesheet" type="text/css" href="css/login_style.css" />

  </head>
  <body onload="load()">
  <form class="jotform-form" action="forgetpasswordcontroller.php" id="frgtpassform"  method="post">
      <h1>World Music Listing Password Reset</h1>
      <div class="inset">
        <p>
          <label for="vemail">E-mail</label>
          <input type="text" class="form-textbox validate[Email]" id="vemail" name="vemail" size="30" value="" />
        </p>
        <p>
          <label>Please provide answer</label>
        </p>
        <p>
          <div id="cid_10" class="form-input">
            <label id="rndnolbl" name="rndnolbl"></label>
            <input type="text" id="rndnoans" name="rndnoans" />
        </div>
        </p>
      </div>
      <p class="p-container">
        <!-- <input type="button" value="Continue" id="go" name="btncontinue"  onclick="checkuname()" />
         <input type="button" value="Clear" onclick="clearfields();" />    
        <a href="wml_access.php">Forgot password ?</a> -->
        <input type="button" name="btncontinue" id="btncontinue" value="Continue" onclick="checkuname()">
      </p>
      <div class="inset" style="display:none" id="secquesansDiv">
        <strong>Secret Question</strong>
        <p>
          <label id="secquestion" name="secquestion">  </label>
        </p>
        <p>
          <label for="vsecans">Answer</label>
          <input type="text"  class="form-textbox" data-type="input-textbox" id="vsecans" name="vsecans" size="20" value="" />
        </p>
        <p>
          <label for="vpassword">New Password</label>
          <input type="password"  class="form-textbox" data-type="input-textbox" id="vpassword" name="vpassword" size="20" value="" />
        </p>
        <p>
          <label for="vrpassword">Re-enter Password</label>
          <input type="password"  class="form-textbox" data-type="input-textbox" id="vrpassword" name="vrpassword" size="20" value="" />
        </p>
        <p class="p-container">
          <input type="button" name="btnsubmit" id="btnsubmit" value="Submit" onclick="return checkuname()">
        </p>
      </div>
      <input type="hidden" name="flag" id="flag" value="0" />
      <input type="hidden" name="origpassword" id="origpassword" value="" />
    </form>

  </body>
  <script src="js/encrypt_sha1.js"></script>
  <script>
    var rndno1="";
    var rndno2="";
    var vemail="";
    
    function load(){
      rndno1 = Math.floor((Math.random() * 10) + 1);
      rndno2 = Math.floor((Math.random() * 10) + 1);
      document.getElementById("rndnolbl").innerHTML=rndno1+" + "+rndno2;
    }

    function clearfields(){
      document.getElementById("vpassword").value="";
      document.getElementById("vrpassword").value="";

      document.getElementById("flag").value="0";
      vemail=document.getElementById("vemail").value="";
      document.getElementById("vemail").readOnly=false;
      document.getElementById("rndnoans").value="";
      document.getElementById("vsecans").value
      document.getElementById("secquestion").innerHTML="";
      document.getElementById("secquesansDiv").style.display="none";

      document.getElementById("rndnoans").disabled=false;
      document.getElementById("btncontinue").disabled=false;
    }


  function checkuname()
  {

    if(document.getElementById("vemail").value=="")
    {
      alert("Please enter email");
      return false;
    }
    else if((document.getElementById("rndnoans").value)!=(rndno1+rndno2))
    {
      alert("Captcha answer is not correct");
      return false;
    }

    var xmlhttp;


    var vpassword=document.getElementById("vpassword").value;
    var vrpassword=document.getElementById("vrpassword").value;
    var parameters="";
    var vflag=document.getElementById("flag").value;
    if(vflag==0){
      vemail=document.getElementById("vemail").value;
      parameters="vemail="+vemail+"&flag="+vflag;
    }
    if(vflag==1){
      var vsecans=document.getElementById("vsecans").value;
      if(vsecans==""){
        alert("Please provide answer");
        return false;
      }
      else if( vpassword=="" || vrpassword=="")
      {
        alert("Please enter password") ;
        return false;
      }
      else if( vpassword!=vrpassword)
      {
        alert("Password does not match");
        return false;
      }
      
      parameters="vemail="+vemail+"&flag="+vflag+"&vsecans="+vsecans;
    }


    if (window.XMLHttpRequest)
    {
      xmlhttp=new XMLHttpRequest();
    }
    else
    {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        if(vflag==0 ){
          if(xmlhttp.responseText==-1){
            alert("Enter correct email");
            return false;
          }
          else{
            document.getElementById("secquestion").innerHTML=xmlhttp.responseText;
            document.getElementById("secquesansDiv").style.display="block";
            document.getElementById("flag").value="1";
            document.getElementById("vemail").readOnly =true;
            document.getElementById("rndnoans").disabled=true;
            document.getElementById("btncontinue").disabled=true;
          }
        }
        else{
          if(vflag==1 && xmlhttp.responseText==1){
            document.getElementById("origpassword").value=document.getElementById("vpassword").value;
            var encryp_result=calcSHA1(document.getElementById("vpassword").value);
            document.getElementById("vpassword").value=encryp_result;
            document.getElementById("vrpassword").value=encryp_result;

            document.getElementById("flag").value="2";
            document.getElementById("frgtpassform").submit();
            return true;
          }
          else{
            alert("Incorrect Information");            
            return false;
          }
        }
      }
    }
    xmlhttp.open("POST","forgetpasswordcontroller.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send(parameters);
    return false;
  }


</script>
</html>
