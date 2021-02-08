<?php  
$user = 'root'; 
$password = '';   
$database = 'dbmeme';  
$servername='localhost'; 
$mysqli = new mysqli($servername, $user,  
                $password, $database);  
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
   
$sql = "SELECT * FROM tbmeme ORDER BY Time DESC"; 
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Xmeme frontend</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
        <style>
			input[type=text], select, textarea {
			  width: 65%;
			  padding: 5px;
			  border: 1px solid black;
			  border-radius: 10px;
			  box-sizing: border-box;
			  margin-top: 3px;
			  margin-bottom: 16px;
			  resize: vertical;
			}
			input[type=URL]{
				 width: 52%;
			  padding: 5px;
			  border: 1px solid black;
			  border-radius: 10px;
			  box-sizing: border-box;
			  margin-top: 3px;
			  margin-bottom: 16px;
			  resize: vertical;
			}

			input[type=submit] {
			  background-color: #05386B;
			  color: white;
			  padding: 5px 20px;
			  border: none;
			  border-radius: 5px;
			  cursor: pointer;
			}

			input[type=submit]:hover {
			  background-color: #09386B ;
			}
			
		</style>
    </head>
    <body style="font-family: 'Lora', serif;font-weight: 500;font-size:20px;background-color: #fce1e0;" >
        <h1 style="font-family:'Montserrat', sans-serif;font-weight: 300; text-transform: uppercase;margin-left: 300px;">Meme Stream.</h1>
       <form style="margin-left: 300px;" action="Back.php" method="post">
		    <label class='required'for="fname">Meme Owner</label><br>
		    <input type="text" id="fname" name="fname" placeholder="Enter your full name"><br>

		    <label class='required' for="lname">Caption</label><br>
		    <input type="text" id="lname" name="lname" placeholder="Be creative with the caption"><br>

		    <label class='required' for="email">Meme URL</label><br>
		    <input type="URL" id="email" name="email" placeholder="Enter the URL of your meme">

		   	<input type="submit" value="Submit Meme">
       </form>
       <div class="container">
       		<div class="row" style="margin-left: 150px;">
       <?php   
                while($rows=$result->fetch_assoc()) 
                { 
             ?>
                <div class="col-3" style="border: 2px solid black; border-radius: 10px;text-align: center;margin-left: 5px;margin-top: 5px;">
                <?php $url=$rows['Url']; 
     				  $image = base64_encode(file_get_contents("$url"));
				?>
                <?php echo $rows['Owner'];?><br> 
                <?php echo '<img style="width:210px;" src="data:image/jpeg;base64,'.$image.'">';?><br>
                <?php echo $rows['Caption'];?> <br>
            	</div>
            	
            <?php 
                } 
             ?> 
             </div>
        </div>
    </body>
</html>