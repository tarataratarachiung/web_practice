<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script> -->
<style>
    .intro_title{
      max-width: 70%;
      text-align: center;
      margin: auto;
      margin-top:5%;
      background-color:black; 
      padding:2%;
    }
    .intro_button{
      text-align: center;
      margin-top:3%;
    }
    .intro_button button{
      padding:1%;
    }
    .intro_button a{
      text-decoration:none;
      color:white;
    }
    .intro_container{
      max-width: 85%;
      text-align: center;
      margin: auto;
      /* margin-top:4%; */
      padding: 3%;
    }
    /* .introduce{
      margin-top:4%;
    } */
    .introdetail{
      margin-top:12%;
     
    }

    .introdetail button{
      margin:5%;

    }
    /* 箭頭動畫 */
    @keyframes moveAndReset {
      0% {
        transform: translateY(0); /* 起始位置為 Y 軸位移 0 */
      }
      50% {
        transform: translateY(15px); /* 中間位置為 Y 軸位移 10px */
      }
      100% {
        transform: translateY(0); /* 結束位置為 Y 軸位移 0，回到原處 */
      }
    }
</style>

<!-- <script>
   // 获取按钮元素
   var myButton = document.getElementById('myButton');

// 在按钮被点击时触发的函数
myButton.addEventListener('click', function() {
  // 使用 window.open() 函数打开新窗口
  window.open('https://www.example.com', '_blank');
});
</script> -->

<div class="intro_title">
  <h1 class="h1" style="color:#FEAC2C;" ><strong>街舞</strong></h1>
  <!-- <hr class="border-light my-4"> -->
    <div class="text-left" style="">
        <p>&emsp;&emsp;街舞是起源美國紐約的布魯克林區的即興舞蹈，也是所謂的"窮人的娛樂"，這些街頭舞者多半以黑人或墨西哥人為主，這些黑人或墨西哥人的孩子們成天在街上混、跳舞，自然衍生成各種派系，也很自然的在他們所跳的舞蹈上發展出不一樣的風格。</p>
        <p>&emsp;&emsp;70年代居住在美國的黑人，其生活品質非常之差，並且社會地位偏低，所有的一切都遠不如白人。就因如此，使他們更加的團結，為了在社會中得到自我的肯定及在族群中的互動，使其發揮黑人的特質〝節奏感〞及〝優美的歌聲〞進而舒張情緒和消遣的一種方式。也就是如此帶有樂觀開朗的特質，逐漸慢慢的在全美蔓延開來，
        進而擴散到全世界，無論那一個國家及任何種族都能清楚的感受到它的舒服及快樂。</p>
    </div>
</div>
<!-- 舞風快捷按鈕 -->
<div class="intro_button">
  <button type="button" class="btn btn-warning"><a href="#hiphop"><strong>Hip-Hop</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#popping"><strong>Popping</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#locking"><strong>Locking</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#breaking"><strong>Breaking</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#waccking"><strong>Waccking</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#dancehall"><strong>Dancehall</strong></a></button>
  <button type="button" class="btn btn-warning"><a href="#krump"><strong>Krump</strong></a></button>
</div>
<!-- 箭頭圖片 -->
<div style="display: flex;justify-content: center;align-items: center;">
  <img src="images/arrow.png" class="arrow" style="margin-top:3%;width:3%;height:auto; animation: moveAndReset 2s infinite; ">
</div>

