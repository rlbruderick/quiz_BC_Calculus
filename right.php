<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("login.php");  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Right</title>
      <link href="style/index.css" type="text/css" rel="STYLESHEET">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
      <link rel="STYLESHEET" type="text/css" href="style/mc_qa.css">
</head>
<body>
<?
$qname = $_GET['name'];
$corr = $_GET['corr'];
    $link = mysql_connect('68.178.141.173','mcquiz','M!nister1');
    mysql_select_db("mcquiz");
    $userNm = $fgmembersite->UserName();
    $pts = 10;
    $time = Date("Y-m-d");
    $query = "INSERT INTO history (username, qname, pts, date) VALUES ('$userNm', '$qname', '$pts', '$time')";
    $result = mysql_query($query, $link);
    
    $qry2 = "SELECT pts FROM history WHERE username = '$userNm'";
    if ($res2 = mysql_query($qry2, $link)) {
        $p = 0;
        while ($row = mysql_fetch_assoc($res2)) {
        }
    }
?>
    <p><a href='access-controlled.php'>NEXT</a></p>
    <p>Right!  +10 pts</p>
</body>
</html>