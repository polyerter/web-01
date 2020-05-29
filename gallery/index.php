<?php
session_start();
require_once "../config.php";
require_once "../helper.php";

?>

<!doctype html>
<html lang="en">
<head>
    <title>Gallery</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-4">
            <h1>Gallery</h1>
            <form action="../actions/gallery/upload_image.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="attachment">
                </div>
                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control"></textarea>
                </div>

                <div>
                    <button class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $records = [];

    $user = getUser();
    $DBH = connect($db_name, $db_user, $db_pass);
    $params = [
        ':id' => $user['id']
    ];

    $sql = "SELECT * FROM `gallery` WHERE `user_id` = :id";
    $stmt = $DBH->prepare($sql);

    if ($stmt->execute($params)) {
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="row mt-4">
        <?php
        if (count($records) > 0) {
            foreach ($records as $record) {
                ?>
                <div class="col-3">
                    <img src="<?= $record['image'] ?>" class="img-fluid" alt="<?= $record['name'] ?>">
                    <p>
                        <?= $record['comment'] ?>
                    </p>
                    <p>
                        <a href="/actions/gallery/remove.php?id=<?= $record['id'] ?>">Remove</a>
                    </p>
                </div>

            <?php }
        } ?>


    </div>

</div>


</body>
</html>