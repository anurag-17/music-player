<?php
$db = new Sqlite3('../db.sqlite3');;

# this is the retval
$retval = array('genres' => array());

$id = $_GET['id']; #'b300046597a1456b961aef18b025187d';

$big = $db->prepare("select a.id, a.title, a.description, a.rating_avg,
                    'https://d25xdrj7gd7wz1.cloudfront.net' || ai.filename as image from album a
                    left join album_image ai on a.id = ai.album_id
                    where ai.is_active=1 and a.id=?");

$tracks = $db->prepare("select id, title, seconds, filename as url from album_track where album_id=? order by position");

$big->bindValue(1, $id);
$res2 = $big->execute();

while($row2 = $res2->fetchArray(SQLITE3_ASSOC)) {
    $row2['tracks'] = array();

    $tracks->bindValue(1, $id);
    
    $res3 = $tracks->execute();

    while($row3 = $res3->fetchArray(SQLITE3_ASSOC)) {
       $row3['image'] = $row2['image'];
        array_push($row2['tracks'], $row3);
    }

    $retval = $row2;
}

header("Content-Type: application/json");
print json_encode($retval, JSON_PRETTY_PRINT);

?>
