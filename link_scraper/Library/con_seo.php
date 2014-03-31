<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_seo = "127.0.0.1";
$database_con_seo = "link_scraper";
$username_con_seo = "root";
$password_con_seo = "root";
$con_seo = mysql_pconnect($hostname_con_seo, $username_con_seo, $password_con_seo) or trigger_error(mysql_error(),E_USER_ERROR); 
?>