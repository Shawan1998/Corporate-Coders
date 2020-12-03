<<form action="" method="post">

<!-- set the value of number of servers for example "2"-->
No. of servers(N): <input type="text" name="no_of_servers"><br><br>  

<!-- set the value of server load every minute seperated by a space for example "10 60 50 15 20"-->
server load every min:<input type="text" name="server_load"><br> <br>
<input type="submit">
</form>

<?php

//to prevent the warning running an if else to check first that both the value has given or not
if(!empty($_POST['no_of_servers']) and !empty($_POST['server_load'])){
	
	//storing the value of number of servers into a variable
	$no_of_servers=$_POST['no_of_servers']; 
 
	//breaking the string(server load every minute) into an array and storing it into a variable
	$array_load = explode(" ",$_POST['server_load']);
	 
	//running the loop from 0 till length of the array -1 , we could have taken 4 but incase if we put less than 5 values so counting the length for safer side
	for($i=0;$i<count($array_load);$i++){
		if($array_load[$i]<50){

			//from the given example I learnt that after every calculation we are taking the floor value
			$no_of_servers= floor(($no_of_servers)/2);
		}
		else{
			$no_of_servers= floor((2*$no_of_servers)+1);
		}
	}
	
	 echo "The number of servers running at the end of 5 mins: ".$no_of_servers;

}