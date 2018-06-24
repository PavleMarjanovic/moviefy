<?php
if(isset($_POST['insert']))
{

    $insertMovieName = $_POST['insertMovieName'];
    $insertMovieYear = $_POST['insertMovieYear'];
    $insertMovieRating = $_POST['insertMovieRating'];
    $insertMovieImage = $_FILES['insertMovieImage'];
    $insertMovieRibbon = $_POST['insertMovieRibbon'];
    $insertMovieCategory = $_POST['category'];
    $insertMovieLink = $_POST['insertMovieLink'];
    $movieLinkExplode = explode("=", $insertMovieLink);
    $insertMovieLink = $movieLinkExplode[1];
    $newPath = "images/".$_FILES['insertMovieImage']['name'];
    $tmpPath = $_FILES['insertMovieImage']['tmp_name'];
    move_uploaded_file($tmpPath,$newPath);

    try {
    $id = "";
    $upit = "INSERT INTO movies (id_movie, name, year, rating, image, ribbon, id_category, link) VALUES (:id_mov, :name, :year, :rating, :image, :ribbon, :id_cat, :link)";
    $stmt = $konekcija->prepare($upit);
    $stmt->bindParam(":id_mov", $id);
    $stmt->bindParam(":name", $insertMovieName);
    $stmt->bindParam(":year", $insertMovieYear);
    $stmt->bindParam(":rating", $insertMovieRating);
    $stmt->bindParam(":image", $newPath);
    $stmt->bindParam(":ribbon", $insertMovieRibbon);
    $stmt->bindParam(":id_cat", $insertMovieCategory);
    $stmt->bindParam(":link", $insertMovieLink);
    $stmt->execute();
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully added a movie!</div>";
    }
    catch(PDOException $ex)
    {
        if($ex->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$newPath."' for key 'image'")
        {
            echo "<div class='alert alert-danger' role='alert'><strong>ERROR</strong> The picture you tried to upload already exists. Change the name of the picture and try again!</div>";
        }
        else {
            echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
        }
    }
}
if(isset($_POST['insertSlider']))
{

    $insertSliderTitle = $_POST['insertSliderTitle'];
    $insertSliderDescription = $_POST['insertSliderDescription'];
    $insertSliderImage = $_FILES['insertSliderImage'];
    $newPathSlider = "images/".$_FILES['insertSliderImage']['name'];
    $tmpPathSlider = $_FILES['insertSliderImage']['tmp_name'];
    move_uploaded_file($tmpPathSlider,$newPathSlider);

    try {
        $upitInsertSlider = "INSERT INTO slider(id_slider, src, title, description) VALUES ('', :src, :title, :description)";
        $stmtInsertSlider = $konekcija->prepare($upitInsertSlider);
        $stmtInsertSlider->bindParam(":src", $newPathSlider);
        $stmtInsertSlider->bindParam(":title", $insertSliderTitle);
        $stmtInsertSlider->bindParam(":description", $insertSliderDescription);
        $stmtInsertSlider->execute();
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully added a slider!</div>";
    }
    catch(PDOException $ex)
    {
        if($ex->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$newPathSlider."' for key 'image'")
        {
            echo "<div class='alert alert-danger' role='alert'><strong>ERROR</strong> The picture you tried to upload already exists. Change the name of the picture and try again!</div>";
        }
        else {
            echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
        }
    }
}
if(isset($_POST['delete']))
{
    $deleteMovie = $_POST['movies'];
    $upitDelete = "DELETE FROM movies WHERE id_movie = :id_movie";
    $stmtDelete = $konekcija->prepare($upitDelete);
    $stmtDelete->bindParam(":id_movie", $deleteMovie);
    $stmtDelete->execute();

    echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully deleted a movie!</div>";
}
if(isset($_POST['deleteCategory']))
{
    $categoryDelete = $_POST['categoryDelete'];
    $upitCategoryDelete = "DELETE FROM categories WHERE category = :category";
    $stmtDeleteCategory = $konekcija->prepare($upitCategoryDelete);
    $stmtDeleteCategory->bindParam(":category", $categoryDelete);
    try {
        $stmtDeleteCategory->execute();
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully deleted a category!</div>";
    }
    catch(PDOException $ex)
    {
        echo "<div class='alert alert-danger' role='alert'><strong>ERROR</strong>  There are movies under that category.</div>";
    }

    $upitCategoryMenuDelete = "DELETE FROM menu WHERE name = :category";
    $stmtDeleteCategoryMenu = $konekcija->prepare($upitCategoryMenuDelete);
    $stmtDeleteCategoryMenu->bindParam(":category", $categoryDelete);
    $stmtDeleteCategoryMenu->execute();
}
if(isset($_POST['deleteUser']))
{
    $deleteUser = $_POST['userDelete'];
    $upitDelete = "DELETE FROM users WHERE id_user = :id_user";
    $stmtDelete = $konekcija->prepare($upitDelete);
    $stmtDelete->bindParam(":id_user", $deleteUser);
    $stmtDelete->execute();

    echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully deleted a movie!</div>";
}
if(isset($_POST['deleteSlider']))
{
    $sliderDelete = $_POST['sliderDelete'];
    $upitDeleteSlider = "DELETE FROM slider WHERE id_slider = :id_slider";
    $stmtDeleteSlider = $konekcija->prepare($upitDeleteSlider);
    $stmtDeleteSlider->bindParam(":id_slider", $sliderDelete);
    $stmtDeleteSlider->execute();

    echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully deleted a slider!</div>";
}
if(isset($_POST['update']))
{
    $changeMovie = $_POST['changeMovie'];
    $newName = $_POST['updateMovieName'];
    $newYear = $_POST['updateMovieYear'];
    $newRating = $_POST['updateMovieRating'];
    $newRibbon = $_POST['updateMovieRibbon'];
    $newCategory = $_POST['changeCategory'];
    $newMovieLink = $_POST['updateMovieLink'];
    $movieLinkNewExplode = explode("=", $newMovieLink);
    $newMovieLink = $movieLinkNewExplode[1];

    try {
        if ($_POST['cbMovieName']) {
            $upitUpdate = "UPDATE movies SET name=:name WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":name", $newName);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieYear']) {
            $upitUpdate = "UPDATE movies SET year=:year WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":year", $newYear);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieRating']) {
            $upitUpdate = "UPDATE movies SET rating=:rating WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":rating", $newRating);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieRibbon']) {
            $upitUpdate = "UPDATE movies SET ribbon=:ribbon WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":ribbon", $newRibbon);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieCategory']) {
            $upitUpdate = "UPDATE movies SET ribbon=:ribbon WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":ribbon", $newRibbon);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieCategory']) {
            $upitUpdate = "UPDATE movies SET id_category=:id_category WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":id_category", $newCategory);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        if ($_POST['cbMovieLink']) {
            $upitUpdate = "UPDATE movies SET link=:link WHERE id_movie=:id_movie";
            $stmtUpdate = $konekcija->prepare($upitUpdate);
            $stmtUpdate->bindParam(":link", $newMovieLink);
            $stmtUpdate->bindParam(":id_movie", $changeMovie);
            $stmtUpdate->execute();
        }
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully edited a movie!</div>";
    }
    catch(PDOException $x)
    {
        echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
    }

}
if(isset($_POST['changeUser']))
{
    $selectUser = $_POST['selectUser'];
    $newUsername = $_POST['changeUsername'];
    $newEmail = $_POST['changeEmail'];
    $newPassword = md5($_POST['changePassword']);
    $newRole = $_POST['changeRole'];

    try {
        if ($_POST['cbChangeUsername']) {
            $upitChangeUser = "UPDATE users SET username=:username WHERE id_user=:id_user";
            $stmtChangeUser = $konekcija->prepare($upitChangeUser);
            $stmtChangeUser->bindParam(":username", $newUsername);
            $stmtChangeUser->bindParam(":id_user", $selectUser);
            $stmtChangeUser->execute();
        }
        if ($_POST['cbChangeEmail']) {
            $upitChangeUser = "UPDATE users SET email=:email WHERE id_user=:id_user";
            $stmtChangeUser = $konekcija->prepare($upitChangeUser);
            $stmtChangeUser->bindParam(":email", $newEmail);
            $stmtChangeUser->bindParam(":id_user", $selectUser);
            $stmtChangeUser->execute();
        }
        if ($_POST['cbChangePassword']) {
            $upitChangeUser = "UPDATE users SET password=:password WHERE id_user=:id_user";
            $stmtChangeUser = $konekcija->prepare($upitChangeUser);
            $stmtChangeUser->bindParam(":password", $newPassword);
            $stmtChangeUser->bindParam(":id_user", $selectUser);
            $stmtChangeUser->execute();
        }
        if ($_POST['cbChangeRole']) {
            $upitChangeUser = "UPDATE users SET id_role=:id_role WHERE id_user=:id_user";
            $stmtChangeUser = $konekcija->prepare($upitChangeUser);
            $stmtChangeUser->bindParam(":id_role", $newRole);
            $stmtChangeUser->bindParam(":id_user", $selectUser);
            $stmtChangeUser->execute();
        }
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully edited a user ID: $selectUser!</div>";
    }

    catch(PDOException $exc)
    {
        if($exc->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$newUsername."' for key 'username'")
        {
            echo "<div class='alert alert-danger' role='alert'><strong>ERROR</strong>  That username is already in use. Try another one!</div>";
        }
        else {
            echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
        }

    }
}
if(isset($_POST['insertCategory']))
{
    $category = ucfirst($_POST['insertNewCategory']);
    $id = "";
    $href = "index.php?page=genres&genre=".$category;
    $title = $category." Movies";
    $upitCategory = "INSERT INTO categories(id_category, category) VALUES (:id, :category)";
    $stmtCategory = $konekcija->prepare($upitCategory);
    $stmtCategory->bindParam(":id", $id);
    $stmtCategory->bindParam(":category", $category);
    try
    {
        $stmtCategory->execute();
        echo "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong> You have successfully added new category!</div>";
    }
    catch(PDOException $ex)
    {
        if($ex->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '$category' for key 'category'")
        {
            echo "<div class='alert alert-danger' role='alert'><strong>ERROR</strong>  That category already exists. Try another one!</div>";
        }
        else
        {
            echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
        }
    }
    $upitCategoryMenu = "INSERT INTO menu(id_menu, name, href, title, level) VALUES ('', :name, :href, :title, 2)";
    $stmtCategoryMenu = $konekcija->prepare($upitCategoryMenu);
    $stmtCategoryMenu->bindParam(":name",$category);
    $stmtCategoryMenu->bindParam(":href",$href);
    $stmtCategoryMenu->bindParam(":title",$title);
    try
    {
        $stmtCategoryMenu->execute();
    }
    catch(PDOException $ex)
    {
        if($ex->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '$category' for key 'name'")
        {
            echo "";
        }
        else
        {
            echo "<div class='alert alert-danger' role='alert'><strong>Oops! Something's wrong.</strong>  Check if all the fields have correct values and try again!</div>";
        }
    }
}
?>

<div class="general">
    <!-- INSERT -->
    <h4 class="latest-text w3_latest_text">MOVIES MANAGEMENT</h4>

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">ADD MOVIE</h3>
            <div class="w3_agile_banner_bottom_grid">
    <form action="#" enctype="multipart/form-data" method="post">
        <input type="text" name="insertMovieName" maxlength="17" size="25" placeholder="Name (max 17 characters)" required="">
        <input type="text" name="insertMovieYear" maxlength="4" placeholder="Year (4 digits)" required="">
        <input type="text" name="insertMovieRating" maxlength="1" placeholder="Rating (0-5)" required="">
        <input type="text" name="insertMovieLink" size="30" placeholder="YouTube Trailer Link" required="">
        <select name="category" title="Category">
            <?php
            $categories = executeQuery("SELECT * FROM categories");
            foreach($categories as $category): ?>
                <option value="<?= $category->id_category ?>"><?= $category->category ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="insertMovieRibbon" placeholder="Ribbon (0/1)" required="">
        <br><br>Choose an image (Recommanded size: 182x268):<input class="no-margin" name="insertMovieImage" type="file" />
        <br>
        <input type="submit" name="insert" value="INSERT">
    </form>
   </div></div></div>
    <!-- /INSERT -->
    <!-- DELETE -->

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">DELETE MOVIE</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    Choose a movie to delete:
                    <br><br>
                    <select name="movies" title="Movies">
                        <?php
                        $movies = executeQuery("SELECT * FROM movies ORDER BY name ASC");
                        foreach($movies as $movie): ?>
                            <option value="<?= $movie->id_movie ?>"><?= $movie->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="delete" value="DELETE">
                </form>
            </div></div></div>
    <!-- /DELETE -->
    <!-- UPDATE -->

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">EDIT MOVIE</h3>
            NOTICE: Make sure to check the checkbox on the left side of the field you want to change.
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    Choose a movie to edit:
                    <select name="changeMovie" title="Change Movie">
                        <?php
                        $movies = executeQuery("SELECT * FROM movies ORDER BY name ASC");
                        foreach($movies as $movie): ?>
                            <option value="<?= $movie->id_movie ?>"><?= $movie->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="checkbox" id="cbMovieName" name="cbMovieName"><input type="text" name="updateMovieName" size="34" maxlength="17" placeholder="Change Movie Name (max 17 characters)">
                    <input type="checkbox" id="cbMovieYear" name="cbMovieYear"><input type="text" name="updateMovieYear" maxlength="4" size="25" placeholder="Change Movie Year (4 digits)">
                    <input type="checkbox" id="cbMovieRating" name="cbMovieRating"><input type="text" name="updateMovieRating" maxlength="1" placeholder="Change Movie Rating (0-5)">
                    <input type="checkbox" id="cbMovieRibbon" name="cbMovieRibbon"><input type="text" name="updateMovieRibbon" size="11" maxlength="1" placeholder="Ribbon (0/1)">
                    <input type="checkbox" id="cbMovieLink" name="cbMovieLink"><input type="text" name="updateMovieLink" placeholder="Change YouTube Link">
                    <input type="checkbox" id="cbMovieCategory" name="cbMovieCategory">
                    <select name="changeCategory">
                        <?php
                        $categories = executeQuery("SELECT * FROM categories");
                        foreach($categories as $category): ?>
                            <option value="<?= $category->id_category ?>"><?= $category->category ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="update" value="EDIT">
                </form>
            </div></div></div>
    <!-- /UPDATE -->
    <!-- INSERT NEW CATEGORY -->
    <h4 class="latest-text w3_latest_text">MOVIE CATEGORIES MANAGEMENT</h4>

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">ADD CATEGORY</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" method="post">
                    <input type="text" name="insertNewCategory" maxlength="20" size="25" placeholder="Name (max 20 characters)" required="">
                    <br><br>
                    <input type="submit" name="insertCategory" value="INSERT">
                </form>
            </div></div></div>
    <!-- /INSERT NEW CATEGORY-->
    <!-- DELETE CATEGORY-->

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">DELETE CATEGORY</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="" method="post">
                    Choose a category to delete:
                    <br><br>
                    <select name="categoryDelete" title="Delete Category">
                        <?php
                        $categoryDeletes = executeQuery("SELECT * FROM categories ORDER BY category ASC");
                        foreach($categoryDeletes as $categoryDelete): ?>
                            <option value="<?= $categoryDelete->category ?>"><?php echo "ID".$categoryDelete->id_category.": "?><?= $categoryDelete->category ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="deleteCategory" value="DELETE">
                </form>
            </div></div></div>
    <!-- /DELETE CATEGORY-->
    <!--CHANGE USER DATA-->
    <h4 class="latest-text w3_latest_text">USER MANAGEMENT</h4>

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">EDIT USER</h3>
            NOTICE: Make sure to check the checkbox on the left side of the field you want to change.
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    Choose a user to edit:
                    <select name="selectUser" title="Select User">
                        <?php
                        $users = executeQuery("SELECT * FROM users ORDER BY username ASC");
                        foreach($users as $user): ?>
                            <option value="<?= $user->id_user ?>"><?php echo "ID".$user->id_user.": "?><?= $user->username ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="checkbox" id="cbChangeUsername" name="cbChangeUsername"><input type="text" name="changeUsername" placeholder="Change Username">
                    <input type="checkbox" id="cbChangeEmail" name="cbChangeEmail"><input type="text" name="changeEmail" placeholder="Change Email">
                    <input type="checkbox" id="cbChangePassword" name="cbChangePassword"><input type="text" name="changePassword" placeholder="Change Password">
                    <input type="checkbox" id="cbChangeRole" name="cbChangeRole">
                    <select name="changeRole">
                        <?php
                        $roles = executeQuery("SELECT * FROM roles");
                        foreach($roles as $role): ?>
                            <option value="<?= $role->id_role ?>"><?= $role->role?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="changeUser" value="EDIT">
                </form>
            </div></div></div>
    <!--/CHANGE USER DATA-->
    <!-- DELETE USER-->

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">DELETE USER</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    Choose a user to delete:
                    <br><br>
                    <select name="userDelete" title="Delete User">
                        <?php
                        $usersDelete = executeQuery("SELECT * FROM users ORDER BY username ASC");
                        foreach($usersDelete as $user): ?>
                            <option value="<?= $user->id_user ?>"><?php echo "ID".$user->id_user.": "?><?= $user->username ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="deleteUser" value="DELETE">
                </form>
            </div></div></div>
    <!-- /DELETE USER-->
    <!-- INSERT SLIDER -->
    <h4 class="latest-text w3_latest_text">SLIDER MANAGEMENT</h4>
    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">ADD SLIDER</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    <input type="text" name="insertSliderTitle" maxlength="17" size="25" placeholder="Title" required=""><br><br>
                    <input type="text" name="insertSliderDescription" maxlength="160" size="140" placeholder="Description (max 160 characters)" required="">
                    <br><br>Choose an image (Recommanded size: 1300x500):<input class="no-margin" name="insertSliderImage" type="file" />
                    <br>
                    <input type="submit" name="insertSlider" value="INSERT">
                </form>
            </div></div></div>
    <!-- /INSERT SLIDER -->
    <!-- DELETE SLIDER-->

    <div class="banner-bottom">
        <div class="container">
            <h3 class="hdg">DELETE SLIDER</h3>
            <div class="w3_agile_banner_bottom_grid">
                <form action="#" enctype="multipart/form-data" method="post">
                    Choose a slider to delete:
                    <br><br>
                    <select name="sliderDelete" title="Delete Slider">
                        <?php
                        $sliderDelete = executeQuery("SELECT * FROM slider ORDER BY title ASC");
                        foreach($sliderDelete as $slider): ?>
                            <option value="<?= $slider->id_slider ?>"><?php echo "ID".$slider->id_slider.": "?><?= $slider->title ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" name="deleteSlider" value="DELETE">
                </form>
            </div></div></div>
    <!-- /DELETE SLIDER-->
</div>
