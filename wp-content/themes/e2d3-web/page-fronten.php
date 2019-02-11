<?php
/*
Template Name: front-page-en
*/
?>

<?php get_header(); ?>

    <main class="main">

        <section class="main-intro">
            <div class="intro-wrap" id="globe-wrap">
                <div class="intro-globe">
                    <!-- Rendering See Trough Globe -->
                </div>
                <div class="intro-inner">
                    <div class="intro-text">
                        <p class="intro-title">Data Visualization for ALL</p>
                        <p class="intro-subTitle">The software lets you have fun with data!</p>
                        <p class="intro-description">The dots on the transparent globe show the area where someone is accessing the site from.</p>
                        <p class="intro-description">You can download the transparent globe's data on Excel after first downloading E2D3.</p>
                        <a href="<?php echo esc_url( get_home_url() ); ?>/app-install/" class="button">Download E2D3 FOR FREE</a>
                        <ul class="intro-link">
                            <li><a target="_blank" href="https://www.jss.gr.jp/society/prize/prize_biog2018/">Winner of The Japan Statistical Society award of 2018</a></li>
                            <li><a target="_blank" href="http://e2d3.org/ja/2016/04/04/stat-dash%E3%82%B0%E3%83%A9%E3%83%B3%E3%83%97%E3%83%AA2016-%E7%B7%8F%E5%8B%99%E5%A4%A7%E8%87%A3%E8%B3%9E-%E5%8F%97%E8%B3%9E/">Winner of STAT DASH Grand Prix 2016</a></li>
                        </ul>
                    </div>
                    <div class="main-news">
                        <?php show_news(); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="module main-about" id="anchor-about">
            <div class="module-inner">
                <h2>What is E2D3 you might ask？</h2>
                <p>E2D3 is an NPO that develops  software for data visualization.<br>
                Our mission is to create a world where everyone can enjoy data!</p>
                <p class="buttonLink"><a href="#anchor-detailE2D3" class="button light anchor-link">About our community</a></p>
                <img src="<?php echo esc_attr(get_template_directory_uri() . '/images/illust-about.png'); ?>" alt="">
                <h2>What is Data Visualization?</h2>
                <p>It is to express numerical data in an easy to understand and impressive manner by using graphs and diagrams.<br>
                There are lots of fun that you can operate on a computer, move with animation, not on a handwritten graph!</p>
            </div>
        </section>

        <section class="module main-appInfo">
            <div class="appInfo-video">
                <img src="http://e2d3wp.azurewebsites.net/wp-content/uploads/2015/09/e2d3bg.gif" alt="">
            </div>
            <div class="module-inner">
                <h2>Use E2D3 on Excel</h2>
                <h3>We create apps that you can utilize to make animated and intuitive graphs using your own data.</h3>
                <p>It is all completely free, regardless of whether you intend to use it for business purposes or for personal use.<br>
                It is also easy to use! The templates have default numbers, but you can change the numbers to whatever you desire. Just download E2D3 from Microsoft AppSource, open Microsoft Excel, and choose your favorite template. We provide over 80 templates!
                </p>
                <p class="detailLink"><a href="https://appsource.microsoft.com/ja-jp/product/office/WA104379169?src=office&corrid=dce92b26-476d-4caf-a723-6b88d1ac3c12&omexanonuid=e8a2dc31-66e1-4f22-9c37-ab19dba58662">Go to Microsoft AppSource</a></p>

                <div class="appInfo-download">
                    <h3 class="download-title">Free download method by usage environment</h3>
                    <div class="download-link">
                        <a href="<?php echo esc_url( get_home_url() ); ?>/app-install/for-win/"><b>Excel 2013 and later,</b><br>windows</a>
                        <a href="<?php echo esc_url( get_home_url() ); ?>/app-install/for-mac/"><b>Office for Mac</b><br>(after Ver. 2016)</b></a>
                        <a href="<?php echo esc_url( get_home_url() ); ?>/app-install/for-online/"><b>Excel Online</b></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="module main-case hide-sp">
            <div class="case-head">
                <h2>Let's try E2D3!</h2>
            </div>
            <article class="case-wrap">
                <div class="case-overview">
                    <h3>“Footrace”</h3>
                    <p>This template was created by a primary school student during a Hackathon. You can use the template to compare your speed to animals and track and field athletes.</p>
                </div>
                <div class="case-body sample-run">
                    <div id="drawArea">
                        <img src="<?php echo esc_attr(get_template_directory_uri() . '/images/animal_icons/riku.png'); ?>" id="riku" alt="">
                    </div>

                    <div class="controlPanel">
                        <p>You just have to enter your footrace speed and push the start button!</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="empty"></td>
                                    <th class="em row">YOU</th>
                                    <th>a primary school</th>
                                    <th>Bolt</th>
                                    <th>Cheetah</th>
                                    <th>Typhoon</th>
                                    <th>Car(50km/h)</th>
                                    <th>Horse</th>
                                </tr>
                                <tr>
                                    <th class="em col">Speed</th>
                                    <td class="inputArea"><input type="text" maxlength="2" name="" id="ownRecord" value="16"></td>
                                    <td>17 Sec.</td>
                                    <td>9.58 Sec.</td>
                                    <td>3 Sec.</td>
                                    <td>4 Sec.</td>
                                    <td>7.2 Sec.</td>
                                    <td>7.5 Sec.</td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="startButton">Start!</button>
                    </div><!-- /.controlPanel -->
                </div>
            </article>
            <article class="case-wrap">
                <div class="case-overview">
                    <h3>“Dot Bar Chart”</h3>
                    <p>When complicated data whose value changes every fiscal year is represented by a bar chart, it is necessary to create a graph for each fiscal year… it’s troublesome. Dot Bar Chart helps you! A dotted bar chart is transferred by clicks, and you can see the change of “every year” and “item by item” at the same time on one screen.
