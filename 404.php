<?php get_header(); ?>
<style>
   body {
	   background: #fafafa!important;
   }
</style>
<div class="container">
 <div style="text-align:center;margin-top: 10px;border-top: 1px solid #eee;padding-top: 50px;" class="404-sayfasi">
   <h5 style="color:#4f5d75;"><?php echo cs_get_option('upps-aradigini-bulamadık'); ?></h5>
   <p style="color:#4f5d75;"><?php echo cs_get_option('ya-kaldirilmis-olabilir-veya-baglantiyi-kontrol-ediniz'); ?></p>
   <a href="/"><div style="margin-bottom:100px;" class="buton"><?php echo cs_get_option('404-butonu-anasayfaya-git'); ?></div></a>
 </div>
</div>
<?php
get_footer();