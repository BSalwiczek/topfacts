$('document').ready(function(){

loadNewCard();
  callSetFunctions();

})

$(window).resize(function(){
  callSetFunctions();
})

function callSetFunctions(){
  makeNextButtonWork();
  setFakeCardPos();
  setCardSize();
  setBodyFontSize();
  setHeaderSize();
  setImgSize();
  setTextSize();
  setButtonPos();
}
function setCardSize()
{
  var cardH = $( window ).height()*0.75;
  var cardMargTop = $( window ).height()*0.03;
  var cardMargBot = $( window ).height()*0.1;
  var cardBorRad = $( window ).height()*0.01;
  var cardPad = $( window ).height()*0;
  $(".card").css({
    "height":cardH,
    "margin-top":cardMargTop,
    "margin-bottom":cardMargBot,
    "border-radius":cardBorRad,
    "padding":cardPad,
  });
  $(".fakeCard").css({
    "height":cardH,
    "margin-top":cardMargTop,
    "margin-bottom":cardMargBot,
    "border-radius":cardBorRad,
    "padding":cardPad,
  });
}
function setFakeCardPos()
{
  var fakeCardLeft = $( window ).width()*0.143;
  var fakeCardTop = $( window ).height()*0.13;
  $(".fakeCard").css({
    "left":fakeCardLeft,
    "top":fakeCardTop,
    "width": "71.5%"
  });
}
function setHeaderSize()
{
  var headerBorRad = $( window ).height()*0.01;
  $(".titleCont").css({
    "border-radius":headerBorRad
  })
}
function setBodyFontSize()
{
  var size = $( window ).height()*0.03;
  $("body").css("font-size",size);
}
function setImgSize()
{
  var imgBorRad = $( window ).height()*0.01;
  $("img.cardImg").css({
    "border-top-left-radius":imgBorRad,
    "border-top-right-radius":imgBorRad,
  })
}
function setTextSize()
{
  var textPad = $( window ).height()*0.04;
  $("p.cardDesc").css({
    "padding-left":textPad,
    "padding-right":textPad,
  })
}
function setButtonPos()
{
  var top = $( window ).height()*0.11 - $( "p.cardDesc" ).height();
  $("button.next").css({
    "top":top
  })
}
function loadNewCard(){
  $(".card").remove();
  $.post("getCard.php",function(data){
    $(".fakeCard").after(data);
    callSetFunctions();
    $(".card").hide().fadeIn(400);
  });

}

function makeNextButtonWork()
{
  $('.card').on('click', 'button.next', function() {
    var x = Math.floor(Math.random() * 1000) + 1000;
    if(Math.round(Math.random()) == 1)
      x = -x;

    var y = Math.floor(Math.random() * 1000) + 1000;
    if(Math.round(Math.random()) == 1)
      y = -y;

      $(".card").css({
        "transform": "translate("+x+"px, "+y+"px) rotate(120deg)",
        "transform-origin": "50% 50%",
        "opacity": "0",
        "transition":" transform  1s 0.3s, opacity 1s 0.2s"
      })


      setTimeout(loadNewCard,600);
    });
}
