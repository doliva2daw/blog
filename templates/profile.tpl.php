<?php
    include 'base.tpl.php';
    ?>
     <?php if(isset($user)){ ?>
    <main class="container">
    <section>
        <h3>Bloger Post <?= $user['username'];?></h3>
        <div class="col my-auto">
        <table id="mytable" class="table">
            <tr>
            <?php
                if($data){
                $columns=array_keys($data[0]);
                
                foreach ($columns as $field) {
                    echo '<th scope="row">'.$field.'</th>';
                }
                }
                
                ?>
                <th colspan="2"><strong>Actions</strong></th>   
            </tr>
        <?php
            if($data){
                foreach ($data as $row){
                    echo '<tr id="row'.$row["id"].'">';
                    foreach ($row as $column => $value) {
                       echo '<td contenteditable>'.$value.'</td>';
                    }
                    echo '<td><button class="btn btn-primary" id="update'.$row["id"].'" onclick="edit('.$row["id"].')">Update</button></td>';
                    echo '<td><button class="btn btn-danger" id="remove'.$row["id"].'" onclick="remove('.$row["id"].')">Remove</button></td>';
                    echo '</tr>';
                }   
            }
             
        ?>
        </table>
        </div>
        </section>
        <section>
        <a href="<?=BASE;?>post/new"><button class="btn btn-secondary"><strong>+</strong></button></a>
        </section>
        <section>
        <br>
        <div class="my-auto">
        <div id="message" class="alert alert-warning" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
        </section>
        
    </main>
    <?php }else{ header("Location:".BASE);}
    ?>

    
<?php
    include 'footer.tpl.php';
    ?>