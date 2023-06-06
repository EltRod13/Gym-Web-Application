<?php 
      function prepareAndExecuteQuery($connection, $sqlStatement, $parameterTypes, $parameters)
      {
          $query = $connection->prepare($sqlStatement);
          $query->bind_param($parameterTypes, ...$parameters);
          $query->execute();
          return $query->get_result();
      }

      
?>