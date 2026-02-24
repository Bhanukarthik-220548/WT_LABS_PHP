 <?php
    echo "<h1 style='color: blue;'>File functions</ h1>";

    echo "<h2 style='color: green;'>File Read and Write</h2>";
    echo "<p>Open and close a file</p>";
    $file=fopen("file.txt","r");
    fclose($file);

    echo "<h3 style='color: red;'>Reading File</h3>";
    $file=fopen("file.txt","r");
    $content=fread($file,filesize("file.txt"));
    echo $content;
    fclose($file);
 

    echo "<h3 style='color: red;'>Writing File</h3>";
    $file=fopen("file.txt","a");
    fwrite($file,"\nThis is a new line.");
    fclose($file);


    echo "<h3 style='color: red;'>Get Contents</h3>";
    $contents=file_get_contents("file.txt");
    echo $contents;
 

    echo "<h3 style='color: red;'>Put Contents</h3>";
    file_put_contents("file.txt","This is the new content.");


    echo "<h3 style='color: red;'>Put Contents with Append</h3>";
    file_put_contents("file.txt","this is another line",FILE_APPEND);
    

    echo "<h3 style='color: red;'>File()</h3>";
    $line=file("file.txt");
    print_r($line);
    echo "<hr>";
    echo "<hR>";


    echo "<h2 style='color: green;'>File Info</h2>";

    echo "<h3 style='color: red;'>File Exists</h3>";
    if(file_exists("file.txt")){
          echo "File exists.";
    }
  

    echo "<h3 style='color: red;'>File Size</h3>";
    $size=filesize("file.txt");
    echo "File size: ".$size." bytes.";


    echo "<h3 style='color: red;'>File Type</h3>";
    echo "File type: ".filetype("file.txt");
   

    echo "<h3 style='color: red;'>Last Access Time</h3>";
    echo "Last access time: ".date("d F y H:i:s.",fileatime("file.txt"));


    echo "<h3 style='color: red;'>Last Modified Time</h3>";
    echo "Last modified time: ".date("d F y H:i:s.",filemtime("file.txt"));


    echo "<h3 style='color: red;'>File changed time</h3>";
    echo "File changed time: ".date("d F y H:i:s.",filectime("file.txt"));

    echo "<h3 style='color: red;'>permisssions</h3>";
    echo substr(sprintf('%o', fileperms("file.txt")), -4);

    echo "<h3 style='color:red;'>File owner and group</h3>";
    echo "Owner: ".fileowner("file.txt")."<br>";
    echo "Group: ".filegroup("file.txt");   

    echo "<h3 style='color:red;'>inode</h3>";
    echo "Inode: ".fileinode("file.txt");

    echo "<h2 style='color:green;'>File and folder management</h2>";
    echo "<h3 style='color:red;'>Copying a file</h3>";
    copy("file.txt","copy_file.txt");
    echo "copied file.txt to copy_file.txt";   

    echo "<h3 style='color:red;'>Renaming a file</h3>";
    rename("copy_file.txt","renamed_file.txt");
    echo "renamed copy_file.txt to renamed_file.txt";

    echo "<h3 style='color:red;'>Deleting a file</h3>";
    unlink("renamed_file.txt");
    echo "deleted renamed_file.txt";

    echo "<h3 style='color:red;'>Creating a directory</h3>";
    mkdir("new_folder");
    echo "created new_folder";

    echo "<h3 style='color:red;'>Removing a directory</h3>";
    rmdir("new_folder");
    echo"removed new_folder";


    echo "<h3 style='color:red;'>IS file</h3>";
    if(is_file("file.txt"))
    {
    echo "file.txt is a file.";
    }

    echo "<h3 style='color:red;'>IS directory</h3>";
    if(is_dir("new_folder")){
        echo "new_folder is a directory.";  
    }

    echo "<h2 style='color: green;'>Directory handling</h2>";   
    echo "<h3 style='color:red;'>scandir()</h3>";
    $files=scandir(".");
    print_r($files);

    echo "<h3 style='color:red;'>opendir(), readdir(), closedir()</h3>";
    $dir=opendir(".");
    while(($file=readdir($dir))!==false){
        echo $file."<br>";
    }
    closedir($dir);

    echo "<h3 style='color:red;'>Current working directory</h3>";
    echo getcwd();

    echo "<h3 style='color:red;'>Changing directory</h3>";
    chdir("..");
    echo "Changed directory to parent directory. Current directory: ".getcwd();

    echo"<h3 style='color:red;'>locking a file</h3>";
    $file=fopen("file.txt","r");
    if(flock($file,LOCK_EX)){
        echo "File locked successfully.";
        // Perform file operations here
        flock($file,LOCK_UN);
    }
    fclose($file);
?>