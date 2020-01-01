<?PHP
require_once("./include/membersite_config.php");
if(isset($_POST['submitted'])) {
   if($fgmembersite->Login()) {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link href="style/index.css" type="text/css" rel="STYLESHEET">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-44838236-1', 'jilleen.co');
  ga('send', 'pageview');
</script>
</head>
<body>

<!-- Form Code Start -->
<div id='fg_membersite'>
   <form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
      <fieldset>
         <legend>Login</legend>
         <input type='hidden' name='submitted' id='submitted' value='1'/>
         <div class='short_explanation'>* required fields</div>
         <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
         <div class='container'>
            <label for='username' >UserName*:</label><br/>
            <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="32" /><br/>
            <span id='login_username_errorloc' class='error'></span>
         </div>
         <div class='container'>
            <label for='password' >Password*:</label><br/>
            <input type='password' name='password' id='password' maxlength="32" /><br/>
            <span id='login_password_errorloc' class='error'></span>
         </div>
         <div class='container'>
            <input type='submit' name='Submit' value='Submit' />
         </div>
         <div class='short_explanation'><a href='reset-pwd-req.php' class="btn-blue">Forgot Password</a></div>
         <div class='short_explanation'><a href='register.php' class="btn-blue">Register</a></div>
      </fieldset>
   </form>
   <!-- client-side Form Validations:
   Uses the excellent form validation script from JavaScript-coder.com-->
   <script type='text/javascript'>
   // <![CDATA[
       var frmvalidator  = new Validator("login");
       frmvalidator.EnableOnPageErrorDisplay();
       frmvalidator.EnableMsgsTogether();
       frmvalidator.addValidation("username","req","Please provide your username");    
       frmvalidator.addValidation("password","req","Please provide the password");
   // ]]>
   </script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->
</body>
</html>