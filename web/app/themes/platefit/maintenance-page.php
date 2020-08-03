<?php
/*
Template Name: Upgrading-Technology
Template Post Type:page
*/

?>


<!DOCTYPE html>
<html>
<head>  
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script type="text/javascript">
        document.documentElement.className = 'js';
    </script>

    <?php wp_head(); ?>
    
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/custom-style.css?ver=5.4.2">
    <style>    
       section.cstm-vc-hero {
            border: 6px solid #fed710 !important;
            width: 70%;
            height: 500px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;           
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top:100px;
        }
        .cstm-vc-logo img {
            width: 200px;
            padding-bottom: 10px;
        }
        .cstm-vc-content h6 {
            font-size: 20px;
            font-weight: 900;
            color: #fed710;
            line-height:25px;
            text-transform: uppercase;
        }
        .cstm-vc-contact a {
            color: #fed710;
            text-decoration: underline;
            text-transform: capitalize;
        }
        @media (max-width:768px){
            section.cstm-vc-hero {
                
                 border: none !important;
                height: calc(100vh - 13.5vh);
            }
            body {               
                border: 2px solid #fed710;
                height: 100%;
                margin: 15px;                
            }
        }
        @media (max-width: 767px){
            section.cstm-vc-hero {             
                border: none !important;
                height: calc(100vh - 25vh);
            }
            body {               
                border: 2px solid #ffffff;
                height: 100%;
                margin: 15px;
            }
             
        }
    </style>
</head>
<body class="body-bor">

<section class="cstm-vc-hero">
  <div class="cstm-vc-container">
    <div class="cstm-vc-logo">
      <img src="https://platefit.co/app/uploads/2020/01/platefit-square.jpg">
    </div>
    <div class="cstm-vc-content">
      <h3>we're upgrading our technology. please check back soon!</h3>
    </div>
    <div class="cstm-vc-contact">
      <a href="mailto:info@platefit.co">email</a><br>      
    </div>    
  </div>
  
  


</section>



</body>
</html>