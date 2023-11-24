<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BouncTxt</title>
    <!-- <link rel="stylesheet" href="css/bounc.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bounc.js">
    <link rel="stylesheet" href="jsnav/bootstrap.bundle.min.js">
    <style>

.body{
    background: ghostwhite;
    margin: 0;
    box-sizing: border-box;
}
#seab{
    display:none;
    background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
}
#sea:hover #seab{
    display:inline;
}




/* bounce start */


*{
    margin: 0;
    padding: 0;
}

body{
     background: ghostwhite;
    /* overflow: hidden; */

}

.letter{
    display: flex;
    width: 90%;
    margin: auto;

}

.letter .word{
    width: 100%;
    
    font-weight: 800;
    font-family: sans-serif;
    font-size: 35px;
    text-align: center;
    position: relative;
    top: 9vh;
    
}

.a , .c , .e , .g , .i , .k{
    animation: anim1 3s cubic-bezier(0.5, 0.05, 1, 0.5) alternate infinite;
    color: red;
}




.b , .d , .f , .h , .j , .l{
    animation: anim2 3s cubic-bezier(0.5, 0.05, 1, 0.5) alternate infinite;

}

@keyframes anim1{
    from{
    
    }
    to{
        transform: translateY(90vh) rotate(720deg);
    }
}

@keyframes anim2{
    from{
        
    }
    to{
        transform: translateY(90vh) rotate(-700deg);
    }
}


    </style>
</head>
<body>
    

<div class="letter">
        <div class="word a">F</div>
        <div class="word b">A</div>
        <div class="word c">R</div>
        <div class="word d">H</div>
        <div class="word e">A</div>
        <div class="word f">D</div>
        <div class="word g">F</div>
        <div class="word h">O</div>
        <div class="word i">Y</div>
        <div class="word j">S</div>
        <div class="word k">A</div>
        <div class="word l">L</div>
    </div>
 

</body>
</html>