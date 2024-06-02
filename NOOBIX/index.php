<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">		
    <title>Proyecto Mecatrónico Grupo 1</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-size: 16px;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 30px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        }
        .table {
            font-size: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
            overflow: hidden; /* Hide horizontal scrollbars */
        }
        .table thead th {
            background-color: #337ab7;
            color: #fff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }
        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
        .table .change-button {
            width: 80px;
            font-size: 16px;
            padding: 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .table .change-button.on {
            background-color: #6ed829;
            color: #fff;
        }
        .table .change-button.off {
            background-color: #e04141;
            color: #fff;
        }
        .btn-external {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 12px;
            font-size: 18px;
            text-align: center;
            color: #fff;
            background-color: #337ab7;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-external:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>    

<div class="container">
    <h1>Proyecto Mecatrónico Grupo 1</h1>
    
    <!-- Boolean Indicators Table -->
    <table class='table'>
        <thead>
            <tr>
                <th colspan='6'>Boolean Indicators</th>
            </tr>
            <tr>
                <th>Noobix ID</th>
                <th>Boolean control 1</th>
                <th>Boolean control 2</th>
                <th>Boolean control 3</th>
                <th>Boolean control 4</th>
                <th>Boolean control 5</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("database_connect.php");
            
            // Check the connection
            if (mysqli_connect_errno()) {
                echo "<tr><td colspan='6'>Failed to connect to MySQL: " . mysqli_connect_error() . "</td></tr>";
            }
            
            $result = mysqli_query($con, "SELECT * FROM ESPtable2");//table select
            
            while ($row = mysqli_fetch_array($result)) {
                $unit_id = $row['id'];
                $current_bool_1 = $row['RECEIVED_BOOL1'];
                $current_bool_2 = $row['RECEIVED_BOOL2'];
                $current_bool_3 = $row['RECEIVED_BOOL3'];
                $current_bool_4 = $row['RECEIVED_BOOL4'];
                $current_bool_5 = $row['RECEIVED_BOOL5'];
                
                // Determine button properties based on boolean values
                $text_current_bool_1 = ($current_bool_1 == 1) ? "ON" : "OFF";
                $color_current_bool_1 = ($current_bool_1 == 1) ? "on" : "off";
                
                $text_current_bool_2 = ($current_bool_2 == 1) ? "ON" : "OFF";
                $color_current_bool_2 = ($current_bool_2 == 1) ? "on" : "off";
                
                $text_current_bool_3 = ($current_bool_3 == 1) ? "ON" : "OFF";
                $color_current_bool_3 = ($current_bool_3 == 1) ? "on" : "off";
                
                $text_current_bool_4 = ($current_bool_4 == 1) ? "ON" : "OFF";
                $color_current_bool_4 = ($current_bool_4 == 1) ? "on" : "off";
                
                $text_current_bool_5 = ($current_bool_5 == 1) ? "ON" : "OFF";
                $color_current_bool_5 = ($current_bool_5 == 1) ? "on" : "off";
                
                echo "<tr>";
                echo "<td>" . $unit_id . "</td>";
                
                // Form for Boolean Control 1
                echo "<td><form action='update_values.php' method='post'>
                            <input type='hidden' name='value2' value='$current_bool_1'>
                            <input type='hidden' name='value' value='" . ($current_bool_1 == 1 ? 0 : 1) . "'>
                            <input type='hidden' name='unit' value='$unit_id'>
                            <input type='hidden' name='column' value='RECEIVED_BOOL1'>
                            <button type='submit' name='change_but' class='change-button " . ($current_bool_1 == 1 ? "on" : "off") . "'>$text_current_bool_1</button>
                        </form></td>";
                
                // Form for Boolean Control 2
                echo "<td><form action='update_values.php' method='post'>
                            <input type='hidden' name='value2' value='$current_bool_2'>
                            <input type='hidden' name='value' value='" . ($current_bool_2 == 1 ? 0 : 1) . "'>
                            <input type='hidden' name='unit' value='$unit_id'>
                            <input type='hidden' name='column' value='RECEIVED_BOOL2'>
                            <button type='submit' name='change_but' class='change-button " . ($current_bool_2 == 1 ? "on" : "off") . "'>$text_current_bool_2</button>
                        </form></td>";
                
                // Form for Boolean Control 3
                echo "<td><form action='update_values.php' method='post'>
                            <input type='hidden' name='value2' value='$current_bool_3'>
                            <input type='hidden' name='value' value='" . ($current_bool_3 == 1 ? 0 : 1) . "'>
                            <input type='hidden' name='unit' value='$unit_id'>
                            <input type='hidden' name='column' value='RECEIVED_BOOL3'>
                            <button type='submit' name='change_but' class='change-button " . ($current_bool_3 == 1 ? "on" : "off") . "'>$text_current_bool_3</button>
                        </form></td>";
                
                // Form for Boolean Control 4
                echo "<td><form action='update_values.php' method='post'>
                            <input type='hidden' name='value2' value='$current_bool_4'>
                            <input type='hidden' name='value' value='" . ($current_bool_4 == 1 ? 0 : 1) . "'>
                            <input type='hidden' name='unit' value='$unit_id'>
                            <input type='hidden' name='column' value='RECEIVED_BOOL4'>
                            <button type='submit' name='change_but' class='change-button " . ($current_bool_4 == 1 ? "on" : "off") . "'>$text_current_bool_4</button>
                        </form></td>";
                
                // Form for Boolean Control 5
                echo "<td><form action='update_values.php' method='post'>
                            <input type='hidden' name='value2' value='$current_bool_5'>
                            <input type='hidden' name='value' value='" . ($current_bool_5 == 1 ? 0 : 1) . "'>
                            <input type='hidden' name='unit' value='$unit_id'>
                            <input type='hidden' name='column' value='RECEIVED_BOOL5'>
                            <button type='submit' name='change_but' class='change-button " . ($current_bool_5 == 1 ? "on" : "off") . "'>$text_current_bool_5</button>
                        </form></td>";
                
                echo "</tr>";
            }
            
            // Close database connection
            mysqli_close($con);
            ?>
            
        </tbody>
    </table>
    
    <!-- External page button -->
    <a href="receive_data.php" class="btn-external" target="_blank">Live Camera</a>
</div>

</body>
</html>

		
		
		
//Again for the second table for numeric controls. We create the table with all the values from the database			
<?php
include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Numeric controls</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>CONTROL NUMBER 1</td>
        <td>CONTROL NUMBER 2</td>
        <td>CONTROL NUMBER 3</td>
		<td>CONTROL NUMBER 4 </td>
		<td>CONTROL NUMBER 5 </td>
      </tr>  
		";
		  
while($row = mysqli_fetch_array($result)) {

 	echo "<tr class='success'>";
   	
    $column6 = "RECEIVED_NUM1";
    $column7 = "RECEIVED_NUM2";
    $column8 = "RECEIVED_NUM3";
    $column9 = "RECEIVED_NUM4";
    $column10 = "RECEIVED_NUM5";
	
    $current_num_1 = $row['RECEIVED_NUM1'];
	$current_num_2 = $row['RECEIVED_NUM2'];
	$current_num_3 = $row['RECEIVED_NUM3'];
	$current_num_4 = $row['RECEIVED_NUM4'];
	$current_num_5 = $row['RECEIVED_NUM5'];	
	
		
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_1  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column6 >
  	<input type= 'submit' name= 'change_but' style='width: 120px; text-align:center;' value='change'></form></td>";
	
        
	
  	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_2  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column7 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
	
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_3  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column8 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
	
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_4  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column9 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
	
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_5  size='15' >
  	<input type='hidden' name='unit' style='width: 120px;' value=$unit_id >
  	<input type='hidden' name='column' style='width: 120px;' value=$column10 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
	
	echo "</tr>
	  </tbody>"; 
	
}
echo "</table>
<br>
";		
?>
		

	
	
	
		
//Again for the third table for text send. We create the table with all the values from the database	
<?php

include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select


		
   echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Send Text to Noobix</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Text</td>        
      </tr>  
		";

while($row = mysqli_fetch_array($result)) {

 	 echo "<tr class='success'>";	
	
    $column11 = "TEXT_1"; 
    $current_text_1 = $row['TEXT_1'];
	
		
	echo "<td><form action= update_values.php method= 'post'>
  	<input style='width: 100%;' type='text' name='value' value=$current_text_1  size='100'>
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column11 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='Send'></form></td>";
	
    echo "</tr>
	  </tbody>";      
	
}
echo "</table>
<br>
<br>
<hr>";
		
?>
				
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
//Again for the forth table.	
<?php
include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Boolean Indicators</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Noobix ID</td>
        <td>Indicator 1</td>
        <td>Indicator 2 </td>
		<td>Indicator 3 </td>
      </tr>  
		";
	  
	
	
while($row = mysqli_fetch_array($result)) {

 	$cur_sent_bool_1 = $row['SENT_BOOL_1'];
	$cur_sent_bool_2 = $row['SENT_BOOL_2'];
	$cur_sent_bool_3 = $row['SENT_BOOL_3'];
	

	if($cur_sent_bool_1 == 1){
    $label_sent_bool_1 = "label-success";
	$text_sent_bool_1 = "Active";
	}
	else{
    $label_sent_bool_1 = "label-danger";
	$text_sent_bool_1 = "Inactive";
	}
	
	
	if($cur_sent_bool_2 == 1){
    $label_sent_bool_2 = "label-success";
	$text_sent_bool_2 = "Active";
	}
	else{
    $label_sent_bool_2 = "label-danger";
	$text_sent_bool_2 = "Inactive";
	}
	
	
	if($cur_sent_bool_3 == 1){
    $label_sent_bool_3 = "label-success";
	$text_sent_bool_3 = "Active";
	}
	else{
    $label_sent_bool_3 = "label-danger";
	$text_sent_bool_3 = "Inactive";
	}
	 
		
	  echo "<tr class='info'>";
	  $unit_id = $row['id'];
        echo "<td>" . $row['id'] . "</td>";	
		echo "<td>
		<span class='label $label_sent_bool_1'>"
			. $text_sent_bool_1 . "</td>
	    </span>";
		
		echo "<td>
		<span class='label $label_sent_bool_2'>"
			. $text_sent_bool_2 . "</td>
	    </span>";
		
		echo "<td>
		<span class='label $label_sent_bool_3'>"
			. $text_sent_bool_3 . "</td>
	    </span>";
	  echo "</tr>
	  </tbody>"; 
      

	
}
echo "</table>";
?>
		
	
	
	
	
	
	
	

//Again for the fifth table.
<?php

include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

	
echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Integer Indicators</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Received number 1</td>
        <td>Received number 2</td>
        <td>Received number 3 </td>
		<td>Received number 4 </td>
      </tr>  
		";
		  

while($row = mysqli_fetch_array($result)) {

 	echo "<tr class='info'>";
    
	echo "<td>" . $row['SENT_NUMBER_1'] . "</td>";
	echo "<td>" . $row['SENT_NUMBER_2'] . "</td>";
	echo "<td>" . $row['SENT_NUMBER_3'] . "</td>";
	echo "<td>" . $row['SENT_NUMBER_4'] . "</td>";

	echo "</tr>
	</tbody>"; 

	
}
echo "</table>
<br>
";
?>
		
		
		
		

		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    