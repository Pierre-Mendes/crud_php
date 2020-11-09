<?php session_start() ?>

<?php include_once 'includes/header.inc.php';?>
<?php include_once 'includes/menu.inc.php';?>
        
        <!--Formulário de Cadastro-->
        <div class="row container">
            <form action="banco_de_dados/create.php" method="post" class="col s12">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="images/avatar_black.png" alt="[imagem]" width="100"></legend>
                    <h5 class="light center">Cadastro de Pessoas</h5>
                    
                    <?php
                        if(isset($_SESSION['msg'])):
                            echo $_SESSION['msg'];
                            session_unset();
                        endif;
                    ?>
                    
                    <!--Campo Nome-->
                    
                    <div class="input-field col s12">
                        <h3></h3>
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                        <label for="nome">Seu Nome...</label> 
                    </div>
                        
                        <!--Campo Email-->
                    <div class="input-field col s12">
                        <h3></h3>
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" id="email" maxlength="50" required>
                        <label for="email">Seu Email...</label>  
                    </div>
                        
                         <!--Campo Telefone-->                         
                    <div class="input-field col s12">
                        <h3></h3>
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="telefone" id="telefone" maxlength="15" required>
                        <label for="telefone">Seu Telefone...</label>                                
                    </div>
                         
                         <!--Botoes Açoes -->
                         <div class="input-field col s12">
                             <input type="submit" value="cadastrar" class="btn blue">
                             <input type="reset" value="limpar" class="btn red">                            
                         </div>
                         
                </fieldset>
            </form>
        </div>
        
        <?php  include_once 'includes/footer.inc.php';