<style>
  /* 設定圖片格式 */
  .container{
    margin-top: 5%;
  }
.image {
  display: flex;
  list-style: none;
}
/* 設定圖片大小、位置 */
.image-container {
  width: 23%;
  margin: 1%;
  padding: 10px;
  text-align:center;
  display: inline-block;
  position: relative;
  margin: 15px;
  opacity: 0.90;
  z-index: 1;
}
/* 設定圖片、放大效果 */
.image-container img {
  /* display: block; */
  width:80%;
  height: auto;
  transition: transform 0.2s ease-in-out;
}
/* 設定 hover 狀態下圖片的放大效果 */
.image-container:hover img {
  transform: scale(1.2);
}
/* 設定文字位置、樣式 */
.caption {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  text-align: center;
  width: 100%;
  font-weight:bold;
  font-size: 20px;
  font-family: "微軟正黑體", sans-serif;
  opacity: 1;
  z-index: 2;
  background-color: transparent;
}

/* 使用 ::after 將背景設為透明 */
.image-container::after {
  content: '';
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: transparent;
  transition: opacity 0.2s ease-in-out;
  position: absolute;
  z-index: -1;
}
/* 設定 hover 狀態下圖片容器的背景透明度 */
.image-container:hover::after {
  opacity: 0.8;
}
</style>
<body>
<div class="container">
    <div class="image">
      <div class="image-container">
        <a href="past_player_1.html">
          <img src="images/past_dance1.jpg"  alt="Image 1">
          <div class="caption">金針</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_2.html">
          <img src="images/past_dance2.jpg" alt="Image 2">
          <div class="caption">Poni</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_3.html">
          <img src="images/past_dance3.jpg" alt="Image 3">
          <div class="caption">田一德</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_4.html">
          <img src="images/past_dance4.jpg" alt="Image 4">
          <div class="caption">舒庭</div>
        </a>
      </div>
    </div>
  </div>  

  <div class="container">
    <div class="image">
      <div class="image-container">
        <a href="past_player_5.html">
          <img src="images/past_dance5.jpg" alt="Image 5">
          <div class="caption">淋雨</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_6.html">
          <img src="images/past_dance6.jpg" alt="Image 6">
          <div class="caption">Rex</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_7.html">
          <img src="images/past_dance7.jpg" alt="Image 7">
          <div class="caption">馬各</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_8.html">
          <img src="images/past_dance8.jpg" alt="Image 8">
          <div class="caption">小喵</div>
        </a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="image">
      <div class="image-container">
        <a href="past_player_9.html">
          <img src="images/past_dance9.jpg" alt="Image 9">
          <div class="caption">靖容</div>
        </a>
      </div>
      <div class="image-container">
        <a href="past_player_10.html">
          <img src="images/past_dance10.jpg" alt="Image 10">
          <div class="caption">Angle 小桃</div>
        </a>
      </div>
    </div>
  </div>