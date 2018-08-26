<?php get_header(); ?>

    <main class="main">

        <section class="module main-intro">
            <div class="module-inner">
                <div class="intro-globe">
                    <!-- Rendering See Trough Globe -->
                </div>
                <div class="intro-text">
                    <h1 class="intro-title"><span class="title-large">データって、面白い！</span><br> そう感じる瞬間を、すべての人に届けたい</h1>
                    <p class="intro-description">"Globe of E2D3"<br>当サイトにアクセスした地域をドットで表現。<br>E2D3アプリをダウンロードすれば、Excel上で、<br>お好きなデータを入れて地球を動かすことができます。</p>
                    <a href="#anchor-about" class="anchor-link"></a>
                </div>
            </div>
        </section>

        <section class="module main-news">
          <div class="module-inner">
            <?php
              show_news();
            ?>
          </div>
        </section>

        <section class="module main-about" id="anchor-about">
            <div class="module-inner">
                <h2>E2D3とは？</h2>
                <p>誰もがデータを楽しめる世界を目指すため、<br>データビジュアライズを手軽に楽しめるソフトウェアを提供している、<br>非営利のコミュニティです。</p>
                <p class="buttonLink"><a href="#anchor-detailE2D3" class="anchor-link">詳しく見る</a></p>
                <img src="<?php echo esc_attr(get_template_directory_uri() . '/images/illust-about.png'); ?>" alt="">
            </div>
        </section>

        <section class="module main-appInfo">
            <div class="appInfo-video">
                <img src="http://e2d3wp.azurewebsites.net/wp-content/uploads/2015/09/e2d3bg.gif" alt="">
            </div>
            <div class="module-inner">
                <h2>E2D3 on Excel</h2>
                <h3>Excel上で、無料＆手軽にデータを「動くグラフ」にできるアプリを公開中！</h3>
                <p>個人・法人問わず、どなたでも無料でご利用いただけます。<br>
                    使い方は簡単！Microsoft Office ExcelアプリページからE2D3をダウンロードし、Excel上でお好きなテンプレートを選択。自分で数値データを書き換え、反映させることができます。表現豊かなテンプレートは80種類以上！
                </p>
                <p class="detailLink"><a href="https://appsource.microsoft.com/ja-jp/product/office/WA104379169?src=office&corrid=dce92b26-476d-4caf-a723-6b88d1ac3c12&omexanonuid=e8a2dc31-66e1-4f22-9c37-ab19dba58662">Microsoft アプリページへ</a></p>

                <div class="appInfo-download">
                    <h3 class="download-title">ご利用環境別の無料ダウンロード方法・ご利用方法</h3>
                    <div class="download-link">
                        <a href="/app-install/for-win/"><b>Windows<br>Excel 2013以降</b><br>で利用する</a>
                        <a href="/app-install/for-mac/"><b>Office for Mac<br>(Ver 2016以降)</b><br>で利用する</a>
                        <a href="/app-install/for-online/"><b>Excel Online</b><br>で利用する</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="module main-case hide-sp">
            <div class="case-head">
                <h2><span class="case-title">操作できる！</span>E2D3 サンプル</h2>
            </div>
            <article class="case-wrap">
                <div class="case-overview">
                    <h3>“みんなで徒競走”</h3>
                    <p>ハッカソンに参加した小学生のアイディアから生まれた、遊べるデータビジュアライズです。「時速」を体感することで、速さに対する理解を深められます。</p>
                </div>
                <div class="case-body sample-run">
                    <!-- DVのソースコードをここに入れる -->
                    <div id="drawArea">
                      <img src="<?php echo $template_path; ?>/images/animal_icons/riku.png" id="riku" />
                    </div>

                    <div class="controlPanel">
                        <p>自分の速さを入力して、「スタート」ボタンを押してみよう！</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="empty"></td>
                                    <th class="em row">あなた</th>
                                    <th>小学生平均</th>
                                    <th>ボルト選手</th>
                                    <th>チーター</th>
                                    <th>(台風)風速25m</th>
                                    <th>時速50kmの車</th>
                                    <th>馬</th>
                                </tr>
                                <tr>
                                    <th class="em col">速度</th>
                                    <td class="inputArea"><input type="text" maxlength="4" name="" id="ownRecord" value="16"></td>
                                    <td>17秒</td>
                                    <td>9.58秒</td>
                                    <td>3秒</td>
                                    <td>4秒</td>
                                    <td>7.2秒</td>
                                    <td>7.5秒</td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="startButton">スタート！</button>
                    </div><!-- /.controlPanel -->
                </div>
            </article>
            <article class="case-wrap">
                <div class="case-overview">
                    <h3>“Dot Bar Chart”</h3>
                    <p>年度ごとに項目の値が変化する複雑なデータを棒グラフで表現すると、年度別にグラフを作らなくてはならず面倒…そんな時はこのDot Bar Chart。ドット状の棒グラフが操作によって移ろい、１つの画面で「年度ごと」「項目ごと」の変化を同時に見ることができます。</p>
                </div>
                <div class="case-body sample-medal">
                    <!-- Rendering Dot Bar Chart -->
                    <h4>「各オリンピックにおける、国ごとの金メダル合計数と推移」</h4>
                </div>
            </article>
        </section>

        <section class="module main-download hide-sp">
            <div class="module-inner">
                <h2>E2D3 on Excel</h2>
                <a href="#">無料ダウンロードはこちら</a>
            </div>
        </section>

        <section class="module main-workshop" id="anchor-detailE2D3">
            <div class="module-inner">
                <h2>みんなで作る、データビジュアライズ</h2>
                <p>E2D3は、小学生や技術者まで幅広い層に向けた、データのワークショップやハッカソンを企画しています。そこで生まれた「このデータを、こんな風に見れたら面白いかも！」というアイディアを、E2D3のエンジニアとデザイナーが実現します。</p>
                <p class="detailLink"><a href="#anchor-event" class="anchor-link">イベント詳細を見る</a></p>
            </div>
        </section>

        <section class="module main-development">
            <div class="module-inner">
                <h2>E2D3が成長し続ける仕掛け</h2>
                <p>E2D3は、「設計図」を公開して開発することで、誰かのひらめきが別の誰かのひらめきを呼び、どんどんプロダクトが成長していく仕組みをデザインしています。（基幹部分をOSSとしてGithubで公開しているので、プログラミングの知識があればどなたでも開発が可能です。）</p>
                <p class="detailLink"><a href="#anchor-joinus" class="anchor-link">開発者情報を見る</a></p>

                <dl>
                    <dt>E2D3と共同制作した事例</dt>
                    <dd><a href="http://www3.nhk.or.jp/news/special/2016-presidential-election/index.html">2016/09　NHK news web, アメリカ大統領選２０１６</a></dd>
                    <dd><a href="https://kumamotojishin.yahoo.co.jp/bousai/">2016/09　Yahoo!ニュース, 検索データから見る熊本地震</a></dd>
                    <dd><a>2015/08　goo スマホ部, ドコモ圧勝！iPhone 6s発売日に速度調査（大阪環状線）</a></dd>
                    <dd><a>2014/12　朝日新聞デジタル, 衆院選を動くグラフに　激増する無効・棄権票</a></dd>
                    <dd><a href="https://withnews.jp/article/f0141202002qq000000000000000W0090101qq000011207A">2014/12　withnews, 得票率１割台で政権取る可能性　グラフで見る衆院選</a></dd>
                </dl>
            </div>
        </section>

        <section class="module main-eventInfo" id="anchor-event">
            <div class="module-inner">
                <h2>イベント情報</h2>
                <p class="large-txt">一緒にデータビジュアライズを楽しみませんか？</p>
                <p>E2D3は、データビジュアライゼーションの最新情報を共有するだけでなく、誰もがデータビジュアライゼーションを学び、楽しめるイベントを開催しています。ゲストを招いての講演会やワークショップ、ハッカソンなど開催中！<br>エンジニアだけでなく、デザイナーや営業、主婦、小学生、大学生など様々なバックグラウンドの方に楽しんでいただいてます。データビジュアライズに興味がある方大歓迎！ぜひお気軽にご参加ください。</p>


                <?php
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                if(is_plugin_active('e2d3-event-info/e2d3-event-info.php')){
                  Event_Info_E2D3::show_event_list();
                }

                ?>

                
                <h3>過去のイベント</h3>
                <ul class="eventInfo-past"><!--
                 --><li><a href="#" style="background-image:url('http://e2d3.org/wp-content/uploads/2017/11/23032921_10214709510551805_3844396104476802665_n.jpg')">
                        <dl class="eventInfo-description">
                            <dd class="desc-date">2017/12/20</dd>
                            <dt class="desc-eventTitle">【E2D3】データビジュアライゼーションもくもく会VOL.7！</dt>
                        </dl>
                    </a></li><!--
                 --><li><a href="#" style="background-image:url('http://e2d3.org/wp-content/uploads/2017/07/7dbdc58c5b5ad8ec94742b50dee94973147a7805-2.png')">
                        <dl class="eventInfo-description">
                            <dd class="desc-date">2017/12/20</dd>
                            <dt class="desc-eventTitle">【E2D3】データビジュアライゼーションもくもく会VOL.7！</dt>
                        </dl>
                    </a></li><!--
                 --><li><a href="#" style="background-image:url('')">
                        <dl class="eventInfo-description">
                            <dd class="desc-date">2017/12/20</dd>
                            <dt class="desc-eventTitle">【E2D3】データビジュアライゼーションもくもく会VOL.7！</dt>
                        </dl>
                    </a></li><!--
             --></ul>
             <p class="buttonLink"><a href="#anchor-detailE2D3">過去のイベント一覧</a></p>
            </div>
        </section>

        <section class="module main-snsLink">
            <div class="module-inner">
                <h2>SNS</h2>
                <p>E2D3の活動情報や、世界のデータビジュアライズ情報を配信中！</p>
                <div class="snsLink-wrap">

                    <div class="snsLink-module">
                        <div class="module-head">
                            <h3><img src="<?php echo esc_attr(get_template_directory_uri() . '/images/icon-facebook.png'); ?>" alt="Facebook"></h3>
                            <div class="head-btn"><div class="fb-like" data-href="https://www.facebook.com/e2d3project/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div></div>
                        </div>
                        <p>E2D3のイベント情報や、アクティビティ情報は公式Facebookから。</p>
                        <div class="fb-page" data-href="https://www.facebook.com/e2d3project/" data-tabs="timeline" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/e2d3project/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/e2d3project/">グラフ共有コミュニティ「E2D3」Excel Graph App E2D3</a></blockquote></div>
                    </div>
                    <div class="snsLink-module">
                        <div class="module-head">
                            <h3><img src="<?php echo esc_attr(get_template_directory_uri(). '/images/icon-twitter.png'); ?>" alt="Twitter"></h3>
                            <div class="head-btn"><a href="https://twitter.com/e2d3org?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow @e2d3org</a></div>
                        </div>
                        <p>世界のData Visualizeをピックアップして紹介中！最新のDataViz情報収集はE2D3のアカウントで。</p>
                        <a class="twitter-timeline" data-height="400" data-dnt="true" href="https://twitter.com/e2d3org?ref_src=twsrc%5Etfw">Tweets by e2d3org</a>
                    </div>

                </div>
            </div>
        </section>

        <section class="module main-joinus" id="anchor-joinus">
            <div class="module-inner">
                <h2>開発メンバー募集中！</h2>
                <p>E2D3は、開発メンバーを募集しています。エンジニアリング、UI･UIデザイン、論文執筆、ワークショップファシリテートなど、あなたの得意分野で開発に参加しませんか。</p>
                <div class="joinus-github">
                    <div class="github-icon">
                        <a href="https://github.com/e2d3/"><img src="<?php echo esc_attr(get_template_directory_uri() . '/images/illust-github.png'); ?>" alt="Github" width="102"></a>
                    </div>
                    <ul>
                        <li><a href="/ja/developing-method/">Developing Method</a></li>
                        <li><a href="https://github.com/e2d3/e2d3">Source Code</a></li>
                        <li><a href="https://github.com/e2d3/e2d3/wiki/Home_ja">Wiki</a></li>
                    </ul>

                </div>
            </div>
        </section>

        <section class="module main-interview">
            <div class="module-inner">
                <h2>Developers’ Interview</h2>
                <ul><!--
                 --><li><a href="https://career.levtech.jp/sponsor/interview/1/">
                        <img src="http://e2d3.org/wp-content/uploads/2015/12/interview0011-1-666x400.jpg" alt="">
                        <p>ユーザベースCTO竹内秀行氏の挑戦「世界10億人が『E2D3』を使える日を夢見て」</p>
                    </a></li><!--
                 --><li><a href="https://geechs-magazine.com/tag/people/20170808">
                        <img src="http://e2d3.org/wp-content/uploads/2017/08/igarashi1-640x384.jpg" alt="">
                        <p>「パラレルキャリアを実践するなら絶対にゴールを見失うな」E2D3五十嵐氏インタビュー</p>
                    </a></li><!--
                 --><li><a href="https://career.levtech.jp/sponsor/interview/2/">
                        <img src="http://e2d3.org/wp-content/uploads/2015/12/interview002-1-666x400.jpg" alt="">
                        <p>大手メディア企業で働く澤氏「『E2D3』でデータ可視化のプログラミングコストを下げたい]</p>
                    </a></li><!--
                 --><li><a href="http://codezine.jp/article/detail/9567">
                        <img src="http://e2d3.org/wp-content/uploads/2017/07/sato20170724-184x110.jpg" alt="">
                        <p>誰もが簡単にデータビジュアライゼーションできる世界を目指して！ 日本初OSSプロジェクト「E2D3」とは</p>
                    </a></li><!--
                 --><li><a href="https://career.levtech.jp/sponsor/interview/3/">
                        <img src="http://e2d3.org/wp-content/uploads/2015/12/interview003-1-666x400.jpg" alt="">
                        <p>富士通データキュレーター小副川氏「『E2D3』がデータ探索的な会話のハブになる未来」</p>
                    </a></li><!--
             --></ul>
            </div>
        </section>
        <?php
    //$json_dim_array = get_access_data();
