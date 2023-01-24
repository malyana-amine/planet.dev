

<?php

include '../classes/category.php' ;
include '../classes/article.php' ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="flex">

<div class="w-1/5">

<?php
      include "sidbar.html";
      ?>
</div>
<div class="w-4/5">
    <nav class="bg-gray-300">
<div class="flex justify-between md:px-10 md:py-6">
    <p class="md:text-2xl text-lg font-semibold md:font-bold" >Add article</p>
    <div class="flex">
            <p class="md:text-2xl text-lg font-semibold md:font-bold" >admin</p>
            <a href="logout.php"><i class=" px-6 md:text-2xl text-lg fa-solid fa-right-from-bracket"></i></a>
    </div>
</div>
    </nav>





    <form method="POST" enctype="multipart/form-data" class="w-full" >
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="title">Article Title</label>
        <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96 " name="title[]" />
        <small class="titleeror"></small>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="image">Article Image</label>
          <input type="file" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96 w-40 h-10 " name="image[]" />
          
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="subtitle">Article Subtitle</label>
        <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96  " name="subtitle[]"  />
        <small class="subtitleeror"></small>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="paragraph">Article Paragraph</label>
          <textarea class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96  " name="paragraph[]" ></textarea>
          <small class="subtitleeror"></small>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="links">Article Links</label>
          <input type="url" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96  " name="links[]"/>
          <!-- <small class="linkeseror"></small> -->
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="category">Article Category</label>
          <select name="category[]" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline md:mx-3 md:px-3 md:py-2 md:w-96 category ">
            <option value="">-- Select a Category --</option>

            <?php
            $result1=Category::selectcategory();
?>
<?php

foreach($result1 as $row){
                ?>
  <option value="<?= $row['id'] ?>"> <?php echo $row['categoryname'] ?></option>
<?php }
?>
          </select> 
          
          <div id="container">
            
    </div>

        </div>
        <div class="flex items-center justify-center mt-3">
          <div id="addForm" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
      Add Form
    </div>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded submit" name="submit" type="submit">Submit</button>
        </div>

     





      </form>

      







  <script>
    let addForm = document.getElementById('addForm');

    addForm.addEventListener('click', () => {

      let formContainer = document.getElementById('container');

      let div = document.createElement('div');

      div.innerHTML = `    <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="title">Article Title</label>
        <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="title[]" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="image">Article Image</label>
          <input type="file" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="image[]" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="subtitle">Article Subtitle</label>
        <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="subtitle[]" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="paragraph">Article Paragraph</label>
        <textarea class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="paragraph[]"></textarea>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="links">Article Links</label>
        <input type="url" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="links[]" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="category">Article Category</label>
        <select name="category[]" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96">
            <option value="">-- Select a Category --</option>

            <?php
            $result1=Category::selectcategory();
?>
<?php

foreach($result1 as $row){
                ?>
  <option value="<?= $row['id'] ?>"> <?php echo $row['categoryname'] ?></option>
<?php }
?>
          </select> `;

      formContainer.append(div);
    });
  </script>
<!-- <script src="../script/script.js"></script> -->


</body>
</html>

<?php
                    if( isset($_POST['submit'])){
                      // var_dump($_POST);
                      // echo '<br>';
                      // var_dump($_FILES);
                      // die();
                      
                      for ($i = 0 ; $i<count($_POST['title']) ; $i++){

                      
                      $title = $_POST['title'][$i];
                      $image = $_FILES['image']['name'][$i];
                      // var_dump($image);

                      $filename = uniqid();
                      $extension = pathinfo( $image, PATHINFO_EXTENSION);
                      $newname = "book-".$filename . "." . $extension;
          
                      $target = "../img/".$newname;
                      move_uploaded_file($_FILES['image']['tmp_name'][$i], $target);

                      $subtitle = $_POST['subtitle'][$i];
                      $paragraph = $_POST['paragraph'][$i];
                      $links = $_POST['links'][$i];
                      $category = $_POST['category'][$i];
                      $autour = $_SESSION['id'];
                      

                      $ss1 = new article($title,$newname,$subtitle,$paragraph,$links,$autour,$category);
                      $ss1->addArticle();
                    };}?>