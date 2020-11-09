<?php session_start()?>
<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

	<div class="row container">
		<div class="col s12">
			<h5 class="light">Editar Registros</h5><hr />
		</div>
	

		<?php
		include_once 'banco_de_dados/conexao.php';
			
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;
		$querySelect = $link->query("select * from tb_pessoas where id='$id'");
			
		while($registros = $querySelect->fetch_assoc()):
			$nome = $registros['nome'];
			$email = $registros['email'];
			$telefone = $registros['telefone'];
		endwhile;	
		?>
            
            
            
             <!--Formulário de Cadastro-->
        <div class="row container">
            <form action="banco_de_dados/update.php.php" method="post" class="col s12">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="images/avatar_black.png" alt="[imagem]" width="100"></legend>
                    <h5 class="light center">Alterar Cadastro</h5>
                    
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
                        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                        <label for="nome">Nome da Pessoa</label> 
                    </div>
                        
                        <!--Campo Email-->
                    <div class="input-field col s12">
                        <h3></h3>
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="50" required>
                        <label for="email">Novo Email</label>  
                    </div>
                        
                         <!--Campo Telefone-->
                    <div class="input-field col s12">
                        <h3></h3>
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="15" required>
                        <label for="telefone">Novo Telefone</label>                                
                    </div>
                         
                         <!--Botoes Açoes -->
                         <div class="input-field col s12">
                             <input type="submit" value="alterar" class="btn blue">
                             <a href="consultas.php" class="btn red">cancelar</a>                           
                         </div>
                         
                </fieldset>
            </form>
        </div>
        
		
		
<?php include_once 'includes/footer.inc.php'?>;