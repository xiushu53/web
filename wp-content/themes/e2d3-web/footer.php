    <footer class="footer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" alt="E2D3" width="79">　Data Visualization for Everyone
    </footer>

</div><!-- /.wrapper -->

<script>
(function () {
    //smoose scroll
    jQuery('#menu-button').on('click',function(){
        jQuery('#menu-body').toggleClass('on');
    })
    jQuery('.anchor-link').on('click',function(){
        var speed = 400;
        var href= jQuery(this).attr("href");
        var target = jQuery(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    })
}());
</script>
<?php wp_footer(); ?>
<style>
#wpadminbar{
	top:inherit !important;
    bottom:0 !important;
    position: fixed;
}
</style>
</body>
</html>
 
