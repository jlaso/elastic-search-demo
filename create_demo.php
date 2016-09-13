<?php


$qFile = fopen("http://www.gutenberg.org/cache/epub/996/pg996.txt", "r");
$eof = false;
$chapter = 0;
$title = "";

while (($row = fread($qFile, 1000)) && !$eof) {

    if (preg_match("/^CHAPTER\s(?<title>[^\.]+)\./m", $row, $matches)){
        $chapter++;
        $title = $matches["title"];
        print_r($matches); die;
        print "$chapter $title\n";
    }
    $eof = strpos($row, "End of the Project Gutenberg EBook of Don Quixote, by Miguel de Cervantes");
    if ($eof !== false){
        $row = substr($row, 0, $eof);
    }

    //print "$chapter $title\n";
}


fclose($qFile);

