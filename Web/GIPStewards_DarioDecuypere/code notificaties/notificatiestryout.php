<?php
function fetchAll($query){
      global $conn;
      $stmt = $conn->query($query);
      return $stmt->fetchAll();
  }
  function performQuery($query){
      global $conn;
      $stmt = $conn->prepare($query);
      echo ($conn->errorInfo());
      if($stmt->execute()){
          return true;
      }else{
          return true;
      }
  }
  ?>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 

                <?php
                // select van de statussen om te kijken of je ze moet tonen op datum
                $query = "SELECT * from `notificaties` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                // select van alles in notificaties by date
                $query = "SELECT * from `notificaties` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style="
                         <?php
                         //als status = unread toon view met datum
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['notificaties'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  // als het insert of update is toon bericht aan de gand van type
                if($i['type']=='insert'){
                    echo "Er is een nieuwe shift bijgekomen.";
                }else if($i['type']=='update'){
                    echo ucfirst($i['naam'])." Er is iets aangegepast aan je schema.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "Geen gevonden.";
                 }
                     ?>
            </div>
          </li>
        </ul>
          <?php 
          // insert van berichten van insert in je notificatie tabel moet nog komen in andere pagina
          
          if(isset($_POST['submit'])){
              $message = $_POST['bericht'];
              $query ="INSERT INTO `notificaties` (`idnotificaties`, `naam`, `type`, `bericht`, `status`, `date`) VALUES (NULL, '', 'insert', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:times.php");
              }
          }
                
          ?>
            <form method="post" class="form-inline my-2 my-lg-0">
          <input name="bericht"class="form-control mr-sm-2" type="text" placeholder="bericht" required>
          <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">insert</button>
        </form> | 
          <?php
          // insert van berichten van update in je notificatie tabel moet nog komen in andere pagina
          if(isset($_POST['update'])){
              $name = $_POST['naam'];
              $query ="INSERT INTO `notificaties` (`idnotificaties`, `naam`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name', 'update', '', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:times.php");
              }
          }
          
          ?>
        <form method="post" class="form-inline my-2 my-lg-0">
          <input name="naam" class="form-control mr-sm-2" type="text" placeholder="naam" required>
          <button name="update" class="btn btn-outline-success my-2 my-sm-0" type="submit">update  </button>
        </form>
      </div>
    </nav>