<?php

include "config.php";

    if(isset($_POST['update'])){
        $id = $_POST ['id'];
        $primeironome = $_POST ['primeironome'];
        $ultimonome = $_POST ['ultimoonome'];
        $email = $_POST ['email'];
        $password = $_POST ['password'];
        $genero = $_POST ['genero'];

        $sql = "UPDATE `usuario`.`formulario`SET `primeironome` = '$primeironome',
        `ultimonome` = '$ultimonome', 
        `email` = '$email', 
        `password` = '$password', 
        `genero` = '$genero' 
        WHERE `id`='$id' ";

        $result = $conn->query($sql);

        if ($result) == TRUE){
            echo "Atualização realizada com sucesso!"
            }else{
                echo "erro" .$sql. "<br>" . $conn->error;
            };
        }

            if(isset($_GET ['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM `usuario`, `formulario` WHERE `id`='$id'";
                $result = $conn->query($sql);

                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        $primeironome = $row['primeironome'];
                        $ultimonome = $row['ultimonome'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $genero = $row['genero'];
                        $id = $row['id']

                    }
                }
            
            ?>

            <h1> Formulário de Atualização</h1>

            <form action="" method="post">
                <fieldset> 
                    <legend> Informação Pessoal: </legemd>
                    Primero Nome: <br>
                    <input type="text" name="primeironome" value="<?php echo $primeironome; ?>">;
                    <input type="hidden" name="id" value="<?php echo $id; ?>">;
                    <br>
                    Ultimo Nome: <br>
                    <input type="text" name="ultimonome" value="<?php echo $ultimonome; ?>">;
                    <br>
                    Email:<br>
                    <input type="email" name="email" value="<?php echo $email; ?>">;
                    <br>
                    Password:
                    <input type="password" name="password" value="<?php echo $password; ?>">;
                    <br>
                    Gênero: 
                    <input type="radio" name="genero" value="Masculino"
                    <?php if($genero == 'Masculino') { echo "checked";}   ?>> Masculino
                    <input type="radio" name="genero" value="Feminino"
                    <?php if($genero == 'Feminino') { echo "checked";}   ?>> Feminino
                    <input type="radio" name="genero" value="Outros"
                    <?php if($genero == 'Outros') { echo "checked";}   ?>> Outros
                    <br><br>

                    <input type="submit" value="uptade" name="uptade">
            </fieldset>
            </form>
<?php
            }else{
                header('Location:consultar.php');
            }
        }
?>