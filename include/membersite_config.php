<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('Jilleen.co/quiz');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('info@iRLB.org');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'mcquiz.db.10653809.hostedresource.com',
                      /*username*/'mcquiz',
                      /*password*/'M!nister1',
                      /*database name*/'mcquiz',
                      /*table name*/'users');
//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6ZrTzrPvr');

?>