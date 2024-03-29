<div class="cssload-container">
    <ul class="cssload-flex-container">
        <li>
        <span class="cssload-loading"></span>
        </li>
    </ul>    
</div>
    


<style type="text/css" >
.preloader .status {top:40% !important;}

.cssload-container * {
    box-sizing: border-box;
        -o-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
}
.cssload-container {
    margin: 19px auto 0 auto;
    max-width: 545px;
}

.cssload-container ul li{
    list-style: none;
}

.cssload-flex-container {
    display: flex;
        display: -o-flex;
        display: -ms-flex;
        display: -webkit-flex;
        display: -moz-flex;
    flex-direction: row;
        -o-flex-direction: row;
        -ms-flex-direction: row;
        -webkit-flex-direction: row;
        -moz-flex-direction: row;
    flex-wrap: wrap;
        -o-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -moz-flex-wrap: wrap;
    justify-content: space-around;
}
.cssload-flex-container li {
    padding: 10px;
    height: 97px;
    width: 97px;
    margin: 29px 19px;
    position: relative;
    text-align: center;
}

.cssload-loading {
    display: inline-block;
    position: relative;
    width: 83px;
    height: 83px;
    border-radius: 100%;
        -o-border-radius: 100%;
        -ms-border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
    border: 5px solid transparent;
    border-bottom: 5px solid <?php echo esc_attr(et_get_option('divi_DCT_preloader_color', '#fff'))  ;  ?>;
    border-left: 5px solid <?php echo esc_attr(et_get_option('divi_DCT_preloader_color', '#fff'))  ;  ?>;
    animation: cssload-spinR 2.3s linear infinite;
        -o-animation: cssload-spinR 2.3s linear infinite;
        -ms-animation: cssload-spinR 2.3s linear infinite;
        -webkit-animation: cssload-spinR 2.3s linear infinite;
        -moz-animation: cssload-spinR 2.3s linear infinite;
}
.cssload-loading:before, .cssload-loading:after {
    content: '';
    display: block;
    border-radius: 100%;
        -o-border-radius: 100%;
        -ms-border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
    position: absolute;
}
.cssload-loading:before {
    height: 49px;
    width: 49px;
    border: 3px solid transparent;
    border-top: 3px solid <?php echo esc_attr(et_get_option('divi_DCT_preloader_color', '#fff'))  ;  ?>;
    border-right: 3px solid <?php echo esc_attr(et_get_option('divi_DCT_preloader_color', '#fff'))  ;  ?>;
    animation: cssload-spinL 0.86s linear infinite;
        -o-animation: cssload-spinL 0.86s linear infinite;
        -ms-animation: cssload-spinL 0.86s linear infinite;
        -webkit-animation: cssload-spinL 0.86s linear infinite;
        -moz-animation: cssload-spinL 0.86s linear infinite;
    transform-origin: center center;
        -o-transform-origin: center center;
        -ms-transform-origin: center center;
        -webkit-transform-origin: center center;
        -moz-transform-origin: center center;
    top: 11%;
    left: 11%;
}
.cssload-loading:after {
    height: 10px;
    width: 10px;
    background: transparent;
    border: 2px solid <?php echo esc_attr(et_get_option('divi_DCT_preloader_color', '#fff'))  ;  ?>;
    top: 35.5%;
    left: 35.5%;
}




@keyframes cssload-spinR {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@-o-keyframes cssload-spinR {
    from {
        -o-transform: rotate(0deg);
    }
    to {
        -o-transform: rotate(360deg);
    }
}

@-ms-keyframes cssload-spinR {
    from {
        -ms-transform: rotate(0deg);
    }
    to {
        -ms-transform: rotate(360deg);
    }
}

@-webkit-keyframes cssload-spinR {
    from {
        -webkit-transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(360deg);
    }
}

@-moz-keyframes cssload-spinR {
    from {
        -moz-transform: rotate(0deg);
    }
    to {
        -moz-transform: rotate(360deg);
    }
}

@keyframes cssload-spinL {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(-360deg);
    }
}

@-o-keyframes cssload-spinL {
    from {
        -o-transform: rotate(0deg);
    }
    to {
        -o-transform: rotate(-360deg);
    }
}

@-ms-keyframes cssload-spinL {
    from {
        -ms-transform: rotate(0deg);
    }
    to {
        -ms-transform: rotate(-360deg);
    }
}

@-webkit-keyframes cssload-spinL {
    from {
        -webkit-transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(-360deg);
    }
}

@-moz-keyframes cssload-spinL {
    from {
        -moz-transform: rotate(0deg);
    }
    to {
        -moz-transform: rotate(-360deg);
    }
}


</style>