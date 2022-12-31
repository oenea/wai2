<?php

use MongoDB\BSON\ObjectID;


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );
    $db = $mongo->wai;
    return $db;
}

function get_images(){
    $db = get_db();
    return $db->images->find()->toArray();
}
function get_image($id)
{
    $db = get_db();
    return $db->images->findOne(['id' => new ObjectID($id)]);
}

function add_image(){
    $db = get_db();
    $uniq_id = uniqid();
    while($db->images->$uniq_d)
}
function delete_image($id)
{
    $db = get_db();
    $db->images->deleteOne(['id' => new ObjectID($id)]);
}