?>


<div></div>

<script>

    var js_var_dim = <?php echo $json_dim_array; //phpから変数受け取り//?>;
    var js_dim_obj = [];
    
    js_var_dim.forEach(function(d) {
        var dim_obj = {};
        dim_obj.latitude = +d[0],
        dim_obj.longitude = +d[1];
        js_dim_obj[js_dim_obj.length] = dim_obj;
    });

    var width = document.getElementsByClassName('main-intro')[0].clientWidth;
    var height = document.getElementsByClassName('main-intro')[0].clientHeight;

    var compute_radius = 0;

    if (height <= width) {
        compute_radius = height * .7;
        width = height;
    } else {
        compute_radius = width * .7;
        height = width * 1.5;
    }

    var velocity = 0.02;

    var svg = d3.select('.intro-globe').append('svg')
        .attr('width', width)
        .attr('height', height);

    var drawLayer = svg.append('g')
        .attr(
            'transform',
            'translate(' + (0.5 * width) + ', ' + (0.5 * height + 20) + ')'
        );

    var globeHandler = d3.globeHandler()
        .width(width).height(height)
        .translation([0, -50])
        .scale(compute_radius / 2);

    d3.json(
        '<?php echo esc_attr( get_template_directory_uri() . "/ne_110m_land_t.json");?>',
        function(error, world) {
            if (error) throw error;
            var geom = topojson.feature(world, world.objects.ne_110m_land);
            globeHandler.geometry(geom);

            globeHandler.points(js_dim_obj);
            drawLayer.call(globeHandler);
            drawLayer.selectAll('path.shadow').attr('fill', '#DDD');

            drawLayer.selectAll('circle.point')
                .attr('fill', '#41CFDC')
                .attr('stroke', 'none')
                .attr('opacity', 0.75);

            drawLayer.selectAll('path.land')
                .attr('fill', '#BABABA')
                .attr('stroke', 'none');

            drawLayer.selectAll('path.sphere')
                .attr('stroke', 'none')
                .attr('fill', 'rgba(255, 255, 255, 0.8)');

            drawLayer.selectAll('path.graticule')
                .attr('fill', 'none')
                .attr('stroke', '#F7F7F7')
                .attr('stroke-width', 1.0);

            var idx = 0;

            d3.timer(function(elapsed) {
                globeHandler.rotate(elapsed * velocity);
            });

        }
    );
</script>
        <script>
        var width = 986;
        var height = 650;
        var svg = d3.select('.sample-medal').append('svg').attr('width', width).attr('height', height);

        d3.tsv("<?php echo esc_attr( get_template_directory_uri() . '/data/data.tsv' ); ?>", function(err, data) {
            svg.append('g').data([data]).call(d3.dotBarChart);
        });
    </script>


        <script>
			  var BASE_URL = '<?php echo $template_path; ?>';
		</script>
        <script type="text/javascript" src="<?php echo $template_path; ?>/scripts/animal_olympic.js"></script>
    </main>

<?php get_footer(); ?>
