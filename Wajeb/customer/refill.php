<html>
    <head>
    <?php
        session_start();
        $idt=$_SESSION['tablesession'];
    
    ?>
        <title>
            Refill Page
        </title>
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body style="background-color: lightcyan;">
        <div class="logo">
            MWF Burger Joint
        </div>
        
        <div style="border:1px solid red; padding:30px; margin:20px; font-size: xx-large;">
            <form action="../function/refill.php" method="GET">
            <input  type="hidden" name="idt" value="<?php echo $idt  ?>">
                Select the drink you want to refill <br/>
                <input type="radio" name="drink" value="coke">
                <label for="coke">Coke</label><br/>
                <input type="radio" name="drink" value="dietcoke">
                <label for="dietcoke">dietcoke</label><br/>
                <input type="radio" name="drink" value="sprite">
                <label for="sprite">Sprite</label><br/><br/>
                <input type="submit" name="submit" value="submit">
                <label for="submit"></label>
        </div>
    </body>
</html>