</p>
                </div>
                <div class="case-body sample-medal">
                    <!-- Rendering Dot Bar Chart -->
                    <h4>“Total number and trend of gold medals by country in each Olympics”</h4>
                </div>
            </article>
        </section>

        <section class="module main-download hide-sp">
            <div class="module-inner">
                <h2>E2D3 on Excel</h2>
                <a href="https://appsource.microsoft.com/ja-jp/product/office/WA104379169?src=office&corrid=dce92b26-476d-4caf-a723-6b88d1ac3c12&omexanonuid=e8a2dc31-66e1-4f22-9c37-ab19dba58662" class="button">Donload FOR FREE</a>
            </div>
        </section>

        <section class="module main-workshop" id="anchor-detailE2D3">
            <div class="module-inner">
                <h2>Data Visualization Made by Everyone</h2>
                <p>E2D3 holds workshops and Hackasson not only elementary school students and engineers, but also for wide range of other people. E2D3 engineers and designers present data in a way that stimulates innovation, and so believe “Properly presented data can be fun to work with".</p>
                <p class="detailLink"><a href="#anchor-event" class="anchor-link">See The Event Details</a></p>
            </div>
        </section>

        <section class="module main-development">
            <div class="module-inner">
                <h2>A Mechanism to Keep E2D3 Growing</h2>
                <p>E2D3 is open source; one person's inspiration leads to another person’s inspiration, and the product grows. (The core part is released as OSS, anyone with programming knowledge can develop it.)</p>
                <p class="detailLink"><a href="#anchor-joinus" class="anchor-link">See Developer’s info</a></p>

                <dl>
                    <dt>A case of collaborating with E2D3</dt>
                    <dd><a href="http://www3.nhk.or.jp/news/special/2016-presidential-election/index.html">Sep. 2016　NHK news web, US presidential election</a></dd>
                    <dd><a href="https://kumamotojishin.yahoo.co.jp/bousai/">Sep. 2016　Yahoo! news, Kumamoto earthquake seen from search data</a></dd>
                    <dd><a>Nov. 2014  Asahi Newspaper Digital, on the chart moving the House of Representatives election</a></dd>
                    <dd><a href="https://withnews.jp/article/f0141202002qq000000000000000W0090101qq000011207A">Sep. 2012　withnews, House of Representatives election on graph</a></dd>
                </dl>
            </div>
        </section>

        <section class="module main-eventInfo" id="anchor-event">
            <div class="module-inner">
                <h2>Events</h2>
                <p class="large-txt">Let’s Enjoy Data Visualization Together!</p>
                <p>E2D3 not only shares software and the latest information, but also holds events through which everyone can learn and enjoy data visualization. We holds workshops, hackathons, and offer lectures given by guest speakers. It is not only for engineers and designers, but also for elementary school students, sales staff, housewives, university students; as such for people of all backgrounds.<br>If you are interested in data visualization, please feel free to join us!</p>

                <?php
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                if(is_plugin_active('e2d3-event-info/e2d3-event-info.php')){
                  Event_Info_E2D3::show_event_list();
                }else{
                  get_event_info_from_techplay();
                }
                ?>

                <h3>過去のイベント</h3>
                <?php show_past_event(); ?>
                                
            </div>
        </section>

        <section class="module main-snsLink">
            <div class="module-inner">
                <h2>Twitter, Facebook</h2>
                <p>We show the activity of E2D3 and world’s data visualization information on Twitter and Facebook.</p>
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
                <h2>Looking For Development Members!</h2>
                <p>E2D3 is looking for development members. Would you like to participate in developments within your field of expertise such as engineering, UI/UX design, document composition, workshop facilitation, etc?</p>
                <div class="joinus-github">
                    <div class="github-icon">
                        <a href="https://github.com/e2d3/"><img src="<?php echo esc_attr(get_template_directory_uri() . '/images/illust-github.png'); ?>" alt="Github" width="102"></a>
                    </div>
                    <ul>
                        <li><a class="button light" href="<?php echo esc_url( get_home_url() ); ?>/developing-method/">Developing Method</a></li>
                        <li><a class="button light" href="https://github.com/e2d3/e2d3">Source Code</a></li>
                        <li><a class="button light" href="https://github.com/e2d3/e2d3/wiki/Home_ja">Wiki</a></li>
                    </ul>
                </div>
            </div>
        </section>


