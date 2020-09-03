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
          <div>
            <div class="ziplink-icon between">
              <div>
                <img src="images/products/partition/ziplink/icon01.png">
                <h4 class="center">簡單連結</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon02.png">
                <h4 class="center">不用工具</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon03.png">
                <h4 class="center">方便移動</h4>
              </div>
              <div>
                <img src="images/products/partition/ziplink/icon04.png">
                <h4 class="center">可洗衣機水洗</h4>
              </div>
            </div>

            <p>
              專利拉鍊連結，寫下輕巧屏風創新的一頁。<br>
              簡單組裝，不需工具；隨裝隨用，隨擺隨換空間隔局與動線。<br>
              不同於一般常見厚重的固定式隔屏，打造輕量方便移動、可洗衣機水洗的超便利屏風。<br>
              鋼鐵製結構的耐久性，長期使用也頭好壯壯。
            </p>

            <p class="text-13px">骨架材質：鋼（粉體塗裝）<br>
              布面材質：聚酯纖維100％（針織）<br>
              * 厚度2.7ｃｍ
            </p>
          </div>

          <div>
            <div class="center-col">
              <h3>7種顏色 x 8種尺寸，可依需求自由選購!</h3>
              <h3>STEP 1</h3>
              <h3>選擇佈置框架的尺寸。</h3>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-s.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>適用於一般座位隔間，坐下時四面遮蔽保有隱私：站立時能看出四周。</p>
              </div>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-m.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>站立時探頭可以微微看進內部的半隱密高度。</p>
              </div>
            </div>
            <div class="row ziplink-size">
              <div class="col-md-4 col-sm-6"><img class="img-rwd" src="images/products/partition/ziplink/size-l.png"></div>
              <div class="col-md-8 col-sm-6 ziplink-size-text">
                <p>適用簡易會議室、更衣室等需要完全遮蔽的空間。</p>
              </div>
            </div>
          </div>

          <div>
            <div class="center-col">
              <h3>STEP 2</h3>
              <h3>選擇布面顏色。</h3>
            </div>
            <div class="row ziplink-color">
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/white.jpg">
                  <p>米白</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/gray.jpg">
                  <p>淺灰</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/blue.jpg">
                  <p>水藍</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/navie.jpg">
                  <p>海軍藍</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/red.jpg">
                  <p>石榴紅</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/orange.jpg">
                  <p>橘</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6 ziplink-color">
                <div class="center-col"><img class="img-rwd-full" src="images/products/partition/ziplink/green.jpg">
                  <p>抹茶綠</p>
                </div>
              </div>
            </div>
          </div>

        </div>
  </section>




</main>
