<h2 class="title share">Compartilhar</h2>
<div class="share-wrapper">
	<a target="_blank" href='https://www.facebook.com/sharer.php?u=<?php echo PAGE_URL; ?>'><div class="share-button facebook" title="Compartilhar via Facebook"><span class="iconify" data-icon="la:facebook-f" data-inline="true"></span></div></a>
	<a target="_blank" href='https://twitter.com/intent/tweet?text=<?php echo strip_tags($PAGE_TITLE); ?>&url=<?php echo PAGE_URL; ?>'><div class="share-button twitter" title="Compartilhar via Twitter"><span class="iconify" data-icon="akar-icons:twitter-fill" data-inline="true"></span></div></a>
	<div class="share-button tumblr" title="Compartilhar via Tumblr"><span class="iconify" data-icon="akar-icons:tumblr-fill" data-inline="true"></span></div>
	<a target="_blank" href='https://api.whatsapp.com/send?text=<?php echo $PAGE_DESCRIPTION; echo "    " . PAGE_URL; ?>'><div class="share-button whatsapp" title="Compartilhar via WhatsApp"><span class="iconify" data-icon="akar-icons:whatsapp-fill" data-inline="true"></span></div></a>
	<a target="_blank" href='http://www.reddit.com/submit?url=<?php echo strip_tags(PAGE_URL); ?>&title=<?php echo strip_tags($PAGE_TITLE); ?>'><div class="share-button reddit" title="Compartilhar via Reddit"><span class="iconify" data-icon="grommet-icons:reddit" data-inline="true"></span></div></a>
</div>