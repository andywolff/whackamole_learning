<?php

$link = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db('rail_andy_db', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

$query="select mole0,mole1,mole2,mole3,mole4,mole5,mole6,robotPos,armPos into outfile '/tmp/states.csv' fields terminated by ',' optionally enclosed by '\"' lines terminated by '\n' from state_action_logs;";

$result = mysql_query($query,$link);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
else {
  echo $result;
  echo "\n";
}

$query2="select action into outfile '/tmp/actions.csv' fields terminated by ',' optionally enclosed by '\"' lines terminated by '\n' from state_action_logs;";

$result = mysql_query($query2,$link);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
else {
  echo $result;
  echo "\n";
}

?>
