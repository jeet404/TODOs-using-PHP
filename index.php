<?php include 'connect.php'; ?>

<?php

$msg = "";

if (isset($_POST['give'])) {

    $title = $_POST['title'];
    $decs = $_POST['description'];

    $query = "INSERT INTO `todos_items`(`id`, `title`, `description`) VALUES (NULL,'$title','$decs')";

    $res = mysqli_query($conn, $query);
    if ($res) {
        $msg = "Todo Added";
    } else {
        $msg = "There Are Some Problem";
    }
}
?>

<?php
if (isset($_GET['Del'])) {
    $UserID = $_GET['Del'];
    $rem = "DELETE FROM `todos_items` WHERE `id` = $UserID ";
    $done = mysqli_query($conn, $rem);
    if ($done) {
        header('location:index.php');
    } else {
        header('location:index.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TODOs with PHP</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-xxl">
            <span class="navbar-brand mb-0 h-100" style="font-size: 30px;">TODOs List Using PHP</span>
        </div>
    </nav>

    <div class="container mt-3 col-md-0">
        <h2 class="mt-5">Add Note</h2>
        <form action="index.php" method="post" class="p-5 bg-white rounded-2 font-monospace shadow-lg">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <input name="give" class="btn btn-primary" type="submit" value="Add">
            </div>
            <div class="mb-1">
                <span style="color: red;"><?php echo $msg; ?></span>
            </div>
        </form>

        <div class="container mt-3 col-md-0">
            <h2 class="mt-3">Your Todos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `todos_items`";
                    $take = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($take)) {
                        $UserId = $row['id'];
                    ?>
                        <tr>
                            <td scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="index.php?Del=<?php echo $UserId; ?>"><button class="btn btn-primary">Delete</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>