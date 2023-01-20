
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-col items-center">
<!-- 
        <h1 class="text-2xl font-bold p-8">article1</h1>
        <img class="w-96 h-72 " src="/img/book-63c7cc4f1ca21.jpg" alt="##">
        <h3 class="text-lg font-bold">Article Subtitle1</h3>
        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et labore veritatis iste, eaque hic, assumenda aliquid amet reiciendis ipsum laudantium voluptates expedita autem sit nisi dicta molestiae! Ea, aperiam. Aliquid!</p>
        <h3 class="text-lg font-bold hover:text-red-700">source link : </h3>
        <a class="text-indigo-700 font-bold hover:text-red-700" href="#">ammmqmmqm</a> -->


        <div class="ms-4 me-4 mt-5">
            <table class="table table-primary table-striped table-responsive hover">
                <thead>
                    <tr>
                        <th class="pr-12 text-2xl">title</th>
                        <th class="pr-12 text-2xl">category</th>
                        <th class="pr-12 text-2xl">author</th>
                        <th class="pr-12 text-2xl">action</th>
                    </tr>
                </thead>
                <tbody>
            
                <?php
                
                $result=article::selectarticle();
                
                ?>
                <?php

                    foreach($result as $row){
                ?>

                    <tr>

                        <td><?= $row['title'] ?></td>
                        <td><?= $row['ct'] ?></td>
                        <td><?= $row['an'] ?></td>
                        <td>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="<?= $row['id'] ?>" type="submit">delete</button>
                            <a href="updateArticle.php?id=<?php echo $row['id']; ?>"><i class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">update</i></a>
                            <!-- <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" value="<?= $row['id'] ?>" href="" type="submit">update</button> -->
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="<?= $row['id'] ?>" type="submit">view</button>

                        </td>


                    </tr>
                    <?php }
                    ?>


                </tbody>
            </table>

        </div>
    </div>
    
</body>
</html>

