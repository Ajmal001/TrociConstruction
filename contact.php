<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>TrociConstruction18</title>
    <?php include("header.php") ?>
</head>

<body>
    <?php include("navbar.php") ?>
    <div data-bs-parallax-bg="true" style="height:222px;background-image:url(assets/img/Hallway.jpeg);background-position:center;background-size:cover;margin-top:-10px;">
        <div class="container" style="padding-top:57px;padding-right:17px;margin-right:auto;width:1022px;height:218px;">
            <div class="row" style="width:800px;padding-top:13px;">
                <div class="col-md-6">
                    <h1 data-aos="fade-down" data-aos-duration="1200" data-aos-delay="600" style="color:rgb(0,0,0);width:434px;font-size:56px;"><strong>Contact Us</strong></h1></div>
            </div>
        </div>
    </div>
    
    
    
    

    <div class="container">
        <div class="row">
            <section>
            <div class="wizard">
               
                    <center>
                    <ul class="nav nav-tabs" role="tablist" style="width:50%">
    
                        <li role="presentation" class="active" style="width:50%">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step1">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-map-marker"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" style="margin-left:100px;" >
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </span>
                            </a>
                        </li>
           
                    </ul>

                    </center>

                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">

                            <!--https://mdbootstrap.com/javascript/bootstrap-google-map/-->
                            <section class="section" id="step1">

                                <!--Section heading-->
                                <h2 class="section-heading h1 pt-4 mb-5">Location</h2>

                                <div class="card">

                                    <div class="card-body">

                                        <!--Google map-->
                                        <div id="map-container-8" class="z-depth-1-half map-container mb-4" style="height: 200px"></div>

                                    </div>

                                </div>

                            </section>                       
                        </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                                      <!-- contact-info -->
        <div class="contact-section">
            <div class="container">
                <div class="row">
     
                
                    <!-- contact-block -->
                        <center>

    
                        <div class="card contact-block">
                            <div class="row">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>Contact Info:</b></h6>
                                            <p class="contact-small-text">70 Church Leys Us</p>
                                            <p class="contact-small-text">Harlow</p>
                                            <p class="contact-small-text">Essex</p>
                                            <p class="contact-small-text">CM18 6DB</p>
                                            </br>


                                            <a class="contact-small-text">info@TrociConstruction.co.uk</a>
                                            <p class="contact-small-text">+44 0800-029-1600</p>
                                        </div>
                                        </br>
                                        <h6 class="card-title"><b>Opening Hours:</b></h6>
                                        <p class="contact-small-text"> Mon - Fri:</p>
                                            <span class="float-right">9:00AM - 7:00 PM</span>
                                        </br>
                                        </br>
                                        <p class="contact-small-text">Sat - Sun:</p>
                                            <span class="float-right"> Closed</span>
                            </div>
                            </section>
                        </div>
                </div>


    <?php include("footer.php") ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD0iShbLi9RSpkPcnNGkE-D1oQ-6bU4v9s"></script>
    
    
    
    <style>
    
        
        .primary-textarea.md-form label.active {
    color: #4285F4;
}
        
        
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;

        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }


.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
    
    </style>
    
    <script>
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    

    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
        
        
        
 // Regular map https://mdbootstrap.com/javascript/bootstrap-google-map/
function regular_map() {
    var var_location = new google.maps.LatLng(51.760897, 0.111805);

    var var_mapoptions = {
        center: var_location,
        zoom: 14
    };

    var var_map = new google.maps.Map(document.getElementById("map-container-8"),
        var_mapoptions);

    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "Harlow"
    });
}

google.maps.event.addDomListener(window, 'load', regular_map);
    
    </script>
</body>

</html>