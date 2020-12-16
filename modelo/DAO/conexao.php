<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//criei uma classe abstrata
abstract class conexao {


//criei uma função construtiva    

    function __construct() {

    }

    //declarei uma função public e statica
    public static function getInstance() {
        //conexao com banco de dados
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=projetoCPA;", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        //fim getInstance
        }

    }
