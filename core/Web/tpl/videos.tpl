<div class="wapper ">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Videos</h3>
                    
                    <div class="video">
                        <h2>{$video->vid_titulo}</h2>
                        {$video->vid_link}
                    </div>
                    
                    <div class="video-lista">
                        {foreach from=$videos item=video}
                        <div class="vid-lis-item">
                            <a href="{$video->vid_key}"><img src="http://img.youtube.com/vi/{$video->vid_link}/1.jpg" alt="{$video->vid_titulo}"/></a>
                            <a href="{$video->vid_key}"><b>{$video->vid_titulo}</b></a>
                        </div>
                        {/foreach}
                        <div class="clear"></div>
                        {$navegador}
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>