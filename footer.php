<footer class="site-footer">
    <div class="container-full">
        <div class="row">
            <div class="col-sm-12">
                <nav class="footer-navbar navbar-dark pad-30">
                    <ul class="list-inline">
                    <li><a href="#topOPage" class="btn" title="return to top of this page">Top 'O Page</a></li>
                    <li><a href="<?php echo SNIPP_BASE . 'index.php'; ?>" class="btn" title="return to home page">SnippWiki Home</a></li>
                    </ul>
                </nav>
<section style="padding-left:30px;"> <?php include( SNIPP_BASE . 'inc/get-visitor-data.php'); ?> </section>
            </div>
        </div>
    </div>
    
</footer><script>window.onload = function(){
    var h3Text = document.querySelector("h3").innerText;
    return document.title = h3Text;
    }</script> 