<?php

    require_once "CController.php";

    class CView {
        private $controller;
    
        public function __construct(){
            $this->controller = new CController();
        }
        
        //Формирование главной страницы
        public function ViewMainPage() {            
            $dataMainPage = $this->controller->SetMainPage();

            include "view_mainpage.php";
            
			return $dataMainPage;
		}
        
        //Формирование блока select=city
        public function ViewSelectCities() {
            $cities = $this->controller->SetSelectCities();
            
            include "view_mainpage_select.php";
            
			return $cities;
		}
        
        public function ViewUntilNewYear(){
            echo $uny = $this->controller->SetUntilNewYear();
            
            return $uny;
        }
        
        //Формирование блока для вывода данных
        public function ViewValidationData(){
            $validDate = $this->controller->SetValidationData();
            $this->controller->SendMessMail($validDate);
            
            include "view_mainpage_output.php";
            
            return $validDate;
        }     
    }

?>