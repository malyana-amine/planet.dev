

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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <form method="POST" enctype="multipart/form-data">
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="title">Article Title</label>
          <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="title" id="title" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="image">Article Image</label>
          <input type="file" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="image" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="subtitle">Article Subtitle</label>
          <input type="text" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="subtitle" id="subtitle" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="paragraph">Article Paragraph</label>
          <textarea class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="paragraph" id="paragraph"></textarea>
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="links">Article Links</label>
          <input type="url" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96" name="links" id="links" />
        </div>
        <div class="flex flex-col items-center">
          <label class="text-lg font-bold" for="category">Article Category</label>
          <select name="category" id="category" class="bg-gray-200 rounded-lg focus:outline-none focus:shadow-outline mx-3 px-3 py-2 w-96">
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
        </div>
        <div class="flex items-center justify-center mt-3">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit" type="submit">Submit</button>
        </div>
      </form>

      <?php
                    if( isset($_POST['submit'])){
                      // var_dump($_POST);
                      // echo '<br>';
                      // var_dump($_FILES);
                      // die();
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
                      

                      $ss1 = new article($title,$newname,$subtitle,$paragraph,$links,'1',$category);
                      $ss1->addSession();
                    }?>




<div id="container">
    </div><button id="addForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
      Add Form
    </button>


  <script>
    let addForm = document.getElementById('addForm');

    addForm.addEventListener('click', () => {

      let formContainer = document.getElementById('container');

      let form = document.createElement('form');

      form.innerHTML = `##`;

      formContainer.append(form);
    });
  </script>



</body>
</html>
