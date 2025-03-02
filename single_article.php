<?php include "assest/head.php"; ?>

<?php
$article_id = $_GET['id'];

// Get Article Info
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `author` ON `article`.id_author = `author`.author_id  WHERE `article_id` = ?");
$stmt->execute([$article_id]);
$article = $stmt->fetch();

// Get Category of article
$stmt = $conn->prepare("SELECT * FROM `category` WHERE `category_id` = ?");
$stmt->execute([$article["id_categorie"]]);
$category = $stmt->fetch();

// Get Author's articles
$stmt = $conn->prepare("SELECT article_title, article_id FROM `article` WHERE id_author = ? LIMIT 4");
$stmt->execute([$article["id_author"]]);
$articles = $stmt->fetchAll();

// Get Comments
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `comment` WHERE `article`.`article_id`= `comment`.`id_article` AND `article`.`article_id` = ? ORDER BY comment_id DESC");
$stmt->execute([$article_id]);
$comments = $stmt->fetchAll();
?>

<!-- Custom CSS -->
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/single_article.css">

<title>Single Article</title>

</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- /Header -->

    <!-- Main -->
    <main role="main" class="bg-l py-4">

        <div class="container">

            <div class="row">

                <!-- Article -->
                <div class="content bg-white col-lg-5 p-0 border border-muted mx-auto">


                    <!-- Post Image -->
                    <div class="post__img" style="background-repeat: no-repeat;background-image: url('img/article/<?= $article["article_image"] ?>');"></div>

                    <!-- Post Content -->
                    <div class="post__content w-75 mx-auto">

                        <div class="post-head text-center my-5">
                            <h1 class="post__title">
                                <?= $article["article_title"] ?>
                            </h1>

                            <div class="post-meta ">
                                <span class="post__date">
                                    <?= date_format(date_create($article["article_created_time"]), "F d, Y ") ?>
                                </span>
                                <a class="post-category" href="articleOfCategory.php?catID=<?= $category['category_id'] ?>" style="background-color:<?= $category['category_color'] ?>">
                                    <?= $category['category_name'] ?>
                                </a>
                            </div>
                        </div>

                        <div class="post-body text-break">

                            <?= $article["article_content"] ?>

                        </div>


                    </div>


                </div><!-- /Article -->

                <!-- Aside -->
                <div class="aside col-12" >
                    <!-- Author Info -->
                    <div class="p-3 bg-white border  border-muted ">
                        <div class="d-flex align-items-center">
                            <img class="profile-thumbnail rounded-circle" src="img/avatar/<?= $article['author_avatar'] ?>" alt="test avatar image" style="width: 60px;height: 60px;">
                            <h6 class="font-italic m-0"><?= $article['author_fullname'] ?></h5>
                        </div>

                    </div><!-- /Author Info -->

                    <!-- Other articles  -->
                    <!-- <div class="p-3 bg-white border  border-muted">

                            <div class="d-flex align-items-center">
                                <img class="profile-thumbnail rounded-circle" src="img/avatar/<?= $article['author_avatar'] ?>" alt="test avatar image" style="width: 60px;height: 60px;">
                                <h5 class="font-italic"><?= $article['author_fullname'] ?></h5>
                            </div>
                            <p class="author_desc"><?= $article['author_desc'] ?></p>

                        </div> -->
                    <div class="card bg-light my-3">
                        <div class="card-header"><strong> More from <?= $article['author_fullname'] ?></strong></div>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($articles as $article) : ?>
                                <li class="list-group-item"><a href="single_article.php?id=<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></li>
                                <!-- <li class="list-group-item"><a href="">How To Create A Simple With CSS</a></li>
                                <li class="list-group-item"><a href="">How To Parallax Style Effect With CSSs</a></li> -->
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- /Other articles  -->


                </div><!-- /Aside -->

            </div>


            
        </div>

    </main><!-- /Main -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>
    <!-- /Footer -->

</body>

</html>