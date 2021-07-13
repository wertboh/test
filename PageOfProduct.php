<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Bielita Belita Young BB</title>
    <style>
        body {
            background-color: #c6ecc6;
            padding: 30px;
        }

        .photo {
            width: 400px;
        }

        H1 {
            color: black;
            font-family: Noto Sans, sans-serif;
        }

        .description {
            float: right;
            width: 700px;
            font-family: Noto Sans, sans-serif;
        }

        fieldset {
            width: 0px;
        }

        input[type=text], input[type=email] {
            border-radius: 4px;
            padding: 15px 20px;
            margin: 4px 0;
            border: 1px solid #ccc;
            width: 250px;
            background: lightyellow;
        }

        textarea {
            border-radius: 4px;
            margin: 14px 10px;
            border: 1px solid #ccc;
            resize: none;
            width: 250px;
            height: 100px;
            background: lightyellow;
        }

        .text {
            font-family: Noto Sans, sans-serif;
        }

        input[type=reset], input[type=button] {
            background-color: white;
            color: black;
            padding: 4px 16px;
            margin: 4px 2px;
            border: 1px solid #ccc;
            width: 100px;
        }
    </style>
</head>
<body>
<img src="Photo/photoProduct.png" alt="bb cream" class="photo">
<div class="description"><h1>Bielita Belita Young BB</h1>
    Этот крем не зря получил такое название. Известная одноименная компьютерная программа позволяет добиться идеального
    тона кожи на изображениях. Это же средство декоративной косметики позволит стать обладательницей такой кожи, которая
    не требует маскировки на фотографиях. После нанесения такого ВВ-крема кожа приобретает естественный тон и здоровое
    сияние.
    Средство разглаживает рельеф и маскирует все несовершенства. ВВ-крем подстраивается под ваш естественный тон.
</div>
<center><br>
    <fieldset>
        <form id="comment_on_product">
            <br><input type="email" id="email" name="email" placeholder="Email"><br>
            <div id="massage_email" style="color:indianred"></div>
            <br>
            <br><input type="text" id="nameUser" name="nameUser" placeholder="Firstname"><br>
            <div id="massage_nameUser" style="color:indianred"></div>
            <br>
            <div class="text">Select rating</div>
            <br><input type="radio" id="rating1" name="rating" value="1">1&nbsp;
            <input type="radio" name="rating" value="2">2&nbsp;
            <input type="radio" name="rating" value="3">3&nbsp;
            <input type="radio" name="rating" value="4">4&nbsp;
            <input type="radio" name="rating" value="5">5<br>
            <div id="massage_rating" style="color:indianred"></div>
            <br>
            <br><textarea name="comment" placeholder="Put your comment..." id="comment"></textarea><br>
            <div id="massage_comment" style="color:indianred"></div>
            <input type="file" id="file" name="picture" class="download" multiple accept="image/*">
            <div id="massage_file" style="color:indianred"></div>
            <br><input type="button" id="submitbtn" name="submitbtn" value="Submit">&nbsp;
            <input type="reset" name="resetbtn" value="Reset">
        </form>
    </fieldset>
</center>

<div id="comment_0"> </div>

<div id="result_form"></div>
<script src="ajaxPageOfProduct.js"></script>
</body>
</html>
