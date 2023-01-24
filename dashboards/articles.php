
<?php

include '../classes/article.php' ;

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
<div class="w-1/5">

<?php
      include "sidbar.html";
      ?>
</div>
<div class="w-4/5">
    <nav class="bg-gray-300">
<div class="flex justify-between px-10 py-6">
    <p class="text-2xl font-bold" >articles</p>
    <div class="flex">
            <p class="text-2xl font-bold" >admin</p>
            <a href="logout.php"><i class=" px-6 text-2xl fa-solid fa-right-from-bracket"></i></a>
    </div>
</div>
    </nav>
    <div class="flex flex-col items-center ">
        
        <div class="ms-4 me-4 mt-5 bg-zinc-100">
        <form class="relative flex items-center" method="get">
  <input class="bg-gray-200 rounded-md p-2 w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300" type="text" name="query" placeholder="Search...">
  <button name="submit" class="bg-blue-500 text-white rounded-md p-2 ml-2 hover:bg-blue-600 focus:outline-none">Search</button>
</form>
            <table class="table-fixed overflow-scroll h-max">
                <thead>
                    <tr>
                        <th class="pr-12 text-2xl">title</th>
                        <th class="pr-12 text-2xl">category</th>
                        <th class="pr-12 text-2xl">author</th>
                        <th class="pr-12 text-2xl">action</th>
                    </tr>
                </thead>
                <tbody>
            
                <?php if( isset($_GET['submit'])){

$search = $_GET['query'];
$result1=article::searchArticle($search);

?>

<tr>

    <td class="px-4"><?= $result1['title'] ?></td>
    <td class="px-4"><?= $result1['ct'] ?></td>
    <td class="px-4"><?= $result1['an'] ?></td>
    <td class="px-4">
        <a href="deleteArticle.php?id=<?php echo $result1['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="<?= $result1['id'] ?>" name="delete" type="submit">delete</a>
        <a href="updateArticle.php?id=<?php echo $result1['id']; ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">update</a>
        <a href="viewArticle.php?id=<?php echo $result1['id']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="<?= $result1['id'] ?>" type="submit">view</a>

    </td>


</tr>





             <?php   } else { ?>



                <?php
                
                $result=article::selectarticle();
                
                ?>
                <?php

                    foreach($result as $row){
                ?>

                    <tr>

                        <td class="px-4"><?= $row['title'] ?></td>
                        <td class="px-4"><?= $row['ct'] ?></td>
                        <td class="px-4"><?= $row['an'] ?></td>
                        <td class="px-4">
                            <a href="deleteArticle.php?id=<?php echo $row['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="<?= $row['id'] ?>" name="delete" type="submit">delete</a>
                            <a href="updateArticle.php?id=<?php echo $row['id']; ?>"><i class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">update</i></a>
                            <a href="viewArticle.php?id=<?php echo $row['id']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">view</a>
                        </td>


                    </tr>
                    
                    


                    <?php }}
                    ?>


                </tbody>
            </table>

        </div>
    </div>
    </div>
</body>
</html>

