<head>
  <meta charset="utf-8">
  <title><?=$meta_title?></title>
  <meta name="description" content="<?=$meta_desc?>">
  <meta name="keywords" content="<?=$meta_keywords?>">
  <meta name="author" content="<?=$meta_author?>">
  <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no, target-densitydpi=device-dpi">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/bootstrap.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/rarbuilt.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/v1.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/font-awesome.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/bootstrap.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/hover.css')?>">
  <?php if(!empty($css_import) && is_array($css_import)) {  ?>
  <?php foreach($css_import as $key => $css_url) { ?>
  <link rel="stylesheet" href="<?=$css_url?>" type="text/css" />
  <?php echo "\n"; ?>
  <?php } ?>
  <?php } ?>
  <link rel="icon" type="image/x-icon" href="<?=base_url('public/images/favicon.ico')?>">
  <script>
  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  //   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  //   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  // ga('create', 'UA-54126765-1', 'auto');
  // ga('send', 'pageview');
  </script>
</head>
<body class="<?=$body_class?>">
  <nav class="sidenav">
    <ul>
      <li<?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') { ?> class="active"<?php } ?>><a href="<?=base_url()?>">Home</a></li>
      <li<?php if($this->uri->segment(1) == 'about') { ?> class="active"<?php } ?>><a href="<?=base_url('about')?>">About</a></li>
      <li<?php if($this->uri->segment(1) == 'service') { ?> class="active"<?php } ?>><a href="<?=base_url('service')?>">Service</a></li>
      <li<?php if($this->uri->segment(1) == 'pricing') { ?> class="active"<?php } ?>><a href="<?=base_url('pricing')?>">Pricing</a></li>
      <li<?php if($this->uri->segment(1) == 'contact') { ?> class="active"<?php } ?>><a href="<?=base_url('contact')?>">Contact</a></li>
    </ul>
  </nav>
  <header class="big-header <?=$header_class?>">
    <div class="container">
      <div class="logo">
        <a href="/" class="hover"><img src="<?=base_url('public/images/logo-inverted.png')?>"></a>
      </div>
      <div class="top-options hidden-xs">
        <?php if(!logged_in()) { ?>
          <a href="<?=base_url('contact')?>" class="my-btn btn-consultation pull-right pulse" style="position:relative;">Free Consultation</a>
          <a href="<?=base_url('start')?>" class="my-btn btn-start pull-right">Get Started</a>
        <?php } else { ?>
          <a href="<?=base_url('auth/logout')?>" class="my-btn btn-start pull-right" style="position:relative;">Logout</a>
          <a href="<?=base_url('account')?>" class="my-btn btn-consultation pull-right" style="position:relative;">Your Account</a>
        <?php } ?>
      </div>
      <div class="top-options visible-xs">
        <a href="javascript:;" class="my-btn btn-mobile-nav-toggle pull-right"><i class="fa fa-bars"></i></a>
      </div>
      <div class="clearfix"></div>
      <nav class="hidden-xs">
        <ul>
          <li<?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') { ?> class="active"<?php } ?>><a href="<?=base_url()?>">Home</a></li>
          <li<?php if($this->uri->segment(1) == 'about') { ?> class="active"<?php } ?>><a href="<?=base_url('about')?>">About</a></li>
          <li<?php if($this->uri->segment(1) == 'service') { ?> class="active"<?php } ?>><a href="<?=base_url('service')?>">Service</a></li>
          <li<?php if($this->uri->segment(1) == 'pricing') { ?> class="active"<?php } ?>><a href="<?=base_url('pricing')?>">Pricing</a></li>
          <li<?php if($this->uri->segment(1) == 'contact') { ?> class="active"<?php } ?>><a href="<?=base_url('contact')?>">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>