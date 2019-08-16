$(function () {

  //有序列表和无序列表

  //有序列表序列化
  $('.ol>li').each(function (index) {
    console.log(index);
    let value = $(this).html();
    $(this).html((index + 1) + "、" + value);
  })
  $('.h2').each(function (index) {
    console.log(index);
    let value = $(this).html();
    $(this).html('<strong style="margin-left: -35px;">' + (index + 1) + "、</strong>" + value);
  })
  $('.ul>li').each(function (index) {
    console.log(index);
    let value = $(this).html();
    $(this).html("<span>●</span>" + value);
  })









  // 快速返回头部 start
  /*
  //老版本 不好用
  function $(id) {
    return document.getElementById(id);
  }

  function show(obj) {
    obj.style.display = 'block';
  }

  function hide(obj) {
    obj.style.display = 'none';
  }

  function scroll() {
    if (window.pageYOffset != null) { //ie9+浏览器
      return {
        left: window.pageXOffset,
        top: window.pageYOffset
      }
    } else if (document.compatMode == "CSS1Compat") { //标准浏览器
      return {
        left: document.documentElement.scrollLeft,
        top: document.documentElement.scrollTop
      }
    }
    return { //其它浏览器
      left: document.body.scrollLeft,
      top: document.body.scrollTop
    }
  }
  var goTop = $("gotop");
  window.onscroll = function () {
    scroll().top > 0 ? show(goTop) : hide(goTop);
    leader = scroll().top;
  }
  var leader = 0,
    target = 0,
    timer = null;
  let flagTop = false;
  goTop.onclick = function () {
    //添加判断 拒绝重复点击
    if (flagTop) return false;
    flagTop = true;
    target = 0; //可以省略
    timer = setInterval(function () {
      leader = leader + (target - leader) / 5;
      window.scroll(0, leader);
      if (leader == target) {
        clearInterval(timer);
        flagTop = false;
      }
    }, 30)
  }
  */

  $("#gotop").click(function () {
    console.log('测试测试')
    $(this).animate({
        "bottom": "0",
        "opacity": "1"
      }, 100,
      function () {
        setTimeout(function () {
          $('body,html').animate({
            scrollTop: 0
          }, 1200);
          $("#gotop").animate({
            "top": "0",
            "bottom": "auto",
            "opacity": "0"
          }, 700, function () {
            setTimeout(function () {
              $("#gotop").css({
                "bottom": "50px",
                "top": "auto",
                "opacity": "1"
              })
            }, 500)
          })
        }, 300)
      })
  })


  $(document).scroll(function () {
    var scrollTop = $(document).scrollTop();
    if (scrollTop > 500) {
      $("#gotop").css({
        "display": "block",
        "opacity": "1"
      })
    } else {
      $("#gotop").css({
        "display": "none",
        "opacity": "0"
      })
    }
    //var se = document.documentElement.clientHeight;
  });


  // 快速返回头部 end 



















  //一键换肤
  $('.bg').css("background", "red")


  // function bgCur() {
  //   let arr = ['', '6a1bd5', '1bc1d5', 'd1b016', 'b4823b', 'd133b1', '907222']
  //   $('body').css('background', "#" + arr[index])
  //   index++
  //   if (index == arr.length) {
  //     index = 0
  //   }
  // }


  var store = {
    save(key, value) {
      localStorage.setItem(key, JSON.stringify(value));
    },
    fetch(key) {
      return JSON.parse(localStorage.getItem(key)) || [];
    }
  }
  let index = 2

  /*
  首先判断本地存储中是否有值，没有赋初值 有的话++

  */
  //store.save('index', index); //存入数据
  //console.log(store.fetch('index')); //取出数据
  //bgCur()

  function bgCur() {
    setInterval(() => {
      $('body').css('background', 'url(/wp-content/themes/h/img/bg/IMG' + index + ".jpg) no-repeat")
      $('body').css({
        'background-attachment': 'fixed',
        'background-size': 'cover',
        'transition': 'all .6s'
      });
      if (store.fetch('index' == [])) {
        store.save('index', index)
      } else {
        index = store.fetch('index')

      }
      console.log('当前的index为', index);
      index++
      store.fetch('index')
      if (index > 6) {
        index = 2
      }
    }, 3000)
  }



  

});