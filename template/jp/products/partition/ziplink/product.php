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
            <div class="ziplink-icon between">
              <div>
                <img src="images/products/partition/ziplink/icon01.png">
                <h4 class="center">簡単連結</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon02.png">
                <h4 class="center">工具不要</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon03.png">
                <h4 class="center">移動も楽々</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon04.png">
                <h4 class="center">洗えます</h4>
              </div>
            </div>

            <p>
              パネルとパネルをファスナーで連結する今までにない新タイプのパーテーションです。<br>
              組み立てに一切の工具が不要で、手軽に素早く組立・設置が可能となります。<br>
              よくあるハードタイプのパーテーションとは違い、軽量で持ち運びもしやすく、汚れれば洗濯機で洗う事が可能です。<br>
              もちろん、耐久性はバツグン、長期の使用にも全く問題のない頑丈構造でございます。
            </p>

            <p class="text-13px">フレーム材質： スチール （パウダー塗裝）<br>
              張り布材質： ボリエステル100％（ニット地）<br>
              * 厚みはすべて2.7ｃｍです
            </p>
          </div>

          <div>
            <div class="center-col">
              <h3>STEP 1</h3>
              <h3>フレームのサイズをレイアウトします。</h3>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-s.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>座った状態のレイアウト用に最適です。完全に遮蔽するのではなく、立ち上がれば周りが見える高さとなっています。</p>
              </div>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-m.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>背のびをすれば中が見えるレベルの高さとなっています。</p>
              </div>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-l.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>簡易会議室、更衣室などに最適で、遮蔽された空間となります。</p>
              </div>
            </div>
          </div>

          <div>
            <div class="center-col">
              <h3>STEP 2</h3>
              <h3>張る布をお選びください。</h3>
            </div>
            <div class="row ziplink-color">
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/white.jpg">
                  <p>ベージュ</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/gray.jpg">
                  <p>ライトグレー</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/blue.jpg">
                  <p>ブルー</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/navie.jpg">
                  <p>ネイビー</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/red.jpg">
                  <p>レッド</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/orange.jpg">
                  <p>オレンジ</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/green.jpg">
                  <p>グリーン</p>
                </div>
              </div>
            </div>
          </div>

        </div>
  </section>




</main>
