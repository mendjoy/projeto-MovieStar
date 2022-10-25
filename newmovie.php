<?php
    require_once("templates/header.php");
    //verifica se o usuario esta logado
    require_once("dao/UserDAO.php");
    require_once("models/User.php");
    
    $userDao = new UserDAO($conn, $BASE_URL);
    $user = new User();

    $userData = $userDao->verifyToken(true);
?>
    <div id="main-container" class="container-fluid">
        <div class="offset-md-4 col-md-4 new-movie-container">
            <h1 class="page-title">Adicionar Filme</h1>
            <p class="page-description">Adicione sua crítica e compartilhe!</p>
            <form action="<?= $BASE_URL?>movie_process.php" id="add-movie-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="create">

                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do filme">   
                </div>

                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control-file" id="image" name="image" >   
                </div>

                <div class="form-group">
                    <label for="length">Duração:</label>
                    <input type="text" class="form-control" id="length" name="length" placeholder="Tempo de duração do filme">   
                </div>

                <div class="form-group">
                    <label for="category">Categoria:</label>
                    <select name="category" id="category" class="form-control">
                        <option value="Ação">Ação</option>
                        <option value="Comédia">Comédia</option>
                        <option value="Documentário">Documentário</option>
                        <option value="Drama">Drama</option>
                        <option value="ficção-científica">Ficção Científica</option>
                        <option value="Musical">Musical</option>
                        <option value="Romance">Romance</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Terror">Terror</option>
                    </select>  
                </div>

                <div class="form-group">
                    <label for="trailer">Trailer:</label>
                    <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer">   
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control"  rows="5" placeholder="Descreva o filme"></textarea>
                </div>

                <input type="submit" class="btn card-btn" value="Adicionar Filme">
   
        </form>
        </div>
        

    </div>

<?php
    require_once("templates/footer.php");
?>
