<head>
  <meta charset="utf-8">
  <title><?=$meta_title?></title>
  <meta name="description" content="<?=$meta_desc?>">
  <meta name="keywords" content="<?=$meta_keywords?>">
  <meta name="author" content="<?=$meta_author?>">
  <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no, target-densitydpi=device-dpi">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/admin.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/font-awesome.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/bootstrap.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/cyborg.css')?>">
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
<body class="admin <?=$body_class?>">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('public/img/logo.png')?>" style="height: 40px;"></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li<?php if($this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard') { ?> class="active"<?php } ?>><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li<?php if($this->uri->segment(2) == 'users') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/users')?>">Users</a></li>
          <li<?php if($this->uri->segment(2) == 'groups') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/groups')?>">Groups</a></li>
          <li<?php if($this->uri->segment(2) == 'permissions') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/permissions')?>">Permissions</a></li>
          <li<?php if($this->uri->segment(2) == 'orders') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/orders')?>">Orders</a></li>
          <li<?php if($this->uri->segment(2) == 'transactions') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/transactions')?>">Transactions</a></li>
          <li<?php if($this->uri->segment(2) == 'plans') { ?> class="active"<?php } ?>><a href="<?=base_url('admin/plans')?>">Plans</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container x">
    <?=showflashmsg()?>
    <?=$yield?>
  </div><!-- /.container -->
  <script src="<?=base_url('public/js/jquery.js')?>"></script>
  <script src="<?=base_url('public/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('public/js/jquery.inputmask.min.js')?>"></script>
  <script src="<?=base_url('public/js/lightbox.min.js')?>"></script>
  <?php if(!empty($js_import) && is_array($js_import)) { ?>
  <?php foreach($js_import as $key => $js_url) { ?>
  <script src="<?=$js_url?>"></script>
  <?php echo "\n"; ?>
  <?php } ?>
  <?php } ?>
  <?=$yieldjs?>
</body>
</html>