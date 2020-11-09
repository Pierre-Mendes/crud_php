<!--listar os registros do db na tela-->

<?php
	include_once 'conexao.php';
	
	$querySelect = $link->query("select * from tb_pessoas");
        
	while($registros = $querySelect->fetch_assoc()):
		$id = $registros['id'];
		$nome = $registros['nome'];
		$email = $registros['email'];
		$telefone = $registros['telefone'];
		
		echo "<tr>";
		echo "<td>$nome</td><td>$email</td><td>$telefone</td>";
                echo "<td><a href='editar.php?id=$id'><i class='material-icons'>edit</i></a><td>";
		echo "<td><a href='banco_de_dados/delete.php?id=$id'><i class='material-icons'>delete</i></td>";
		echo "</tr>";
		
	endwhile;	