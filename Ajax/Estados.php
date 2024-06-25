<?php

header('Content-type: application/json');

$regiao_selecionada = $_REQUEST['regiao_selecionada'];

$estados = [
    "norte" => [
        ["id" => "AC", "nome" => "Acre"],
        ["id" => "AP", "nome" => "Amapá"],
        ["id" => "AM", "nome" => "Amazonas"],
        ["id" => "PA", "nome" => "Pará"],
        ["id" => "RO", "nome" => "Rondônia"],
        ["id" => "RR", "nome" => "Roraima"],
        ["id" => "TO", "nome" => "Tocantins"]
    ],
    "nordeste" => [
        ["id" => "AL", "nome" => "Alagoas"],
        ["id" => "BA", "nome" => "Bahia"],
        ["id" => "CE", "nome" => "Ceará"],
        ["id" => "MA", "nome" => "Maranhão"],
        ["id" => "PB", "nome" => "Paraíba"],
        ["id" => "PE", "nome" => "Pernambuco"],
        ["id" => "PI", "nome" => "Piauí"],
        ["id" => "RN", "nome" => "Rio Grande do Norte"],
        ["id" => "SE", "nome" => "Sergipe"]
    ]
];

echo json_encode($estados[$regiao_selecionada]);