<?php
//Check if 1 hour has passed
$filetime = time() - filemtime('feed.xml');
if ($filetime > 3600) {
    //Download rss file
    $rss = simplexml_load_file('#');
    //Save rss file
    $rss->asXML('feed.xml');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Times</title>

    <link rel="preload" href="./assets/animate.min.css" as="style">
    <link rel="preload" href="./assets/jquery.min.js" as="script">


    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <script src="./assets/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/animate.min.css">
    <style>
        /*configuraçao padrao */
        * {

            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        /*reponsividade para a tela pequena */
        @media (min-width: 719px) and (max-width: 1918px) {

            /*configuraçao da tela */
            #tela {
                background-image: url('./assets/linuxbg.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                width: 100%;
                height: 100%;

                object-fit: cover;
                position: absolute;
            }

            /*barra debaixo */
            #barrab {
                position: absolute;
                top: 87%;
                left: 0;
                width: 100%;
                height: 100px;

                background-image: url("./assets/bar2.png");


            }

            /*barra de cima*/
            #barrac {
                position: absolute;
                top: 0%;
                left: 0%;
                width: 100%;
                height: 100px;

                background-image: url("./assets/bar2.png");
                background-size: cover;
            }

            /* descriçao */
            #txt1 {
                position: absolute;
                top: 2%;
                left: 5px;
                color: #fff;
                font-size: 1em;
                font-family: Arial, Helvetica, sans-serif;
                width: 98%;
                height: 75px;

                padding: 10px;
                margin: 5px;

            }

            /* titulo */
            .txt2 {
                position: absolute;
                top: 2%;
                left: 0;
                color: #fff;
                font-size: 1.4em;
                font-family: Arial, Helvetica, sans-serif;
                padding-left: 1%;
                padding: 2px;
                font-weight: 800;
                padding: 10px;
                margin: 5px;
                width: 700px;
                height: 75px;
            }

            /*logo do money times */
            #mt {
                position: absolute;
                top: 50%;
                left: 81%;
                transform: translate(-50%, -50%);

                height: 200px;
            }

            /*#barram {
                position: absolute;
                top: 50%;
                left: 0%;
                width: 100%;
                height: 100px;

                background-image: url("./assets/bar2.png");
                background-size: cover;
            }

            #txt3 {
                position: absolute;
                top: 2%;
                left: 0;
                color: #fff;
                font-size: 1.4em;
                font-family: Arial, Helvetica, sans-serif;
                padding-left: 1%;
                padding: 2px;
                font-weight: 800;
                padding: 10px;
                margin: 5px;
                width: 700px;
                height: 75px;
            }*/
        }

        /*reponsividade para a tela grande */
        @media (min-width: 1919px) {

            /*configuraçao da tela */
            #tela {
                width: 100%;
                height: 100%;

                object-fit: cover;
                position: absolute;
            }

            /*barra debaixo */
            #barrab {
                position: absolute;
                top: calc(100% - 150px);
                left: 0;
                width: 100%;
                height: 150px;

                background-image: url("./assets/bar2.png");


            }

            /*barra de cima*/
            #barrac {
                position: absolute;
                top: 0%;
                left: 0%;
                width: 100%;
                height: 150px;

                background-image: url("./assets/bar2.png");
                background-size: cover;
            }

            /* descriçao */
            #txt1 {
                position: absolute;
                top: 2%;
                left: 5px;
                color: #fff;
                font-size: 1.5em;
                font-family: Arial, Helvetica, sans-serif;
                width: 98%;


                padding: 2px;
                margin-block: 20px;
                margin-inline: 5px;

            }

            /* titulo */
            .txt2 {
                position: absolute;
                top: 2%;
                left: 0;
                color: #fff;
                font-size: 2em;
                font-family: Arial, Helvetica, sans-serif;
                padding-left: 1%;
                padding: 2px;
                font-weight: 800;
                padding: 10px;
                margin: 5px;
                width: 1300px;

            }

            /**logo do money times */
            #mt {
                position: absolute;
                top: 50%;
                left: 86%;
                transform: translate(-50%, -50%);

                height: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- DISCLAIMER -->
    <!-- All rights reserved to Combo Videos -->
    <!-- Usage of this feed is limited to Combo Videos partners -->
    <!-- Contact development team for more info -->
    <!-- desenvolvimento@combovideos.com.br -->

    <img id="tela" style="background-color: #000;" alt="teste" class="animate__animated animate__fadeIn">
    <div id="barrab" class="animate__animated animate__slideInUp">
        <div id="txt1">teste de linux.</div>
    </div>

    <!-- <div id="barram" class="animate__animated animate__slideInUp">
        <div id="txt3">teste de linux.</div>
    </div> -->

    <div id="barrac" class="animate__animated animate__slideInDown">
        <img id="mt" src="./assets/logolinux.png" alt="mt">
        <div class="txt2">Empora optio obcaecati sint deleniti soluta mollitia odio perferendis, sapiente magnam dicta iure officiis hic! Consequuntur corporis non vel!</div>
    </div>

    <script>
        function is_cached(src) {
            var image = new Image();
            image.src = src;

            return image.complete;
        }


        $.ajaxSetup({
            cache: false
        });

        //Get rss file feed.xml
        $.get('feed.xml', function(data) {
            //Get entire file
            var item = $(data).find('item');
            //Get size of
            var size = item.length;
            console.log(size);

            //localStorage set item
            if (localStorage.getItem('index') == null) {
                localStorage.setItem('index', size);
            }
            if (localStorage.getItem('current') == null) {
                localStorage.setItem('current', 0);
            } else if (localStorage.getItem('current') == 0) {
                localStorage.setItem('current', 1);
            } else if (localStorage.getItem('current') < size - 1) {
                localStorage.setItem('current', parseInt(localStorage.getItem('current')) + 1);
            } else {
                localStorage.setItem('current', 0);
            }
            console.log(localStorage.getItem('current'));

            var title = $(item[localStorage.getItem('current')]).find('title').text();
            $('.txt2').text(title);


            var description = $(item[localStorage.getItem('current')]).find('description').text();
            $('#txt1').text(description);




            var link = $(item[localStorage.getItem('current')]).find('image').text();
            link = 'http://combovideos.com.br/integra/moneytimes/' + link;

            $('#tela').attr('src', link);

        });

        //Preload all xml image links
        $(document).ready(function() {
            $.get('feed.xml', function(data) {
                var item = $(data).find('item');
                var size = item.length;
                for (i = 0; i < size; i++) {
                    if (i == 0) {
                        $check = is_cached($(item[i]).find('image').text());
                        console.log($check);
                    }
                    if ($check == false) {
                        var image_preload = new Image();
                        image_preload.src = $(item[i]).find('image').text();
                    }
                }
            });
        });
    </script>
</body>

</html>