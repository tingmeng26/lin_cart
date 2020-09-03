<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="header">
        <div class="container">
            <div class="row navbar-top">
                <div class="navbar-left"><?php coderLang::t('menu_name')?></div>
                <div class="search-container-mobile">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <input type="search" id="seaech" placeholder="<?php coderLang::t('menu_txt_search')?>" class="search">
                </div>
                <div class="navbar-right">
                <a onclick = "changeLanguage('en')"><?php coderLang::t('menu_lang_en')?></a>
                  ｜
                  <a onclick = "changeLanguage('tw')"><?php coderLang::t('menu_lang_tw')?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="navbottom container">

        <div class="navlist row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <div class="center">
                    <div class="navbar-brand-mobile">
                        <img src="images/logo.png">
                    </div>
                </div>
                <div class="navbar-list-mobile">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="center">
                    <div class="navbar-brand">
                        <img src="<?php echo $web_root?>images/logo.png">
                    </div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse col-lg-7 col-md-9 col-sm-12 mr-auto" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav drop-down-menu">
                    <li><a href="<?php echo $web_root?>index.html">
                            <p><?php coderLang::t('menu_home')?></p>
                        </a></li>
                    <li><a href="<?php echo $web_root?>odmoem/odmoem.php">
                            <p><?php coderLang::t('menu_odmoem')?></p>
                        </a></li>
                    <li><a href="<?php echo $web_root?>products/index.html">
                            <p><?php coderLang::t('menu_products')?></p>
                        </a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p><?php coderLang::t('menu_intro')?></p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="<?php echo $web_root?>company/csr.php"><?php coderLang::t('menu_csr')?></a>
                            <a href="<?php echo $web_root?>company/company.php"><?php coderLang::t('menu_company')?></a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p><?php coderLang::t('menu_contact')?></p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo $web_root?>contact/customize.php"><?php coderLang::t('menu_contact_customize')?></a>
                            <a class="dropdown-item" href="<?php echo $web_root?>contact/ready-made.php"><?php coderLang::t('menu_contact_rmade')?></a>
                    </li>
                    <li><a href="" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p><?php coderLang::t('menu_ec')?></p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://www.rakuten.ne.jp/gold/pg-gloria/"
                                target="_blank"><?php coderLang::t('menu_ec_jp')?></a>
                            <a class="dropdown-item" href="http://www.hayashi-kagu.com.tw" target="_blank"><?php coderLang::t('menu_ec_tw')?></a>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <div class="nav-side col-lg-3 mr-auto navbar-right">
                <div class="box">
                    <div class="search-container">
                        <span class="icon" onclick="search()"><i class="fa fa-search"></i></span>
                        <input type="search" id="search" placeholder="サイト内検索" class="search">
                    </div>
                </div>
                <div class="phone">
                    <div class="phone-left"><i class="fas fa-phone"></i></div>
                    <div class="phone-right">
                        <h3 class="tel">072-960-0500</h3>
                        <div class="phone-bottom">
                            <h7>お問い合わせはお気軽にどうぞ</h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
</nav>
<script>
  $('#search').keypress(function(e){
    if(e.keyCode == 13){
      search();
    }
  })
</script>
