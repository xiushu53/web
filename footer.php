    <footer class="footer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" alt="E2D3" width="79">　Data Visualization for Everyone
    </footer>

</div><!-- /.wrapper -->

<script>
$(function(){
    //smoose scroll
    $('#menu-button').on('click',function(){
        $('#menu-body').toggleClass('on');
    })
    $('.anchor-link').on('click',function(){
        var speed = 400;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    })
});
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
 
