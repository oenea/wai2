<?php

use MongoDB\BSON\ObjectID

function delete_image($id){
    $db = get_db();
    $db->products->deleteOne(['id' => new ObjectID($id)]);
}