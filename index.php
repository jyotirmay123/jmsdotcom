
<?php
   require_once "config.php";
   $db = mysqli_connect($local->host, $local->user, $local->pass);
   if($db) {
       mysqli_select_db($db, $local->select_db);
   } else {
       echo "Cannot contact now, some issue!- Error code - 1";
       return;
   }
   
   $sql = "SELECT * FROM profile";
   $result = mysqli_query($db, $sql);
   if ($result->num_rows > 0) {
       // output data of each row
       $prof = $result->fetch_assoc();
   } else {
       echo "<pre style='color:red;'>No Data in the database.</pre>";
   }
   $sql = "SELECT * FROM `resume`";
   $res = mysqli_query($db, $sql);
   $cv = $res->fetch_assoc();
   ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
   <!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
      <!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
         <!--[if gt IE 8]><!--> 
         <html class="no-js">
            <!--<![endif]-->
            <head>
               <title><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></title>
               <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
               <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
               <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
               <meta name="description" content="JJ- My Personal Website!"/>
               <link href="contents/images/jj.ico" rel="icon" type="image/x-icon" />
               <!-- CSS | bootstrap -->
               <!-- Credits: http://getbootstrap.com/ -->
               <link  rel="stylesheet" type="text/css" href="contents/css/bootstrap.min.css" />
               <!-- CSS | font-awesome -->
               <!-- Credits: http://fortawesome.github.io/Font-Awesome/icons/ -->
               <link rel="stylesheet" type="text/css" href="contents/css/font-awesome.min.css" />
               <!-- CSS | animate -->
               <!-- Credits: http://daneden.github.io/animate.css/ -->
               <link rel="stylesheet" type="text/css" href="contents/css/animate.min.css" />
               <!-- CSS | Normalize -->
               <!-- Credits: http://manos.malihu.gr/jquery-custom-content-scroller -->
               <link rel="stylesheet" type="text/css" href="contents/css/jquery.mCustomScrollbar.css" />
               <!-- CSS | Colors -->
               <link rel="stylesheet" type="text/css" href="contents/css/colors/DarkBlue.css" id="colors-style" />
               <link rel="stylesheet" type="text/css" href="contents/css/switcher.css" />
               <!-- CSS | Style -->
               <!-- Credits: http://themeforest.net/user/FlexyCodes -->
               <link rel="stylesheet" type="text/css" href="contents/css/main.css" />
               <!-- CSS | prettyPhoto -->
               <!-- Credits: http://www.no-margin-for-errors.com/ -->
               <link rel="stylesheet" type="text/css" href="contents/css/prettyPhoto.css"/>
               <!-- CSS | Google Fonts -->
               <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
               <!-- Favicon -->
               <link rel="shortcut icon" type="image/x-icon" href="contents/images/jj.ico">
               <!--[if IE 7]>
               <link rel="stylesheet" type="text/css" href="contents/css/icons/font-awesome-ie7.min.css"/>
               <![endif]-->
               <style>
                  @media only screen and (max-width : 991px){
                  .resp-vtabs .resp-tabs-container {
                  margin-left: 13px;
                  }
                  }
                  @media only screen and (min-width : 800px) and (max-width : 991px){
                  .resp-vtabs .resp-tabs-container {
                  margin-left: 13px;
                  width:89%;
                  }
                  }        
               </style>
            </head>
            <body>
               <!--[if lt IE 7]>
               <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
               <![endif]-->
               <!-- Loading fb sdk-->
               <div id="fb-root"></div>
               <!-- Laoding page -->
               <div id="preloader">
                  <div id="spinner"></div>
               </div>
               <!-- .wrapper --> 
               <div class="wrapper">
               <!--- .Content --> 
               <section class="tab-content">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-3 widget-profil">
                                 <div class="row">
                                    <!-- Profile Image -->
                                    <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12 ">
                                       <div class="image-holder one" id="pic_prof_1" style="display:block">
                                          <img class="head-image up-left circle" src="contents/images/img/<?php echo $prof["mainpic"]; ?>" width="150" height="150" alt="" />
                                       </div>
                                    </div>
                                    <!-- End Profile Image -->
                                    <div class="col-lg-12 col-md-12 col-sm-9 col-xs-12">
                                       <!-- Profile info -->
                                       <div id="profile_info">
                                          <h1 id="name" class="transition-02"><?php echo $prof["firstname"]; ?></h1>
                                          <h4 class="line"><?php echo $prof["currentrole"]; ?></h4>
                                          <h4 class="line"><?php echo $prof["currentrolein"]; ?></h4>
                                          <h6><span class="fa fa-map-marker"></span> <?php echo $prof["address"]; ?></h6>
                                       </div>
                                       <!-- End Profile info -->  
                                       <!-- Profile Description -->
                                       <div id="profile_desc">
                                          <p>
                                             <?php echo $prof["majorcommonabout"]; ?>
                                          </p>
                                          <p>
                                             <?php echo $prof["minorcommonabout"]; ?><i class="fa fa-smile-o" aria-hidden="true"></i>
                                          </p>
                                       </div>
                                       <!-- End Profile Description -->  
                                       <!-- Name -->
                                       <div id="profile_social">
                                          <h6>My Social Profiles</h6>
                                          <a href=<?php echo $prof["fblink"]; ?> target="_blank"><i class="fa fa-facebook"></i></a>
                                          <a href=<?php echo $prof["twitterlink"]; ?> target="_blank"><i class="fa fa-twitter"></i></a>
                                          <a href=<?php echo $prof["linkedinlink"]; ?> target='_blank' ><i class="fa fa-linkedin"></i></a>
                                          <a href=<?php echo $prof["githublink"]; ?> target="_blank"><i class="fa fa fa-github"></i></a>
                                          <a href=<?php echo $prof["stackoverflowlink"]; ?> target="_blank"><i class="fa fa fa-stack-overflow"></i></a>
                                          <div class="clear"></div>
                                       </div>
                                       <!-- End Name -->  
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-9 flexy_content" style="padding-left: 0;padding-right: 0;">
                                 <!-- verticalTab menu -->
                                 <div id="verticalTab">
                                    <ul class="resp-tabs-list">
                                       <li class="tabs-profile hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a profile" data-tab-name="profile">            
                                          <span class="tite-list">profile</span>
                                          <i class="fa fa-user icon_menu icon_menu_active"></i>
                                       </li>
                                       <li class="tabs-resume hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="resume"> 
                                          <span class="tite-list">resume</span>
                                          <i class="fa fa-tasks icon_menu"></i>
                                       </li>
                                       <li class="tabs-portfolio hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="portfolio"> 
                                          <span class="tite-list">projects</span>
                                          <i class="fa fa-briefcase icon_menu"></i>
                                       </li>
                                       <li class="tabs-blog hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="blog">
                                          <span class="tite-list" >blog</span>
                                          <i class="fa fa-bullhorn icon_menu"></i>
                                       </li>
                                       <li class="tabs-contact hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a" data-tab-name="contact" style="margin-bottom: 48px !important;"> 
                                          <span class="tite-list">contact</span>
                                          <i class="fa fa-envelope icon_menu"></i> 
                                       </li>
                                       <a href="contents/file/<?php echo $cv["filename"]; ?>" target="_blank" id="print"><i class="fa fa-print icon_print"></i> </a>
                                       <a href="php/download_resume.php" id="downlowd"><i class="fa fa-download icon_print"></i> </a>
                                    </ul>
                                    <!-- /resp-tabs-list -->
                                    <!-- resp-tabs-container --> 
                                    <div class="resp-tabs-container">
                                       <!-- profile -->
                                       <div id="profile" class="content_2">
                                          <!-- .title -->
                                          <h1 class="h-bloc">Profile - About Me</h1>
                                          <div class="row top-p">
                                             <div class="col-md-6 profile-l">
                                                <!--About me-->
                                                <div class="title_content">
                                                   <div class="text_content"><?php echo $prof["firstname"]; ?></div>
                                                   <div class="clear"></div>
                                                </div>
                                                <ul class="about">
                                                   <li>
                                                      <i class="glyphicon glyphicon-user"></i>
                                                      <label>Name</label>
                                                      <span class="value"><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                   <li>
                                                      <i class="glyphicon glyphicon-calendar"></i>
                                                      <label>Date of birth</label>
                                                      <span class="value"><?php echo $prof["dob"]; ?></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                   <li>
                                                      <i class="glyphicon glyphicon-map-marker"></i>
                                                      <label>Adress</label>
                                                      <span class="value"><?php echo $prof["address"]; ?></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                   <li>
                                                      <i class="glyphicon glyphicon-envelope"></i>
                                                      <label>Email</label>
                                                      <span class="value"><?php echo $prof["email"]; ?></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                   <li>
                                                      <i class="glyphicon glyphicon-phone"></i>
                                                      <label>Phone</label>
                                                      <span class="value"><?php echo $prof["phone"]; ?></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                   <li>
                                                      <i class="glyphicon glyphicon-globe"></i>
                                                      <label>Website</label>
                                                      <span class="value"><a href=<?php echo $prof["website"]; ?> target="_blank">www.jyotirmays.com</a></span>
                                                      <div class="clear"></div>
                                                   </li>
                                                </ul>
                                                <p style="margin-bottom:20px">
                                                   <i class="fa fa-quote-left"></i>       
                                                   <?php echo $prof["majorabout"]; ?>
                                                </p>
                                                <p style="margin-bottom:20px">
                                                   <i class="fa fa-quote-left"></i>       
                                                   <?php echo $prof["minorabout"]; ?>
                                                </p>
                                             </div>
                                             <!-- End left-wrap -->
                                             <div class="col-md-6 profile-r">
                                                <div class="cycle-slideshow">
                                                   <?php
                                                      $pics = array($prof["profilepic1"], $prof["profilepic2"], $prof["profilepic3"], $prof["profilepic4"], $prof["profilepic5"], $prof["profilepic6"]);
                                                      foreach($pics as $p){
                                                          if (!empty($p)){
                                                          ?>
                                                   <img src="contents/images/img-profile/<?php echo $p ?>" alt="" />
                                                   <?php
                                                      }
                                                      }
                                                      ?>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="clear"></div>
                                       </div>
                                       <!-- End .profile -->
                                       <?php
                                          $sql = "SELECT * FROM experience";
                                          $expr = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM education";
                                          $edu = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM programming";
                                          $prog = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM ide";
                                          $ide = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM `language`";
                                          $lang = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM office";
                                          $ofc = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM hobby";
                                          $hoby = mysqli_query($db, $sql);
                                          ?>
                                       <!-- .resume -->
                                       <div id="resume" class="content_2">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <!-- .title -->
                                                <h1 class="h-bloc">Resume - Personal Info</h1>
                                             </div>
                                             <div class="col-md-6">
                                                <!-- .download_resume -->
                                                <a class="download" style="margin:0;float: right;" href="php/download_resume.php" target="_blank">
                                                <span data-hover="Download"><i class="glyphicon glyphicon-download-alt"></i> My Resume </span>
                                                </a>
                                                <!-- /.download_resume -->
                                             </div>
                                          </div>
                                          <div class="row">
                                             <!-- .resume-top -->
                                             <div class="col-md-12 resume-left">
                                                <!-- .title_content -->
                                                <div class="title_content" style="margin-bottom:5px">
                                                   <div class="text_content">Experience</div>
                                                   <div class="clear"></div>
                                                </div>
                                                <!-- /.title_content -->
                                                <!-- .attributes -->
                                                <?php
                                                   $str = "";
                                                   while($exp = $expr->fetch_assoc()){
                                                       $str = $str.'<ul class="attributes">
                                                                       <li class="first">
                                                                           <h5>'.$exp["designation"].' <span class="duration"><i class="fa fa-calendar color"></i> '.$exp["start"].' - '.$exp["end"].'</span></h5>
                                                                           <h6>
                                                                               <span class="fa fa-briefcase"></span>
                                                                               <a href="'.$exp["url"].'" target="_blank"> '.$exp["company"].', '.$exp["address"].'</a>
                                                                           </h6>
                                                                           '.$exp["description"].'
                                                                       </li>
                                                                   </ul>';
                                                   }
                                                   echo $str;
                                                   ?>
                                                <!-- /.attributes -->
                                                <br>
                                                <!-- .title_content -->
                                                <div class="title_content">
                                                   <div class="text_content">Education</div>
                                                   <div class="clear"></div>
                                                </div>
                                                <!-- /.title_content -->
                                                <!-- .attributes -->
                                                <ul class="attributes">
                                                   <?php
                                                      $str = "";
                                                      while($ed = $edu->fetch_assoc()){
                                                          $str = $str.'<li  class="first">
                                                                          <h5>'.$ed["degree"].' <span class="duration"><i class="fa fa-calendar color"></i> '.$ed["start"].' - '.$ed["end"].'</span></h5>
                                                                          <h6>
                                                                              <span class="fa fa-book"></span>
                                                                              <a href="'.$ed["url"].'" target="_blank"> '.$ed["school"].', '.$ed["address"].'</a>
                                                                          </h6>
                                                                          '.$ed["description"].'
                                                                      </li>';
                                                      }
                                                      echo $str;
                                                      ?>
                                                </ul>
                                                <!-- /.attributes -->
                                                <br>  
                                             </div>
                                             <!-- /.resume-top -->
                                             <div class="row">
                                                <!-- .resume-bottom -->
                                                <div class="col-md-6" style="padding-left: 30px;">
                                                   <!-- .title_content -->
                                                   <div class="title_content" style="float: none;">
                                                      <div class="text_content">Programming Skills</div>
                                                      <div class="clear"></div>
                                                   </div>
                                                   <!-- /.title_content -->
                                                   <div class="skills">
                                                      <!-- .skillbar -->
                                                      <?php
                                                         $str = "";
                                                         while($pr = $prog->fetch_assoc()){
                                                             $str = $str.'<div class="skillbar clearfix" data-percent="'.$pr["level"].'%">
                                                                             <div class="skillbar-title"><span>'.$pr["name"].'</span></div>
                                                                             <div class="skillbar-bar"></div>
                                                                             <div class="skill-bar-percent">'.$pr["level"].'%</div>
                                                                         </div>';
                                                         }
                                                         echo $str;    
                                                         ?>
                                                      <!-- /.skillbar -->
                                                   </div>
                                                   <!-- .title_content -->
                                                   <div class="title_content" style="float: none;">
                                                      <div class="text_content">Language Skills</div>
                                                      <div class="clear"></div>
                                                   </div>
                                                   <!-- /.title_content -->
                                                   <div class="skills">
                                                      <!-- .skillbar -->
                                                      <?php
                                                         $str = "";
                                                         while($lg = $lang->fetch_assoc()){
                                                             $str = $str.'<div class="skillbar clearfix" data-percent="'.$lg["level"].'%">
                                                                             <div class="skillbar-title"><span>'.$lg["name"].'</span></div>
                                                                             <div class="skillbar-bar"></div>
                                                                             <div class="skill-bar-percent">'.$lg["level"].'%</div>
                                                                         </div>';
                                                         }
                                                         echo $str;    
                                                         ?>
                                                      <!-- /.skillbar -->
                                                   </div>
                                                </div>
                                                <div class="col-md-6" style="padding-left: 30px;">
                                                   <!-- .title_content -->
                                                   <div class="title_content" style="float: none;">
                                                      <div class="text_content">IDE Used</div>
                                                      <div class="clear"></div>
                                                   </div>
                                                   <!-- /.title_content -->
                                                   <div class="skills">
                                                      <!-- .skillbar -->
                                                      <?php
                                                         $str = "";
                                                         while($id = $ide->fetch_assoc()){
                                                             $str = $str.'<div class="skillbar clearfix" data-percent="'.$id["level"].'%">
                                                                             <div class="skillbar-title"><span>'.$id["name"].'</span></div>
                                                                             <div class="skillbar-bar"></div>
                                                                             <div class="skill-bar-percent">'.$id["level"].'%</div>
                                                                         </div>';
                                                         }
                                                         echo $str;    
                                                         ?>
                                                      <!-- /.skillbar -->
                                                   </div>
                                                   <!-- .title_content -->
                                                   <div class="title_content" style="float: none;">
                                                      <div class="text_content">Office Skills</div>
                                                      <div class="clear"></div>
                                                   </div>
                                                   <!-- /.title_content -->
                                                   <div class="skills">
                                                      <!-- .skillbar -->
                                                      <?php
                                                         $str = "";
                                                         while($oc = $ofc->fetch_assoc()){
                                                             $str = $str.'<div class="skillbar clearfix" data-percent="'.$oc["level"].'%">
                                                                             <div class="skillbar-title"><span>'.$oc["name"].'</span></div>
                                                                             <div class="skillbar-bar"></div>
                                                                             <div class="skill-bar-percent">'.$oc["level"].'%</div>
                                                                         </div>';
                                                         }
                                                         echo $str;    
                                                         ?>
                                                      <!-- /.skillbar -->
                                                   </div>
                                                   <!-- .title_content -->
                                                   <div class="title_content" style="float: none;">
                                                      <div class="text_content">Hobbies</div>
                                                      <div class="clear"></div>
                                                   </div>
                                                   <!-- /.title_content -->
                                                   <div class="skills">
                                                      <!-- .skillbar -->
                                                      <?php
                                                         $str = "";
                                                         while($hb = $hoby->fetch_assoc()){
                                                             $str = $str.'<div class="skillbar clearfix" data-percent="'.$hb["level"].'%">
                                                                             <div class="skillbar-title"><span>'.$hb["name"].'</span></div>
                                                                             <div class="skillbar-bar"></div>
                                                                             <div class="skill-bar-percent">'.$hb["level"].'%</div>
                                                                         </div>';
                                                         }
                                                         echo $str;    
                                                         ?>
                                                      <!-- /.skillbar -->
                                                   </div>
                                                </div>
                                                <!-- /.resume-bottom -->
                                             </div>
                                          </div>
                                          <div style="clear: both"></div>
                                       </div>
                                       <!-- End .resume -->
                                       <?php
                                          $sql = "SELECT * FROM projtypes";
                                          $projtyp = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT p.*, pt.filter as strfilter FROM projects p join projtypes pt on pt.id = p.filter";
                                          $proj = mysqli_query($db, $sql);
                                          
                                          ?>
                                       <!-- .portfolio -->
                                       <div id="portfolio" class="content_2">
                                          <!-- .title -->
                                          <h1 class="h-bloc">Portfolio - My Works</h1>
                                          <div class="container-portfolio">
                                             <!-- #filters -->
                                             <ul id="filters" class="clearfix">
                                                <?php
                                                   $str = $df= "";
                                                   while($pt = $projtyp->fetch_assoc()){
                                                       $str = $str.'<li><span class="filter" data-filter="'.$pt["filter"].'">'.$pt["type"].'</span></li>';
                                                       $df = $df." ".$pt["filter"];
                                                   }
                                                   ?>
                                                <li><span class="filter active" data-filter="<?php echo $df;?>">All</span></li>
                                                <?php echo $str; ?>
                                             </ul>
                                             <div id="portfoliolist">
                                                <?php
                                                   $str = "";
                                                   $myblog_hosted_url = "";
                                                   while($p = $proj->fetch_assoc()){
                                                       $str = $str.'<div class="view view-first portfolio '.$p["strfilter"].'" data-cat="'.$p["strfilter"].'">
                                                                       <img src="contents/images/portfolio/'.$p["iconfile"].'" />
                                                                       <div class="mask">
                                                                           <h2>'.$p["name"].'</h2>
                                                                           '.$p["description"];
                                                       if($p["hostedurl"]){
                                                           if($p["name"]=="My Blog"){
                                                               $myblog_hosted_url = $p["hostedurl"];
                                                           }
                                                           $str = $str.'<a href="'.$p["hostedurl"].'" target="_blank" class="info external">
                                                                           <i class="fa fa-link"></i>
                                                                           </a>';
                                                       }
                                                       if($p["codeurl"]){
                                                           $str = $str.'<a href="'.$p["codeurl"].'" target="_blank" class="info external"><i class="fa fa-code"></i></a>'; 
                                                       }
                                                       $str = $str.'</div></div>';
                                                   }
                                                   echo $str;
                                                   ?>
                                                <div class="clear"></div>
                                             </div>
                                             <!-- #images/portfoliolist -->
                                          </div>
                                       </div>
                                       <!-- End .portfolio -->
                                       <?php
                                          $sql = "SELECT * FROM carousel";
                                          $carous = mysqli_query($db, $sql);
                                          
                                          $sql = "SELECT * FROM counter";
                                          $cntr = mysqli_query($db, $sql);
                                          $ctr = $cntr->fetch_assoc();
                                          ?>
                                       <!-- .blog -->
                                       <div id="blog" class="content_2">
                                          <h1 class="h-bloc">Journey - My Life</h1>
                                          <br> 
                                          <div class="col-md-12">
                                             <div class="row">
                                                <!-- Page Blog -->
                                                <div class="col-md-12" id="blog_page">
                                                   <!-- start Page Blog -->
                                                   <section id="blog-page">
                                                      <!-- Post 1 -->    
                                                      <article id="post-1" class="blog-article">
                                                         <div class="col-md-12">
                                                            <div class="row">
                                                               <div class="col-md-12 post_media">
                                                                  <div class="post-format-icon">
                                                                     <a href="#" class="item-date"><span class="fa fa-picture-o"></span></a>
                                                                  </div>
                                                                  <div class="media">
                                                                     <div class="he-wrap tpl2">
                                                                        <div id="carousel-1" class="carousel slide" data-ride="carousel">
                                                                           <ol class="carousel-indicators">
                                                                              <?php 
                                                                                 for($i=0; $i<$carous->num_rows; $i++){
                                                                                     $active = ($i == 0) ? "active" : "";
                                                                                     echo '<li data-target="#carousel-1" data-slide-to="'.$i.'" class="'.$active.'"></li>'; 
                                                                                 }
                                                                                 ?>
                                                                           </ol>
                                                                           <div class="carousel-inner">
                                                                              <?php
                                                                                 $str = "";
                                                                                 $flag = true;
                                                                                 while($crs = $carous->fetch_assoc()){
                                                                                     $active = $flag ? "active" : "";
                                                                                     $str = $str.'<div class="item '.$active.'">
                                                                                                     <img src="contents/images/carousels/'.$crs["filename"].'" alt="" />
                                                                                                     <div class="carousel-caption">
                                                                                                     <h4></h4>
                                                                                                     <p></p>
                                                                                                     </div>
                                                                                                 </div>'; 
                                                                                     $flag = false;           
                                                                                 }
                                                                                 echo $str;
                                                                                 ?>
                                                                           </div>
                                                                           <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                                                                           <span class="glyphicon glyphicon-chevron-left"></span>
                                                                           </a>
                                                                           <a class="right carousel-control" href="#carousel-1" data-slide="next">
                                                                           <span class="glyphicon glyphicon-chevron-right"></span>
                                                                           </a>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-md-12 post_content">
                                                                  <div class="content post_format_standart">
                                                                     <div class="top_c ">
                                                                        <div class="title_content">
                                                                           <div class="clear"></div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <a href="<?php echo $myblog_hosted_url;?>" class="download" target="_blank"><span data-hover="My Blog" style="color:white">Click to access myblog here</span></a>
                                                                  <div id="counter"> <span id="totvisit">Total Site Visit : </span> <span id="counter"><?php echo $ctr["counter"]; ?></span></div>
                                                               </div>
                                                            </div>
                                                            </div-->
                                                      </article>
                                                      <!-- End Post 1 -->
                                                      <div class="clear"></div>
                                                   </section>
                                                   <!-- End Page Blog -->
                                                   </div>
                                                   <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-sm">
                                                         <div class="modal-content">
                                                            <div class="modal-header">
                                                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                               <h3 class="modal-title h3_modal" style="color: #fff !important;">jyotirmaysenapati.com</h3>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p></p>
                                                               <p></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- End .blog -->
                                          <!-- .contact -->
                                          <div id="contact" class="content_2">
                                             <h1 class="h-bloc">Contact - Contact Me</h1>
                                             <div class="row">
                                                <div class="col-lg-12">
                                                   <div id="map"></div>
                                                </div>
                                                <div class="col-lg-12">
                                                   <div class="row" id="contact-user">
                                                      <div class="col-md-5">
                                                         <div class="contact-info">
                                                            <!--<h3 class="main-heading"><span>Contact info</span></h3>-->
                                                            <div class="title_content" style="float: none;">
                                                               <div class="text_content">Contact info</div>
                                                               <div class="clear"></div>
                                                            </div>
                                                            <ul>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-map-marker"></i> Adress:</span> <?php echo $prof["address"]; ?><br /><br /></li>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-envelope"></i> Email:</span> <?php echo $prof["email"]; ?></li>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-phone"></i> Phone:</span> <?php echo $prof["phone"]; ?></li>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-globe"></i> Website:</span> <?php echo $prof["website"]; ?></li>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-comment"></i> Skype:</span> <?php echo $prof["skypeid"]; ?></li>
                                                               <li><span class="span-info"><i class="glyphicon glyphicon-thumbs-up"></i> G. Drive:</span> <?php echo $prof["gdriveid"]; ?></li>
                                                            </ul>
                                                         </div>
                                                         <!-- /Contact Info -->
                                                         <div class="clear"></div>
                                                         <!--<h3 class="main-heading" style="margin-left: 22px;"><span>Follow me</span></h3>-->
                                                         <div class="title_content tiltle_contacts" style="float: none;">
                                                            <div class="text_content">
                                                               Follow me
                                                               <div class="fb-follow" data-href="https://www.facebook.com/Shaan.Exile" data-layout="standard" data-size="large" data-show-faces="true"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                         </div>
                                                         <div id="profile_social">
                                                            <a href=<?php echo $prof["fblink"]; ?> target="_blank"><i class="fa fa-facebook"></i></a>
                                                            <a href=<?php echo $prof["twitterlink"]; ?> target="_blank"><i class="fa fa-twitter"></i></a>
                                                            <a href=<?php echo $prof["linkedinlink"]; ?> target='_blank' ><i class="fa fa-linkedin"></i></a>
                                                            <a href=<?php echo $prof["githublink"]; ?> target="_blank"><i class="fa fa fa-github"></i></a>
                                                            <a href=<?php echo $prof["stackoverflowlink"]; ?> target="_blank"><i class="fa fa fa-stack-overflow"></i></a>
                                                            <div class="clear"></div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-7">
                                                         <!-- Contact Form -->
                                                         <div class="title_content" style="float: none;">
                                                            <div class="text_content">Let's keep in touch</div>
                                                            <div class="clear"></div>
                                                         </div>
                                                         <div class="contact-form">
                                                            <!--<h3 class="main-heading"><span>Let's keep in touch</span></h3>-->
                                                            <div id="contact-status"></div>
                                                            <form method="post" action="" id="contactform">
                                                               <p class="form-group" id="contact-name">
                                                                  <label for="name">Your Name</label>
                                                                  <input type="text" name="name" class="form-control name-contact" id="inputSuccess" placeholder="Name..." />
                                                               </p>
                                                               <p class="form-group" id="contact-email"> 
                                                                  <label for="email">Your Email</label>
                                                                  <input type="text" name="email" class="form-control email-contact" id="inputSuccess" placeholder="Email..." />
                                                               </p>
                                                               <p class="form-group" id="contact-message">
                                                                  <label for="message">Your Message</label>
                                                                  <textarea name="message" cols="88" rows="6" class="form-control message-contact" id="inputError" placeholder="Message..."></textarea>
                                                               </p>
                                                               <input type="reset" name="reset" value="CLEAR" class="reset">
                                                               <!-- <input type="submit" name="submit" value="SEND MESSAGE" class="submit">-->
                                                               <section class="button-demo" style="display: inline-block;">
                                                                  <button class="ladda-button submit send_email" name="submit" data-color="green" data-style="expand-left">SEND MESSAGE</button>
                                                               </section>
                                                            </form>
                                                         </div>
                                                         <!-- /Contact Form -->
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- End .contact -->
                                       </div>
                                       <!-- End #resp-tabs-container --> 
                                    </div>
                                    <!-- End verticalTab -->
                                 </div>
                                 <!-- End flexy_content -->
                              </div>
                              <!-- End row -->
                           </div>
                           <!-- End col-md-12 -->
                        </div>
                        <!-- End row -->
                     </div>
                     <!-- End container -->
               </section>
               <!-- End Content -->
               </div>
               <!-- End wrapper -->
               <!--div id="geo" class="geolocation_data"></div-->
               <!-- jquery | jQuery 1.11.0 -->
               <!-- Credits: http://jquery.com -->
               <script type="text/javascript" src="contents/js/jquery-2.1.1.min.js"></script>
               <!-- Js | bootstrap -->
               <!-- Credits: http://getbootstrap.com/ -->
               <script type="text/javascript" src="contents/js/bootstrap.min.js"></script> 
               <!-- Js | jquery.cycle -->
               <!-- Credits: https://github.com/malsup/cycle2 -->
               <script type="text/javascript" src="contents/js/jquery.cycle2.min.js"></script>
               <!-- jquery | rotate and portfolio -->
               <!-- Credits: http://jquery.com -->
               <script type="text/javascript" src="contents/js/jquery.mixitup.min.js"></script> 
               <script type="text/javascript" src="contents/js/HeadImage.js"></script>
               <!-- Js | easyResponsiveTabs -->
               <!-- Credits: http://webtrendset.com/demo/easy-responsive-tabs/Index.html -->
               <script type="text/javascript" src="contents/js/easyResponsiveTabs.min.js"></script> 
               <!-- Js | jquery.cookie -->
               <!-- Credits: https://github.com/carhartl/jquery-cookie --> 
               <script type="text/javascript" src="contents/js/jsSwitcher/jquery.cookie.js"></script>    
               <!-- Js | switcher -->
               <!-- Credits: http://themeforest.net/user/FlexyCodes -->
               <script type="text/javascript" src="contents/js/jsSwitcher/switcher.js"></script>    
               <!-- Js | mCustomScrollbar -->
               <!-- Credits: http://manos.malihu.gr/jquery-custom-content-scroller -->
               <script type="text/javascript" src="contents/js/jquery.mCustomScrollbar.concat.min.js"></script>        
               <!-- jquery | prettyPhoto -->
               <!-- Credits: http://www.no-margin-for-errors.com/ -->
               <script type="text/javascript" src="contents/js/jquery.prettyPhoto.js"></script>
               <!-- Js | location, geoplugin -->
               <script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
               <script>
               jQuery(document).ready(function($) {
                    jQuery.getScript('http://www.geoplugin.net/javascript.gp', function() 
                    {
                        var country = geoplugin_countryName();
                        var countryCode = geoplugin_countryCode();
                        var ip = geoplugin_request();
                        var regionName = geoplugin_regionName();
                        var regionCode = geoplugin_regionCode();   
                        var continentCode = geoplugin_continentCode();
                        var lat = geoplugin_latitude();
                        var lng = geoplugin_longitude();
                        var currencyCode = geoplugin_currencyCode();
                        var currencySymbol = geoplugin_currencySymbol();       
                        $.ajax({
                              method: "POST",
                              url: "php/save_location.php",
                              data: { country: country, countrycode: countryCode,
                                ip:ip, regionName:regionName, regionCode:regionCode, 
                                continentCode:continentCode, lat:lat, lng:lng,
                                currencyCode:currencyCode, currencySymbol:currencySymbol}
                        })
                    });
                });
                </script>
               <!-- Js | gmaps -->
               <!-- Credits: http://maps.google.com/maps/api/js?sensor=true-->
               <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyd06iE1f8CMwj4cXExgbZC18QkN7HN1A"
                  type="text/javascript"></script>
               <script type="text/javascript" src="contents/js/gmaps.js"></script> 
               <!-- Js | Js -->
               <!-- Credits: http://themeforest.net/user/FlexyCodes -->
               <!-- It needs to be call after gmaps library. It is using that. -->
               <script type="text/javascript" src="contents/js/main.js"></script>
               <!--[if lt IE 9]>
               <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
               <![endif]-->
               <?php
                if(isset($_GET["f"])){
                    if ($_GET["f"] == 1){
                        echo "<script>setTimeout(function(){parent.self.location='file/MyUniversityList.xlsx';}, 1000)</script>";
                    } else if ($_GET["f"] == 2){
                        echo "<script>setTimeout(function(){parent.self.location='file/MS_Resume.pdf';}, 1000)</script>";
                    } else if ($_GET["f"] == 3){
                        echo "<script>setTimeout(function(){parent.self.location='file/Educational_LOR.pdf';}, 1000)</script>";
                    } else if ($_GET["f"] == 4){
                        echo "<script>setTimeout(function(){parent.self.location='file/Official_LOR.pdf';}, 1000)</script>";
                    } else if ($_GET["f"] == 5){
                        echo "<script>setTimeout(function(){parent.self.location='file/SOP_TUM.docx';}, 1000)</script>";
                    } else if ($_GET["f"] == 6){
                        echo "<script>setTimeout(function(){parent.self.location='file/Essay_TUM.docx';}, 1000)</script>";
                    } else if ($_GET["f"] == 7){
                        echo "<script>setTimeout(function(){parent.self.location='file/MS-TUM-Curriculum-analysis.pdf';}, 1000)</script>";
                    } else {
                        echo "<script>setTimeout(function(){parent.self.location='index.php';}, 1000)</script>";
                    }
                }
               ?>
            </body>