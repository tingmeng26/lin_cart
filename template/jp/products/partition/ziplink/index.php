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
                      <?php foreach ($row['subtype'] as $value) { $bgstyle = $value['subtypeId'] == $subtypeId ? "style='background-color:#448e96'" : "";?>
                        
                          <?php if (!empty($value['link'])) { ?>
                            <li <?php echo $bgstyle ?>><a href="<?php echo  $web_root.'products/'.$value['link'].'?typeId='.$row['id'].'&subtypeId='.$value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>
                          <?php } else {
                          ?>
                            <li ><a href="<?php echo $web_root.'products/'?>subtype.php?id=<?php echo $value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>

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
          <div class="row ziplink-main">
            <div class="col-lg-6 col-md-10 col-sm-12 ziplink-main-white">
              <img class="img-rwd" src="images/products/partition/ziplink/ziplink_logo.png">
              <p>
                                自分で組み立てられる、レイアウト自由のパーティションオフィスの間仕切りとして欠かせないパーティション。<br>
                                オリジナル パーティション ZIP LINK(ジップリンク)は、ファスナーでつなぐだけの簡単組み立てで、オフィス内のレイアウトが自由自在！
                                </p>
              <div class="ziplink-button between">
                <input type="button" class="button-main" value="製品仕樣" onclick="location.href='<?php echo $web_root.'products/product.php'?>'">
                <input type="button" class="button-main" value="組立連結方法" onclick="location.href='<?php echo $web_root.'products/assembling.php'?>'">
                <input type="button" class="button-main" value="オプション" onclick="location.href='<?php echo $web_root.'products/option.php'?>'">
                <input type="button" class="button-main" value="購入する" onclick="location.href='https://item.rakuten.co.jp/pg-gloria/c/0000000185'">
              </div>
              <div>
                                    <p>ジッパーで連結する　洗えるパーティション<br>
                                        特許第3704526号</p>
                                </div>
            </div>
            <div class="col-lg-6 col-md-2 col-sm-12"></div>
          </div>
  </section>




</main>
