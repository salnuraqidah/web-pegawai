<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbtechmuda42;host=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,TRUE);    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
