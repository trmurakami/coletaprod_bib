<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php 
            include('inc/config.php');             
            include('inc/meta-header-new.php');
            include('inc/functions.php');
            
            /* Define variables */
            define('authorUSP','authorUSP');
        ?> 
        <title><?php echo $branch ?></title>
        <!-- Facebook Tags - START -->
        <meta property="og:locale" content="pt_BR">
        <meta property="og:url" content="<?php echo $url_base ?>">
        <meta property="og:title" content="<?php echo $branch ?> - Página Principal">
        <meta property="og:site_name" content="<?php echo $branch ?>">
        <meta property="og:description" content="<?php echo $branch_description ?>">
        <meta property="og:image" content="<?php echo $facebook_image ?>">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="800"> 
        <meta property="og:image:height" content="600"> 
        <meta property="og:type" content="website">
        <!-- Facebook Tags - END -->

        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            }
            .jumbotron {
            background-image: url("<?php echo $background_1 ?>");
            background-size: 100%;
            background-repeat: no-repeat;            
            }    
        </style>
        
    </head>

    <body>



    <!-- NAV -->
    <?php require 'inc/navbar.php'; ?>
    <!-- /NAV --> 

    <div class="jumbotron">
        <div class="container bg-light p-5 rounded">
            <h1 class="display-5"><?php echo $branch; ?></h1>
            <p><?php echo $branch_description; ?></p>

            <?php isset($error_connection_message) ? print_r($error_connection_message) : "" ?>

            <!-- Modal Inclusão -->

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#inclusao">
                Inclusão
            </button>

            <div class="modal fade" id="inclusao" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inclusaoLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inclusaoLabel">Inclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="display-5 mt-3">Inclusão</h1>

                    <form class="m-3" action="lattes_xml_to_elastic.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <legend>Inserir um XML do Lattes</legend>
                        <div class="input-group">
                            <div class="input-group">
                                <input class="form-control" type="file" id="formFile" name="file">
                                <input type="text" placeholder="TAG" class="form-control" name="tag">
                                <input type="text" placeholder="Núm. funcional" class="form-control" name="numfuncional">
                                <input type="text" placeholder="Unidade" class="form-control" name="unidade">
                            </div>
                            <div class="input-group">                                
                                <input type="text" placeholder="Departamento" class="form-control" name="departamento">
                                <input type="text" placeholder="Nome do PPG" class="form-control" name="ppg_nome">
                                <input type="text" placeholder="Tipo de vínculo" class="form-control" name="tipvin">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" placeholder="Genero" class="form-control" name="genero">
                                <input type="text" placeholder="Nível" class="form-control" name="desc_nivel">
                                <input type="text" placeholder="Curso" class="form-control" name="desc_curso">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Incluir</button>
                                </div>   
                            </div>
 
                        </div>  
                    </form> 


                    <form class="m-3" action="doi_to_elastic.php" method="get">
                        <legend>Inserir um DOI de artigo que queira incluir (sem http://doi.org/)</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">DOI</span>
                            </div>
                            <input type="text" placeholder="Insira um DOI" class="form-control" name="doi" data-validation="required">
                            <input type="text" placeholder="TAG para formar um grupo" class="form-control" name="tag">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>    
                        </div>  
                    </form>

                    <form class="m-3" action="wos_upload.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <legend>Enviar um arquivo da Web of Science (UTF-8, separado por tabulações)</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Web of Science</span>
                            </div>
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <input type="text" placeholder="TAG para formar um grupo" class="form-control" name="tag">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>    
                        </div>  
                    </form>

                    <form class="m-3" action="incites_upload.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <legend>Enviar um arquivo do INCITES (CSV)</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">INCITES</span>
                            </div>
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <input type="text" placeholder="TAG para formar um grupo" class="form-control" name="tag">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>    
                        </div>  
                    </form>

                    <form class="m-3" action="scopus_upload.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <legend>Enviar um arquivo do Scopus (CSV - All available information)</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Scopus</span>
                            </div>
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <input type="text" placeholder="TAG para formar um grupo" class="form-control" name="tag">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>    
                        </div>  
                    </form>

                    <form class="m-3" action="scival_upload.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <legend>Enviar um arquivo do SCIVAL (CSV - All available information)</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">SCIVAL</span>
                            </div>
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <input type="text" placeholder="TAG para formar um grupo" class="form-control" name="tag">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>    
                        </div>  
                    </form>

                    <hr/>
                    <h2 class="t t-h3">Excluir índices</h2>
                    <div class="alert alert-danger" role="alert">
                        Excluir todos os dados! Atenção, essa tarefa é irreversível! <a href="tools/delete_all_indexes.php">Clique aqui</a>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>

            <!-- /Modal Inclusão -->

 
            <!-- Modal Fonte -->

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fonte">
                Fonte para comparativo
            </button>

            <div class="modal fade" id="fonte" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fonteLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fonteLabel">Fonte para comparativo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="display-5 mt-3">Fonte para comparativo</h1>


                    <form class="m-3" action="tools/harvester_source.php" method="get">
                        <legend>Harvesting OAI-PMH</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">OAI-PMH</span>
                            </div>
                            <input type="text" placeholder="URL do OAI-PMH" class="form-control" name="oai">
                            <input type="text" placeholder="Set (Opcional)" class="form-control" name="set">  
                            <select class="form-control" id="format" name="metadataFormat">
                                <option selected>Formato</option>
                                <option value="oai_dc">oai_dc</option>
                                <option value="nlm">nlm</option>
                                <option value="dim">dim</option>
                            </select>                 
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Coletar OAI</button>
                            </div>    
                        </div>  
                    </form>                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>

            <!-- /Modal Fonte -->       

            <a class="btn btn-info" href="result_source.php">Ver registros na fonte</a>


            <form class="mt-3" action="result.php">
                <label for="searchQuery">Pesquisa por trabalho - <a href="result.php">Ver todos</a></label>
                <div class="input-group">                    
                    <input type="text" name="search" class="form-control" id="searchQuery" aria-describedby="searchHelp" placeholder="Pesquise por termo ou autor">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </div>                       
                <small id="searchHelp" class="form-text text-muted">Dica: Use * para busca por radical. Ex: biblio*.</small>
                <small id="searchHelp" class="form-text text-muted">Dica 2: Para buscas exatas, coloque entre ""</small>
                <small id="searchHelp" class="form-text text-muted">Dica 3: Você também pode usar operadores booleanos: AND, OR</small>
            </form>
            <form class="mt-3" action="result.php" method="get">
                <label for="tagSearch">Pesquisa por TAG</label>
                <div class="input-group">                    
                    <input type="text" placeholder="Pesquise por tag" class="form-control" id="tagSearch" name="filter[]" value="tag:">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar TAG</button>
                    </div>
                </div>
            </form>
            <form class="mt-3" action="result_autores.php" method="get">
                <label for="authorSearch">Pesquisa por autor - <a href="result_autores.php">Ver todos</a></label>
                <div class="input-group">
                    <input type="text" placeholder="Pesquise por nome do autor ou Número funcional" class="form-control" id="authorSearch" name="search">
                    <input type="hidden" name="fields[]" value="nome_completo">                                
                    <input type="hidden" name="fields[]" value="nome_em_citacoes_bibliograficas">
                    <input type="hidden" name="fields[]" value="endereco.endereco_profissional.nomeInstituicaoEmpresa">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar autor</button>
                    </div>   
                </div>
            </form>
        </div>
    </div>    

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="uk-h3">Unidade</h2>
                <ul class="list-group">
                    <?php paginaInicial::unidade_inicio("instituicao.unidade"); ?>
                </ul>
                <h2>Departamento</h2>
                <ul class="list-group">
                    <?php paginaInicial::unidade_inicio("instituicao.departamento"); ?>
                </ul>
                <h2>Tags</h2>
                <ul class="list-group">
                    <?php paginaInicial::unidade_inicio("tag"); ?>
                </ul>                        
            </div>
            <div class="col-md-3">
                <h2 class="uk-h3">Tipo de material</h2>
                <ul class="list-group">
                    <?php paginaInicial::tipo_inicio(); ?>
                </ul>
            </div>        
            <div class="col-md-3">
                <h2 class="uk-h3">Fonte</h2>
                <ul class="list-group">
                    <?php paginaInicial::fonte_inicio(); ?> 
                </ul>    
            </div>
            <div class="col-md-3">
                <h2 class="uk-h3">Alguns números</h2>
                <ul class="list-group">
                    <li class="list-group-item"><?php echo paginaInicial::contar_registros_indice($index); ?> registros</li> 
                    <li class="list-group-item"><?php echo paginaInicial::contar_registros_indice($index_cv);; ?> currículos</li>
                    <li class="list-group-item"><?php echo paginaInicial::contar_registros_indice($index_source); ?> registros na fonte</li>
                </ul>     
            </div>
        </div>
    </div>


    <?php include('inc/footer.php'); ?>

    </body>
</html>