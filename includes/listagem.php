<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = 
        '<div class="alert alert-success">
          Ação executada com sucesso!
         </div>';
      break;

      case 'error':
        $mensagem = 
        '<div class="alert alert-danger">
          Ação não executada!
        </div>';
      break;
    }
  }

  $resultados = '';
  foreach($salas as $sala){
    $resultados .= '<tr>
                      <td>'.$sala->id.'</td>
                      <td>'.$sala->titulo.'</td>
                      <td>'.$sala->descricao.'</td>
                      <td>'.($sala->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                      <td>'.date('d/m/Y à\s H:i:s',strtotime($sala->data)).'</td>

                      <td>

                        <a href="editar.php?id='.$sala->id.'">
                          <button type="button" class="btn btn-primary">
                            Editar
                          </button>
                        </a>

                        <a href="excluir.php?id='.$sala->id.'">
                          <button type="button" class="btn btn-danger">
                            Excluir
                          </button>
                        </a>

                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma sala encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">
        Nova sala
      </button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>