<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b8fa625e1c66cf:2cb66deb@us-cdbr-east-05.cleardb.net/heroku_0d5ab19cf28af2d?reconnect=true"));
$cleardb_server = $cleardb_url["us-cdbr-east-05.cleardb.net"];
$cleardb_username = $cleardb_url["b8fa625e1c66cf"];
$cleardb_password = $cleardb_url["2cb66deb"];
$cleardb_db = substr($cleardb_url["heroku_0d5ab19cf28af2d"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>