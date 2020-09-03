<main>
  <div class="container">
    <p>ホーム > 製品情報 > パーティション > ZIP LINKパーティション</p>
  </div>
  <section class="container">
    <div class="text-center">
      <h3>ZIP LINKパーティション</h3>
      <h4 class="sub-tittle">Ziplink Partition</h4>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5">
          <nav class="navbar left-navbar">
            <div class="container-fluid">
              <!--按鈕-->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed btn-sider" data-toggle="collapse" data-target="#side-menu" aria-expanded="false">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- 導航條內容 -->
              <div class="collapse navbar-collapse" id="side-menu">
                <ul class="nav navbar-nav" id="side-item">
                  <?php foreach ($result as $key => $row) { ?>
                    <li class="dropdown">
                      <a href="#collapse<?php echo $key ?>" id="web-item" data-toggle="collapse" class="word" data-parent="#accordion" role="button" aria-haspopup="true" aria-expanded="<?php echo $row['id'] == $typeId ? 'true' : 'false'; ?>" style="<?php echo $row['id'] == $typeId ? 'background-color:#448e96;' : '' ?>"><?php echo $row['name'] ?></a>
                      <!--下拉選單按鈕-->
                      <ul id="collapse<?php echo $key ?>" class="word <?php echo $row['id'] == $typeId ? 'panel-collapse collapse in' : 'panel-collapse collapse' ?>" aria-expanded="true">
                        <?php foreach ($row['subtype'] as $value) {
                          $bgstyle = $value['subtypeId'] == $subtypeId ? "style='background-color:#448e96'" : ""; ?>

                          <?php if (!empty($value['link'])) { ?>
                            <li <?php echo $bgstyle ?>><a href="<?php echo  $web_root . 'products/' . $value['link'] . '?typeId=' . $row['id'] . '&subtypeId=' . $value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>
                          <?php } else {
                          ?>
                            <li><a href="<?php echo $web_root . 'products/' ?>subtype.php?id=<?php echo $value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>

                          <?php } ?>
                        <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
          <div class="ziplink-button between">
            <input type="button" class="button-main" value="製品仕樣" onclick="location.href='<?php echo $web_root . 'products/product.php' ?>'">
            <input type="button" class="button-main" value="組立連結方法" onclick="location.href='<?php echo $web_root . 'products/assembling.php' ?>'">
            <input type="button" class="button-main" value="オプション" onclick="location.href='<?php echo $web_root . 'products/option.php' ?>'">
            <input type="button" class="button-main" value="購入する" onclick="location.href='https://item.rakuten.co.jp/pg-gloria/c/0000000185'">
          </div>
          <div>
            <div class="ziplink-assembling">
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <p>組み立てに一切の工具、連結用のパーツも不要。<br>
                    <br>
                    ①サイドのフレームをはめる。<br>
                    (H161.5cm/ H185cmサイズだけ）<br>
                    ②トップのフレームをはめる。<br>
                    ③布を被せて、下のジッパーを閉じれば。<br>
                    はい、出来上がり。
                  </p>
                </div>
                <div class="col-lg-6 col-md-12">
                  <img class="img-rwd-full" src="images/products/partition/ziplink/assembling.jpg">
                </div>
              </div>
              <div class="ziplink-assembling">
                <a href="images/products/partition/ziplink/zip-scene01.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene01.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene02.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene02.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene03.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene03.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene05.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene05.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene06.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene06.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene07.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene07.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene10.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene10.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene04.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene04.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene08.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene08.jpg"></div>
                    </div>
                  </div>
                </a>
                <a href="images/products/partition/ziplink/zip-scene09.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="600" data-width="800">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="square-box">
                      <div class="inner"><img class="img-rounded img-rwd-full img-fluid" src="images/products/partition/ziplink/zip-scene09.jpg"></div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

          </div>
  </section>
</main>

<div class="footerPage"></div>
<script>
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
