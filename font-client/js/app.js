
//bg-img

$(document).ready(function(){

    var images = ['002.jpg', '003.jpg', '004.jpg' ,'005.jpg'];

    $('#bgimg').css({'background-image': 'url(img/' + images[Math.floor(Math.random() * images.length)] + ')'});
    
    });