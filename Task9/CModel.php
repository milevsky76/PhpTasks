<?php

    class CModel{
        public $mysql;
        private $result;
    
        public function __construct() {
            $connectionData = [ "host" => "", "userName" => "", "password" => "", "dbName" => "" ];
            
            $mysql = mysqli_connect($connectionData["host"], $connectionData["userName"], $connectionData["password"], $connectionData["dbName"]);
            
            if(!$mysql){
                die("Connection error: " . mysql_error());
            }
            
            mysqli_query($mysql, "SET NAMES 'utf8_general_ci'");
            mysqli_query($mysql, "SET CHARACTER SET 'utf8_general_ci'");
            
            $this->mysql = $mysql;
        }
        
        //Сбор данные для главной страницы
        public function GetDataMainPage(){
            $this->result = [
                "areas" => self::GetAreas(),
                "date" => self::GetDate()
            ];
            
			return $this->result;           
        }
        
        //Получение областей
        public function GetAreas(){
            $resultDB = mysqli_query($this->mysql, "SELECT * FROM `areas`");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = [
                    "id" => $row["id"],
                    "name" =>$row["name"] 
                ];
            }
            
            return $result;
        }
        
        //Получение выбранного города
        public function GetCity(){
            $city = $_POST["city"];
            
            $resultDB = mysqli_query($this->mysql, "SELECT name FROM `cities` WHERE id = $city");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result = $row["name"];
            }
            
            return $result;
        }
        
        //Формирование данных для input type=file
        public function GetDate(){
            $result = ["min" => date("Y-01-01"), "max" => date("Y-12-31") , "value" => date("Y-m-d")];
            
            return $result;
        }
        
        //Получение городов
        public function GetDataSelectCities(){ 
            $idAreas = $_REQUEST["area"];
            
            $resultDB = mysqli_query($this->mysql, "SELECT id, name FROM `cities` WHERE areas_id = $idAreas");
            
            while($row = mysqli_fetch_assoc($resultDB)){
                $result[] = [
                    "id" => $row["id"],
                    "name" =>$row["name"] 
                ];
            }
            
            return $result;
        }            
    }

?>