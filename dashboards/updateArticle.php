

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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <form method="POST" enctype="multipart/form-data">
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="title">Article Title</label>
        <input type="text"  class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" value="<?php echo $result2['title'] ?>" name="title" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="image">Article Image</label>
          <input type="file" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" value="" name="image" />
          <img class="h-20 w-20" src="../img/<?php echo $result2['image'] ?>" alt="">
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="subtitle">Article Subtitle</label>
        <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" value="<?php echo $result2['smalltitle'] ?>" name="subtitle"  />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="paragraph">Article Paragraph</label>
          <textarea class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" value="" name="paragraph" ><?php echo $result2['paragraph'] ?></textarea>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="links">Article Links</label>
          <input type="url" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" value="<?php echo $result2['linkes'] ?>" name="links"/>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="category">Article Category</label>
          <select value="" name="category" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96">
            <option value="">-- Select a Category --</option>

            <?php
            $result1=Category::selectcategory();
?>
<?php

foreach($result1 as $row){
                ?>
           <?php      if($row['id']  ===  $result2['categoryid']){
    ?><option value="<?= $row['id'] ?>" selected> <?php echo $row['categoryname'] ?></option>
    <?php } else { ?>
        <option value="<?= $row['id'] ?>"> <?php echo $row['categoryname'] ?></option>
    <?php }
?>
 
  
     
<?php 
}
?>

          </select> 
          
          <div id="container">
            
    </div>

        </div>
        <div class="flex items-center justify-center mt-3"></div>
          <input name="id" type="hidden" value="<?php echo $_GET['id'];?>">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit" type="submit">Submit</button>
        </div>
      </form>

      








</body>
</html>


<?php

if( isset($_POST['submit'])){
  $id = $_POST['id'];
  $title = $_POST['title'];
  $image = $_FILES['image']['name'];
  // var_dump($image);

  $filename = uniqid();
  $extension = pathinfo( $image, PATHINFO_EXTENSION);
  $newname = "book-".$filename . "." . $extension;

  $target = "../img/".$newname;
  move_uploaded_file($_FILES['image']['tmp_name'], $target);

  $subtitle = $_POST['subtitle'];
  $paragraph = $_POST['paragraph'];
  $links = $_POST['links'];
  $category = $_POST['category'];
  $autour = $_SESSION['id'];

  $ss1 = new article($title,$newname,$subtitle,$paragraph,$links,$autour,$category);
                      $ss1->updateArticle($id);
                      header('Location: articles.php');
}

?>
