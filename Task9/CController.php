<?php

    require_once "CModel.php";

    class CController{
        private $model;
        
        public function __construct(){
            $this->model = new CModel();
        }
        
        //Получение данные для главной страницы
        public function SetMainPage() {	            
			$result = $this->model->GetDataMainPage();
			
			return $result;
		}
        
        //Получение дней до нового года
        public function SetUntilNewYear(){
            if (isset($_REQUEST["date"])){
                //Определяем порядковый номер дня в году
                $curDay = date("z", strtotime($_REQUEST["date"]));
                
                //Определяем високосный ли год
                $daysYear = date("L") ? 366 : 365;
                
                $days_left = $daysYear - $curDay;
                
                $result = "Дней до нового года: $days_left";
            }
            
            return $result;
        }
        
        //Получение выбранного города
        public function SetCity(){
            $result = $this->model->GetCity();
			
			return $result;
        }
        
        //Получение городов
        public function SetSelectCities(){
            $result = $this->model->GetDataSelectCities();
			
			return $result;
        }
        
        //Сбор валидных данных
        public function SetValidationData(){
            $result = [
                "name" => self::ValidationDataName(),
                "email" => self::ValidationDataEmail(),
                "city" => self::SetCity(),
                "path" => self::ValidationDataFile(),
                "date" => date("d.m.Y", strtotime($_POST["date"])),
                "uny" => self::SetUntilNewYear()
            ];
            
            return $result;
        }
        
        //Валидация имени
        private function ValidationDataName(){
            $name = $_POST["name"];
            $name = htmlspecialchars($name);
            $name = urldecode($name);
            $name = trim($name);
            
            return $name;
        }
        
        //Валидация email
        private function ValidationDataEmail(){
            $email = $_POST["email"];
            $email = htmlspecialchars($email);
            $email = urldecode($email);
            $email = trim($email);
            
            return $email;
        }
        
        //Валидация файла
        private function ValidationDataFile(){            
            $ran = rand(0, 9999);
            $put = "images/";
            
            if(isset($_FILES["file"]["name"]) && ($_FILES["file"]["name"] != "")){
                $name = $_FILES["file"]["name"];
                $namefile = $ran.$name;
                $path = $put.$namefile;
                move_uploaded_file($_FILES["file"]["tmp_name"], $path);
                
                return $path;
            }
            return false;
        }
        
        //Отправка валидных данных на почту
        public function SendMessMail($validDate){
            
            $mailAddres = "test@yahoo.com";
            $mailSubject = "Подготовка к новому году";
            $mailMessage = "Имя: $validDate[name]\n E-mail: $validDate[email]\n Города празднования нового года: $validDate[city]\n Даты начала подготовки: $validDate[date]\n Путь картинки: $validDate[path]\n From: mysite@mail.ru \r\n";
            
            $isSend = mail($mailAddres, $mailSubject, $mailMessage);
            
            if ($isSend)
            {
                return true;
            }
            return false;
        }

    }	

?>