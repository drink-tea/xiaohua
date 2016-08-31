<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="index.css" type="text/css" />
    <link href="{{URL::asset('/')}}css/index.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="nav">
    nav
</div>
<div id="left">
    <div class="image-box">
        <div class="image-title">
            这是一个测试的图片
        </div>
        <img src="{{URL::asset('/')}}image/1.jpg" width="400px" />
    </div>
    <div class="image-box">
        <div class="image-title">
            这是一个测试的图片
        </div>
        <img src="{{URL::asset('/')}}image/1.jpg" width="400px" />
    </div>
    <div id="paginate">
    </div>
</div>
<div id="right">
    right
    <div id="hot-tag">
    </div>
    <div id="subscibe">
    </div>
    <div id="post">
    </div>
</div>
<div id="clear">
</div>
<div id="footer">
    footer
</div>
</body>
</html>