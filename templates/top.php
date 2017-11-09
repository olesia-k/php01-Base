<?php require_once('config/config.php') ?>

<title>
  <? echo (isset($title))?$title:'' ?> 
</title>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><? echo$title; ?></title>
    <meta name="description" content="<? echo$description; ?>">
    <meta name="author" content="<? echo$autor; ?>">




    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=contacts">Contact</a>  
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Portfolio
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">

                <?
                  $query = 'SELECT * FROM catalogs WHERE type="main"';
                  $adr = mysqli_query($db_con, $query);
                  if(!$adr) {
                    exit($query);
                  } 
                  while ($tbl_catalogs = mysqli_fetch_array($adr)) {
                  ?>
                    <a class="dropdown-item" href="catalogs.php?id=<?=$tbl_catalogs['id']?>"><?=$tbl_catalogs['name']?></a>
                  <?
                  }
                ?>               
                
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
                <a class="dropdown-item" href="pricing.html">Pricing Table</a>
              </div>
            </li>

            <li>
              <?
              if (isset ($_SESSION['user_id'])) { ?>

                <a class="nav-link" href="cabinet.php" >Личный кабинет</a>
                <a class="nav-link" href="logout.php">Выход</a>
              
              <?
              } else { ?>

                <a class="nav-link" href="login.php" >Вход</a>
                <a class="nav-link" href="register.php">Регистрация</a>
              
              <? }
              ?>
            </li>
          </ul>

        </div>
      </div>
    </nav>
