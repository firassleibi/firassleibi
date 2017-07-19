<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject=$_POST['subject'];
	
	$msg="name: ".$name."\n";
	$msg.="subject: ".$subject."\n";
	$msg.="email: ".$email."\n";
	$msg.="message: ".$message."\n";
	mail("firassleibi@gmail.com","Firas Sleibi - Contact page",$msg);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="ar">
    <head>

        <!-- Site Title -->
        <title>فراس صليبي - مهندس برمجيات</title>

        <!-- Site Meta Info -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="فراس صليبي - مهندس برمجيات، مطور مواقع و تطبيقات، برمجة ذو جودة عالية، أرخص الأسعر، وظفني الان واجعل أحلامك الرقمية تصبح حقيقة!">
        <meta name="keywords" content="فراس صليبي,فراس,صليبي,مطور مواقع,مطور تطبيقات,مبرمج,استضافة,html5,php,mysql,css,css3,html,ajax,jquery,software, مهندس برمجيات,android,ios">
        <meta name="author" content="فراس صليبي">
        
        <link rel="alternate" href="http://en.firassleibi.com/" hreflang="en" />
        <link rel="alternate" href="http://ar.firassleibi.com/" hreflang="ar" />

		<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
        <!-- Essential CSS Files -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/simplelightbox.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-rtl.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- Color Styles | To Chage the color simply remove all the stylesheet form bellow without the color you want to keep -->
        <!--link rel="stylesheet" href="css/colors/color-green.css"-->
        <link rel="stylesheet" href="css/colors/color-blue.css">
        <!--link rel="stylesheet" href="css/colors/color-aqua.css"-->
        <!--link rel="stylesheet" href="css/colors/color-purple.css"-->
        <!--link rel="stylesheet" href="css/colors/default-color.css"-->

        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">

        <!-- Google Web Fonts =:= Raleway , Montserrat and Roboto -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:700,500,400" rel="stylesheet" type="text/css">

        <!-- Essential JS Files -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- IE9 Scripts -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-76345551-1', 'auto');
		  ga('send', 'pageview');
		
		</script>

    </head>
    <body>

    <!-- Heaser Area Start -->
    <header class="header-area">
        <!-- Navigation start -->
        <nav class="navbar navbar-custom tb-nav" role="navigation">
            <div class="container">        
              <div class="navbar-header" style="float:left !important">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tb-nav-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#"><h2>فراس<span style="padding-right:3px">صليبي</span></h2></a>
              </div>
          
              <div class="collapse navbar-collapse" id="tb-nav-collapse">
          
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a class="page-scroll" href="#top">الرئيسية</a></li>
                    <li><a class="page-scroll" href="#about">من أنا</a></li>
                    <li><a class="page-scroll" href="#portfolio">أعمالي</a></li>
                    <li><a class="page-scroll" href="#contact">وظفني!</a></li>
                    <li><a class="page-lang" href="http://en.firassleibi.com">English</a></li>
                </ul>
              </div>
            </div>
        </nav>
    </header>
        <!-- Navigation end -->

        <!-- hero-section -->
        <section class="hero-section static-bg" id="top">
                <div class="slider-caption">
                    <div class="container">
                        <div class="row">
                            <!-- Hero Title -->
                            <h1>مرحباً بك <span>في مدونة أعمالي</span></h1>
                            <!-- Hero Subtitle -->
                            <h5 style="padding-top:25px">أفكر + أنصح + أصمم + أطور</h5>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Of Hero Section -->

        <!-- About Us Section -->
        
        <section class="about-us" id="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 no-padding">
                        <!-- About Us Left -->
                        <div class="about-us-left">
                            <!-- About Us Info -->
                            <h2 class="section-title-left">من أنا</h2>
                            <p>اسمي فراس صليبي، مهندس برمجيات خبير، نشأت وكبرت في حلب - سوريا، وأعمل حالياً في دبي - الإمارات العربية المتحدة.<br/>التطوير والإختراع لا أعتبره عملي أو وظيفتي، إنما هو النشاط الذي يشعرني بالسعادة حين أقوم بممارسته!<br/>
                            بدأ شغفي في مجال التكنولوجيا منذ كان عمري لا يتجاوز الثلاثة عشر سنة، طورت نفسي جاهداً يوماً تلو يوم، كل يوم بالنسبة لي خبرة جديدة ومعرفة جديدة اضافها لبستان معرفتي، أبحث عن التقنيات الحديثة ودائماً أطور نفسي لأكون دائماً في مقدمة سباق التكنولوجيا لاستخدم الطرق واللغات والتقنيات الأحدث.<br/>حاصل على شهادة البكالوريوس في الهندسة المعلوماتية والاتصالات. <br/>لمعرفة المزيد عني يمكنك تصفح وتحميل السيرة الذاتية من الرابط المتواجد في الأسفل!
                            </p>
                            <!-- Portfolio Gallery Button -->
                    <div class="portfolio-button text-center mt-50" style="margin-top:25px">
                        <a href="http://firassleibi.com/firassleibi.pdf" target="_blank"><button class="btn btn-primary portfolio-btn">السيرة الذاتية</button></a>
                    </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-sm-6 col-xs-12 no-padding">
                        <!-- About Us Right -->
                        <div class="about-us-right">
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left dotted">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="media-body">
                                    <!-- About Right Title -->
                                    <h3 class="media-heading">أنصح وأحلل</h3>
                                    <p>أقدم النصائح وأحلل مشكلتك وأقدم لك أفضل الحلول الممكنة لمشاريعك، لأجعل أكثر فعالية، بساطة، وتميُّزاً !</p>
                                </div>
                            </div>
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left dotted">
                                    <i class="fa fa-pencil-square-o"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">أصمم</h3>
                                    <p>أقدم إليك أحدث التصاميم العصرية مستخدماً اخر التقنيات والاستراتيجيات لإقدم إليك تصميم جذاب، خاص وفريد!</p>
                                </div>
                            </div>
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-code"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">أطور وأبرمج</h3>
                                    <p>أطور مواقع إلكترونية متوافقة مع كافة الأجهزة الذكية والشاشات (تسوق إلكتروني - وورد برس - مواقع مبرمجة حسب الطلب - مواقع ستاتيكية - منتديات .. والكثير)، أطور تطبيقات الهواتف الذكية وبرمجيات الحاسب، مستخدما أحدث الأدوات واللغات البرمجية، جودة ونظافة الكود هو أولويتي!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Of About Us Section -->

        <!-- Our Services -->

        <section class="our-services-section section-padding" id="service">
            <div class="container">
                <!-- Our service Section Title -->
                <h2 class="section-title text-center">ماذا أقدم إليك</h2>
                <!-- Our service  Section Subtitle -->
                <p class="sub-title text-center">أساعدك في تطوير وبرمجة مشاريع من الصفر، فقط أعطني الفكرة التي تدور في ذهنك، وسأجعل من هذه الفكرة حقيقة!</p>

                <div class="row our-services">

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-lg-offset-1 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <div class="media-body">
                                <!-- Single service title -->
                                <h3 class="media-heading">تطوير المواقع</h3>
                                <p>أطور المواقع من البسيطة إلى المعقدة. ستاتيكي - ديناميكي - تسوق إلكتروني - ووردبرس - جوملا والكثير!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">تطبيقات الأندرويد</h3>
                                <p>تطوير تطبيقات أندرويد من البسيطة إلى المعقدة والإدارة والإشراف على عملية إعادة برمجته للإيفون مع فريقي المختص.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 col-lg-offset-1 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-binoculars"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">الإستضافة وإدارة السيرفرات</h3>
                                <p>أقدم لك حلول استضافة موثوقة وسريعة، أدير وأقوم بعمل نسخ احتياطية لملفات موقعك، الايميلات وقواعد المعطيات بشكل دوري!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-code"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">إصلاح المشاكل وزيادة الحماية</h3>
                                <p>لديك مشروع؟ فيه مشاكل؟ تحتاج إلى تطويره؟ لا يوجد أمان وحماية؟ لقد وصلت للشخص المناسب فقط سلمني المشروع وسأقوم بتقديم كافة الحلول إليك.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- End Of Our Services -->



        <!-- Portfolio Section Starts Here -->
        <section class="protfolio-section section-padding" id="portfolio">
            <div class="container-fluid">
                <!-- Portfolio Section Title -->
                <h2 class="section-title text-center">أعمالي</h2>
                <p class="sub-title text-center">نموذج صغير من الأعمال التي فمت بتطويرها!</p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center portfolio-filter mt-30 mb-30">
                        <!-- Portfolio Filter Navigation -->
                        <div class="portfolio-filter-nav btn-group">
                            <ul id="filter" class="nav">
                                <li class="active" data-group="all">عرض الكل</li>
                                <li data-group="web">المواقع</li>
                                <li data-group="wp">ووردبرس</li>
                                <li data-group="ecom">التسوق الإلكتروني</li>
                                <li data-group="app">التطبيقات</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Portfolio Showcase -->
                    <div class="portfolio-showcase">
                        <!-- Showcase Grid -->
                        <div id="grid" class="clearfix">
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all", "web"]'>
                                <a href="http://www.sdanah.com" target="_blank">
                                    <img src="img/portfolio/portfolio/1.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web", "wp"]'>
                                <a href="http://www.chamhorizon.com" target="_blank">
                                    <img src="img/portfolio/portfolio/2.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://www.modernarea.net" target="_blank">
                                    <img src="img/portfolio/portfolio/3.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://www.legend-ae.com" target="_blank">
                                    <img src="img/portfolio/portfolio/4.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://fahadcrm.byethost7.com/watani/" target="_blank">
                                    <img src="img/portfolio/portfolio/5.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","ecom"]'>
                                <a href="http://fiestalines.com" target="_blank">
                                    <img src="img/portfolio/portfolio/6.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","wp"]'>
                                <a href="http://5plsolutions.com" target="_blank">
                                    <img src="img/portfolio/portfolio/7.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","wp"]'>
                                <a href="img/portfolio/portfolio/8.png">
                                    <img src="img/portfolio/portfolio/8s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","app"]'>
                                <a href="img/portfolio/portfolio/9.png">
                                    <img src="img/portfolio/portfolio/9s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","app"]'>
                                <a href="img/portfolio/portfolio/10.png">
                                    <img src="img/portfolio/portfolio/10s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                      
                
                            

                        </div>
                    </div>



                    
                </div>
            </div>
        </section>
        <!-- End of Portfolio Section Starts Here -->



 




        <!-- Contact Us Section -->

        <section class="contact-us-section section-padding" id="contact">
            <div class="container">
                <!-- Contact Us Section Title -->
                <h2 class="section-title contact-title text-center">وظفني الآن!</h2>
                <p class="sub-title contact-subtitle text-center">قم بتوظيفي الان لأقدم لك كافة الحلول البرمجية لمشاريعك!<br/>الرجاء عدم التردد في الإتصال بي في أي وقت، سأقوم بالإجابة على كافة تساؤلاتك!<br/> يمكنك التواصل معي عن طريق نموذج الإتصال في الأسفل أو مباشرة عن طريق البريد الإلكتروني: <a style="color:#63C2FF" href="mailto:firassleibi@gmail.com">firassleibi@gmail.com</a></p>
                

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    	<? if(isset($_POST['submit'])){?><p class="alert alert-success">Thank you! your message has been sent successfully, I will get back to you shortly.</p><? }?>
                        <div class="contact-form-section mt-50">
                            <form method="POST" id="contactForm" name="contact-form" role="form">
                                <div class="row">
                                    <div class="col-sm-5 col-md-4">
                                        <!-- Name Field -->
                                        <div class="form-group contact-form-icon">
                                          <label class="sr-only">الاسم</label>
                                          <i class="fa fa-user"></i>
                                          <input type="text" placeholder="الاسم" id="name" class="form-control" name="name" required>
                                        </div>
                                        <!-- Email Field -->
                                        <div class="form-group contact-form-icon">
                                          <label for="email" class="sr-only">البريد الإلكتروني</label>
                                          <i class="fa fa-envelope"></i>
                                          <input type="email" placeholder="البريد الإلكتروني" id="email" class="form-control" name="email" required>
                                        </div>
                                        <!-- Subject Field -->
                                        <div class="form-group contact-form-icon">
                                          <label for="subject" class="sr-only">العنوان</label>
                                          <i class="fa fa-pencil"></i>
                                          <input type="text" placeholder="العنوان" id="subject" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-md-8">
                                        <div class="form-group contact-form-icon">
                                          <label for="message" class="sr-only">الرسالة</label>
                                          <i class="fa fa-keyboard-o"></i>
                                          <textarea placeholder="الرسالة" rows="7" id="message" class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-4 text-center contact-button-padding">
                                        <button class="btn-primary btn-contact btn-block" name="submit" type="submit">إرسال <i class="fa fa-paper-plane"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Of Contact Us Section -->

        

        <!-- Google Map Section -->

        <section class="goolge-map-section">
             <!-- Toggle Button Area -->
            <div class="toggle-map-button">
                <button id="mapToggle" class="gmap-btn btn-block">موقعي على خريطة غوغل<i class="fa fa-chevron-down"></i></button>                
            </div>
            <!-- Google Map -->
            <div class="google-map-container">
                <div class="google-map" id="gmap-wrapper"></div>
            </div>
        </section>

        <!-- End Of Google Map Section -->

        <!-- Footer Section -->

        <footer class="footer-section">
            <div class="container">
                <div class="row mt-30 mb-30">
                    <div class="col-md-12 text-center">
                        <!-- Footer Copy Right Text -->
                        <div class="copyright-info">
                            <span><i class="fa fa-code"></i></span> بـ <span><i class="fa fa-heart"></i></span> مع <span>فراس صليبي</span>
                        </div>

                        <!-- Footer Social Icons -->
                        <div class="social-icons mt-30">
                        
                            <a href="https://www.facebook.com/sleibi.firas" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/in/firas-sleibi-453555100" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="https://twitter.com/firassleibi" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://plus.google.com/105543995539303035054" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End Of Footer Section -->


        <!-- JS Files -->
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- PreLoader -->
        <script src="js/queryloader2.min.js"></script>
        <!-- WOW JS Animation -->
        <script src="js/wow.min.js"></script>
        <!-- Simple Lightbox -->
        <script src="js/simple-lightbox.min.js"></script>
        <!-- Sticky -->
        <script src="js/jquery.sticky.js"></script>
        <!-- OWL-Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jQuery inview -->
        <script src="js/jquery.inview.js"></script>
        <!-- Shuffle jQuery -->
        <script src="js/jquery.shuffle.min.js"></script>
        <!-- jQuery CountTo -->
        <script src="js/jquery.counTo.js"></script>
        <!-- Goole map API -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <!-- gmap.js plugin -->
        <script src="js/gmap.js"></script>
        <!-- Main JS -->
        <script src="js/main.js"></script>

    </body>
</html>
