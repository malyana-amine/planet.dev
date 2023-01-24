
<?php

include '../classes/category.php' ;
include '../classes/article.php' ;

?>
<?php

$result1 = new article();
$result2=$result1->getArticle($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex">

<div class="flex flex-col ">


        <div class="flex flex-col self-center"> 
        <h1 class="text-4xl font-bold py-8"><?php echo $result2['title'] ?></h1>
        
        <img class=" h-96 w-96" src="../img/<?php echo $result2['image'] ?>" alt=""></div>
        <h3 class="text-lg font-bold"><?php echo $result2['smalltitle'] ?></h3>
        <p class=""><?php echo $result2['paragraph'] ?></p>
        <h3 class="text-lg font-bold">source link : </h3>
        <a class="text-indigo-700 font-bold hover:text-red-700" href="<?php echo $result2['linkes'] ?>"><?php echo $result2['linkes'] ?></a>
        <p>article by : admin </p>

</div>