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


/* heart */

/* 
.heart{
    background-color: crimson;
    display: inline-block;
    width: 200px;
    height: 200px;
    position: relative;
    top: 0;
    transform: rotate(-45deg);
    position: absolute;
    left: 45%;
    top: 45%;
    animation: heartbeat 1.25s infinite;

}

.heart::before , .heart::after{
    content: "";
    background-color: crimson;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    position: absolute;
    animation: pulse 1.25s infinite;


}
.heart::before{
    top: -100px;
    left: 0;

}
.heart::after{
    top: 0;
    left: 100px;

}

@keyframes heartbeat{
    0%{
        transform: scale(1), rotate(-45deg);
    }
    10%{
        transform: scale(1.25), rotate(-45deg);
        background-color: rgb(7, 226, 255);
    }
    100%{
        transform: scale(1), rotate(-45deg);

    }
}
@keyframes pulse{
    0%{
       
    }
    10%{
    
        background-color: rgb(8, 220, 248);
    }
    100%{
        

    }
}

.hearth1{
    margin-top: 140px;
    transform: rotate(45deg);
    margin-left: -10px;
    color: crimson;
} */



/* heart end */


/* circular progress bar */
.wrapper{
    position: absolute;
    width: 400px;
    height: 400px;
    margin: 0 auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    display: flex;
    flex-direction: row;

}
.preload{
    flex: 1;
    padding: 0 20px;
}

/* animated progress bar */
.preload{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.stat{
    stroke: #ccc;
    stroke-width: 14;
    fill: transparent;
}
.load{
    fill: url(#Gradient);
    stroke: url(#Gradient);
    fill-opacity: 0;
    stroke-width: 14;
    stroke-dasharray: 628;
    stroke-linecap: round;
    transition: fill-opacity 0.5s linear;
    animation: load 1s linear;
}
.num{
    font-size: 13px;
    fill: url(#Gradient);
    font-family: poppins;
    font-weight: 600;
    text-transform: Uppercase;
}
@keyframes load{
    0%{
        stroke-dashoffset: 638;
    }
    20%{
        stroke-dashoffset: 502.4;
    }
    40%{
        stroke-dashoffset: 376.8;
    }
    60%{
        stroke-dashoffset: 251.2;

    }
    80%{
        stroke-dashoffset: 125.6;
    }
    100%{
        stroke-dashoffset: 0;
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
<!-- heart start -->
    <!-- <div class="heart">
        <h1 class="hearth1">I <3 you <br>.FMNF.</h1>
    </div> -->
<!-- heart end -->
<!-- circular progress bar -->
     <div class="wrapper text-center">
        <div class="container preload text-center chart" data-size="400" data-value="88" data-arrow="up"></div>
    </div>


<!-- animated progress bar -->
    <div class="container  preload text-center">
        <svg width="300" hieght="300" viewBox="0 0 300 300">
            <defs>
                <linearGradient id="Gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#e100ff" />
                    <stop offset="100%" stop-color="#009fff" />
                </linearGradient>
            </defs>

            <circle class="stat" cx="150" cy="150" r="100" />
            <circle class="load" cx="150" cy="150" r="100" transform="rotate(-90 150 150)" />
            <text class="num" stroke-width="3" x="150" y="55%" text-anchor="middle">১ সেকেন্ড অপেক্ষা করুন প্লিজ</text>
        </svg>
    </div>


</body>
</html>