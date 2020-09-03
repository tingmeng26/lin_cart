<main>
  <div class="container">
    <p>首頁 > 商品一覽 > 屏風 > ZIP LINK拉鍊連結屏風</p>
  </div>
  <section class="container">
    <div class="text-center">
      <h3>ZIP LINK拉鍊連結屏風</h3>
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
            <input type="button" class="button-main" value="產品款式" onclick="location.href='<?php echo $web_root . 'products/product.php' ?>'">
            <input type="button" class="button-main" value="組裝與範例" onclick="location.href='<?php echo $web_root . 'products/assembling.php' ?>'">
            <input type="button" class="button-main" value="產品配件" onclick="location.href='<?php echo $web_root . 'products/option.php' ?>'">
            <input type="button" class="button-main" value="購買" onclick="location.href='http://www.hayashi-kagu.com.tw/collections/ziplink'">
          </div>
          <div class="ziplink-option">
            <p>
              豐富的搭配零件，打造出最適合的使用擺設。<br>
              辦公室、家用、店鋪等等，想像無設限的擺設可能。
            </p>
          </div>

          <div class="row ziplink-option">
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-01.jpg"></div>
              </div>
              <p>YS-OP-01</p>
              <h4>安定腳座</h4>
              <p class="text-13px">加裝腳座使屏風穩定站立。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-02.jpg"></div>
              </div>
              <p>YS-OP-02</p>
              <h4>附輪子安定腳座</h4>
              <p class="text-13px">加裝輪子的安定腳座，移動更輕鬆。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-11.jpg"></div>
              </div>
              <p>YS-OP-11</p>
              <h4>中間腳輪</h4>
              <p class="text-13px">屏風連結處專用腳輪。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-06.jpg"></div>
              </div>
              <p>YS-OP-06</p>
              <h4>直線固定夾</h4>
              <p class="text-13px">需要直線連結設立時，使用固定夾可讓一字形連結的屏風更加筆直</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-07.jpg"></div>
              </div>
              <p>YS-OP-07 </p>
              <h4>直角固定夾</h4>
              <p class="text-13px">需要直角連結設立時，使用固定夾可使直角角度保持固定。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-03.jpg"></div>
              </div>
              <p>YS-OP-03</p>
              <h4>鐵製留言板</h4>
              <p class="text-13px">加裝於屏風上，可用磁鐵吸附留言、備忘紙條。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-12.jpg"></div>
              </div>
              <p>YS-OP-12</p>
              <h4>腳輪組</h4>
              <p class="text-13px">可加裝於支撐腳架(YSOP-01)上。</p>
            </div>
  </section>




</main>
