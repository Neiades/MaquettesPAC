<?php

  include"includes/database.php";

  if(isset($_GET['action']))
  {
      switch($_GET['action'])
      {
          case 'get':
              try {

                  $sql = 'SELECT * FROM `evenements` E, `type_event` T WHERE E.type_event = T.id_type_event';
                  $events = array();

                  foreach ($db->query($sql) as $row) {
                      $events[] = $row;
                  }

                  echo json_encode($events);

              } catch (PDOException $e) {
                  echo json_encode(array('error' => 'Connection failed: ' . $e->getMessage()));
              }
              break;
          default:
              break;
      }
  }
?>