<?php $json_dim_array = get_access_data(); ?>
<script>
    var js_var_dim = <?php echo $json_dim_array; //phpから変数受け取り//?>;
    var js_dim_obj = [];
    
    js_var_dim.forEach(function(d) {
        var dim_obj = {};
        dim_obj.latitude = +d[0],
        dim_obj.longitude = +d[1];
        js_dim_obj[js_dim_obj.length] = dim_obj;
    });

    var width = document.getElementById('globe-wrap').clientWidth;
    var height = document.getElementById('globe-wrap').clientHeight;

    // 拡大率
    var compute_radius = 0;

    if (window.innerHeight <= window.innerWidth) {
        // 横画面
        compute_radius = height * .5;
        width = width * .6;
        height = height * .8;
    } else {
        // 縦画面
        compute_radius = width * .6;
        height = width * 1.2;
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
    // dot bar chart
    //var width = 986;
    //var height = 650;
    var width = 750;
    var height = 495;
    var svg = d3.select('.sample-medal').append('svg').attr('width', width).attr('height', height);

    d3.tsv("<?php echo esc_attr( get_template_directory_uri() . '/data/data-en.tsv' ); ?>", function(err, data) {
        console.log(data);
        svg.append('g').data([data]).call(d3.dotBarChart);
    });
</script>

<script>
    // animal olympics
    var BASE_URL = '<?php echo esc_attr( get_template_directory_uri() ); ?>';
</script>
<script type="text/javascript" src="<?php echo esc_attr( get_template_directory_uri() . '/scripts/animal_olympic.js' ); ?>"></script>

    </main>

<?php get_footer(); ?>
