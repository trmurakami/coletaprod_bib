<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo $branch; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
          </li>
        </ul>
        <form role="search" action="result.php">
          <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="search">
          <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pesquisar</button> -->
        </form>
      </div>
    </div>
  </nav>