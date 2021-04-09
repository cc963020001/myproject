<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta name="referrer" content="origin">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- IE内核 强制使用最新的引擎渲染网页 -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
<meta name="x5-fullscreen" content="true" ><meta name="x5-page-mode" content="app" > <!-- X5  全屏处理 -->
<meta name="full-screen" content="yes"><meta name="browsermode" content="application">  <!-- UC 全屏应用模式 -->
<meta name="apple-mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/> <!--  苹果全屏应用模式 -->
<title>Aliplayer</title>
<link rel="stylesheet" href="./css/aliplayer-min.css" />
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.9.3/aliplayer-min.js"></script>
    <style type="text/css">
      html, body {width:100%;height:100%;margin:auto;overflow: hidden;}
      body {display:flex;}
      #mse {flex:auto;}
    </style>
</head>
<body>
<div class="prism-player" id="player-con"></div>
<script>
var player = new Aliplayer({
  "id": "player-con",
  "source": "<?php echo $_GET['url'];?>",
  "width": "100%",
  "height": "100%",
  "cover": "https://cdn.jsdelivr.net/gh/cc963020001/image/30f07120fcc36c44a7e9edd99d9581a5.jpg",
  "autoplay": true,
  "isLive": false,
  "rePlay": false,
  "playsinline": true,
  "preload": true,
  "controlBarVisibility": "hover",
  "useH5Prism": true,
  "skinLayout": [
    {
      "name": "bigPlayButton",
      "align": "cc",//值为"cc"时，居中,xy无效
      "x": 30,
      "y": 80
    },
    {
      "name": "H5Loading",
      "align": "cc"
    },
    {
      "name": "tooltip",
      "align": "blabs",
      "x": 0,
      "y": 56
    },
    {
      "name": "thumbnail"
    },
    {
      "name": "controlBar",
      "align": "blabs",
      "x": 0,
      "y": 0,
      "children": [
        {
          "name": "progress",
          "align": "blabs",
          "x": 0,
          "y": 44
        },
        {
          "name": "playButton",
          "align": "tl",
          "x": 15,
          "y": 12
        },
        {
          "name": "timeDisplay",
          "align": "tl",
          "x": 10,
          "y": 7
        },
        {
          "name": "fullScreenButton",
          "align": "tr",
          "x": 10,
          "y": 12
        },
        {
          "name": "setting",
          "align": "tr",
          "x": 15,
          "y": 12
        },
        {
          "name": "volume",
          "align": "tr",
          "x": 5,
          "y": 10
        }
      ]
    }
  ]
}, function (player) {
    console.log("The player is created");
  }
);
</script>
</body>