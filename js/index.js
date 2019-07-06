



$(function(){
 
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
    $(this).html('<strong>' + (index + 1) + "、</strong>" + value);
  })
  $('.ul>li').each(function (index) {
    console.log(index);
    let value = $(this).html();
    $(this).html("<span>●</span>" + value);
  })
  
});


let navFlag = false

//手机左侧菜单渐进滑出
function tabNav() {
  navFlag = !navFlag
  if (navFlag) {
    $('.slide_nav').css("width", '150px');
    $('.slide_nav').css("opacity", '1');
  } else {
    $('.slide_nav').css("width", '0');
    $('.slide_nav').css("opacity", '0');
  }
}

//手机端搜索页面展开
function phoneSearch() {
  let height = $('.phone_search').css("height")
  height = height === "60px" ? "0px" : '60px';

  if (height === "60px") {
    $('.phone_search').css({
      "height": '60px',
      "opacity": 1,
      "z-index": 99
    });

  } else {
    $('.phone_search').css({
      "height": '0',
      "opacity": 0,
      "zIndex": -1
    });
  }

}
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