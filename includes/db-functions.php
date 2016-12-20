<?php
/**
 * Created by PhpStorm.
 * User: Laura 5
 * Date: 4/10/2016
 * Time: 5:54 AM
 */

function connect($host,$username,$password,$dbname)
{
    $connection = new mysqli($host, $username, $password, $dbname) or die("Unable to connect to database. Please try again later.");

    if ($connection->connect_errno) {
        printf("Connect failed: %s\n", $connection->connect_error);
        exit();
    }

    return $connection;
}

function getLangList($connection)
{
    $sql = "SELECT langName,nativeName,shortCode FROM langTable";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute();
    $preparedStatement->bind_result($langName,$nativeName,$shortCode);

    $list = array();

    while($preparedStatement->fetch())
    {
        $row = array();
        array_push($row,$langName);
        array_push($row,$nativeName);
        array_push($row,$shortCode);
        array_push($list,$row);
    }

    return $list;
}