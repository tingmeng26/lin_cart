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
          <div class="ziplink-option">
            <p>
              更に豊富なパーツを利用すれば、<br>
              オフィス、家庭、店舗などとにかく場所/目的を選ばず対応可能です。
            </p>
          </div>

          <div class="row ziplink-option">
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-01.jpg"></div>
              </div>
              <p>YS-OP-01</p>
              <h4>安定脚</h4>
              <p class="text-13px">パーティションを安定させるために使用します。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-02.jpg"></div>
              </div>
              <p>YS-OP-02</p>
              <h4>キャスター付安定脚</h4>
              <p class="text-13px">移動に便利な、キャスター付の安定脚です。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-11.jpg"></div>
              </div>
              <p>YS-OP-11</p>
              <h4>中間キャスター</h4>
              <p class="text-13px">キャスター付安定脚(YSOP-02)を使用の際、連結部に必要です。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-06.jpg"></div>
              </div>
              <p>YS-OP-06</p>
              <h4>ストレート金具</h4>
              <p class="text-13px">パーティションを直線に連結させる際、取り付けて安定させます。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-07.jpg"></div>
              </div>
              <p>YS-OP-07 </p>
              <h4>直角金具</h4>
              <p class="text-13px">パーティションを直角に連結させる際、取り付けて安定させます。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-03.jpg"></div>
              </div>
              <p>YS-OP-03</p>
              <h4>マグネットボード</h4>
              <p class="text-13px">パーティションに取り付けて、マグネットを使用します。</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 ziplink-option-product">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full img-border" src="images/products/partition/ziplink/op-12.jpg"></div>
              </div>
              <p>YS-OP-12</p>
              <h4>キャスターセット</h4>
              <p class="text-13px">安定脚(YSOP-01)を、キャスター付安定脚(YSOP-02)にアップグレードできます。</p>
            </div>
  </section>




</main>
