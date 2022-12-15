<?php
    $error = "";

    function insertTable(&$error){
        if(empty($_POST["title"])){
            $error = "You must choose a title";
            return;
        }
        if(empty($_POST["img_url"])){
            $error = "You must choose a image";
            return;
        }
        if(empty($_POST["text"])){
            $error = "You must choose a text";
            return;
        }
        // create a connection with database
        $connection = new PDO("mysql:host=localhost;dbname=pirates_learn", "root", "");
        // run a query
        $sql = "INSERT INTO posts (title, img_url, `text`) VALUES ( :title, :img_url , :text)";
        $stmt = $connection->prepare($sql);
        unset($_POST["submit"]);
        $stmt->execute($_POST);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
        insertTable($error);
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Page Name</title>
</head>
<body>
    <span style="color:red;"><?php echo $error?></span>
    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $_POST["title"]; ?>">
        <label>Image</label>
        <input type="text" name="img_url" value="<?php echo $_POST["img_url"]; ?>">
        <label>Text</label>
        <input type="text" name="text" value="<?php echo $_POST["text"]; ?>">
        <input type="submit" name="submit" value="create post"/>
    </form>
</body>
</html>

