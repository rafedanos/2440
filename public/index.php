<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spies</title>
    <link rel="stylesheet" href="css/output1.css?v=5">
</head>
<body class="bg-gradient-to-r from-indigo-500 to-orange-200 antialiased background-animate">
<div class='border shadow-lg rounded bg-sky-300 border-gray-400 m-4 py-4 flex flex-col items-center justify-center gap-5'>
  
<?php 
$form = '
 <form method="post" class="flex flex-col items-center justify-center gap-5">
    <input type="text" name="username" id="" class="border border-gray-600 rounded p-2" placeholder="username">
    <input type="password" name="password" id="" class="border border-gray-600 rounded p-2 " placeholder="password">
    <input type="reset" value="Reset" class="bg-slate-300 hover:bg-slate-400 border border-gray-600 p-2 px-8 rounded">
    <input type="submit" value="Login" class="bg-slate-300 hover:bg-slate-400 border border-gray-600 p-2 px-8 rounded">
 </form>
</div>
';
//Making connection to db
	if ($_SERVER['HTTP_HOST'] == 'localhost')
	{
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', 'admin');
		define('DB', 'insecure');
	}
	else
	{
		define('HOST', 'sql201.epizy.com');
		define('USER', 'epiz_33366114');
		define('PASS', 'OyMGrkyo2V0fA');
		define('DB', 'epiz_33366114_insecure');
	}
	

	//CONNECT TO THE DATABASE
	$conn = mysqli_connect(HOST,USER,PASS,DB);
	
	//WRITE A DB QUERY
	$sql = 'SELECT * FROM user;';
	
	//RUN DB QUERY 
	$results = mysqli_query($conn, $sql);

	$usernamePassword = array();
	//LOOP THROUGH THE DATA 
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{      
      $userpw = $row['username'] . $row['password'];
      array_push($usernamePassword, $userpw);
	};

$opened = false; 

if (isset($_POST['username']) && isset($_POST['password']) ){
   $pwstr = $_POST['username'] . $_POST['password'];
     // ! pwstr == 'chuckroast'
    if(!(in_array($pwstr, $usernamePassword))){
        echo '<h1 class="text-xl font-semibold text-red-700">Access Denied!</h1>';
        echo $form; 
    }}else echo '<h1 class="text-xl font-semibold ">Welcome</h1>';

 if (isset($_POST['username']) && isset($_POST['password']) ){
    if((in_array($pwstr, $usernamePassword))){

 $filename = 'includes/fbi.txt';
 $contents = file_get_contents($filename);
 $rows = explode("||>><<||",$contents);

echo "<div class='w-2/3 p-5 m-5 text-center '>";
echo "<h1 class='p-2 font-semibold'>Congrats! 😃</h1>";
echo "<table class=' w-full border-spacing-2 border border-gray-900   table-auto' ><tr class='bg-slate-500'><th class='border border-slate-600' >Agent Name</th><th class='border border-slate-600 '>Code Name</th></tr>";

 foreach ($rows as $row){
 [$first, $second] = explode(',' , $row) ;

 echo '<tr class="odd:bg-slate-400"><td class="border border-slate-600 mx-5 px-5"> '.ucwords($first).'</td><td <td class="border border-slate-600 mx-5 px-5">' . ucwords($second) . " </td>";
 }}
echo "</table>";
echo "</div>"; 
 } else echo $form; 
 ?> 
</body>
</html>