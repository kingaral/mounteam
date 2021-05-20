<?php
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=mounteam', 'root', '');
      } catch(PDOException $e){
          echo $e->getMessage();
      }

      function getUsersByEmail($email)
      {
            global $connection;
            $query = $connection->prepare("SELECT u.id, u.email, u.name, u.surname, u.password, u.role_id
            FROM user u
            WHERE email =:email");
            $rows = $query->execute(array("email"=>$email));
            $result = $query->fetch();
            return $result;
      }
      function getUsersById($id)
      {
            global $connection;
            $query = $connection->prepare("SELECT  u.id, u.email, u.name , u.surname, u.password , r.name
            FROM user u
            INNER JOIN roles r ON r.id = u.role_id
            WHERE u.id =:id");
            $rows = $query->execute(array("id"=>$id));
            $result = $query->fetch();
            return $result;
      }
       function addUser($user)
      {
            global $connection;
            $query = $connection->prepare("INSERT INTO user (email,name,surname, password,role_id) VALUES(:e,:n,:sn,:p,:r )");
            $rows = $query->execute(array(":e"=>$user['email'],":n"=>$user['name'],":sn"=>$user['last_name'],":p"=>$user['password'],":r"=>$user['role_id']));
            return $rows > 0;
      }
      function getAllUsers()
     {
           global $connection;
           $query = $connection->prepare("SELECT u.id, u.email, u.name as Имя, u.surname as Фамилия, u.password as Пароль, r.name as Роль
           FROM user u
           INNER JOIN roles r ON r.id = u.role_id");
           $query->execute();
           $results = $query-> fetchAll();
           return $results;
      }
      function updateUser($newUser){
                  global $connection;
                  $query = $connection->prepare("UPDATE user
                    SET  email=:e, name=:n, surname=:sn, password=:p, role_id=:r_id
                    WHERE id=:final_id");
                  $rows = $query->execute(array(":e"=>$newUser['email'], ":n"=>$newUser['name'], ":sn"=>$newUser['surname'], ":p"=>$newUser['password'],
                  "r_id"=>$newUser['roles'], "final_id"=>$newUser['id']));
                  return $rows>0;
                  }
      function deleteUser($id){
          global $connection;
          $query = $connection->prepare("DELETE from user where id = :id");
          $rows = $query->execute(array("id"=>$id));
          return $rows > 0;
          }
      function addMessage($message){
               global $connection;
               $query = $connection->prepare("INSERT INTO message (user_id, phone, message) VALUES(:u_id,:ph,:m)");
               $rows = $query->execute(array(":u_id"=>$message['user_id'], ":ph"=>$message['phone'], ":m"=>$message['message']));
               return $rows > 0;
      }
      function getRoles() {
                  global $connection;
                  $query = $connection->prepare("SELECT * from roles");
                  $query->execute();
                  $results = $query->fetchAll();
                  return $results;

      }
      function getMessages(){
                          global $connection;
                          $query = $connection->prepare("SELECT u.name as Имя, u.email, m.phone as Номер, m.message as Сообщение
                          FROM message m
                           INNER JOIN user u ON u.id = m.user_id
                          ");
                          $rows = $query->execute(array());
                          $result = $query->fetchAll();
                          return $result;
        }

        function getAllTrips(){
                            global $connection;
                            $query = $connection->prepare("SELECT t.id, t.name as Имя, t.details as Детали, t.price as Цена, t.count as Количество, c.type_category as Категория, t.img
                            FROM trips t
                            INNER JOIN category c ON c.id = t.category_id
                            ");
                            $rows = $query->execute(array());
                            $result = $query->fetchAll();
                            return $result;
          }
          function getTripsByCategory($cat_id){
                              global $connection;
                              $query = $connection->prepare("SELECT t.id, t.name as Имя, t.details as Детали, t.price as Цена, t.count as Количество, c.type_category as Категория, t.img
                              FROM trips t
                              INNER JOIN category c ON c.id = t.category_id
                              WHERE category_id=:cat_id
                              ");
                              $rows = $query->execute(array("cat_id"=>$cat_id));
                              $result = $query->fetchAll();
                              return $result;
            }
          function deleteTrip($id){
              global $connection;
              $query = $connection->prepare("DELETE from trips where id = :id");
              $rows = $query->execute(array("id"=>$id));
              return $rows > 0;
          }
          function getCategory() {
                      global $connection;
                      $query = $connection->prepare("SELECT * from category");
                      $query->execute();
                      $results = $query->fetchAll();
                      return $results;

          }

         function addTrip($trip){
                    global $connection;
                    $query = $connection->prepare("INSERT into trips(name, details, price,count, category_id, img) VALUES(:n, :d, :p, :c, :category, :i)");
                    $rows = $query->execute(array(":n"=>$trip['name'],":d"=>$trip['details'],":p"=>$trip['price'],":c"=>$trip['count'],":category"=>$trip['category'],":i"=>$trip['img']));
                    return $rows > 0;
          }
          function getTripById($id){
                              global $connection;
                              $query = $connection->prepare("SELECT t.id, t.name, t.details, t.price , t.count , c.type_category , t.img
                              FROM trips t
                              INNER JOIN category c ON c.id = t.category_id
                              WHERE t.id =:id");
                              $rows = $query->execute(array("id"=>$id));
                              $result = $query->fetch();
                              return $result;
            }

            function setTripCount($id,$count){
                                  global $connection;
                                  $query = $connection->prepare("UPDATE trips
                                    SET  count=:c
                                    WHERE id=:final_id");
                                    $rows = $query->execute(array(":c"=>$count,"final_id"=>$id));
                                    return $rows>0;
            }
            function updateTrip($trip){
                        global $connection;
                        $query = $connection->prepare("UPDATE trips
                          SET  name=:n, details=:d, price=:p, count=:c, category_id=:c_id
                          WHERE id=:final_id");
                        $rows = $query->execute(array(":n"=>$trip['name'], ":d"=>$trip['details'], ":p"=>$trip['price'], ":c"=>$trip['count'],
                        "c_id"=>$trip['category'], "final_id"=>$trip['id']));
                        return $rows>0;
            }
            function finalOrder($order){
                      $trip=getTripById($order['trip_id']);
                      $trip['count']-=$order['count'];
                    setTripCount($order['trip_id'],$trip['count']);
                      global $connection;
                       $query = $connection->prepare("INSERT into finalorder(trips_id, user_id, count) VALUES(:t, :u, :c)");
                       $rows = $query->execute(array(":t"=>$order['trip_id'],":u"=>$order['user_id'],":c"=>$order['count']));
                       return $rows > 0;

             }
             function getTicketsByIdOfUser($id){
                                 global $connection;
                                 $query = $connection->prepare("SELECT f.id, u.name as Имя,t.name as Имя_поездки, t.price as Цена, f.count as Вы_купили
                                 FROM finalorder f
                                 INNER JOIN user u ON u.id = f.user_id
                                 INNER JOIN trips t ON t.id = f.trips_id
                                 WHERE f.user_id=:id
                                 ");
                                 $rows = $query->execute(array("id"=>$id));
                                 $result = $query->fetchAll();
                                 return $result;
               }
               function getAllTickets(){
                                   global $connection;
                                   $query = $connection->prepare("SELECT f.id, u.name as Имя,t.name as Имя_поездки, t.price as Цена, f.count as Вы_купили
                                   FROM finalorder f
                                   INNER JOIN user u ON u.id = f.user_id
                                   INNER JOIN trips t ON t.id = f.trips_id
                                   ");
                                   $rows = $query->execute(array());
                                   $result = $query->fetchAll();
                                   return $result;
                 }




?>
