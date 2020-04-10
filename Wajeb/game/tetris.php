<!doctype html>
  <meta charset=utf-8>
  <title>Tetr.js</title>
  <link rel=stylesheet href=style.css>
  <style>
   
    .logout-button           
        {
            
            height: 25px;
            width: 100px;
            font-size: 20px;
            align-text: center;
            //border: 1px solid black;
            display:block;
            color: red;
            text-align:center;
            position: absolute;
            top: 10px;
            right: 10px;
        }
</style>
<!--<canvas id=bg></canvas>-->
<div class="logout-button"><a href="../customer/kids_mode.php">Exit Game </a> </div>
<video id=bg src=bg.webm loop autoplay></video>
<div id=content>

  <!-- Canvases -->
  <div id=d>
    <h3>Hold</h3>

    <div id=a>
      <canvas id=hold></canvas>
    </div>
    <ul id=replay style=display:none>
      <li><a onclick=replay(-1)>prev</a>
      <li><a onclick=replay()>Play/Pause</a>
      <li><a onclick=replay(1)>next</a>
    </ul>

    <table id=stats>
      <tr><td id=line>0<th>Line
      <tr><td id=piece>0<th>Piece
      <tr><th id=time>00:00.00
    </table>
  </div>

  <div id=b>
    <canvas id=bgStack></canvas>
    <canvas id=stack></canvas>
    <canvas id=active></canvas>

    <p id=msg>

    <nav class='menu on'>
      <h1>Tetr.js</h1>
      <ul>
        <li><a onclick=init(0)>Play Sprint</a>
        <!--<li><a onclick=init(1)>Play Marathon</a>
        <li><a onclick=init(2)>Play Ultra</a>-->
        <li><a onclick=init(3)>Play Dig Race</a>
        <li><a onclick=menu(2)><i class=></i>Controls</a>
        <li><a onclick=menu(1)><i class=icon-cog></i>Settings</a>
      </ul>
    </nav>

    <div class=menu>
      <h2>Settings</h2>
      <div id=settings>
      </div>
      <div style=clear:both><a class=button onclick=menu(0)>Done</a></div>
    </div>

    <div class=menu>
      <h2>Controls</h2>
      <p>Click on the control you want to change, then press any key.
      <table id=controls>
        <tr> <th>Move Left:    <td id=moveLeft>←
        <tr> <th>Move Right:   <td id=moveRight>→
        <tr> <th>Move Down:    <td id=moveDown>↓
        <tr> <th>Hard Drop:    <td id=hardDrop>Space
        <tr> <th>Hold:         <td id=holdPiece>C
        <tr> <th>Spin Right:   <td id=rotRight>X
        <tr> <th>Spin Left:    <td id=rotLeft>Z
        <tr> <th>Spin 180:     <td id=rot180>Shift
        <tr> <th>Retry:        <td id=retry>R
        <tr> <th>Pause:        <td id=pause>Esc
      </table>
      <div style=clear:both><a class=button onclick=menu(0)>Done</a></div>
    </div>

    <nav id=go class=menu>
      <ul>
        <li><a onclick=init(gametype)>Retry</a>
        <li><a onclick=init('replay')>Watch Replay</a>
        <li><a onclick=menu(0)>Main Menu</a>
      </ul>
    </nav>

    <nav id=pause class=menu>
      <ul>
        <li><a onclick=unpause()>Return</a>
        <li><a onclick=init(gametype)>Retry</a>
        <li><a onclick=menu(0)>Main Menu</a>
      </ul>
    </nav>
  </div>

  <div id=c>
    <h3>Next</h3>
    <canvas id=preview></canvas>
  </div>

</div>

<canvas id=sprite></canvas>
<script src=tetris.js></script>
<script src=piece.js></script>
<script src=stack.js></script>
<script src=hold.js></script>
<script src=preview.js></script>
<script src=menu.js></script>
<script src=bg.js></script>
<script>_gaq=[['_setAccount','UA-30472693-1'],['_trackPageview']];(function(d){var g=d.createElement('script'),s=d.scripts[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)})(document)</script>
