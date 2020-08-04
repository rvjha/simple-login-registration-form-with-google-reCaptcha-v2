<?php 

    class user{
        //! DB stuff
        private $conn;

        //! User Properties
        public $id;
        public $lName;
        public $fName;
        public $email;
        public $pass;
        
        //! Constructor with Db
        public function __construct($db)
        {
            
            $this->conn=$db;
            
        }

        //! Register User
        public function create_user(){
            
            //! Create query
            $query ='INSERT INTO users (uFirstName,uLastName,uEmail, uPass) VALUES (:fName, :lName, :email, :pass)';

            //! Prepare Statement 
            $stmt = $this->conn->prepare($query);

            //! Bind
            $stmt->bindParam(':fName',$this->fName);
            $stmt->bindParam(':lName',$this->lName);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':pass',$this->pass);
            //! execute query 
            if($stmt->execute()){
                return true;
             }
             else{
                 return $stmt->error;
             }
        }

        //! Check Mail Exist 
        function check_mail_exist(){
            //! Create query
            $query ='SELECT * FROM users WHERE uEmail = :email';

            //! Prepare Statement 
            $stmt = $this->conn->prepare($query);

            //! Bind
            // $stmt->bindParam(':fName',$this->fName);
            // $stmt->bindParam(':lName',$this->lName);
            $stmt->bindParam(':email',$this->email);
            //! execute query 
            $stmt->execute();

            //! number of results
            $row = $stmt->rowCount();
            if($row > 0){
                return false;
             }
             else{
                 return true;
             }
        }
        //! Select User 
        public function select_user(){
             //! Create query
             $query ='SELECT * FROM users WHERE uEmail = :email';

             //! Prepare Statement 
             $stmt = $this->conn->prepare($query);
 
             //! Bind
             $stmt->bindParam(':email',$this->email);
             

             //! execute query 
             $stmt->execute();

             //! fetch data
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                return $result;
            }
            else{
                return false;
            }
        }

        //! insert otp
        public function insert_otp(){
            
            //! Create query
            $query ="INSERT INTO `otp` (`uId`, `otp`, `createdAt`) VALUES (:id, :otp,:createdAt)";
           
            //! Prepare Statement 
            $stmt = $this->conn->prepare($query);
           
            //! Bind
            $stmt->bindParam(':id',$this->uId);
            $stmt->bindParam(':otp',$this->otp);
            $stmt->bindParam(':createdAt',$this->createdAt);
            //! execute query 
            if($stmt->execute()){
                return true;
             }
             else{
                 return $stmt->error;
             }
             echo uId;
        }
        
        //! validate otp
        public function validate_otp(){
            
            //! Create query
            $query ="SELECT * FROM `otp` WHERE `uId` = :id AND `otp`= :otp";
           
            //! Prepare Statement 
            $stmt = $this->conn->prepare($query);
           
            //! Bind
            $stmt->bindParam(':id',$this->uId);
            $stmt->bindParam(':otp',$this->otp);
            
            //! execute query 
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                return $result;    
             }
             else{
                 return false;
             }
        }
         //! validate otp
         public function update_otp(){
            
            //! Create query
            $query ="UPDATE `otp` SET `isExpired` = 1 WHERE `uId` = :id AND `otp`= :otp";
           
            //! Prepare Statement 
            $stmt = $this->conn->prepare($query);
           
            //! Bind
            $stmt->bindParam(':id',$this->uId);
            $stmt->bindParam(':otp',$this->otp);
            
            //! execute query 
            $result = $stmt->execute();
            if($result){
                return $result;    
             }
             else{
                 return false;
             }
        }
    }
    
    