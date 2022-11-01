<nav class="navbar navbar-expand-lg bg-light">

    <!-- <div class="container"> -->

    <div class="container relative">
        <a class="navbar-brand" href="./">BIKESHOP | ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"></li>
                <div class="nav-link active" style="cursor: pointer;" onclick="redirect('admin/dashboard.php')">
                    Dashboard
                </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link" style="cursor: pointer;" onclick="redirect('admin/product/index.php')">
                        Product
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link" style="cursor: pointer;" onclick="redirect('admin/customer/index.php')">
                        Customer
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link" style="cursor: pointer;" onclick="redirect('admin/employee/index.php')">
                        Employee
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link" style="cursor: pointer; text-decoration: underline; color: #444;"
                        onclick="redirect('admin/sell/index.php')">
                        Order
                    </div>
                </li>

            </ul>

            <p class="absolute right-28 top-2">ยินดีต้อนรับ : <?php echo $_SESSION['firstname'] ?></p>

            <div class="flex items-center h-full">
                <a href="#" onclick="redirect('login.php')" class="btn btn-warning">Logout</a>
            </div>

        </div>
    </div>

    <!-- </div> -->

</nav>


<script>
const redirect = (url) => {
    window.location.href = window.location.protocol + '//' + window.location.hostname + '/' + url;
}
</script>