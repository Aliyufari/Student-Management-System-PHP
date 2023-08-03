<?php session_start(); ?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href=".?action=home">Student Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                <?php if (isset($_SESSION['matric_no']) && isset($_SESSION['user_email'])): ?>
                    <li class="nav-item"><a class="nav-link me-lg-3" href=""><?= $_SESSION['matric_no'] ?></a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link me-lg-3" href="">About</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="">Contact</a></li>
            </ul>
            <?php if (isset($_SESSION['matric_no']) && isset($_SESSION['user_email'])): ?>
                <a href=".?action=logout" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                    <span class="d-flex align-items-center">
                        <span class="small">Logout</span>
                    </span>
                </a>
            <?php else: ?>
                <a href=".?action=signin" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                    <span class="d-flex align-items-center">           
                            <span class="small">Login</span> 
                    </span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>