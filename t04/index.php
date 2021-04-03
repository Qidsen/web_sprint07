<?php 
include 'File.php';
include 'FilesList.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Files</h1>
    <form action='index.php' method='post'>
    <label>File name: </label>
    <input name='file_name' required>
    <label>Content: </label>
    <textarea name='file_content'></textarea>
    <button type='submit' name='creat' value='CREAT'>Create file</button>
    </form>
    <?
    if(count(scandir("tmp")) > 0)
    {
        if($_POST['delete'])
        {
            $file = new File('tmp/' . $_POST['delete']);
            $file->delete();
        }

        if($_POST['creat'])
        {
            $file = new File('tmp/' . $_POST['file_name']);
            $file->write($_POST['file_content']);
        }
        $fileList = new FileList("tmp");
        if(count($fileList->getFileArr()))
        {
            ?>
            <h1>List of files:</h1>
            <?
        }
        echo $fileList->toList();

        if(isset($_GET['file']))
        {
            echo "<h1>Selected file: <i> \"tmp/" . $_GET['file'] . "\"</i></h1>";

            $file = new File("tmp/" . $_GET['file']);

            echo "<form action='index.php' method='post'>
            <button type='submit' name='delete' value='" . $_GET['file'] . "'>Delete</button></form>";
            echo "<br>";

            echo $file->toList();
        }
        ?>
    <?
    }
    ?>
    
</body>
</html>
