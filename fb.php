<?php
    if(isset($_GET['key']) && isset($_GET['type'])){
    $keyword=$_GET['key'];
    $type1=$_GET['type'];
    $json_fb = file_get_contents("https://graph.facebook.com/v2.8/search?q=".$keyword."&type=".$type1."&fields=id,name,picture.width(700).height(700)&access_token=EAAKkHcvuKecBAGiyPfxz4szyRl9pyN4mNPehZCyMoTVSkOpoWOO5Oe5Ylijr61NlbPNCmZAyM2OX94nZB8llHwiE7i2YKZAu3uMfuraw2jtUXpBIZA3ZAneZCsQS5l7xZCE7sxEUX8ZCUaY1sQ9F08jpz");
    $json_array = array($json_fb);
    $json_content=json_encode($json_array);
    echo $json_content;
    }

    if($_GET['detailID_desc'] == "detailID"){
        
        $id=$_GET['detailID'];
        $path = 'https://graph.facebook.com/v2.8/'.$id.'?fields=id,name,picture.width(700).height(700),albums.limit(5){name,photos.limit(2){name,picture}},posts.limit(5)&access_token=EAAKkHcvuKecBAGiyPfxz4szyRl9pyN4mNPehZCyMoTVSkOpoWOO5Oe5Ylijr61NlbPNCmZAyM2OX94nZB8llHwiE7i2YKZAu3uMfuraw2jtUXpBIZA3ZAneZCsQS5l7xZCE7sxEUX8ZCUaY1sQ9F08jpz'; 
        
        $json_details = file_get_contents($path);
        $json_array1 = array($json_details);
        $json_content= json_encode($json_array1);
        echo $json_content;
    }

?>