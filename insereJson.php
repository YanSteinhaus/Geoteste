<?php

//Atribuindo um objeto Json para a variavel json
$json = '[
    {
        "produto": "10.01.0419",
        "cor": "00",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 15
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 2
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "M",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 4
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "G",
        "deposito": "1",
        "data_disponibilidade": "2023-05-01",
        "quantidade": 6
    },
    {
        "produto": "11.01.0568",
        "cor": "08",
        "tamanho": "P",
        "deposito": "DEP1",
        "data_disponibilidade": "2023-06-01",
        "quantidade": 8
    }
]';

//Agora da pra transformar o objeto json da variavel em uma lista
$jsonDecodificado = json_decode($json, true);

//Isso aqui é só para caso de querer testar se esta rodando
echo "<h1>Casas Bahia debug</h1>";

?>