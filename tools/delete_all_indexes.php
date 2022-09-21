<?php

    // Set directory to ROOT
    chdir('../');
    // Include essencial files
    require 'inc/config.php';    

    $params = ['index' => $index];
    $response = $client->indices()->delete($params);
    var_dump($response);


    $params = ['index' => $index_cv];
    $response = $client->indices()->delete($params);
    var_dump($response);


    $params = ['index' => $index_source];
    $response = $client->indices()->delete($params);
    var_dump($response);

    sleep(5); echo '<script>window.location = \'../index.php\'</script>';