<div class="intro_container">
  <!-- hiphop -->
  <div class="row">
   <div class="introdetail" id="hiphop">
      <div class="col-lg-5 text-left" >
        <h1 style="margin-bottom:5%;"><strong>Hip-Hop</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;Hip-Hop是一種融合技巧的自由舞蹈風格，是一種源自於嘻哈文化和其他文化影響開始的社交舞蹈。</p>
          <p>&emsp;&emsp;Hip-Hop可以包含其他舞蹈形式，從日常生活到自然到甚至電影的虛構角色。每一個舞者呈現的Hip-Hop舞蹈可能有所差異，而個人對音樂和動作的詮釋也是帶給此風格最終極的特色。</p>
        </div>
        <button class="btn btn-warning btn-lg" onclick="window.open('https://medium.com/%E6%93%81%E6%8A%B1%E6%9C%AA%E4%BE%86%E7%9A%84%E5%9B%9E%E6%86%B6/%E6%8A%B1%E8%B7%B3%E8%88%9E-old-school-new-school-swag-%E4%BB%80%E9%BA%BC%E6%98%AF%E7%8F%BE%E5%9C%A8%E6%9C%80%E6%B5%81%E8%A1%8C%E7%9A%84hip-hop%E9%A2%A8%E6%A0%BC-e084726e9f97')">想知道更多Hip-Hop資訊</button>
        <!-- <img src="images/png1.png" style="width:30%; height:auto;"></img> -->
      </div>
      <!-- 影片 -->
      <div class="col-lg-5 d-flex justify-content-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/oX44x5Jke_w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Popping -->
  <div class="row">
    <div class="introdetail" id="popping">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Popping</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;源自於1970年代的加州，就是我們俗稱的機器舞。</p>
          <p>&emsp;&emsp;主要是運用我們對肌肉及關節的控制來在音樂節拍上打點，並以此為基礎來延伸，初學的時候覺得震不大出來而覺得有點灰心是正常的，但只要假以時日練習，一定可以感受肌肉爆震帶給你的樂趣。</p>
        </div>
        <button class="btn btn-warning btn-lg" onclick="window.open('https://www.newton.com.tw/wiki/POPPING')">想知道更多Popping資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/mg6-SnUl0A0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Locking -->
  <div class="row">
    <div class="introdetail" id="locking">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Locking</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;是funk dance和街舞中的一種舞風，現今也與嘻哈有所關聯。鎖舞依賴快速、明顯的手臂以及手肘運動，搭配比較放鬆的臀部和腿部。</p>
          <p>&emsp;&emsp;通常又大又誇張，往往極具韻律感並且和音樂緊密接合。鎖舞是相當表演導向的，經常藉由微笑或高舉雙手擊掌來與觀眾互動，具有喜劇性質。</p>
        </div>
        <button class="btn btn-warning btn-lg"  onclick="window.open('https://www.redbull.com/tw-zh/locking_popping_tutting')">想知道更多Locking資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/AifQ64khhY4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Breaking -->
  <div class="row">
    <div class="introdetail" id="breaking">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Breaking</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;是一種以個人風格為主、體育性質較強的技巧性街舞種類，舞者統稱為B-boy或b-girl。</p>
          <p>&emsp;&emsp;英文名字來源於伴奏採用的音樂歇段，即是「歇段舞」，港台稱「地板舞」，也稱譯為「霹靂舞」，來描述其中貼近地面，以頭、肩、背、膝為重心，迅速旋轉、翻滾的動作。</p>
        </div>
        <button class="btn btn-warning btn-lg"  onclick="window.open('https://www.redbull.com/tw-zh/is-it-breakdance-or-breaking')">想知道更多Breaking資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qvrMhdQE6zM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Waccking -->
  <div class="row">
    <div class="introdetail" id="waccking">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Waccking</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;是一種舞蹈形式，隨著迪斯可（Disco）及放克（Funk）音樂的節拍移動手臂，以肩膀上方和後方的手臂運動為主，也包含其他元素，如擺姿勢和走位。</p>
          <p>&emsp;&emsp;同時也會模仿電影明星戲劇性的姿勢，透過身體角度的扭曲、誇張的表情來加強舞蹈的視覺效果。</p>
        </div>
        <button class="btn btn-warning btn-lg" onclick="window.open('https://www.redbull.com/tw-zh/waacking_voguing')">想知道更多Waccking資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/kS1T5AX9G8k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Dancehall -->
  <div class="row">
    <div class="introdetail" id="dancehall">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Dancehall</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;又分Female、King、Queen等風格，舞風的骨幹來自於牙買加的傳統祭儀歌舞，主要藉鑑則大略包含了16種節奏型舞蹈其出自不同的文化習俗</p>
          <p>&emsp;&emsp;融合美國節奏藍調的抒情，以及拉丁的熱情，同時還加入了很多不同的舞蹈元素；雷鬼舞蹈音樂節奏感強烈。</p>
        </div>
        <button class="btn btn-warning btn-lg" onclick="window.open('https://www.redbull.com/tw-zh/dancehall_house')">想知道更多Dancehall資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/yJqhW30LD-Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Krump -->
  <div class="row">
    <div class="introdetail" id="krump">
      <div class="col-lg-5 text-left">
        <h1 style="margin-bottom:5%;"><strong>Krump</strong></h1>
        <div class="introduce">
          <p>&emsp;&emsp;是一種嘻哈文化與情緒緊密相結合的舞蹈，起源於南中央洛杉磯非洲裔美國人社區。它運用臉譜造型和自由式的舞蹈動作，通常以斗舞的形式出現。</p>
          <p>&emsp;&emsp;其視覺上和給人的感受都像是一種充滿侵略性的舞蹈，不僅僅是一種表演，更是一種反壓迫、反主流的身體藝術表現。</p>
        </div>
        <button class="btn btn-warning btn-lg" onclick="window.open('https://www.jendow.com.tw/wiki/krump')">想知道更多Krump資訊</button>
      </div>
      <div class="col-lg-5 text-left">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/j9hrg42Sr0w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>

</div>
