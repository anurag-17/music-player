<?php
$db = new Sqlite3('../../db.sqlite3');;

# this is the retval
$retval = array('genres' => array());

$big = $db->prepare("select a.id,
                   a.title, a.description, a.rating_avg,
                    'https://d25xdrj7gd7wz1.cloudfront.net' || ai.filename as image from genre_album g
                   left join album a on a.id = g.album_id 
                   left join album_image ai on a.id = ai.album_id
                   where ai.is_active=1 and g.genre_id=?");

$res = $db->query('select * from genre g where g.section=1 order by position');
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {

    $genre = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'position' => $row['position'],
        'albums' => array(),
    );

    $id = $row['id'];
    $big->bindValue(1, $id);
    $res2 = $big->execute();

    while($row2 = $res2->fetchArray(SQLITE3_ASSOC)) {
        array_push($genre['albums'], $row2);
    }

    if (count($genre['albums']))
        array_push($retval['genres'], $genre);
}

header("Content-Type: application/json");
print json_encode($retval, JSON_PRETTY_PRINT);

?>
