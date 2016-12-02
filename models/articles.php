<?php
//
function articles_all($link){
    $query = "SELECT * FROM articles ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }
    $numberOfRows = mysqli_num_rows($result);
    $arr = array();

for ($i = 0; $i < $numberOfRows; $i++){
    $row = mysqli_fetch_assoc($result);
    $arr [] = $row;
}


    return $arr;
}
function articles_get($link , $id){
    $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if(!$result){die(mysqli_error($link));}

    $article = mysqli_fetch_assoc($result);

    return $article;
}
function articles_new($link, $title, $date, $content){
    $title = trim($title);
    $content = trim($content);

    if($title == '')
        return false;

    $t = "INSERT INTO articles (title, date, content) VALUES ('%s', '%s','%s')";
    $query = sprintf($t,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $content)
    );

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
    return true;

}
function articles_edit($id, $title, $date, $content){
    
}
function articles_delete($id){
    
}
?>