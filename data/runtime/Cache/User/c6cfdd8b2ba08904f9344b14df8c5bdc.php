<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
      <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
      <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>项目选择</title>
      <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
      <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
      <link rel="stylesheet" href="/public/app/lib/swiper/swiper.min.css" />
      <link rel="stylesheet" href="/public/app/css/public.css" />
      <link rel="stylesheet" href="/public/app/css/style.css" />
      <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
      <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
      <script type="text/javascript" src="/public/app/js/v.min.js" ></script>
      <script type="text/javascript" src="/public/app/js/common.js" ></script>
  </head>
  <body>
    <section class="mainSec" id="app">
     <?php if($number > 0): ?><ul class="xmList">
        <li :class="prop.id==isdown?'active':''" v-for="prop,index in list" @click="choseFn($event,index,prop.id)">
          <a :href='prop.url' style="display: block;">
          <div class="check"></div>
          <div class="ellipsis" style="margin-left: 5rem;" v-text="prop.project_name"></div>
          </a>
        </li>
      </ul>
      <?php else: ?>
      <div style="font-size:20px;text-align:center;padding:10px;margin-top:80px;">没有相关项目</div><?php endif; ?>
    </section>
  </body>
</html>
<script>
  var app = new Vue({
    el:'#app',
    data:{
      list:<?php echo ($project); ?>,    //列表
      isdown:'<?php echo ($ids); ?>'     //当前选中的ID
    },
    methods:{
      choseFn:function(evt,index,idss){
        var self=this;
        console.log(idss);
        self.isdown =idss;
        $('.xmList li').eq(index).addClass('active').siblings().removeClass('active');
      }
    }
  })
</script>