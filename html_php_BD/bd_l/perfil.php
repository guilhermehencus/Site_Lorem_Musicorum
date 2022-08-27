  <?php
    session_start();
    include("connection.php");
    $id = $_SESSION['ID'];
    $usuario = $_SESSION["usuarioNome"];
    $_SESSION["usuarioSenha"];
    $_SESSION['usuarioFoto'];

    if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
        header("Location: login.php");
        exit;
    } else {
    }
    ?>
  <?php
    include("connection.php");
    ?>
  <!DOCTYPE html>

  <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

  <head>
      <meta charset="utf-8" name="viewport" content="width=device-width" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <title> Perfil </title>
      <link rel="stylesheet" href="../../css/header_c.css" />
      <link rel="stylesheet" href="../../css/footer.css" />
      <link rel="stylesheet" href="../../css/profile_ca.css" />
  </head>

  <body>
      <header>
          <?php
            if (isset($_SESSION['alterado'])) :
            ?>
              <div id="alterado">
                  <p> Alterado com sucesso </p>
              </div>
          <?php
            endif;
            unset($_SESSION['alterado']);
            ?>
          <?php
            if (isset($_SESSION['alterar_foto'])) :
            ?>
              <div id="alterado">
                  <p> Alterado a foto com sucesso </p>
              </div>
          <?php
            endif;
            unset($_SESSION['alterar_foto']);
            ?>
          <?php
            if (isset($_SESSION['alterar_foto_ruim'])) :
            ?>
              <div id="alterado_nao">
                  <p> A foto não foi atualizado </p>
              </div>
          <?php
            endif;
            unset($_SESSION['alterar_foto_ruim']);
            ?>
          <?php
            if (isset($_SESSION['alterar_foto_tamanho'])) :
            ?>
              <div id="alterado_nao">
                  <p> A foto precisa ter um tamanho menor de 5MB </p>
              </div>
          <?php
            endif;
            unset($_SESSION['alterar_foto_tamanho']);
            ?>
          <?php
            if (isset($_SESSION['alterar_foto_tipo'])) :
            ?>
              <div id="alterado_nao">
                  <p> Selecione adequadamente o tipo de foto </p>
              </div>
          <?php
            endif;
            unset($_SESSION['alterar_foto_tipo']);
            ?>
          <?php
            if (isset($_SESSION['senha_diferente'])) :
            ?>
              <div id="alterado_nao">
                  <p> Escreva o nome da sua senha igual no confirma senha </p>
              </div>
          <?php
            endif;
            unset($_SESSION['senha_diferente']);
            ?>
          <?php
            if (isset($_SESSION['senha_alterado'])) :
            ?>
              <div id="alterado">
                  <p> Alterado a senha com sucesso </p>
              </div>
          <?php
            endif;
            unset($_SESSION['senha_alterado']);
            ?>
          <h1>
              <div id="fig-logo">
                  <img id="logo" src="../../img/Logo_Musica3.png" alt="Logo do Site" />
              </div>

              <?php
                include("connection.php");
                $sql = mysqli_query($conexao, "SELECT foto FROM usuario WHERE id='$id'");

                // Exibe as informações de cada usuário
                while ($imagem = mysqli_fetch_object($sql)) {

                    // Exibimos a foto
                    echo " <div class='menu'> <li> <a href='perfil.php'> <img id='Logo_Click' src='../../img/" . $imagem->foto . "'/> </a> <ul> <li> <a id='botao_seleciona' href='sair.php'> Sair </a> </li> </ul> </li> </div>";
                }
                ?>
              <script type="text/javascript">
                  $(document).ready(function() {
                      $("#botao_seleciona").mouseenter(function(e) {
                          $("#Logo_Click").css('opacity', '0.1');
                      });
                      $("#botao_seleciona").mouseleave(function(e) {
                          $("#Logo_Click").mouseenter(function(e) {
                              $("#Logo_Click").css('opacity', '0.1');
                          });
                          $("#Logo_Click").mouseleave(function(e) {
                              $("#Logo_Click").css('opacity', '1');
                          });

                      });
                  });
              </script>

          </h1>
          <!-- -->
          <nav>
              <ul>
                  <li id="index"><a href="../inicio.php">Página Inicial</a></li>
                  <li id="faq"><a href="../faq.php">FAQ</a></li>
                  <li id="aboutus"><a href="../sobre.php">Sobre Nós</a></li>
                  <li id="help"><a href="../ajuda.php">Ajuda</a></li>
                  <li><input type="search" value="Pesquisar" />
                      <button type="submit" value="Buscar">Buscar</button>
                  </li>
              </ul>
          </nav>
          <!-- -->
      </header>

      <section>
          <div class="esq">
              <div id="section_foto">
                  <?php
                    $sql = mysqli_query($conexao, "SELECT foto FROM usuario WHERE id='$id'");
                    while ($imagem = mysqli_fetch_object($sql)) {

                        // Exibimos a foto
                        echo "<img id='Logo_Perfil' src='../../img/" . $imagem->foto . "'/> ";
                    }
                    ?>
              </div>
              <?php
                include("connection.php");
                $result = "select*from usuario where id='$id'";
                $resultado = mysqli_query($conexao, $result);
                $row_usuario = mysqli_fetch_assoc($resultado);
                ?>
              <form method="POST" action="alterar_foto.php" enctype="multipart/form-data" id="campos_foto">

                  <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>" required />
                  <label class="input_per" for="input_file"> Seleciona a Imagem </label>
                  <input type="file" name="arquivo" id="input_file">
                  <input type="submit" value="Alterar Foto">

              </form>
          </div>

          <div class="dir">

              <form action="editar.php" method="POST" class="Cadastro, dir" autocomplete="off">
                  <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>" required />
                  <label> Nome: </label>
                  <input name="nome" type="text" name="nome" value="<?php echo $row_usuario['nome'] ?>" required /> <br />
                  <label> Usuário: </label>
                  <input name="usuario" type="text" name="usuario" value="<?php echo $row_usuario['nome_usuario'] ?>" required /> <br />
                  <label> Email: </label>
                  <input name="email" type="email" name="email" value="<?php echo $row_usuario['email'] ?>" required /> <br />
                  <input type="hidden" name="tipo_usuario" value="<?php echo $row_usuario['id_usuario_login'] ?>" required />
                  <br />
                  <br>
                  <input type="submit" value="Alterar">
              </form>

          </div>

          <div class="centro">
              <hr>
              <form action="editar_senha_1.php" method="POST" class="Cadastro" autocomplete="off">
                  <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>" required />
                  <input type="password" name="senha" placeholder="Senha" />
                  <input name="senha_confirma" type="password" placeholder="Confirmar Senha" />
                  <input type="submit" value="Alterar Senha">
              </form>
              <div class="esq">
                  <form action="verificar_favoritos.php" method="POST" class="Cadastro" autocomplete="off">
                      <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>" required />
                      <input type="submit" value="Meus Favoritos" name=" favorito">
                  </form>

              </div>


      </section>

      <footer>
          <h1><img src="../../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
          &copy; André Haine Santos & Guilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
      </footer>
  </body>

  </html>