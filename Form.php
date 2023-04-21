
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>選秀節目報名表單</title>
    <style>
        #info{
            color: white;
            font-weight: 700;
            max-width: 55%;
            background-color: #000  ;
            margin-bottom: 0 !important;
            transition: ease-in-out .3s;
            text-align: center;
            margin: auto;
            margin-top:4%;
            padding: 3%;
            border-radius: 15px;

        }
        #signup{
            color: #000;
            font-weight: 700;
            max-width: 55%;
            background-color: #FEAC2C ;
            margin-bottom: 0 !important;
            transition: ease-in-out .3s;
            text-align: center;
            margin: auto;
            margin-top:3%;
            padding: 3%;
            border-radius: 15px;
        }
        .h4{
            color:#1c2331;
        }
        .form-container {
            max-width: 55%;
            margin: auto;
            margin-top:4%;
            text-align: center;
            padding: 3%;
            background-color:#000 ;
            color:#FFF;
            border-radius: 15px;
        }
        /* .formtitle {
            color:#FDC033 ;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        } */
        form{
            margin-top:5%;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }
        input[type=text], input[type=email], input[type=tel], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        label{
            color:#FEAC2C;
        }
    </style>
</head>
<body>
    <div id="info" class="">
        <h2 class="h2 mb-5" style="color:#FEAC2C"><strong>海選資訊與規則</strong></h2>
        <hr class="border-light my-4">
        <ul class="text-left">
            <li class="my-2">報名日期：2023/8/29(一)12:00 PM - 2023/9/18(日)11:59 PM</li>
            <li class="my-2">評選階段：階段一 線上Demo評選 → 階段二 實體海選 → 階段三 正式入棚比賽</li>
        </ul>
        <hr class="border-light my-4">
        <h4 class="text-left mt-5" style="color:#FEAC2C"><strong>STEP 1：線上Demo評選</strong></h4>
        <ul class="text-left">
            <li class="my-2">由評審團依據選手繳交之Demo影片，進行第一輪內部初選。</li>
            <li class="my-2">線上報名期間：2023/8/29(一) 12:00 PM - 2023/9/18(日) 11:59 PM</li>
            <li class="my-2">實體海選資格公布：2023/9/26(一) 6:00 PM。</li>
        </ul>
        <hr class="border-light my-4">
        <h4 class="text-left" style="color:#FEAC2C"><strong>STEP 2：實體海選</strong></h4>
        <ul class="text-left">
            <li class="my-2">進入實體海選之選手，每位選手有60秒的表演時間，音樂需為合法可公開播送之音檔。</li>
            <li class="my-2">評審團當日將選出「保證入棚」選手，正式入棚之完整名單將由評審團決議後公佈。</li>
            <li class="my-2">實體海選時間：2023/10/1(六) - 10/2(日) 09:00 AM - 10:00 PM</li>
            <li class="my-2">實體海選地點：台北市中山區復興北路480號</li>
        </ul>
        <hr class="border-light my-4">
        <h4 class="text-left" style="color:#FEAC2C"><strong>STEP 3：正式入棚比賽</strong></h4>
        <ul class="text-left">
            <li class="my-2">正式名單公布：2023/10/4(二) 12:00 PM</li>
            <li class="my-2">入棚時間：另行通知。</li>
        </ul>
    </div>

    <div id="signup" class="">
        <h3 class="h2 mb-5"><strong>海選報名方式</strong></h3>
        <!-- <hr class="border-light my-4"> -->
        <ol class="text-left">
            <li class="my-2">至報名頁面填寫報名表，將「60秒初選Demo」檔案上傳雲端後並開放下載權限，於報名表中附上雲端連結。</li>
            <li class="my-2">僅開放網路報名，不提供現場報名。</li>
            <li class="my-2">報名不代表成功參加海選，經初步篩選後於官網公告入選名單，公告時間為2023/9/26(一) 6:00 PM，未入選者將不再個別通知。</li>
            <li class="my-2">請務必預留兩天海選時間，入選後由主辦方以電子郵件通知到場時段，恕不提供指定時段。</li>
        </ol>
    </div>
    <!-- 箭頭圖片 -->
    <div style="display: flex;justify-content: center;align-items: center;">
        <img src="images/arrow.png" class="arrow" style="margin-top:3%;width:3%;height:auto; animation: moveAndReset 2s infinite; ">
    </div>

                                
    <div class="form-container">
        <h3 class="h2 mb-5" style="color:#FEAC2C"><strong>TheDancers報名表單</strong></h3>
        <h4>個人資料</h4>

        <form method="POST" action="FormControl.php">
            <div class="form-group">
				<label for="name" >真實姓名</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="請輸入您的真實姓名" required>
			</div>
            <div class="form-group">
				<label for="name">參賽暱稱</label>
				<input type="text" class="form-control" id="nickname" name="nickname" placeholder="請輸入您的參賽使用暱稱" required>
			</div>
			<div class="form-group">
				<label for="dob">出生年月日</label>
				<input type="date" class="form-control" id="dob" name="birth" required>
			</div>
			<div class="form-group">
				<label for="address">地址</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="請輸入您的地址" required>
			</div>

            <div class="form-floating mb-3">
                <label for="phone">電話</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="請輸入正確的10位數字電話號碼" required>
            </div>
            
            <div class="form-floating mb-3">
                <label for="floatingInput">電子郵件</label>
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
            </div>
            
            <div class="form-group">
				<label for="intro">自我介紹</label>
				<textarea maxlength="150" class="form-control" id="intro" name="intro" cols="30" rows="3" placeholder="請輸入150字內的自我介紹" required></textarea>
			</div>
            <div class="form-floating mb-3">
                <label for="floatingInput">60秒Demo影片雲端連結</label>
                <input type="url" class="form-control" id="floatingInput" name="demoaddress" placeholder="附上雲端連結並開放下載權限" required>
            </div>
            <br>

            <input type="submit" class="btn btn-danger" value="提交">
        </form>
    </div>
</body>
</html>
