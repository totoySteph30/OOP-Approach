<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

// Check if the admin is already logged in, if yes then redirect him to home page
if (!$loggedin) {
    header("location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();
?>

<title>All Author</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />

<style>
    .fa-twitter,
    .fa-github,
    .fa-linkedin-square {
        font-size: 2.3rem;
    }
</style>
</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main role="main" class="main">

        <div class="bg-white py-3 px-5">
            <div class="row">

                <div class="col-lg-12 text-center mb-3">
                    <a class="btn btn-info" href="add_author.php">Add Author</a>
                </div>

            </div>

            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Avatar</th>
                            <th scope='col'>Email</th>
                            <th scope='col' colspan="4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($authors as $author) :
                            echo "<tr>";
                            ?>

                            <td><?= $author['author_id'] ?></td>
                            <td><?= $author['author_fullname'] ?></td>
                            <td>
                                <img src="img/avatar/<?= $author['author_avatar'] ?>" style="width: 100px; height: auto;border-radius: 100%;">
                            </td>
                            <td><?= $author['author_email'] ?></td>
  


                            <td>
                                <a class="btn btn-success" href="update_author.php?id=<?= $author['author_id'] ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="assest/delete.php?type=author&id=<?= $author['author_id'] ?>">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </a>
                            </td>

                        <?php
                            echo "</tr>";
                        endforeach;
                        ?>
                    </tbody>

                </table>
            </div>

        </div>

    </main><!-- </Main> -->

    <!-- Footer -->
    <!-- <?php include "assest/footer.php" ?> -->

</body>

</html>