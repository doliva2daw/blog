<?php
    include  'base.tpl.php';

    ?>
    <main class="container">
        <form method="post" action="<?=BASE;?>post/add">
            <label for="title">Titulo:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="body">Contenido:</label><br>
            <textarea id="body" name="body" rows="5" cols="40"></textarea><br>  
            <label for="tags">Tags</label><br>
            <input type="text" id="tags" name="tags"><br><br>   
            <input type="submit" value="Crear Post">
        </form>    
    </main>
    <script>
                    
    </script>
    
        <?php

        include 'footer.tpl.php';
        ?>