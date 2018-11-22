<?php
$db = new Sqlite3('../../db.sqlite3');;

# this is the retval
ini_set('display_errors', 1);





header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $obj = json_decode($json);

    $like = $obj->like;
    $set = $obj->set;
    $id = $obj->trackid; #'b300046597a1456b961aef18b025187d';
    $user = 'ad927d011ce54472a587758cb4e417ad';
$liked = $db->querySingle('SELECT * FROM user_like_unlike WHERE album_track_id=' . $id, true);
    if ($set) {
        if ($liked) 
            $db->exec("UPDATE user_like_unlike set like='$like' where album_track_id='$id'");
        else {
            $aid=rand();
            $db->exec("INSERT INTO user_like_unlike (id, user_id, album_track_id, like) VALUES ('$aid', '$user', '$id', '$like')");
        }

        print json_encode(array('set' => $set, 'like' => $like), JSON_PRETTY_PRINT); 
    } else {
        $db->exec("DELETE from user_like_unlike where album_track_id='$id'");
    }
} else {

    if ($liked) {
        print json_encode(array('set' => true, 'like' => $liked['like']), JSON_PRETTY_PRINT); 
    } else {
        print json_encode(array('set' => false), JSON_PRETTY_PRINT); 
    }
}

/*
print_r($obj);

if ($obj['set']) {
}

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
        array_push($row2['tracks'], $row3);
    }

    $retval = $row2;
}

print json_encode($retval, JSON_PRETTY_PRINT);
*/
?>
