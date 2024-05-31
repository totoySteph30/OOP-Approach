<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            position: fixed;
            right: 3rem;
            top: 1rem;
            z-index: 20;
        }

        .bar {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: 0.4s;
        }

        @media (max-width: 897px) {
            .navbar-links {
                display: none;
                flex-direction: column;
                position: fixed;
                top: 60px;
                right: 3rem;
                left: 3rem;
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                padding: 1rem;
                text-align: center;
                z-index: 10;
            }

            .navbar-links.active {
                display: flex;
            }

            .hamburger {
                display: flex;
            }
        }
    </style>
</head>
<body>

<header class="blog-header border-bottom shadow-sm bg-white">
    <div class="container-fluid" style="padding-left: 3rem; padding-right:3rem">
        <div class="d-flex flex-column flex-md-row align-items-center py-2">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <img src="img/logo/logo.png" alt="dev culture logo" style="width: 80%;height: auto;">
            </a>

            <div class="hamburger" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <nav class="navbar-links my-2 my-md-0 mr-md-3">
                <?php if ($loggedin) : ?>
                    <a class="p-2 px-5 text-muted" href="index.php">Home</a>
                    <a class="p-2 px-5 text-muted" href="categories.php">Category</a>
                    <a class="p-2 px-5 text-muted" href="article.php">Article</a>
                    <a class="p-2 px-5 text-muted" href="author.php">Author</a>
                <?php else : ?>
                    <a class="p-2 px-5 text-muted" href="articleOfCategory.php">Articles</a>
                <?php endif; ?>
                <a class="btn btn-outline-success mt-2" href="<?= ($loggedin) ? 'Logout.php' : 'login.php'; ?>">
                    <?= ($loggedin) ? 'Logout' : 'Sign in'; ?>
                </a>
            </nav>
        </div>
    </div>
</header>

<script>
    function toggleMenu() {
        const navbarLinks = document.querySelector('.navbar-links');
        navbarLinks.classList.toggle('active');
    }
</script>

</body>
</html>
