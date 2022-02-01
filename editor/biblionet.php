<?php

/* Exibir erros */
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

require 'functions.php';

if (file_exists('../inc/config.php')) {
    include '../inc/config.php';
}

if (file_exists('../elasticfind/elasticfind.php')) {
    include '../elasticfind/elasticfind.php';
}

if (isset($_REQUEST["delete_id"])) {
    $delete = Elasticsearch::delete($_REQUEST["delete_id"]);
    header("Location: ../index.php");
}

print("<pre>".print_r($_REQUEST, true)."</pre>");


$body["doc"]["type"] = $_REQUEST["type"];
$body["doc"]["name"] = $_REQUEST["name"];

$i = 0;
do {
    $key =  'author_'.$i.'_person_name';
    $key_person_birthDate =  'author_'.$i.'_person_birthDate';
    $key_person_deathDate =  'author_'.$i.'_person_deathDate';

    if (isset($_REQUEST[$key])) {
        $body["doc"]["author"][$i]["person"]["name"] = trim($_REQUEST[$key]);
        $body["doc"]["author"][$i]["person"]["birthDate"] = trim($_REQUEST[$key_person_birthDate]);        
        $body["doc"]["author"][$i]["person"]["deathDate"] = trim($_REQUEST[$key_person_deathDate]);
        
    }
    $i++;
} while ($i < 100);

$body["doc"]["bookEdition"] = trim($_REQUEST["bookEdition"]);

$body["doc"]["publisher"]["organization"]["name"] = trim($_REQUEST["publisher_organization_name"]);
$body["doc"]["doi"] = trim($_REQUEST["doi"]);
$body["doc"]["url"] = trim($_REQUEST["url"]);
$body["doc"]["datePublished"] = trim($_REQUEST["datePublished"]);

$i_ISBN = 0;
do {
    $key =  'ISBN_'.$i_ISBN.'';
    if (isset($_REQUEST[$key])) {
        $body["doc"]["ISBN"][$i_ISBN] = trim($_REQUEST[$key]);        
    }
    $i_ISBN++;
} while ($i_ISBN < 5);

$i_about = 0;
do {
    $key =  'about_'.$i_about.'';
    if (isset($_REQUEST[$key])) {
        $body["doc"]["about"][$i_about] = trim($_REQUEST[$key]);        
    }
    $i_about++;
} while ($i_about < 30);

$body["doc"]["description"] = trim($_REQUEST["description"]);

$i_itens = 0;
do {

    $key_digitalizado =  'itens_'.$i_itens.'_digitalItem_digitalizado';
    $key_url =  'itens_'.$i_itens.'_digitalItem_url';
    $key_location =  'itens_'.$i_itens.'_digitalItem_location';
    $key_organization =  'itens_'.$i_itens.'_digitalItem_organization';
    $key_rights =  'itens_'.$i_itens.'_digitalItem_rights';

    if (isset($_REQUEST[$key_digitalizado])) {
        $body["doc"]["itens"][$i_itens]["digitalizado"] = trim($_REQUEST[$key_digitalizado]);
        $body["doc"]["itens"][$i_itens]["url"] = trim($_REQUEST[$key_url]);
        $body["doc"]["itens"][$i_itens]["location"] = trim($_REQUEST[$key_location]);
        $body["doc"]["itens"][$i_itens]["organization"] = trim($_REQUEST[$key_organization]);
        $body["doc"]["itens"][$i_itens]["rights"] = trim($_REQUEST[$key_rights]);
    }
    $i_itens++;
} while ($i_itens < 10);


$body["doc_as_upsert"] = true;

print("<pre>".print_r($body, true)."</pre>");

$upsert = Elasticsearch::update($_REQUEST["rppbci_id"], $body);
print_r($upsert);

//header("Location: ../index.php");

?>