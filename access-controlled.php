<?PHP
//      This is a sample access-controlled page.
//      You can only get to it once properly logged-in.
//      To make your own access-controlled pages, 
//      Copy paste this PHP code and use a php extension.
//  ------------------------------------------------------
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("login.php");  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>An Access Controlled Page</title>
      <link href="style/index.css" type="text/css" rel="STYLESHEET">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
      <link rel="STYLESHEET" type="text/css" href="style/mc_qa.css">
      <script>
          var endtim = 11000;   //  count down from 10 seconds for testing
          var endtime = 121000;   //  count down from 120 seconds = 2 minutes
          var end = new Date('28 Nov 2013 08:00:00'); // set expiry date and time..
          var end2 = new Date();
          var _second = 1000;
          var _minute = _second * 60;
          var _hour = _minute * 60;
          var _day = _hour * 24;

          setInterval(showRemaining, 1000);

          function showRemaining() {
              var now = new Date();
              var timeleft = end2 - now;
              var distance = timeleft + endtime;
              if (distance < 0 ) {           //  Time's Up!
                document.getElementById('countdown').innerHTML = 'DONE!';
                window.location = "timeout.php";
                return;
              }
              var days = Math.floor(distance / _day);
              var hours = Math.floor( (distance % _day ) / _hour );
              var minutes = Math.floor( (distance % _hour) / _minute );
              var seconds = Math.floor( (distance % _minute) / _second );
              hours=hours>9?hours:'0'+hours;
              minutes=minutes>9?minutes:'0'+minutes;
              seconds=seconds>9?seconds:'0'+seconds;   
              document.getElementById('countdown').innerHTML = 'TIME: ' + minutes+ ':'+seconds+'<br />';
          }
    </script>
</head>
<body>
<a href="login-home.php" class="btn-green">HOME</a>
<div id='countdown'></div>
    <!-- Check History:  Find array of answered questions.    -->
    <!-- Put all Qs in an array, removed Done, randomize it.  -->
    <!-- Take a question and show it.                         -->
    <!-- Make a random array of answers: a,b,c,d,e. Right: a. -->
    <!-- Show the answers.                                    -->    
    
<?
    $link = mysql_connect('68.178.141.173','mcquiz','M!nister1');
    mysql_select_db("mcquiz");
    $userNm = $fgmembersite->UserName();
    //  add up the current score for the user
    $qryscr = "SELECT pts FROM history WHERE username = '$userNm'";
    if ($resscr = mysql_query($qryscr, $link)) {
        $scr = 0;
        while ($row = mysql_fetch_assoc($resscr)) {
            $scr += $row['pts'];
        }
    }
    $qryfix = "UPDATE users SET score='$scr' WHERE username = '$userNm'";
    $resfix = mysql_query($qryfix, $link);
    echo '<p>Your score = ';
    echo $scr;
    echo '</p>';
    
    //  make array of all questions, except those already answered
    $query = "SELECT qname FROM questions";
    if ($result = mysql_query($query, $link)) {
        $qs = array();
        $i = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $tmp = $row['qname'];
            //  reject questions this user already answered
            $qrychk = "SELECT id_hist FROM history WHERE qname = '$tmp' AND username = '$userNm'";
            $reschk = mysql_query($qrychk, $link);
            if($data = mysql_fetch_assoc($reschk)) {
                $i = $i;
            } else {
                $qs[$i] = $tmp;
                $i++;
            }
        }
    }
    $rand_key = array_rand($qs);
    $qNm = $qs[$rand_key];
echo '<div class="stuff">';
  echo '<ul>';
    echo '<li><a href="#"><img src="images/';
    echo $qNm;
    echo 'x"></a></li>';
    echo '<li><a href="#"><img src="images/';
    echo $qNm;
    echo 'y"></a></li>';
    echo '<li><a href="#"><img src="images/';
    echo $qNm;
    echo 'z"></a></li>';
    echo '<li><a href="#"><img src="images/';
    echo $qNm;
    echo '"></a></li>';
  echo '</ul>';
echo '</div>';
?>
<div id="answer">
    <ul>
        <?
            $as = array();
            $as[0] = $qNm.'a';
            $as[1] = $qNm.'b';
            $as[2] = $qNm.'c';
            $as[3] = $qNm.'d';
            $as[4] = $qNm.'e';
            shuffle($as);
            $loc = array();
            $loc[0] = 'wrong.php?name=';
            $loc[1] = 'wrong.php?name=';
            $loc[2] = 'wrong.php?name=';
            $loc[3] = 'wrong.php?name=';
            $loc[4] = 'wrong.php?name=';
            if($as[0]==$qNm.'a') {
                $loc[0] = 'right.php?name=';
                $corr = "A.";
            } elseif($as[1]==$qNm.'a') {
                $loc[1] = 'right.php?name=';
                $corr = "B.";
            } elseif($as[2]==$qNm.'a') {
                $loc[2] = 'right.php?name=';
                $corr = "C.";
            } elseif($as[3]==$qNm.'a') {
                $loc[3] = 'right.php?name=';
                $corr = "D.";
            } elseif($as[4]==$qNm.'a') {
                $loc[4] = 'right.php?name=';
                $corr = "E.";
            }
            echo '<li><a href="';
            echo $loc[0];
            echo $qNm;
            echo '&corr=';
            echo $corr;
            echo '">A.)  <img src="images/';
            echo $as[0];
            echo '"></a></li>';
            echo '<li><a href="';
            echo $loc[1];
            echo $qNm;
            echo '&corr=';
            echo $corr;
            echo '">B.)  <img src="images/';
            echo $as[1];
            echo '"></a></li>';
            echo '<li><a href="';
            echo $loc[2];
            echo $qNm;
            echo '&corr=';
            echo $corr;
            echo '">C.)  <img src="images/';
            echo $as[2];
            echo '"></a></li>';
            echo '<li><a href="';
            echo $loc[3];
            echo $qNm;
            echo '&corr=';
            echo $corr;
            echo '">D.)  <img src="images/';
            echo $as[3];
            echo '"></a></li>';
            echo '<li><a href="';
            echo $loc[4];
            echo $qNm;
            echo '&corr=';
            echo $corr;
            echo '">E.)  <img src="images/';
            echo $as[4];
            echo '"></a></li>';
        ?>
    </ul>
</div>

<div id='fg_membersite_content'>
   <h4>Work smart!</h4>
</div>
</div>
</body>
</html>