<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Page Name</title>
</head>
<body>
    <?php
        if(!isset($_GET["post"])){
    ?>
    <div>
        <?php
            $connection = new PDO("mysql:host=localhost;dbname=pirates_learn", "root", "");
            $arr = $connection->query("SELECT * FROM posts;")->fetchAll();
            for($i = 0; $i < count($arr); $i++){
        ?>
        <h1><?php echo $arr[$i]['title']; ?></h1>
        <a href="?post=<?php echo $arr[$i]["id"]; ?>">see more</a>
        <?php
            }
        ?>
    <div>
    <?php
        }else{
            $connection = new PDO("mysql:host=localhost;dbname=pirates_learn", "root", "");
            $stmt = $connection->prepare("SELECT * FROM posts WHERE id=:post");
            $stmt->execute($_GET);
            $post = $stmt->fetchAll();
            $post = $post[0];
    ?>
    <h1><?php echo $post["title"]; ?></h1>
    <img src="<?php echo $post["img_url"]; ?>" />
    <p><?php echo $post["text"]; ?></p>
    <?php
        }
    ?>
</body>
</html>