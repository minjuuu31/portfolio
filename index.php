<?php
//現在の年と月の取得
 $ym = mb_convert_kana(filter_input(INPUT_GET, 'ym'), 'n');//受け取った年月の情報を念のために半角に変換する
if(!$ym){
  $year = date('Y');
  $month = date('m');
    } else{
      list($year, $month) = explode('-', $ym);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="author" content="takeda">
 <meta name="description" content="furano">
 <meta name="keywords" content="富良野,ふらの,石鹸,オーガニック">
 <meta name="Content-Style-Type" content="text/css">
 <link href="https://fonts.googleapis.com/css?family=Kosugi" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Bree+Serif|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans+Condensed:300|Patrick+Hand&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Lora|Open+Sans+Condensed:300|Patrick+Hand|Slabo+27px|Yrsa&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
 <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
 <script src="common/js/jquery.stickystack.min.js"></script>
 <link rel="stylesheet" href="common/css/style.css">
 <meta name="viewport" content="width=device-width,initial-scale=1">
 <title>furano organic-cafe</title>
</head>
<body>

  <div id="content">
    <div id="side-left"><!-- nav-->
      <p id="mini-logo"><a href="#" id="logo-nav"><img src="common/img/logo.png"></a></p>
          <nav id="nav">
            <ul id="nav_list">
              <li class="nav_item"><a href="#">shop news</a></li>
              <li class="nav_item"><a href="#cafe">cafe menu</a></li>
              <li class="nav_item"><a href="#item">item</a></li>
              <li class="nav_item"><a href="#about">about</a></li>
              <li class="nav_item"><a href="#access">access</a></li>
            </ul>
          </nav>
    </div><!-- side-left end-->

    <div id="side-right" class="main-content-wrapper">
          <div id="slide"><!-- slide-->
            <ul id="slide_list">
              <li class="slide_item"><img src="common/img/slideIMG1.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG2.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG3.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG4.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG5.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG6.jpg"></li>
              <li class="slide_item"><img src="common/img/slideIMG7.jpg"></li>
            </ul>
            <p id="logo"><img src="common/img/logoImage.png"></p>
          </div><!--slide end-->

          <!--menu-->

          <div class="contents-box" id="shop-news">
            <p class="contents-title"><i class="fas fa-square-full title-sq"></i>shop news</p>
            <h2 id="news-title">小麦と小豆の１日店長</h2>

            <div class="inner-box" id="news-box">

              <div class="news-inner">
                 <div class="news-list">
                    <p class="news-img" id="komugi"><img src="common/img/komugi-a.jpg"></p>
                    <ul class="news-ul">
                      <li class="news-li">小麦（女の子）</li>
                      <li class="news-li">12月25日生まれ</li>
                      <li class="news-li">ちょっとわがままだけど甘えん坊さんです。</li>
                    </ul>
                 </div>

                 <div class="news-list">
                    <p class="news-img"><img src="common/img/azuki-a.jpg" id="img-azuki"></p>
                    <ul class="news-ul">
                      <li class="news-li">小豆（女の子）</li>
                      <li class="news-li">9月26日生まれ</li>
                      <li class="news-li">肩に乗るのが大好きな甘えん坊さん。<br>食いしん坊です。</li>
                    </ul>
                 </div>
              </div>

              <!-- ******************************
                PHPカレンダー
                *******************************-->
              <div class="news-inner">
                <div id="calender-box">
                <h3><?php echo "{$year}年{$month}月", PHP_EOL; ?></h3>
                    <table id="c-table">
                        <tr>
                            <th class="weekday">日</th>
                            <th class="weekday">月</th>
                            <th class="weekday">火</th>
                            <th class="weekday">水</th>
                            <th class="weekday">木</th>
                            <th class="weekday">金</th>
                            <th class="weekday">土</th>
                        </tr>
                        <?php
                        $count = 0; //マス目の表示をするための変数
                        echo '<tr>', PHP_EOL; //行の開始
                      
                        $week_start = date('w', strtotime("{$year}-{$month}-01")); //その年月の初めの曜日の数値を取得して変数に代入
                        for($j = 0; $j < $week_start; $j++){//2019-05-01の開始位置より前のセルに空白を入れ、埋める
                          echo '<td>&nbsp;</td>', PHP_EOL;
                        }
                      
                        $count += $week_start;//マス目のカウント用$countと2019-05-01の曜日の数値を持っている$week_startを加算
                      
                        for($i = 1; $i <= date('t', strtotime("{$year}-{$month}")); $i++){//その年月から末日まで処理を繰り返す
                        echo '<td class="text-center">' . $i . '</td>', PHP_EOL;//セルに日付を出力する
                        $count++;//マス目のカウントを1つ繰り上げる
                        if($count % 7 === 0){//マス目のカウントが7の倍数の時にtrを閉じてtrを開く
                          echo '</tr>', PHP_EOL;
                          echo '<tr>', PHP_EOL;  
                        }
                       }
                        $day_end = date('t', strtotime("{$year}-{$month}"));//その年月の末日の情報を取得し変数に代入
                        $week_end = date('w', strtotime("{$year}-{$month}-{$day_end}"));//その年月の末日の数値を取得して変数に代入
                        for($i = $week_end; $i < 6; $i++){//2019-05-31以降に残っているセルを空白で埋める
                          echo '<td>&nbsp;</td>', PHP_EOL;
                        }
                        echo '</tr>', PHP_EOL;//一番最後にtrを閉じる必要があるのでここで出力する
                       ?>
                       </table>
                                          </table>
                 </div>
              </div>
              <!--************************************-->
            </div>
          </div>


          <div class="contents-box" id="cafe">
            <p class="contents-title"><i class="fas fa-square-full title-sq"></i>cafe menu</p>

            <div class="inner-box" id="cafe-box">
                  <div class="contents-inner">
                    <p class="menu-title">Drink menu</p>
                    <div class="menu-table">
                        <table>
                            <tbody>
                              <tr>
                                <th>original coffee (hot/ice)</th>
                                <td>￥500</td>
                              </tr>
                              <tr>
                                <th>flaver coffee (hot/ice)</th>
                                <td>￥550</td>
                              </tr>
                              <tr>
                                <th>caffe latte</th>
                                <td>￥500</td>
                              </tr>
                              <tr>
                                <th>cappuccino</th>
                                <td>￥500</td>
                              </tr>
                              <tr>
                                <th>milk</th>
                                <td>￥400</td>
                              </tr>
                              <tr>
                                <th>fresh juice</th>
                                <td>￥550</td>
                              </tr>
                              <tr>
                                <th>smoothie</th>
                                <td>￥500</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>

                  <div class="contents-inner">
                    <p class="menu-title">Food menu</p>
                    <div class="menu-table">
                        <table>
                          <tbody>
                            <tr>
                              <th>Hamburger</th>
                              <td>￥600</td>
                            </tr>
                            <tr>
                              <th>Sandwich</th>
                              <td>￥500</td>
                            </tr>
                            <tr>
                              <th>Meat Pasta</th>
                              <td>￥850</td>
                            </tr>
                            <tr>
                              <th>Seafood Pasta</th>
                              <td>￥850</td>
                            </tr>
                            <tr>
                              <th>Tomato&Eggplant Pasta</th>
                              <td>￥900</td>
                            </tr>
                            <tr>
                              <th>salad</th>
                              <td>￥400</td>
                            </tr>
                            <th>(※plate set</th>
                            <td>+￥200)</td>
                          </tbody>
                        </table>
                    </div>
                  </div>

                  <div class="contents-inner">
                      <p class="menu-title dessrt">Dessert menu</p>
                      <div class="menu-table">
                      <table>
                        <tbody>
                          <tr>
                            <th>Cheese cake</th>
                            <td>￥500(plate set:￥650)</td>
                          </tr>
                          <tr>
                            <th>Gateau chocolat</th>
                            <td>￥550(plate set:￥700)</td>
                          </tr>
                          <tr>
                            <th>Pancake</th>
                            <td>￥500(plate set:￥700)</td>
                          </tr>
                          <tr>
                            <th>Pudding</th>
                            <td>￥550</td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </div>
            </div><!--innner-box終わり-->
          </div><!--contents-box cafe end-->

          <div class="contents-box" id="item">
            <p class="contents-title"  id="item-box-title"><i class="fas fa-square-full title-sq"></i>item</p>

            <div class="inner-box" id="item-box">
                  <div class="contents-inner" id="item-first">
                    <p class="menu-title">Coffee beans</p>
                    <div class="menu-table">
                        <table>
                            <tbody>
                              <tr>
                                <th>Original</th>
                                <td>￥450</td>
                              </tr>
                              <tr>
                                <th>Blue Mountain</th>
                                <td>￥600</td>
                              </tr>
                              <tr>
                                <th>Kilimanjaro</th>
                                <td>￥550</td>
                              </tr>
                              <tr>
                                <th>Kona</th>
                                <td>￥500</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>

              <div class="contents-inner">
                <p class="menu-title">Handmade soap</p>
                <div class="menu-table">
                    <table>
                        <tbody>
                          <tr>
                            <th>lavender & Orange sweet</th>
                            <td>￥500</td>
                          </tr>
                          <tr>
                            <th>Jasmine & Pear</th>
                            <td>￥500</td>
                          </tr>
                          <tr>
                            <th>Rose & Peach</th>
                            <td>￥500</td>
                          </tr>
                          <tr>
                            <th>Lemon & Teatree</th>
                            <td>￥450</td>
                          </tr>
                          <tr>
                              <th>Charcoal & Peppermint</th>
                              <td>￥450</td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div><!--contents-box item end-->

          <div class="contents-box" id="about">
              <p class="contents-title"><i class="fas fa-square-full title-sq"></i>about</p>
  
              <div class="inner-box">
                <h1>ゆったりとした時間をおくつろぎください・・・<i class="fas fa-coffee coffee-ic"></i></h1>
                <div id="about-imgbox"><img src="common/img/cafe4-re.png" id="about-mainImg"></div>

                <div id="about-innerbox">
                  <div class="about-inner">
                      <h2 class="about-h2">Coffee</h2>
                      <div class="about-imgfilter"><img src="common/img/cofeebean.png" class="about-innerImg"></div>
                      <p class="about-text">上富良野のゆったりとした空気にぴったりな雰囲気の当店。オーナー自ら焙煎したコーヒーの香りをお楽しみください。お好みでブレンドもいたしますので、お気軽にお声かけください。オリジナルコーヒーは日替わりとなります。</p>
                  </div>

                  <div class="about-inner">
                      <h2 class="about-h2">Organic Vegetables</h2>
                      <div class="about-imgfilter"><img src="common/img/bargerImag.png" class="about-innerImg"></div>
                      <p class="about-text">地元（上富良野）の農家さんで当日採れた野菜を使用。無農薬の新鮮な富良野野菜たちを使った、オーガニック料理をぜひご堪能ください。</p>
                  </div>
                </div>
              </div><!--inner-box end-->
          </div><!--contents-box about end-->

          <div class="contents-box" id="access">
              <p class="contents-title" id="access-title"><i class="fas fa-square-full title-sq"></i>access</p>

              <div class="inner-box">
                <div class="access-box">
                    <h2><i class="fas fa-home home-ic"></i> 住所</h2>
                    <ul id="access-list">
                        <li class="access-item">〒000-0000</li>
                        <li class="access-item">北海道空知郡上富良野町×××-×××</li>
                        <li class="access-item">TEL: 〇〇〇-〇〇〇-〇〇〇〇</li>
                        <li class="access-item">駐車場: ３台</li>
                        <li class="access-item">定休日: 毎週水曜日</li>
                        <li class="access-item">クレジットカード:<br>JCB、VISA、MASTER、UFJ、イオン</li>
                    </ul>
                </div>

                <div class="access-box" id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215.23488853436652!2d142.46858651548706!3d43.46385520445656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0cb592cdcca5b1%3A0x409004c6f5c5d650!2z5LiK5a-M6Imv6YeO6aeF!5e0!3m2!1sja!2sjp!4v1561800060643!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen id="g-map"></iframe>
                </div><!--access-box end-->
              </div><!--inner-box end-->
              <div id="footer">
                  <small>&copy; 2019 takeda</small>
              </div>
          </div><!--contents-box access end-->
        </div><!--side-right end-->

      </div><!-- content end-->

<script type="text/javascript" src="common/js/functions.js"></script>
</body>
</html>
