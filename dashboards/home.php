
<?php

include '../classes/article.php' ;
include '../classes/admin.php' ;


?>
                <?php
                
                $result=article::selectarticle();
                
                ?>
                <?php
                
                $result1=admin::selectadmin();
                
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
    <section class="w-4/5">    
    <nav class="bg-gray-300">
<div class="flex justify-between md:px-10 md:py-6">
    <p class="md:text-2xl text-lg font-semibold md:font-bold" >home</p>
    <div class="flex">
            <p class="md:text-2xl text-lg font-semibold md:font-bold" >admin</p>
            <a href="logout.php"><i class=" px-6 md:text-2xl text-lg fa-solid fa-right-from-bracket"></i></a>
    </div>
</div>
    </nav>


    <div class="mt-10 px-2">
                <h1 class="text-lg font-bold text-black">Status</h1>
            </div>
            <div class="grid grid-rows-2 mt-3 grid-flow-col gap-3">
                <div class="row-span-1 p-5 border border-inherit rounded-md bg-slate-50">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-blue-500 font-bold">         
<?php
       echo count($result);    
?>
</p>
                            <h3 class="">All articles</h3>
                        </div>

                        <div class="mr-2 py-5 px-2 border-inherit rounded bg-slate-200">
                        <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                </div>
                <div class="row-span-1 p-5 border border-inherit rounded-md bg-slate-50">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-blue-500 font-bold">
<?php
       echo count($result1);    
?></p>
                            <h3 class="">All auteurs</h3>
                        </div>

                        <div class="mr-2 py-5 px-2 border-inherit rounded bg-slate-200">
                        <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="row-span-1 p-5 border border-inherit rounded-md bg-slate-50">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-blue-500 font-bold ">???</p>
                            <h3 class="">All users</h3>
                        </div>

                        <div class="mr-2 py-5 px-2 border-inherit rounded bg-slate-200">
                        <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
                
            </div>
    </section>
</body>
</html>