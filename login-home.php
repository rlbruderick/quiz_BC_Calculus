<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>MC Quizzes</title>
      <link href="style/index.css" type="text/css" rel="STYLESHEET">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<div id='fg_membersite_content'>
<h2>Multiple-Choice Quizzes</h2>
Welcome back, <?= $fgmembersite->UserFullName(); ?>!
<br>
<a class="btn-green" href="access-controlled.php">Calculus (BC) Quiz</a>
<br><br>
<p><a href='change-pwd.php' class="btn-blue">Change Password</a></p>
<p><a href='logout.php' class="btn-blue">Logout</a></p>
</div>
</body>
</html>