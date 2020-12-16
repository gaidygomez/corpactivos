<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    <!-- Title Tag -->
    <title>CorpActivos</title>
    <!--

    November Template

    http://www.templatemo.com/tm-473-november

    -->
    <!-- <<Mobile Viewport Code>> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- <<Attched Stylesheets>> -->
    <link rel="stylesheet" href=" {{ asset('css/theme.css') }} " type="text/css" />
    <link rel="stylesheet" href=" {{ asset('css/media.css') }} " type="text/css" />
    <link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} " type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,600italic,400italic,800,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <style>
        .marquee-banner {
            height: 50px;
            color: #002fff;
            background-color: #ffffff;
            margin: 1rem 0;
            font-weight: 800;
            font-size: 25px;
            font-family: 'Open Sans', 'sans-serif';
            padding: 7px 0;
        }
    </style>

    </head>
    <body>
        <!-- \\ Begin Holder \\ -->
        <div class="DesignHolder">
            <!-- \\ Begin Frame \\ -->
            <div class="LayoutFrame">
                <!-- \\ Begin Header \\ -->
                <header>
                    <div class="Center">
                        <div class="site-logo">
                            <h1><a href="#">    <img src=" {{ asset('img/logo.jpg') }} " alt="" width="154" height="97"/></a></h1>
                        </div>
                        <div id="mobile_sec">
                            <div class="mobile"><i class="fa fa-bars"></i><i class="fa fa-times"></i></div>
                            <div class="menumobile">
                                <!-- \\ Begin Navigation \\ -->
                                <nav class="Navigation">
                                    <ul>
                                        <li class="active">
                                            <a href="#home">INICIO</a>
                                            <span class="menu-item-bg"></span>
                                        </li>
                                        <li><span class="menu-item-bg"></span>
                                        </li>
                                        <li>
                                            <a href="#services">EMPRESA</a>
                                            <span class="menu-item-bg"></span>
                                        </li>
                                        <li>
                                            <a href=" {{ route('register') }} ">REGISTRO</a>
                                            <span class="menu-item-bg"></span>
                                        </li>
                                        <li>
                                            <a href=" {{ route('login') }} ">LOGIN</a>
                                            <span class="menu-item-bg"></span>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- // End Navigation // -->
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </header>
                <!-- // End Header // -->
                <!-- \\ Begin Banner Section \\ -->
                <div class="Banner_sec" id="home">
                    <!--  \\ Begin banner Side -->
                    <div class="bannerside">
                        <div class="Center">
                        @include('partials.marquee')

                            <!--  \\ Begin Left Side -->
                            <div class="leftside">
                                <h3>RESPONSABILIDAD<span>Y CONFIANZA PARA NUESTROS CLIENTES</span></h3>
                            <p>En CorpActivos lo primero son nuestros clientes. Ellos son nuestra carta de presentación</p>
                            <a href="#about">Más Detalles</a>
                        </div>
                        <!--  // End Left Side // -->
                        <!--  \\ Begin Right Side -->

                                <!--  // End Left Side // -->
                        <!--  \\ Begin Right Side -->
                        <div class="rightside">

                            <ul id="slider">
                                <li>
                                    <div class="Slider">
                                        <figure><img src=" {{ asset('img/Slider-img1.jpg') }} " alt="image"></figure>
                                        <div class="">
                                            <div class="Icon">
                                                <ul>

                                                </ul>
                                            </div>
                                            <div class="Lorem">

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="Slider">
                                        <figure><img src=" {{ asset('img/Slider-img2.jpg') }} " alt="image"></figure>
                                    <div class="">
                                            <div class="Icon">
                                                <ul>

                                                </ul>
                                            </div>


                                            </div>
                                </div>
                            </div>
                                </li>
                            </ul>
                            <figure></figure>
                </div>
                        <!--  // End Right Side // -->
                    </div>
                </div>
                <!--  // End banner Side // -->
                </div>
            </div>
        </div>
                                </li>
                            </ul>
                            <figure></figure>
    </div>
                        <!--  // End Right Side // -->
                    </div>
                </div>
                <!--  // End banner Side // -->
                <div class="clear"></div>
            </div>
            <!-- // End Banner Section // -->
            <div class="bgcolor"></div>
            <!-- \\ Begin Container \\ -->
            <div id="Container">
                <!-- \\ Begin About Section \\ -->
                <div class="About_sec" id="about">
                    <div class="Center">
                        <h2>¿QUIENES SOMOS?</h2>
                        <p>Somos una agencia de cambios dedicada a cubrir los mercados de Colombia, Chile y Ecuador <br> en cuanto a giros hacia Venezuela con la mejor tasa del mercado. </p>
                        <div class="Line"></div>
                        <!-- \\ Begin Tab side \\ -->
                        <div class="Tabside">
                            <ul>
                                <li><a href="#" class="tabLink activeLink" id="cont-1">Misión</a></li>
                                <li><a href="#" class="tabLink" id="cont-2">Visión</a></li>
                                <li><a href="#" class="tabLink" id="cont-3">Publicidad</a></li>
                            </ul>
                        <div class="clear"></div>
                            <div class="tabcontent" id="cont-1-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src=" {{ asset('img/about-img2.jpg') }} " alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src=" {{ asset('img/about-img1.jpg') }} " alt="image"></figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>SER MEJORES SIEMPRE<span>Ser la casa de giros por excelencia</span></h3>
                                    <p>Información <span class="cyan">Información</span> Informacion</p>
                                    <p>Información</p>
                                </div>
                            </div>
                            <div class="tabcontent hide" id="cont-2-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src=" {{ asset('img/about-img2.jpg') }} " alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src=" {{ asset('img/about-img1.jpg') }} " alt="image"></figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>INFORMACIÓN<span>Información</span></h3>
                                    <p>Información </p>
                                    <p>Información</p>
                                </div>
                            </div>
                            <div class="tabcontent hide" id="cont-3-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src=" {{ asset('img/about-img2.jpg') }} " alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src=" {{ asset('img/about-img1.jpg') }} " alt="image"></figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>Publicidad <span>Publicidad</span></h3>
                                    <p>Publicidad</p>
                                    <p>Publicidad</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- // End Tab Side // -->
                    </div>
                </div>
                <!-- // End About Section // -->
            <!-- \\ Begin Services Section \\ -->

                    <!-- // End Services Side // -->
                </div>
            </div>
            <!-- // End Services Section // -->
            <!-- \\ Begin Pricing Section \\ -->

                    <!-- // End Pricing Side // -->
                </div>
            </div>
            <!-- // End Pricing Section // -->
            <!-- \\ Begin Contact Section \\ -->
            <div class="Contact_sec" id="contact"><!-- \\ Begin Get Section \\ -->
                    <div class="Get_sec">
                        <div class="Mid">
                            <!-- \\ Begin Left Side \\ -->
                            <div class="Leftside">
                                <form action="#">
                                    <fieldset>
                                        <p><input type="text" value="" placeholder="NOMBRE Y APELLIDO" class="field"></p>
                                        <p><input type="email" value="" placeholder="CORREO ELECTRÓNICO" class="field"></p>
                                        <p><input type="text" value="" placeholder="TÍTULO" class="field"></p>
                                        <p><textarea cols="2"  rows="2" placeholder="MENSAJE"></textarea></p>
                                        <p><input type="submit" value="ENVIAR" class="button"></p>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- // End Left Side // -->
                            <!-- \\ Begin Right Side \\ -->
                            <div class="Rightside">
                                <h2>¿Dudas? ¿Preguntas?</h2>
                        <p>Póngase en contacto con alguno de nuestrso Administradores<br>
                        Estamos para servirle y responder todas sus inquietudes</p><h3>¡Contáctenos!</h3>
                                    <address>
                                        Calle 22 Bis, #59-28.<br>Barrio San Luis, Bogotá, Colombia.
                                    </address>
                                    <address class="Number">
                                        (+59) 396 138 2497 <br>(+57) 300 708 4187
                                    </address>
                                    <address class="Email">
                                        <a href="mailto:info@november.com">gerencia@corpactivos.com</a>
                                    </address>
                                    <div class="clear"></div>
                                    <ul>
                                        <li><a rel="nofollow" href="http://www.facebook.com/corpactivos"
                                    target="_parent"><img src="img/facebook-icn.png" alt="image"></a></li>
                                        <li><a href="#"><img src="img/twitter-icn.png" alt="image"></a></li>
                                        <li><a href="#"><img src="img/google-plus-icn.png" alt="image"></a></li>
                                    </ul>
                            </div>
                            <!-- // End Right Side // -->
                        </div>
                        <!-- \\ Begin Footer \\-->
                        <footer>
                            <div class="Cntr">
                                <p>COPYRIGHT © 2020 CORPACTIVOS. DESARROLLADO POR: <a rel="nofollow" href="http://www.templatemo.com" target="_parent">SISTEMAS DE SERVICIOS INTEGRALES E INFORMÁTICOS</a></p>
                            </div>
                        </footer>
                        <!-- // End Footer // -->
            </div>
                    <!-- // End Get Section // -->

    </div>
                <!-- // End Contact Section // -->
            </div>
            <!-- // End Container // -->
        </div>
        <!-- // End Layout Frame // -->
    </div>
    <!-- // End Design Holder // -->
    <div id="loader-wrapper">
    <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>

    <!-- <<Attched Javascripts>> -->
    <script type="text/javascript" src=" {{ asset('js/jquery-1.11.0.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('js/jquery.sudoSlider.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('js/global.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('js/modernizr.js') }} "></script>

    </body>
</html>