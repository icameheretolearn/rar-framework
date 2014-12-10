  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-7">
          <p>Copyright 2014 <span style="color: #fff">RARBUILT, LLC</span>. All Rights Reserved.</p>
          <p>A company by <a href="http://ronaldarichardson.com/">Ronald A. Richardson</a></p>
          <div class="social">
            <a href="http://facebook.com/rarbuilt" class="grow"><i class="fa fa-facebook"></i></a>
            <a href="http://twitter.com/rarbuilt" class="grow"><i class="fa fa-twitter"></i></a>
            <a href="http://github.com/rarbuilt" class="grow"><i class="fa fa-github"></i></a>
          </div>
        </div>
        <div class="hidden-xs col-sm-4">
          <address class="pull-right">
            RARBUILT, LLC<br>
            112 STATE AVE NE<br>
            SUITE H<br>
            OLYMPIA WA 98501<br>
            (480) 621-2748<br>
            HELLO@RARBUILT.COM
          </address>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?=base_url('public/js/jquery.js')?>"></script>
  <script src="<?=base_url('public/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('public/js/jquery.inputmask.min.js')?>"></script>
  <script src="<?=base_url('public/js/lightbox.min.js')?>"></script>
  <script src="<?=base_url('public/js/rarbuilt.js')?>"></script>
  <?php if(!empty($js_import) && is_array($js_import)) { ?>
  <?php foreach($js_import as $key => $js_url) { ?>
  <script src="<?=$js_url?>"></script>
  <?php echo "\n"; ?>
  <?php } ?>
  <?php } ?>
  <?=$yieldjs?>
</body>
</html>