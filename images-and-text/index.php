<?php
    include ('../local/header.php'); 
?>
        <div id='content'>
            <div id="header">
                <h1>Images & Text</h1>
                <p>JS3 has built in support to easily display Images and render Text.</p>
                <hr>
            </div>
            
        <h2>Displaying Images</h2>
        <p>To display an Image on the canvas, simply create a JS3Image Object and pass in the path of the file to be loaded.<br>
        JS3Image Objects support <span style='color:blue'>pngs, jpgs, </span>and <span style='color:blue'>gifs.</span></p>            
            <pre><code class='javascript'>
        var stage = new JS3('my-canvas');                
        var img = new JS3Image( {src:'nyancat.png'} );
            img.x = 25; 
            img.y = 25;                          
        stage.addChild(img);
            </code></pre>
        <canvas id="img-1" width='898' height='100'></canvas>
        <p>Or of course you can specify the <u><b>src</b></u> on the JS3Image itself instead of passing it into the constructor.</p>            
            <pre><code class='javascript'>
        var stage = new JS3('my-canvas');                
        var img = new JS3Image( {x:25, y:25} );
            img.src = 'nyancat.png';
            img.rotation = 90;
        stage.addChild(img);
            </code></pre>
        <canvas id="img-2" width='898' height='100'></canvas>
        <p>Each JS3Image Object also has a <u><b>ready</b></u> callback that executes when the Image has finished loading.</a>
            <pre><code class='javascript'>
        var stage = new JS3('my-canvas');                
        var img = new JS3Image( {x:25, y:25, src:'nyancat.png'} );
            img.ready = function(){ alert('Image Loaded')};
        stage.addChild(img);            
            </code></pre>
        <p><strong>Quick Tip : </strong>You don't have to wait for the Image to finish loading before adding it to the DisplayList.</p><hr>
        
        <h2>Rendering Text</h2>
        <p>Rendering Text on the canvas is as simple as creating a JS3Text Object and adding it to the Stage.</p>
            <pre><code class='javascript'>
        var stage = new JS3('my-canvas');
        var text = new JS3Text( {text:'Hello World!', bold:true, color:'green', size:20} );
            text.x = 50;
            text.y = 35;
        stage.addChild(text);
            </code></pre>
        <canvas id="img-3" width='898' height='100'></canvas>
        <p>And of course you can scale and rotate JS3Objects just as you would any other Sprite.</p>        
            <pre><code class='javascript'>
        var text = new JS3Text( {text:'Hello World!', bold:true, color:'green', size:20} );
            text.x = 50;
            text.y = 35;
        stage.run(function(){
            text.rotation += 1;
        });  
        stage.addChild(text);
            </code></pre>
        <canvas id="img-4" width='898' height='100'></canvas> 
        <p>In addition to the properties inherited from the <a href=<?php linkto('/drawing/#drawing-basics')?>>base JS3Object</a>, JS3Text objects also define the following :</p>
            <pre><code class='javascript'>
        font        :String = 'Arial';
        size        :Number = 12;        
        bold        :Boolean = false;
        italic      :Boolean = false;
        color       :String = '#333';        
        strokeColor :String = '#CCC';        
            </code></pre>
        
        <p>Support for rendering text on an HTML5 canvas is still somewhat in its infancy.<br>
            Many more features will be added here as the spec and browser support evolves...</p><hr>
            
        <p class='next-page'><b>Awesome, you're ready for the next section. Click here to learn about <a href=<?php linkto('/tweening');?>>Tweening & Animating with Timers.</a></b></p><hr>
                                  
        <?php include ('../local/footer.php'); ?>        
        <script type="text/javascript" src="./images-and-text.js"></script>            
	    <script type="text/javascript" src="http://yandex.st/highlightjs/6.1/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </body>
</html>