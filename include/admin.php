<?php 

    require('../include/db.php');
    if(isset($_POST['update-section'])){
        $home = $_POST['home'] ?? 0;
        $about = $_POST['about'] ?? 0;
        $portfolio = $_POST['portfolio'] ?? 0;
        $resume = $_POST['resume'] ?? 0;
        $services = $_POST['services'] ?? 0;
        $contact = $_POST['contact'] ?? 0;

        $query = "UPDATE section_control SET ";
        $query .= "home_section = '$home', ";
        $query .= "about_section = '$about', ";
        $query .= "portfolio_section = '$portfolio', ";
        $query .= "resume_section = '$resume', ";
        $query .= "services_section = '$services', ";
        $query .= "contact_section = '$contact' WHERE id=1";

        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php';</script>";
        }
    }


    if(isset($_POST['update-home'])){
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
        $showicons = $_POST['showicons'] ?? 0;

        $query = "UPDATE home SET ";
        $query .= "title = '$title', ";
        $query .= "subtitle = '$subtitle', ";
        $query .= "showicons = '$showicons' WHERE id=1";

        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?homesetting=true';</script>";
        }
    }
    
    
    if(isset($_POST['update-about'])){
        $title = mysqli_real_escape_string($db, $_POST['abouttitle']);
        $subtitle = mysqli_real_escape_string($db, $_POST['aboutsubtitle']);
        $desc = mysqli_real_escape_string($db, $_POST['aboutdesc']);
        $imagename = time().$_FILES['profile']['name'];
        $imgtemp = $_FILES['profile']['tmp_name'];
        if($imgtemp == ''){
            $query = "SELECT * FROM about WHERE id=1";
            $r = mysqli_query($db,$q);
            $d = mysqli_fetch_array($r);
            $imagename =$d['profile_pic'];
        }        
    
            move_uploaded_file($imgtemp,"../images/$imagename");

            $query = "UPDATE about SET ";
            $query .= "about_title = '$title', ";
            $query .= "about_subtitle = '$subtitle', ";
            $query .= "profile_pic = '$imagename', ";
            $query .= "about_desc = '$desc' WHERE id=1";

            $run = mysqli_query($db, $query);

            if($run){
                echo "<script>window.location.href= '../admin/index.php?aboutsetting=true';</script>";
            }

    }




    
    
    if(isset($_POST['add-skill'])){

        $skill_name = $_POST['skillname'];
        $skill_level = $_POST['skilllevel'];

        $query = "INSERT INTO skills (skill_name, skill_level) VALUES ('$skill_name', '$skill_level')";
        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?aboutsetting=true';</script>";
        }

    }


    if(isset($_POST['add-pi'])){

        $label = $_POST['label'];
        $value = $_POST['value'];

        $query = "INSERT INTO personal_info (label, value ) VALUES ('$label', '$value')";
        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?aboutsetting=true';</script>";
        }

    }
    
    
    
    if(isset($_POST['add-resume'])){
        
        $type = $_POST['type'];
        $title = $_POST['title'];
        $org = $_POST['org'];
        $time = $_POST['time'];
        $about = $_POST['about'];

        $query = "INSERT INTO resume (type, title, org, time, about_exp) VALUES ('$type', '$title', '$org', '$time', '$about')";
        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?resumesetting=true';</script>";
        }

    }
    
    
    
    if(isset($_POST['add-project'])){

        $type = $_POST['type'];
        $project_name = $_POST['project_name'];
        $project_link = $_POST['project_link'];
        $project_image = time().$_FILES['project_pic']['name'];
        $project_temp = $_FILES['project_pic']['tmp_name'];  
    
        move_uploaded_file($project_temp,"../images/$project_image");

        $query = "INSERT INTO portfolio (project_type, project_pic, project_name, project_link) VALUES ('$type', '$project_image', '$project_name', '$project_link')";
        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?portfoliosetting=true';</script>";
        }

    }

    if(isset($_POST['update-contact'])){

        
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

        $query = "UPDATE contact SET ";
        $query .= "address = '$address', ";
        $query .= "email = '$email', ";
        $query .= "mobile = '$mobile' WHERE id=1";

        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?contactsetting=true';</script>";
        }
    }
    if(isset($_POST['update-socialmedia'])){

        $twitter = mysqli_real_escape_string($db, $_POST['twitter']);
        $facebook = mysqli_real_escape_string($db, $_POST['facebook']);
        $instagram = mysqli_real_escape_string($db, $_POST['instagram']);
        $skype = mysqli_real_escape_string($db, $_POST['skype']);
        $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);

        $query = "UPDATE social_media SET ";
        $query .= "twitter = '$twitter', ";
        $query .= "facebook = '$facebook', ";
        $query .= "instagram = '$instagram', ";
        $query .= "skype = '$skype', ";
        $query .= "linkedin = '$linkedin' WHERE id=1";

        $run = mysqli_query($db, $query);
        if($run){
            echo "<script>window.location.href= '../admin/index.php?contactsetting=true';</script>";
        }
    }
    

    if(isset($_POST['update-background'])){

        $imagename = time().$_FILES['background']['name'];
        $imgtemp = $_FILES['background']['tmp_name'];     
        move_uploaded_file($imgtemp,"../images/$imagename");

            $query = "UPDATE site_background SET ";
            $query .= "background_img = '$imagename' WHERE id=1";

            $run = mysqli_query($db, $query);

            if($run){
                echo "<script>window.location.href= '../admin/index.php?changebackground=true';</script>";
            }

    }


    if(isset($_POST['update-seo'])){

        $title = mysqli_real_escape_string($db, $_POST['title']);
        $keywords = mysqli_real_escape_string($db, $_POST['keywords']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $imagename = time().$_FILES['siteicon']['name'];
        $imgtemp = $_FILES['siteicon']['tmp_name'];
        
        if($imgtemp == ''){
            $query = "SELECT * FROM seo WHERE id=1";
            $r = mysqli_query($db,$q);
            $d = mysqli_fetch_array($r);
            $imagename =$d['siteicon'];
        }        
    
        move_uploaded_file($imgtemp,"../images/$imagename");

        $query = "UPDATE seo SET ";
        $query .= "page_title = '$title', ";
        $query .= "keywords = '$keywords', ";
        $query .= "siteicon = '$imagename', ";
        $query .= "description = '$description' WHERE id=1";

        $run = mysqli_query($db, $query);

        if($run){
            echo "<script>window.location.href= '../admin/index.php?seosetting=true';</script>";
        }

    }



    if(isset($_POST['update-account'])){
        print_r($_POST);
        print_r($_FILES);

        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $imagename = time().$_FILES['adminprofile']['name'];
        $imgtemp = $_FILES['adminprofile']['tmp_name'];

        if($imgtemp == ''){
            $query = "SELECT * FROM admin WHERE id=1";
            $r = mysqli_query($db,$q);
            $d = mysqli_fetch_array($r);
            $imagename =$d['adminprofile'];
        }        
    
        move_uploaded_file($imgtemp,"../images/$imagename");

        $query = "UPDATE admin SET ";
        $query .= "fullname = '$fullname', ";
        $query .= "email = '$email', ";
        $query .= "password = '$password', ";
        $query .= "admin_profile = '$imagename' WHERE id=1";

        $run = mysqli_query($db, $query);

        if($run){
            echo "<script>window.location.href= '../admin/index.php?accountsetting=true';</script>";
        }

    }

?>