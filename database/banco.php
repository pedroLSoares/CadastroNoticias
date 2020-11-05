<?php
if ($db = sqlite_open('mysqlitedb', 0666, $sqliteerror)) {
    sqlite_query('CREATE TABLE foo (bar varchar(10))');
    sqlite_query("INSERT INTO foo VALUES ('fnord')");
    $result = sqlite_query('select bar from foo');
    var_dump(sqlite_fetch_array($result));
} else {
    die ($sqliteerror);
}