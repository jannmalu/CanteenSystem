<?php
function connect(){
 $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'the_canteen';
        
       
        $db =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if($db->connect_error){
        die("connection failed: ".$db->connect_error);

        }else{
        	// echo "SUCCESS";
        }
        return $db;	
}
// function insert($item,$image,$price){ 
//        $db=connect();
//          $insert = $db->query("INSERT into `admin_entry` (`Food_item` ,`image`, `Price`) VALUES ('$item','$image','$price');");
//         if($insert){
//             echo "File uploaded successfully.";
//         }

//     }
function mysql_get_var($query,$y=0){
$conn=connect();
       $res = mysqli_query($conn,$query);
       $row = mysqli_fetch_array($res);
       mysqli_free_result($res);
       $rec = $row[$y];
       return $rec;
}
function getData($sql){
$conn=connect();
$result=mysqli_query($conn,$sql);
$rowData=array();
echo '<table border="0" cellspacing="2" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">food</font> </td> 
          
          <td> <font face="Arial">price</font> </td> 
      </tr>';
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $rowData[]=$row;
                }
                for($i=0;$i<count($rowData);$i++){
                                echo '<tr> ';
                                foreach($rowData[$i] as $key=>$value){
                                                echo '<td>'.$value.'</td> ';
                                }
                                echo '</tr>';
                }
                                
    }
/*freeresultset*/
$result->free();
}
function getDataorder($sql){
$conn=connect();
$result=mysqli_query($conn,$sql);
$rowData=array();
echo '<table border="0" cellspacing="2" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">index</font> </td> 
          
          <td> <font face="Arial">Username</font> </td> 
          <td> <font face="Arial">Total Price</font> </td> 
          <td> <font face="Arial">Order id</font> </td> 
          <td> <font face="Arial">Time</font> </td> 
      </tr>';
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $rowData[]=$row;
                }
                for($i=0;$i<count($rowData);$i++){
                                echo '<tr> ';
                                foreach($rowData[$i] as $key=>$value){
                                                echo '<td>'.$value.'</td> ';
                                }
                                echo '</tr>';
                }
                                
    }
/*freeresultset*/
$result->free();
}

        ?>