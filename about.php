<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script>
            $(function () {
                $("#Cht").hide();
                $("#lnkCht").on("click", function () {
                    $(this).hide();
                    $("#lnkEng").show();
                    $("#Eng").hide();
                    $("#Cht").fadeIn();
                    return false;
                });
                $("#lnkEng").hide().on("click", function () {
                    $("#lnkCht").show();
                    $(this).hide();
                    $("#Cht").hide();
                    $("#Eng").fadeIn();
                    return false;
                });
            });
        </script>
    </head>

    <body>
        <div id="container">
            <?php require_once('inc/_header.php'); ?>
            <div id="main">
                <div class="about">
                    <div class="title">About</div>
                    <div class="language"> <a href="#" id="lnkEng">ENGLISH</a> <a href="#" id="lnkCht">繁體中文</a> </div>
                    <div style="clear: both;"></div>
                    <div id="Eng" class="a_content">
                        <div class="text_EN ">
                            <p>Ozzie Art Consultants attracted international attention with its new style art curating and its content design, its curatorial work receiving the prestigious German iF Award as well as many other domestic and international awards. We regard &quot;art content&quot; as a commercial unit, cultural institutions and CSR to upgrade transformation and the creation of value. Our target group includes the integration of internationally oriented museums, creative units, foundations, financial institutions, traditional industry, brand charity, Creative City and interdisciplinary industry. Ozzie Art Consultants seeks to combine close and lasting cooperation projects of the most progressive work teams in different fields, with the purpose of attaining cultural depth and realizing the possibility and a future for the social function of creative art.</p>
                            <p>Recent projects include a cooperation with architect Tadao Ando at the Aurora Museum in Shanghai; &quot;1 DayMuseum&quot; which encompasses a contemporary and global curating plan based on a new concept; &quot;Future Education Expo&quot;, Asia's largest exhibition about education; &quot;Crystal Design Center&quot; in Bangkok, a commercial curatorial plan; &quot;W Hotel&quot; in Taipei; St. Regis Museum Hotel; Los Angeles Art Collection and its exhibition plan; curating and consulting of transformation upgrading in different fields of industry both in and outside Taiwan. </p>
                        </div>
                        <div class="text_EN ">
                            <p>Ozzie Art Consultants Group, led by Su Yang-Chih, aims at efficient &quot;cultural output&quot; through art content and design, and strives for integration and recreation by means of gathering knowledge within the concept of the World City. Our work often includes the management of internationally oriented projects and plans on different scales with various degrees of difficulty. We often design an overall planning for a museum, design of content, artistic/commercial curating, design of an exhibition, cultural and creative planning and execution, brand planning, visual communication, artistic management and planning of art education. </p>
                            <p>Ozzie Art Consultants firmly believe that following the evolution of time, the industry should be ready to face future changes with high level cultural input and commercial sensitivity. Through topography of contemporary art and culture we are able to achieve an integration of content and creativity, as well as a thorough understanding as to our customer's needs, to create a maximum value for our customer or our partner; many times our period of cooperation was extended, and the effect of our work often lasts much longer than expected and can be applied in a more extensive way.</p>
                            <p><br>
                            </p>
                        </div>
                    </div>
                    <div id="Cht" class="a_content">
                        <div class="text">
                            <p> 奧茲藝術顧問是以新形態的藝術策展與內容設計受到國際矚目，策展作品獲得德國IF Award設計大獎等許多國內外獎項的肯定。我們專注於以"藝術內容"為商業單位， 文化機構以及社會企業(CSR)作提升轉型以及價值的創造。我們的服務對象包含國際性之博物館，藝文單位，基金會，金融機構，傳統產業，品牌公益以及創意城市的跨領域產業的整合等。奧茲藝術顧問結合各個領域最先進的工作團隊持續緊密合作，目的在探索文化創意的內容深度以及創造藝術社會功能的可能性與未來性。 </p>
                            <p> 近期作品包含與建築大師安藤忠雄合作策劃的上海震旦博物館，新觀念的全球性當代策展計畫"一日美術館"，亞洲最大之教育內容策展"Future Education Expo/未來教育展"，曼谷Crystal Design Center的商業策展規劃，W hotel台北, St.Regis Museum hotel/洛杉磯的藝術品收藏與展示規劃，以及國內外不同領域之產業的提升轉型策略及顧問。 </p>
                        </div>
                        <div class="text">
                            <p> 奧茲藝術顧問團隊由蘇仰志領軍，旨在透過藝術內容與設計作有效的&quot;文化產出&quot;，企圖在世界城市（World City/Mega city)概念下透過知識聚集作整合與再創造。我們的工作常在本地與國際間處理不同規模與複雜度的項目與計劃。工作內容多為博物館整體規劃，內容設計，藝術/商業策展，展覽設計，文化創意策劃執行， 品牌規劃與視覺溝通，藝術經紀以及藝術教育規劃等整體性規劃。<br>
                                <br>
                                奧茲藝術顧問深信，隨著時代的演進，產業必須要有著面對未來的變化具備文化高度與商業靈敏度; 透過當代藝術文化地誌學(Topography)作內容的整合與創造，以及針對客戶需求的深刻的理解與清晰的對話，創造客戶/合作夥伴的最大化價值，每一次的經驗都延續着長期合作關係，而我們的作品往往都起到超乎預期的成效以及更廣泛地策略作用。<br>
                            </p>
                        </div>
                    </div>
                    <div class="img">
                        <h3>UPGRADE BY ART</h3>
                        <p>Curating</p>
                        <p>Content Design</p>
                        <p>Visual Communication</p>
                        <p>Exhibition/Space Design</p>
                        <p>Art Direction</p>
                        <p>Art education</p>
                        <p> Art/Space cohesive design<br>
                            <br>
                            <img src="images/about_img_dot.png" width="62" height="9"> </p>
                    </div>
                    <div style="clear: both;"></div>

                    <!-- end .about--> 
                </div>
                <?php require_once('inc/_footer.php'); ?>
            </div>
        </div>
        <?php require_once('inc/_foot.php'); ?>
    </body>
</html>
