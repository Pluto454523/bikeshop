<nav class="navbar navbar-expand-lg bg-light">

    <!-- <div class="container"> -->

    <div class="container">
        <a class="navbar-brand" href="./">BIKESHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./history.php">History</a>
                </li>
            </ul>

            <h5 style="margin-right: 2%;">
                <?php echo isset($_SESSION['cusID']) ? "ชื่อผู้ใช้ : ".$_SESSION['username'] : ''  ?></h5>

            <?php if (!isset($_SESSION['cusID'])): ?>

            <a href="./register.php" class="btn btn-outline-success m-2">Register</a>
            <a href="./login.php" class="btn btn-success">login</a>

            <?php else: ?>

            <a href="./logout.php" class="btn btn-warning">logout</a>

            <?php endif; ?>

        </div>

    </div>

    <!-- </div> -->

</nav>