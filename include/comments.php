<h2 class="title comments">Comentários</h2>
<div id='disqus_thread'></div>
<script>
    <?php
        if (isset($PAGE_ID)) {
            echo "var disqus_config = function () { this.page.identifier = $PAGE_ID; };";
        }
    ?>
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://izumiproject.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    document.addEventListener("themeChanged", function (e) { 
        if (document.readyState == "complete") {
            DISQUS.reset({ reload: true, config: disqus_config });
        }
    });
</script>
<noscript>
  Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a>
</noscript>