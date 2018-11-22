<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

$db = new Sqlite3('../../db.sqlite3');;

# this is the retval
ini_set('display_errors', 1);

#$id = $_GET['id']; #'b300046597a1456b961aef18b025187d';
$user = 'ad927d011ce54472a587758cb4e417ad';

$liked = $db->querySingle('SELECT * FROM user_recently_played order by play_date asc');

$retval = array();

header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $obj = json_decode($json);

    $aid=rand();
    $trackid = $obj->trackid;

$recent = $db->querySingle('SELECT * FROM user_recently_played WHERE track_id=' . $trackid, true);
   if($recent){
     $db->exec("UPDATE user_recently_played set play_date= datetime('now') where track_id='$trackid'");
 }  else{
    $db->exec("INSERT INTO user_recently_played (id, user_id, track_id, play_date) VALUES ('$aid', '$user', '$trackid', datetime('now'))");
}
    $item = array(
        'id' => $db->lastInsertRowID()
    );

    
     $track = $db->querySingle('SELECT * FROM album_track WHERE id=' . $row['track_id'], true);
    $item = array('id' => $track['id'], 'title' => $track['title'],'url' => $track['filename'],'seconds' => $track['seconds']);
    array_push($retval, $item);

} else {
    $res = $db->query('SELECT * FROM user_recently_played order by play_date desc');

    while ($row = $res->fetchArray(SQLITE3_ASSOC)) {


        $track = $db->querySingle('SELECT * FROM album_track WHERE id=' . $row['track_id'], true);

        $item = array('id' => $track['id'], 'title' => $track['title'],
         'url' => $track['filename'],'seconds' => $track['seconds']);
        array_push($retval, $item);
    }

}

print json_encode(array('tracks' => $retval), JSON_PRETTY_PRINT);
?>
