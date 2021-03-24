<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <!-- SELECT2 -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="veeVUSmk"></script>

  <!-- GG FORNT -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">


  <!-- Slick -->
  <link rel="stylesheet" href="./assets/css/slick.css">
  <link rel="stylesheet" href="./assets/css/slick-theme.css">


  <link rel="stylesheet" href="./assets/css/style.css">
  <title><?php echo $title; ?></title>


</head>

<style>
  .header .nav>li a{
    color: #ffffff !important;
  }
  .header .nav li:hover a{
    color: #ffffff !important;
  }
  a:hover {
    color: #eb008b;
    text-decoration: none;
  }
  .header .nav .nav-item:hover>a {
    color: #eb008b!important;
  }
  .dropdown-menu{
    background: #eb008b;
  }
  .header .dropdown-item:hover {
    background-color: #00aae3;
  }
  .header__item--link {
    color: #00aae3;
  }

  .header__item--link:hover {
      color: #eb008b;
  }
  .cont-item>a {
    color: #00aae3;
    text-decoration: none;
    transition: all 0.3s;
  }
  .slick-dots li.slick-active button:before {
    background-color: #00aae3;
  }
</style>

<body>
  <!-- HEADER-PC -->
  <!--Đã đăng nhập-->
  <div class="header container-fluid d-none d-lg-block ">
    <div class="row">
      <ul class="header__menu list-unstyled d-flex mb-0 w-100 justify-content-end" style="background: #ffffff;color:#00aae3 !important">
        <li class="header__item"><a class="header__item--link" href="./login.php"><i class="fas fa-clipboard-list header__item-icon"></i>Tra cứu đơn hàng</a></li>
        <li class="header__item"><a class="header__item--link" href="./index.php"><i class="fas fa-map-marker-alt header__item-icon"></i> Tìm cửa hàng</a></li>
        <!-- ĐÃ đăng Nhập -->
        <?php if ($currentUser) : ?>
          <li class="header__item"><a class="header__item--link" href="./wishList.php"><i class="fas fa-heart header__item-icon"></i>Yêu thích</a></li>
          <li class="header__item"><a class="header__item--link" href="./yourCart.php"><i class="fas fa-shopping-cart header__item-icon"></i>
              Giỏ hàng (<span class="countProduct"><?php echo getCountCartDetail($id_cart); ?></span>)</a></li>
          <li class="header__item"><a class="header__item--link" href="./profile.php"><i class="fas fa-user header__item-icon"></i><?php echo $currentUser['full_name']; ?></a></li>
          <li class="header__item"><a class="header__item--link" href="./logout.php"><i class="fas fa-user header__item-icon"></i>Đăng xuất</a></li>

          <!-- Chưa đăng Nhập -->
        <?php else : ?>
          <li class="header__item"><a class="header__item--link" href="./login.php"><i class="fas fa-user header__item-icon"></i>Đăng nhập</a></li>
        <?php endif; ?>
      </ul>
    </div>



    <!-- NAVBAR -->
    <div class="row" style="background: #00aae3">
      <nav class=" navbar navbar-expand-lg navbar-light container">
        <!-- LOGO -->
        <a class="navbar-brand" href="index.php"><img src="./assets/img/logo.png" style="max-width:100px"></a>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav m-auto" style="margin: 0 0 15px 270px !important">
            <li class=" nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="./productList.php" id="navbarDropdown">SẢN PHẨM <span class="caret"></span></a>
              <!-- Sub menu 1 -->
              <ul class="dropdown-menu">
                <li class="dropdown-item dropdown">
                  <a href="./productList.php?gender=1">Áo thun - Áo phông<i class="fas fa-chevron-right dropdown-icon"></i></a>
                  <!-- Sub menu level 2 -->
                  <ul class="dropdown-menu">
                    <li class="dropdown-item "><a href="./productList.php?gender=1&type=1">Đồng phục áo thun Polo cổ rẻ</a></li>
                    <li class="dropdown-item"><a href="./productList.php?gender=1&type=2">Đồng phục áo lớp Oversize</a></li>
                    <li class="dropdown-item"><a href="./productList.php?gender=1">Đồng phục áo thun Công ty</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục áo thun Cổ tròn</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục áo Họp lớp</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục đi Biển</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục Mầm non</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục áo thun Dài tay</a></li>
                  </ul>
                </li>
                <li class="dropdown-item dropdown">
                  <a href="./productList.php?gender=2">Đồng phục công sở<i class="fas fa-chevron-right dropdown-icon"></i></a>
                  <!-- Sub menu level 2 -->
                  <ul class="dropdown-menu">
                    <li class="dropdown-item "><a href="./productList.php?gender=2&type=1">Áo sơ mi nam nữ Công sở</a></li>
                    <li class="dropdown-item"><a href="./productList.php?gender=2&type=2">Áo sơ mi nam Công sở</a></li>
                    <li class="dropdown-item"><a href="./productList.php?gender=2">Áo sơ mi nữ Công sở</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=2">Áo đồng phục Vest</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=2">Áo sơ mi Học sinh</a></li>
                    <li class="dropdown-item "><a href="./productList.php?gender=2">Chân váy Công sở</a></li>
                  </ul>
                </li>
                <li class="dropdown-item"><a href="./productList.php">Đồng phục bảo hộ</a></li>
                <li class="dropdown-item ">
                  <a href="./productList.php">Đồng phục áo khoác</a>
                </li>
              </ul>
            </li>

            <li class="line"></li>
            <li class=" nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="./productList.php?gender=1" id="navbarDropdown">ĐP bảo hộ<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-item "><a href="./productList.php?gender=1&type=1">Bảo hộ lao động Kỹ sư</a></li>
                <li class="dropdown-item"><a href="./productList.php?gender=1&type=2">Đồng phục Nhà hàng</a></li>
                <li class="dropdown-item"><a href="./productList.php?gender=1">Đồng phục Bảo vệ</a></li>
                <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục Spa</a></li>
                <li class="dropdown-item "><a href="./productList.php?gender=1">Đồng phục Bệnh viện</a></li>
                <li class="dropdown-item "><a href="./productList.php?gender=1">Bảo hộ lao động Công nhân</a></li>
              </ul>
            </li>

            <li class="line"></li>
            <li class=" nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="./productList.php?gender=2" id="navbarDropdown">ĐP áo khoác<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-item "><a href="./productList.php?gender=2&type=1">Đồng phục áo khoác</a></li>
                <li class="dropdown-item"><a href="./productList.php?gender=2&type=2">Đồng phục áo nỉ</a></li>
                <li class="dropdown-item"><a href="./productList.php?gender=2">Đồng phục áo khoác Gile</a></li>
              </ul>
            </li>

            <li class="line"></li>
            
          </ul>
          <!-- END MENU -->

          <!-- SEARCH BOX -->
          <form class="col-lg-3 col-12 search-box form-inline my-2 my-lg-0" action="productSearch.php" method="get">
            <input class="search-box__input form-control" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="search-box__btn" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <!-- END MENU -->



      </nav>
    </div>
    <!-- END NAVBAR -->

    <!-- HOT NEWS SLIDE -->
    <div class="row">
      <div class="hot-news-cont" style="background-color: #ffffff">
        <div class="hot-news-slide">
          <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-interval="3000">
                <div class="cont-item d-block w-100 text-center"><a href="./productList.php">FREE SHIPPING VỚI HOÁ ĐƠN TỪ 800K !</a></div>
              </div>
              <div class="carousel-item" data-interval="3000">
                <div class="cont-item d-block w-100  text-center"><a href="./productList.php">HÀNG 2 TUẦN NHẬN ĐỔI - GIÀY NỬA NĂM BẢO HÀNH</a></div>
              </div>
              <div class="carousel-item" data-interval="3000">
                <div class="cont-item d-block w-100  text-center"><a href="./productList.php">BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</a></div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="text-black carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="text-black carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END HOT NEWS SLIDE -->

  </div>
  <!-- END HEADER-PC -->

  <!-- HEADER MOBILE -->
  <div class="header-mobile container-fluid d-block d-lg-none ">
    <div class="row">
      <div class="navbar center w-100">
        <div class="navbar-header d-flex w-100">
          <div class="col-xs-4 col-sm-4 navbar-brand"><a href="index.php"><img src="./assets/img/Logo_Ananas_Header.svg"></a>
          </div>
          <div class="col-6 col-sm-6 navbar-menu">
            <a data-toggle="collapse" data-target=".group-search"><img src="./assets/img/mb_search.png"></a>
            <a href="./index.php"><img src="./assets/img/mb_location.png"></a>
            <a href="./yourCart.php"><img src="./assets/img/mb_cart.png"><span class="navbar-menu-count">(<span class="countProduct"><?php echo getCountCartDetail($id_cart); ?></span>)</span></a>
          </div>

          <!-- Button navbar -->
          <div class="col-xs-1 col-sm-2">

            <button id="btn--menu-mb" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent--moblie" aria-controls="navbarContent--moblie" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-white"></span>
            </button>
          </div>
          <!-- Menu Mobile -->
          <div class=" mobile_menu collapse navbar-collapse" id="navbarContent--moblie">
            <ul class="nav navbar-nav m-auto">
              <li class="nav-item ">
                <a href="./productList.php" class="nav-link">SẢN PHẨM</a>
              </li>
              <li class="nav-item ">
                <a href="./productList.php?gender=1" class="nav-link">NAM</a>
              </li>
              <li class="nav-item ">
                <a href="./productList.php?gender=2" class="nav-link">NỮ</a>
              </li>
              <li class="nav-item ">
                <a href="./productList.php" class="nav-link">SALE OFF</a>
              </li>
              <?php if ($currentUser) : ?>
                <li class="nav-item ">
                  <a href="./wishList.php" class="nav-link">YÊU THÍCH</a>
                </li>
                <li class="nav-item ">
                  <a href="./logout.php" class="nav-link">ĐĂNG XUẤT</a>
                </li>
              <?php else : ?>
                <li class="nav-item ">
                  <a href="./login.php" class="nav-link">ĐĂNG NHẬP</a>
                </li>
              <?php endif; ?>
              </li>
            </ul>
            <!-- END MENU -->
          </div>

        </div>
      </div>


      <div class="collapse navbar-collapse group-search">
        <form id="formSearchAll" action="./productSearch.php" method="get">
          <div class="input-group">
            <input type="text" name="search" value="" class="form-control" placeholder="Tìm kiếm">
            <span class="input-group-btn">
              <button class="btn btn-search btn-search-all" type="btn"><img src="./assets/img/arrow_right.png"></button>
            </span>
          </div>
        </form>
        <div class="black-rect-bg"></div>
      </div>


      <div class="collapse navbar-collapse">

      </div>
    </div>

    <!-- HOT NEWS SLIDE -->
    <div class="row">
      <div class="hot-news-cont">
        <div class="hot-news-slide">
          <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-interval="3000">
                <div class="cont-item d-block w-100 text-center"><a href="https://ananas.vn/faqs/">FREE SHIPPING VỚI HOÁ ĐƠN TỪ 800K !</a></div>
              </div>
              <div class="carousel-item" data-interval="3000">
                <div class="cont-item d-block w-100  text-center"><a href="https://ananas.vn/policy/">HÀNG 2 TUẦN NHẬN ĐỔI - GIÀY NỬA NĂM BẢO HÀNH</a></div>
              </div>
              <div class="carousel-item" data-interval="3000">
                <div class="cont-item d-block w-100  text-center"><a href="https://ananas.vn/faq">BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</a></div>
              </div>
            </div>
            <div class="carousel-item" data-interval="3000">
              <div class="cont-item d-block w-100  text-center"><a href="https://ananas.vn/faq">BUY MORE PAY LESS - ÁP DỤNG
                  KHI MUA PHỤ KIỆN</a></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="text-black carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="text-black carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="text-black carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="text-black carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- END HEADER MOBILE -->