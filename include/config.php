<?php
defined('SERVER') ? null : define("SERVER", "localhost");
defined('USER') ? null : define ("USER", "root") ;
defined('PASS') ? null : define("PASS","");
defined('DATABASE_NAME') ? null : define("DATABASE_NAME", "genc3181_a") ;

$this_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root =  str_replace (array($doc_root, "include/config.php") , '' , $this_file);
$server_root = str_replace ('config/config.php' ,'', $this_file);


define ('web_root' , $web_root);
define('server_root' , $server_root);
?>