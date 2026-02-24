<?php
echo "<h1 style='color: blue;'>File Operations</ h1>";

echo "<h3 style='color: red;'>Read only</h3>";
$file=fopen("file1.txt","r");
$content=fread($file,filesize("file1.txt"));
echo $content;
fclose($file);

echo "<h3 style='color: red;'>Write only</h3>";
$file=fopen("file1.txt","w");
fwrite($file,"This is new content.");
fclose($file);

echo "<h3 style='color: red;'>Appending to a file</h3>";
$file=fopen("file1.txt","a");
fwrite($file,"\nThis is an appended line.");
fclose($file);

echo "<h3 style='color: red;'>X</h3>";
$file=fopen("file2.txt","x");
    if($file){
        fwrite($file,"This is new content created with x mode.");
        fclose($file);
    }else{
        echo "File already exists. Cannot create a new file with x mode.";  
    }

echo "<h3 style='color: red;'>r+</h3>";
$file=fopen("file.txt","r+");
$content=fread($file,filesize("file.txt"));
echo $content;
fwrite($file,"\nThis is new content added with r+ mode.");
fclose($file);

echo "<h3 style='color: red;'>w+</h3>";
$file=fopen("file.txt","w+");
fwrite($file,"This is new content created with w+ mode.");
rewind($file);
$content=fread($file,filesize("file.txt"));
echo $content;

echo "<h3 style='color: red;'>a+</h3>";
$file=fopen("file.txt","a+");
fwrite($file,"\nThis is new content added with a+ mode.");
rewind($file);
$content=fread($file,filesize("file.txt"));
echo $content;
fclose($file);

?>