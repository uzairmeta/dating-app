<?php
    
        
    if(isset($_GET["p"]))
    {
        
        if($_GET["p"]=="signup")
        {
            signup();
        }
        else
        if($_GET["p"]=="signupWithEmail")
        {
            signupWithEmail();
        }
        else
        if($_GET["p"]=="loginWithEmail")
        {
            loginWithEmail();
        }
        else
        if($_GET["p"]=="edit_profile")
        {
            edit_profile();
        }
        else
        if($_GET["p"]=="getUserInfo")
        {
            getUserInfo();
        }
        else
        if($_GET["p"]=="uploadImages")
        {
            uploadImages();
        }
        else
        if($_GET["p"]=="changeProfilePicture")
        {
            changeProfilePicture();
        }
        else
        if($_GET["p"]=="userNearByMe")
        {
            userNearByMe();
            
        }
        else
        if($_GET["p"]=="deleteImages")
        {
            deleteImages();
        }
        else
        if($_GET["p"]=="show_or_hide_profile")
        {
            show_or_hide_profile();
        }
        else
        if($_GET["p"]=="update_purchase_Status")
        {
            update_purchase_Status();
        }
        else
        if($_GET["p"]=="myMatch")
        {
            myMatch();
        }
        else
        if($_GET["p"]=="firstchat")
        {
            firstchat();
        }
        else
        if($_GET["p"]=="flat_user")
        {
            flat_user();
        }
        else
        if($_GET["p"]=="unMatch")
        {
            unMatch();
        }
        else
        if($_GET["p"]=="deleteAccount")
        {
            deleteAccount();
        }
        else
        if($_GET["p"]=="mylikies")
        {
            mylikies();
        }
        else
        if($_GET["p"]=="boostProfile")
        {
            boostProfile();
        }
        else
        if($_GET["p"]=="sendCustomNotification")
        {
            sendCustomNotification();
        }
        else
        if($_GET["p"]=="verifyPhoto")
        {
            verifyFaceThroughDeepengin();
        }
        else
        if($_GET["p"]=="purchaseSubscription")
        {
            purchaseSubscription();
        }
        else
        if($_GET["p"]=="checkSubscription")
        {
            checkSubscription();
        }
        
        
        
        
        
        //admin panel functions
        else
        if($_GET["p"]=="All_Users")
        {
            All_Users();
        }
        else
        if($_GET["p"]=="fake_profiles")
        {
            fake_profiles();
        }
        else
        if($_GET["p"]=="All_ReportedUsers")
        {
            All_ReportedUsers();
        }
        else
        if($_GET["p"]=="Admin_Login")
        {
            Admin_Login();
        }
        else
        if($_GET["p"]=="Update_From_Firebase")
        {
            Update_From_Firebase();
        }
        else
        if($_GET["p"]=="All_Matched_Profile")
        {
            All_Matched_Profile();
        }
        else
        if($_GET["p"]=="changePassword")
        {
            changePassword();
        }
        else
        if($_GET["p"]=="changeUserPassword")
        {
            changeUserPassword();
        }
        else
        if($_GET["p"]=="getProfilePictures")
        {
            getProfilePictures();
        }
        else
        if($_GET["p"]=="getProfilelikes")
        {
            getProfilelikes();
        }
        else
        if($_GET["p"]=="getmatchedprofiles")
        {
            getmatchedprofiles();
        }
        else
        if($_GET["p"]=="get_profiles_nameByID")
        {
            get_profiles_nameByID();
        }
        else
        if($_GET["p"]=="banned_user")
        {
            banned_user();
        }
        else
        if($_GET["p"]=="under_review_new_uploaded_pictures")
        {
            under_review_new_uploaded_pictures();
        }
        else
        if($_GET["p"]=="underReviewPictureStatusChange")
        {
            underReviewPictureStatusChange();
        }
        else
        if($_GET["p"]=="matchNow")
        {
            matchNow();
        }
        else
        if($_GET["p"]=="convertProfile")
        {
            convertProfile();
        }
        else
        if($_GET["p"]=="addFakeProfile")
        {
            addFakeProfile();
        }
        else
        if($_GET["p"]=="sendPushNotification")
        {
            sendPushNotification();
        }
        
        
    
    }
    else
    {
        echo ServerStatus();

    }
    
    
    function ServerStatus()
    {
       
       require_once("config.php");
       if (isset($_GET["action"])) 
       {
            if ($_GET["action"]=="setupDatabase") 
            {
                $data = [
                    "code" => "200"
                ];
                $baseurl = $_POST['firebaseURL'];
                $jsondata = curlsingle_request($data, $baseurl);
                
                
                $returnCode=$jsondata['code'];
                $firebaseURL_return="201";
                if($returnCode=="200")
                {
                    $firebaseURL_return="200";
                }
                else
                {
                    die();
                }
                
                $servername =  $_POST['hostname'];
                $username =  $_POST['username'];
                $password =  $_POST['password'];
                $database =  $_POST['database'];
            
                $conn = @mysqli_connect($servername, $username, $password, $database);
                // Check connection
                if (!$conn) 
                {
                    echo mysqli_connect_error();
                    die();
                }
                else
                {
                    
                    $search_servername_string = '$servername = "server_name";';
                    $replace_servername_string = '$servername = "' . $_POST["servername"] . '";';
            
                    $search_database_string = '$database = "database_name";';
                    $replace_database_string = '$database = "' . $_POST["database"] . '";';
            
            
                    $search_username_string = '$username = "database_username";';
                    $replace_username_string = '$username = "' . $_POST["username"] . '";';
            
            
                    $search_password_string = '$password = "database_password";';
                    $replace_password_string = '$password = "' . $_POST["password"] . '";';
                    
                    $search_firebaseURL_string = '$firebaes_Databaes_URL = "firebaseURL";';
                    $replace_firebaseURL_string = '$firebaes_Databaes_URL = "' . $_POST["firebaseURL"] . '";';
                    
                    $search_firebase_key_string = 'define("firebase_key","firebase_key");';
                    $replace_firebase_key_string = '$firebaes_firebase_key = "' . $_POST["firebase_key"] . '";';
                    
            
                    $path_to_file = 'config.php';
                    $file_contents = file_get_contents($path_to_file);
                    
                    $file_contents = str_replace($search_servername_string, "$replace_servername_string", $file_contents);
                    $file_contents = str_replace($search_database_string, "$replace_database_string", $file_contents);
                    $file_contents = str_replace($search_username_string, "$replace_username_string", $file_contents);
                    $file_contents = str_replace($search_password_string, "$replace_password_string", $file_contents);
                    $file_contents = str_replace($search_firebaseURL_string, "$replace_firebaseURL_string", $file_contents);
                    $file_contents = str_replace($search_firebase_key_string, "$replace_firebase_key_string", $file_contents);
            
                    file_put_contents($path_to_file, $file_contents);
            
                    echo "<script>window.location='index.php?action=success'</script>";
                }
            }
            
        }   
       
        
        ?>
            <!DOCTYPE html>
            <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <script src="jquery-1.12.4.js"></script>
                <title>Qboxus - Server Requirements</title>
                <style>
                    body {
                        padding-top: 18px;
                        font-family: sans-serif;
                        background: #f9fafb;
                        font-size: 14px;
                    }
            
                    #container {
                        width: 600px;
                        margin: 0 auto;
                        background: #fff;
                        border-radius: 10px;
                        padding: 15px;
                        border: 2px solid #f0f0f0;
                        -webkit-box-shadow: 0px 1px 15px 1px rgba(90, 90, 90, 0.08);
                        box-shadow: 0px 1px 15px 1px rgba(90, 90, 90, 0.08);
                    }
            
                    a {
                        text-decoration: none;
                        color: red;
                    }
            
                    h1 {
                        text-align: center;
                        color: #424242;
                        border-bottom: 1px solid #e4e4e4;
                        padding-bottom: 25px;
                        font-size: 22px;
                        font-weight: normal;
                    }
            
                    table {
                        width: 100%;
                        padding: 10px;
                        border-radius: 3px;
                    }
            
                    table thead th {
                        text-align: left;
                        padding: 5px 0px 5px 0px;
                    }
            
                    table tbody td {
                        padding: 5px 0px;
                    }
            
                    table tbody td:last-child, table thead th:last-child {
                        text-align: right;
                    }
            
                    .label {
                        padding: 3px 10px;
                        border-radius: 4px;
                        color: #fff;
            
                    }
            
                    .label.label-success {
                        background: #4ac700;
                        padding: 4px 22px;
                        font-weight: 500;
                    }
            
                    .label.label-warning {
                        background: #dc2020;
                    }
            
            
                    .logo {
                        margin-bottom: 30px;
                        margin-top: 20px;
                        display: block;
                    }
            
                    .logo img {
                        margin: 0 auto;
                        display: block;
                        border-radius: 50%;
                    }
            
                    .newform label {
                        width: 100%;
                        display: block;
                        font-size: 15px;
                        margin: 10px 0px;
                    }
            
                    .newform input {
                        width: 100%;
                        border: 1px solid #ccc;
                        height: 27px;
                        border-radius: 3px;
                        padding: 4px 0px;
                    }
            
                    .arrange {
                        text-align: right;
                    }
            
                    .newbtnn {
                        border: none;
            
                        padding: 10px;
                        height: unset !important;
                        cursor: pointer;
            
                    }
            
                    .step {
                        margin: 10px 0px;
                        display: block;
                        text-align: right;
                        width: 100.7%;
                    }
            
                    #validating {
                        width: unset;
                        border: 0;
                    }
            
                    .scene {
                        width: 100%;
                        height: 100%;
                        perspective: 600px;
                        display: -webkit-box;
                        display: -moz-box;
                        display: -ms-flexbox;
                        display: -webkit-flex;
                        display: flex;
                        align-items: center;
                        justify-content: center;
            
                    svg {
                        width: 240px;
                        height: 240px;
                    }
            
                    }
            
                    @keyframes arrow-spin {
                        50% {
                            transform: rotateY(360deg);
                        }
                    }
                </style>
            </head>
            <body>
            <div id="container">
                <div class="logo">
                    <a href="#">
                        <img width="80px"
                             src=" data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAZAAA/+4ADkFkb2JlAGTAAAAAAf/bAIQAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQICAgICAgICAgICAwMDAwMDAwMDAwEBAQEBAQECAQECAgIBAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMD/8AAEQgAUABQAwERAAIRAQMRAf/EALYAAAMBAQEAAwAAAAAAAAAAAAAICQcKAQIFBgEAAgMBAQEBAQAAAAAAAAAAAAcFBggEAgMBCRAAAAUDAgQDBQUGBwEAAAAAAQIDBAUGBwgAEZESFQnhUhMhMVFiFEEiMqIK8GFxwdFCgaHCI0UWOBcRAAECBQIEBAIECgUNAAAAAAECAwARBAUGIRIxYRMHQVFxIjIIgXKys5GxQlJignMUdBYjMxU1RaGiwlNjJDREZGV1Jjb/2gAMAwEAAhEDEQA/AOafpQ+QOGv7S9T1jG2sHSh8gcNHU9YNYOlD5A4aOp6wawdKHyBw0dT1g1g6UPkDho6nrBrB0ofIHDR1PWDWDpQ+QOGjqesGsHSh8gcNHU9YNYOlD5A4aOp6wawdKHyBw0dT1g1jSulfL+XXD1OceZmDpXy/l0dTnBMwdK+X8ujqc4JmPBiwKAiIAAAAiIiGwAAe0RER9gAAaOpzgmYodhd2pcw86nTKRtDbg8HbJZwVN7ee4ZnFL26RRAxgWPCOztXEvWi5QSOUpYlq6bgsX01l0BHcFxm/drC8BSpq81XUugGlMzJx79YTCWhqP6xSTLUJVFkseK3vIFBVG0U0k9XV+1H0eKv1QRPQkQzeaXYOzUxIZvavpiJZ5L2sj2gO5Gr7Tw79GqoNNNEh3is/a506lKgIzQVExSLRbiX3TKKipUA3AKtg/wAwWD5itNFVLVa7spUkt1Ch0166bHwEomfEOBvXQFUSt8wC+2ZJfaAqqQCZU2DuHnNuZMuaSrzMoiqWMKbnAuwimooioG33k1kTmTWRUL701UVCiU5R2MUwCAgAhp4b/wDKIoszHy6V8v5dHU5x+zMHSvl/Lo6nOCZg6V8v5dHU5wTMaV0sfKGuLfHmYg6WPlDRvgmIdzErts5bZqyySFk7XPRpEjlNCVunWhl6VttElNsc4lnXTVZ3PuASA3KlFtno+oXkUMlvzaomY9zcOwVkqvtWn98lNLDX9I+r9QGSBzcUnTUTifsuM3q/rlb2T0J6uL9rY+mU1eiQeco62cIv092LGPJYms8hRbZPXXaHReETqOMMwtLT7xPY5QhrfKuXqE0o3VKUxHEwq+UKoXnSKlvyhjvO/mNyzJN9Djc7VaDp7FTqFj9J6QKZ8CGwkS0JPGHPYO29otkn7lKrrBr7hJtJ5I1n6qnylDdZed2PCvBuNc0g/qdjXFxIdsozi7M2kLHSUjHLtirIosZ54zMWnqNaoOUQSWIscztADAYGpw1TsM7P5znzorW2lU9tWZqqajckKBlMoB97pIMwQNp/PETF6zOwY+jorWHKlIkGm5EjkZe1POeo8oXLDbv5YmZIuWVG3hTXxouPIOjM2TStZFGTt3NCu4TQZJMq+SbM2sa8WIoJlSSTdo2RKQR+oMIgULNm3y85hjCVVtlldLYkTJaG15MhMkszJIHgUFSjP4REXY+49luqgxWzpKkmQ3maD5e/QA/WAHONyzQ7PmFOdMc7rVel2NtrqzrFKQib4WiLGxknMfUNyKx76o2bVNSmq/jV25y+md6iuoCJ+ZBZMRA2q/hHefOcBdTQh1VVaG1SVS1G5SUyOoQT72VA8QkgT+JJ4RJXzCrFkCC/tDVWoTDrcgT5FQ+FY9QdOBjkSzS7KOY+HXU6mTpkt9rRM1TGJca1UXIv5GMZmU5Ulqut+X66oYMA3DnWamkWhCgKiqqJAHbZODd8sJzXZSF3+z7yof1NQoBKj5NvaIV6K2KPABRhLX7Bb5Y5vBH7xRD8tsEkfWRqoeo3DxJESZGKMAiAk2EoiUwCAgJTAOwlEBDcBAQ2EPs04eoIpk486WPlDRvgmI0fpQ+QOAa4t8fPWNKszZ6QvRdy2doYuTZQEnc2t6doaPm5Fqs9YRT2pJFCMbP3rRsqg4cNW6y4GOUhymEoDsOou+Xhux2aqvTyFONUlOt1SUmRUEJKiATMAkDScddBSLuFczQoUErecSgE6gFRlMiLa21vx3JuyRWrC1t2qOc1/jkrKHFhAujuJS3EozcuTLun1r6/Qa+rRk85AV1BjnhU01XJzHVQVAgH0h7njva/vxQKu1mfFNkwRqsSS8kgSAfZJk6gaDemZCQAFCcoYNLc8s7e1Ao65su2rdoDq2R5trl7CdfaeJ4gxmmXfegzPy9lHlvLQJzFkbd1E4WiYqg7Wg/mbn1W2dFdJEjpmp4tqebkXTxk4Mkuzi0kWyxSgPpiICOpbDOxmD4Wym5Xoor7k0ApTr8ksNkSO5KFHakAiYU4Soeccd87gX6+LNLQ7qelWZBDcy4qfgVATJI4hIAPlH6bDTsGZM5CvI+t8iXLrHm2kickk5RlQQmLyVOisKK/qIQrgXbGnvrkFucHUkosv7wM3KcNcecfMPiuNIVQY0E3K6J9oKZppmyNNVCRXIiW1AA8lER0WDtteLooVF0JpaM666uq+jgmfmqZ5Qx+Yv6cSsKVZr1bhrXB7hxzdkKslam5ztmwqc6qCYmVPSdXN2yMZIisRPcrN+kmc6x9iuClAACsYT8zdDWLFFm9OKZ0q9tQwCW9f9Y2SVJl+cgkSGqZxLX7tXUMp69hcLqANW3CAr9VXA+ihx8Ym/YLOPuE9s6sv/nD89ZQ0JCPBCYsJfGMlHVNKIprpA7/AOvneKC5iUlzIlTF9DOhSOBeUDiG4aZ+Q4B237p0P9ptdBx9xPtq6VSQucjLfLRUuOx1MxxlFStuR5PiL/7ovqJbSdWXgdvPbPh6oMucPdfHu7539wp3D494Y2iqS2RqmiUWVYJ0OuNR11MqrolSmvqa2UbM4egaH9QPYqYW7hVI50VVlOcCCv7D2Y7fdtkLyTOK1qq6SyW+qNjSZH2yamVPO8tQCAQkSnFjuOc5HlCk2uwMLZ3pkrZ7lnzmvQIRz0JEwSYj1mRhRcXCG5tK2hurMU1M1vUFq6auhLN6VF04iqbGpqirOATpkZR2CfXHjEaPMuo8SSRRODopCk3TE53ThGc2zPbU9erO263QN1i2ElyQUvYhpfU2j4AepIJJJG2c9ZCjX+w1eO1iKGtUhVQplLh2zkncpadszxI2znoNeGkKb0ofIHANXHfEJrGldL/jwDXF1PWPGvlDS4Ox3JmZisf2/cv7a83uD+2q44f5aqOfuf8Ao13/APHP/dqibxuf8wUUx/zTf2hHYh3xWqbrt4XRIokmoKdR0MqkY6ZDmRVCdTICqInARSVAhxLzF2NymEN9hHWJewKinuXSSJ1ad+n2Q/e5IBxR/SfvR9qOTvD7BrInJKlrh3gxlm0m9yMf6hp5/H08ykVYCsX7h4xWkmkxRE/zlZNpyMOgYCIKiQVjGACnDfYdiZtn2M4vWU1kytsm13JtYKyne2ACElLqOJQqepE5eIhHWDHbxeGHbhZlAVdKtJCQdqzMTBQrgFDyPGLM4e98K5Fp6iSsP3CaQn2sjALpwjq6JYBxF1pBLI7tyDcekDJo9QbByF5pNiXmUDmVOVQNh0j827A2u8UxyHtq+2WnBuDG8KaWOP8AQOa7T+gvhoBKGBYO5VZQvf2ZlbawtBkXNslp/aJ8R+kPXWGQzb771rbZt3NB4hs2N7LiPkkmxK8XQejben15FsmZr0xJMiUlWs6mZcAI1QIRAq5AIoJwHl1V8C+Xm73VQuOaKVQWxJJ6Il11hJ13fktI0+I6y1EuMS+SdzqKiSaWwgVNWfy9emmY0l4rPIaT4xCDJLFbOi5NlK27hGXkrKskTSdDQVPxdeEVa1rPR9ZVUwg41CCpVAiTeh6QhRnfqG6K5SnVTKYoEKbY2tCYvl3b6136n7bYWhClbHVrUzq0gtNlaitw6uuK2bVEcDIzlC0u9myartrmVX4qA3ISkL+NQWoAST+QkTmAfSUVa/TYsEm6eWa4opCuLq1SRVxST9cqRm1XHOiRbl9QqJzlKYxAHlExQEQ3ANJ/5pFlRsyZnbKo08Jzb8Iu/aEaVxIkZt/6UJp+oTZfUZ702p7f/Mlsi+4PsuDeQf8AVq8/LWvb26dH/dX/ALmmivd1Z/zQiQn/ALm39t2Ia9L/AI8A0/8AqesLbXyjRulm+H5B/prh6o848TPP8MM7hTGinmDi+fb8F9rZm/CIe6qY/wC3bVSzxwHCbsJ/4c/92qJvGif5hoeP/FN/aEddPeqR9ft/XPT809RP2b/88jrFvYc7e5NIf9m79gxoDuT/APJv/XR9qJ8/p02otofKDf8Avn6FH3be6Idhpl/M6rc9aP2b32hFS7Qat13nvR+KH87wWN9l7jYf3ru/VFBQry6NqaFe1HQ9dNm5GVSRr5qsybptnMi2KRaTiTpKcp2zj1E+UPu8o+3S37JZTfbXm9BZKSpcTaKyoCHWiZoUCCZhJ0SryUJHznFs7hWi3VWO1NxfaSa1hoqQsaKBEhInxHIxOvsGY0WVq6mLmXwrKgYWqbl0ZXjSnKRnJ9sSTQpqPVhCPFVYWMdEOxaSay6oiZ1ymWDYvIJBDcWb8xuVX6iq6SwUNS41an6crcQg7StW+Q3KGpSAPh4cZziodqrRbaqnfudQ0ldY26EpKtdo2z0B0nPx4xQLvmI/Udu64qfxuFZYfdv+G59ND7v8NLf5fTLubSn/AKaq+4XFr7n/APyD37Zn7xMIX+nQai2b5VAIfjeWtH3be5rV2mL8zytyrP8AVqPxtxVez5mK/wBWvxKhO+/uyFxnVTqm3uxttsX8O/ur274/D5tXf5cVhPb10T/xV/7mmivd1jLKEfwTf3jsRN6Wb4fkH+mn31R5wtJnn+GNL6X+4/DXDv5CPO48oZPDaOEmW2NJ9jfdvfbc3tD2eyp48f8ALVVzpU8Lu3D+73/uzE3jSj/MVD/FN/aEdincqsfcPIbEa4Ns7WxLedrN+7gJSOiHEg1jPr0oeSTevEG7p4dNv9WLchhTIYwCoYOUPaIaw32pyC14zmtNdbwst0CUrSpQBVIqTIEgaynxPhxjSObWutvGOvUVvSF1RKSASBPaZmROk/KOUPH/ACNyq7cNyKjiYmn1qXeSjpkFe2ruZTrloznxjQMRsqC4FQk416VA4ppvGx1kypm9qR99bLyTFcO7pWpp55wPNoB6NQwsEo3cdNUqE9SlQBn4iM/Wm+5BhdatpCOmtRHUadSQFS4cweYnp4RYO+PdPsHlngvkZbt+m/tXeWatVINGVDVMJVo+pZQXUYBmtGVI3KLCYWcKc5kmqnovfSKJjJBsOkhj/ZzJMM7h2u5t7ayxN1iSXW9FNpkrV1B1SBpNQmmegMMa6dwbRkGKVtGqdPc1U5AbVwUZjRChoT5DRXKF77WmbNhcMcbLvr3Un3S9UztyW76mLfU6zPKVfUCCVPkRB0izLyN4+K+qT9Izx0qk2TOIAY24hqy93+32SZ3lVCmzNJFG3SEOPLO1pBK5yJ4qVLUJSCojwiHwPLLRjdkqVXBZNQp+aG0ia1e3jLgBPTcSAPOFXzS7lN9832i9qGVLMaKtJJzca9YW8g2qtRVdUbyGkkZKBWn5kiYnWcNXrZFcWrFEESLED/dUL77jgfajHe36xeXHlVF6Q2oKeWdjSApJSsIT4AgkblmZB4AxAZNnV1yhJt6G0t29SgQ2kblqKTNO4+YIBkkSn4mLD9k3Fu9uP1J3jqi71EPqEa3NXolelIybVRRqBdrBIT5XrmShSnM7iSGGRSFIFwKZQptwDYNI3v7l2P5JW0NHZKhNQukDocUiZQCsokEq4K+EzlwhldsLHdbTT1L9yaLKXygoCvikndMlPEcRKfGJm99ll9Rm5T6mxv8Azrbsvs93srq7I/z02Pl3VLt+6NP70f8AuaaKN3XMsoR/BN/eOxGjpf7j8NPbfyELTceUaN0r5f24a4t8fORj76lpOfompafrGlJJeEqelZmOqCnphsRuq4i5mJdJPY58ik7QcNVVGzpEpgKomdM22xiiHs1z1lPTXCkdoaxAcpHm1IWkzkpKhJQMiDqD4EGPtTvv0r6KqnVtqG1BSVDiFAzB1mND5iOg7FrvYOiHj6TyupZMqXKm3Jdago9yoTmASJkVqaiiC6dpByBuo4jlFwOcREW6RQ1mTMfl+SQqtwx4z4/u7yh+Bt3QHklYGn5RMOfHu7CgU02Rt6cOs2D/AJzfH6Uz9AIrvVFBYmZ3W4bPJRlQF56SdtzkiamiHTVxNQahynESxs9GqJzMI7bLK852xjlIKpQBVI222kfSXHNe3F1LbSqmgrkn3NqBCV/WQr2rBHBUpy+EiGa/SY3mFCFrDNVTEaLSQVJ9FD3JI8vPiI5+84+0LI4/UnV96bP1oSprVUoxVm6hpurVkmtZ03GEWEqirKRRSRjKmaNSGJv91s7MY4FIicAE2tMdvO9zOT1rFgvlP0by8rYhxuZacVLgUmamydfzk6aqEJnLu2zllpXbra3Q5bm0lSkr0WkcjwWPwHyELPg925a5zNcSs82qqGoa2tLTCERUs+4L1SoF3aiBHRmMBAJGTBZwDdQB9V0o3bgG/KYxg5RtvcPujbcCSimWw5UXZ5sqbQPagCcprX4CfgkKPIDWIHEcKrMpUp5LiGaBtW1SuKp8ZJT5y8SQI6bcfcIsVcM4RSpKZp6JQnYxiotNXZuC8ZPqiTRSROd04JLPiN46nmxU+cBBmm3EUvuqGU231kjJu4OZZ5UCkq3VmnWqSKZkEIn4DaJqWeHxFWuoAh92bFMexdrrsISHUj3POEFXMzMgkegGnEmEzyk7zFp7bi/pXHiJSvPVyYLNz1Yo4VjrZxLgBMn6iEoRMz6rDpiIKEBiT6RTYSmckHV+w7sLe7qE1uULNBQmR6cgqoUOaeDfkd53DiEGKpkPdO20O6msiRV1P585ND6eK/P2+08Nwjm/v7e26eTNxXd0rvzbadqpxGtIRqMfGN4iKh4Bg7kHzCCiGCHqHSjmbyWcqE9ZVdcTLm5lDBygXVON47Z8StabPY2i3RhZWdyipSlkJBWoniohKQZADQSA1hHXi83G/VpuFyWF1BSEiQkEpBJCQB4AknUk68YxfpXy/tw1Pb4ipGNK6V8g8PDXFvEeZmDpXyDw8NG8QTMHSvkHh4aN4gmY021F0Lp2MqclY2krafoWfAUwcuIZwX6KVSTEBK2nId2k5h5xsAbgBXSCvpgIiQSG9uoi9WSy5FRmgvdO1U03gFDVJ80KBCkH6pE/GYjvtt2uVnqP3q2PLZf8Sk6K5KSZpUPrAy8JRUese6TK3xxZvLY69FEpMq9q+gnkHTdbUYQ5aem5RRw0OVGdgHq6runVVE0hEFkF3iBzAO4IBylFOUPZlnHcyoMix+oKrYxUhbjLvxoTI6oWAA4ORSlQ/S4wxqruU5eMcq7PdmQmtdYKUON/CpWnxJJmn1BUDyjM8K88IjDexlw6ZjKKfVtcerq2TmIRm5cFiqWjI5OGBmL+ZlClcPllSuiByNW6BzKhvzKJB97Uv3A7aPZ5kdLVu1Cae0sU+1ZA3OKVuntQnQDTipStPAHhEfiWcNYrZn6dtkvXB17ckE7UAbZTUrUnXwA18xCn5D5T38yhkjOLsVo7ewSTgV42hYQikLQ0UIH50hRgUVVepOUR/A4fqvHBB35DkAdtXbFsKxnD2tllYSmpIkp5fveV6rI9oPilASD4gxWb5lF7yFzdcniWZ6Np9rY/Vnqeaio+RELP0r5TcPDVt3iK/MwdK+QeHho3iP2Zg6V8g8PDRvEEzGldLD4Dw8NcPUjzMwdLD4Dw8NHUgmYOlh8B4eGjqQTMHSw+A8PDR1IJmDpYfAeHho6kEzB0sPgPDw0dSCZg6WHwHh4aOpBMwdLD4Dw8NHUgmYOlh8B4eGjqQTMHSw+A8PDR1IJmP//Z"></a>
                </div>
                <?php
                    
                    
                    $data = [
                    "code" => "200"
                    ];
                    $baseurl = $firebaes_Databaes_URL;
                    $jsondata = curlsingle_request($data, $baseurl);
                    
                    
                    $returnCode=$jsondata['code'];
                    $firebaseURL_return="201";
                    if($returnCode=="200")
                    {
                        $firebaseURL_return="200";
                    }
                    
                    $error = false;
                    $data = [];
                    $PHP_VERSION = PHP_VERSION;
                    
                    
                    
                    $servername =  $servername;
                    $username =  $username;
                    $password =  $password;
                    $database =  $database;
                
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check connection
                
                    if ($conn) 
                    {
                        $requirement0 = "<span class='label label-success'>Enabled</span>";
                        $data['require0'] = 1;
                    }
                    else {
                        $error = true;
                        $error=mysqli_connect_error();
                        $requirement0 = '<span class="label label-warning">Failed</span>';
                    }
                    
                    if($firebaseURL_return=="200")
                    {
                        $requirement_firebase = "<span class='label label-success'>Enabled</span>";
                        $data['require_requirement_firebase'] = 1;
                    }
                    else
                    {
                        $error = true;
                        $requirement_firebase = '<span class="label label-warning">Failed</span>';
                    }
                    
                    if ($PHP_VERSION >= 7 && $PHP_VERSION < 7.1) {
                        $requirement1 = "<span class='label label-success'>v." . PHP_VERSION . '</span>';
                        $data['require1'] = 1;
                    } else {
                        $error = true;
                        $requirement1 = "<span class='label label-warning'>Your PHP version is " . $PHP_VERSION . '</span>';
                    }
            
                    if (!extension_loaded('tokenizer')) {
                        $error = true;
                        $requirement2 = "<span class='label label-warning'>Error</span>";
            
                    } else {
                        $requirement2 = "<span class='label label-success'>Enabled</span>";
                        $data['require2'] = 1;
                    }
            
                    if (!extension_loaded('pdo')) {
                        $error = true;
                        $requirement3 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement3 = "<span class='label label-success'>Enabled</span>";
                        $data['require3'] = 1;
                    }
            
                    if (!extension_loaded('curl')) {
                        $error = true;
                        $requirement4 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement4 = "<span class='label label-success'>Enabled</span>";
                        $data['require4'] = 1;
                    }
            
                    if (!extension_loaded('openssl')) {
                        $error = true;
                        $requirement5 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement5 = "<span class='label label-success'>Enabled</span>";
                        $data['require5'] = 1;
                    }
            
                    if (!extension_loaded('mbstring')) {
                        $error = true;
                        $requirement6 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement6 = "<span class='label label-success'>Enabled</span>";
                        $data['require6'] = 1;
                    }
            
                    if (!extension_loaded('ctype') && !function_exists('ctype')) {
                        $error = true;
                        $requirement7 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement7 = "<span class='label label-success'>Enabled</span>";
                        $data['require7'] = 1;
                    }
            
            
                    if (!extension_loaded('gd')) {
                        $error = true;
                        $requirement9 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement9 = "<span class='label label-success'>Enabled</span>";
                        $data['require8'] = 1;
                    }
            
                    if (!extension_loaded('zip')) {
                        $error = true;
                        $requirement10 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement10 = "<span class='label label-success'>Enabled</span>";
                        $data['require9'] = 1;
                    }
            
                    $url_f_open = ini_get('allow_url_fopen');
                    if ($url_f_open != "1" && $url_f_open != 'On') {
                        $error = true;
                        $requirement11 = "<span class='label label-warning'>Error</span>";
                    } else {
                        $requirement11 = "<span class='label label-success'>Enabled</span>";
                        $data['require10'] = 1;
                    }
                    
                    
                    
                    
                    ?>
            
                    <h1>Server Requirements</h1>
            
                    <table class="table table-hover" id="requirements">
                        <thead>
                        <tr>
                            <th>Requirements</th>
                            <th>Result</th>
                        </tr>
                        </thead>
            
                        <tr>
                            <td>PHP 7.0.x</td>
                            <td><?php echo $requirement1; ?></td>
                        </tr>
                        <tr>
                            <td>Firebase Connection</td>
                            <td><?php echo $requirement_firebase; ?></td>
                        </tr>
                        <tr>
                            <td>Database Connection</td>
                            <td><?php echo $requirement0; ?></td>
                        </tr>
                        <tr>
                            <td>TOKENIZER</td>
                            <td><?php echo $requirement2; ?></td>
                        </tr>
                        <tr>
                            <td>PDO PHP Extension</td>
                            <td><?php echo $requirement3; ?></td>
                        </tr>
                        <tr>
                            <td>cURL PHP Extension</td>
                            <td><?php echo $requirement4; ?></td>
                        </tr>
                        <tr>
                            <td>OpenSSL PHP Extension</td>
                            <td><?php echo $requirement5; ?></td>
                        </tr>
                        <tr>
                            <td>MBString PHP Extension</td>
                            <td><?php echo $requirement6; ?></td>
                        </tr>
            
            
                        <tr>
                            <td>GD PHP Extension</td>
                            <td><?php echo $requirement9; ?></td>
                        </tr>
                        <tr>
                            <td>Zip PHP Extension</td>
                            <td><?php echo $requirement10; ?></td>
                        </tr>
                        <tr>
                            <td>allow_url_fopen</td>
                            <td><?php echo $requirement11; ?></td>
                        </tr>
            
                    </table>
                    
                    <?php
                        if (!$conn)
                        {
                           ?>
                                <h1>Fill Infromation</h1>
                                <form method="post" id="nosend" class="newform" action="?action=setupDatabase">
                        
                                    <label for="servername">FireBase Database URL</label>
                                    <input name="firebaseURL" id="firebaseURL" type="text" size="" value="" autofocus="" placeholder="Firebase Database URL" required>
                                           
                                    <label for="servername">FireBase Server Key</label>
                                    <input name="firebase_key" id="firebase_key" type="text" size="" value="" autofocus="" placeholder="FireBase Server Key" required>
                                    
                                    
                                    <label for="servername">Hostname</label>
                                    <input name="servername" id="servername" type="text" size="" value="" autofocus="" placeholder="localhost" required>
                        
                        
                                    <label for="database">Database</label>
                                    <input name="database" id="database" type="text" size="" value="" autofocus="" placeholder="Database Name" required>
                        
                                    <label for="username">Username</label>
                                    <input name="username" id="username" type="text" size="" value="" autofocus="" placeholder="Database Username" required>
                        
                                    <label for="password">Password</label>
                                    <input name="password" id="password" type="text" size="" value="" autofocus="" placeholder="Database Password" required>
                        
                                    <div class="step">
                        
                                        <?php
                                        if (array_key_exists('require1', $data) && array_key_exists('require2', $data) && array_key_exists('require3', $data) && array_key_exists('require4', $data) && array_key_exists('require5', $data) && array_key_exists('require6', $data) && array_key_exists('require7', $data) && array_key_exists('require8', $data) && array_key_exists('require9', $data) && array_key_exists('require10', $data)) {
                                            ?>
                                            <input type="submit" name="submiting" id="validating" value="Submit"
                                                   class="newbtnn label label-success">
                        
                                            <?php
                                        } else {
                                            ?>
                                            <div class="label label-warning ">Clear Errors</div>
                                            <?php
                                        }
                                        ?>
                        
                                    </div>
                                </form>
                           <?php 
                        }
                    ?>
                    
                    <div>
                        <?php 
                            $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                            $actual_link=str_replace("index.php",'',$actual_link);
                        ?>
                        <h3>API URL</h3>
                        <hr style="color: #80808012;">
                
                        <span>Android APP</span>
                        <p style="margin: 13px 0 8px 0;"><?php echo $actual_link; ?></p>
                
                        <br>
                        <hr style="color: #80808012;">
                        <span>Admin Panel</span>
                        <p style="margin: 13px 0 8px 0;">
                                
                        </p>
                        
                        <span style="font-size: 11px;color: grey;">* You have to replace this same code in your admin panel "config.php" </span>
                        <br><br>
                        <span>Example</span>
                        <br><br>
                        <code style="background: #e8e8e8;padding: 5px 7px;border-radius: 3px;">
                            $baseurl = "<?php echo $actual_link; ?>/index.php?p=";
                            $firebaseDb_URL="<?php echo $firebaes_Databaes_URL; ?>";
                        </code>
                
                
                    </div>
            
                    
            </div>
        
            </body>
            </html>

        <?php
    }
    
    
    
    
    function getAge($dob)
    {
        
        $birthDate = $dob;
          //explode the date to get month, day and year
          $birthDate = explode("/", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) 
    {

      $theta = $lon1 - $lon2;
      $dist = sin(@deg2rad($lat1)) * sin(@deg2rad($lat2)) +  cos(@deg2rad($lat1)) * cos(@deg2rad($lat2)) * cos(@deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);
    
      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
            return $miles;
          }
    }
    
    function calculateAge($birthDate)
    {
        //explode the date to get month, day and year
          $birthDate = explode("/", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
            return $age;
    }
    
    function signup()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        
        if(isset($event_json['fb_id']) && isset($event_json['first_name']) && isset($event_json['last_name']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
            $last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
            $birthday=$event_json['birthday'];
            $gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
            $image1=htmlspecialchars_decode(stripslashes($event_json['image1']));
            $profile_type=htmlspecialchars_decode(stripslashes($event_json['profile_type']));
            
            
             if($birthday=="")
             {
                 $birthday = "01/01/2000";
             }
             else
             {
                 $birthday = $birthday;
             }
             
             if($profile_type=="")
             {
                 $profile_type = "user";
             }
             else
             {
                 $profile_type = "fake";
             }
             
            //echo $birthDate;
           
            $log_in="select * from users where fb_id='".$fb_id."' ";
            $log_in_rs=mysqli_query($conn,$log_in);
            
            if(mysqli_num_rows($log_in_rs))
            {   
                $rd=mysqli_fetch_object($log_in_rs);  
                $age="".calculateAge($rd->birthday)."";
                
                $array_out = array();
                 $array_out[] = 
                    //array("code" => "200");
                    array(
                        "fb_id" => $fb_id,
                        "action" => "login",
                        "image1" => $image1,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "age" => $age,
                        "birthday" => $rd->birthday,
                        "gender" => $gender
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }   
            else
            {
                $age="".calculateAge($birthday)."";
                
                $qrry_1="insert into users(fb_id,first_name,last_name,birthday,age,image1,profile_type,gender)values(";
                $qrry_1.="'".$fb_id."',";
                $qrry_1.="'".$first_name."',";
                $qrry_1.="'".$last_name."',";
                $qrry_1.="'".$birthday."',";
                $qrry_1.="'".$age."',";
                $qrry_1.="'".$image1."',";
                $qrry_1.="'".$profile_type."',";
                $qrry_1.="'".$gender."'";
                $qrry_1.=")";
                if(mysqli_query($conn,$qrry_1))
                {
                 
                     $age="".calculateAge($birthday)."";
                     $array_out = array();
                     $array_out[] = 
                        //array("code" => "200");
                        array(
                            "fb_id" => $fb_id,
                            "action" => "signup",
                            "image1" => $image1,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "age" => $age,
                            "birthday" => $birthday,
                            "gender" => $gender
                        );
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    //echo mysqli_error();
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in signup");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    
    function signupWithEmail()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        
        if(isset($event_json['email']) && isset($event_json['first_name']) && isset($event_json['last_name']))
        {
            $fb_id=rand().rand();
            $email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
            $password=htmlspecialchars(strip_tags($event_json['password'] , ENT_QUOTES));
            $first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
            $last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
            $birthday=$event_json['birthday'];
            $gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
            $image1=htmlspecialchars_decode(stripslashes($event_json['image1']));
            $profile_type=htmlspecialchars_decode(stripslashes($event_json['profile_type']));
            
            
             if($birthday=="")
             {
                 $birthday = "01/01/2000";
             }
             else
             {
                 $birthday = $birthday;
             }
             
             if($profile_type=="")
             {
                 $profile_type = "user";
             }
             else
             {
                 $profile_type = "fake";
             }
             
            //echo $birthDate;
           
            $log_in="select * from users where email='".$email."' ";
            $log_in_rs=mysqli_query($conn,$log_in);
            
            if(mysqli_num_rows($log_in_rs))
            {   
                //echo mysqli_error();
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"email already exist");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }   
            else
            {
                $age="".calculateAge($birthday)."";
                
                $qrry_1="insert into users(fb_id,email,password,first_name,last_name,birthday,age,image1,profile_type,gender)values(";
                $qrry_1.="'".$fb_id."',";
                $qrry_1.="'".$email."',";
                $qrry_1.="'".md5($password)."',";
                $qrry_1.="'".$first_name."',";
                $qrry_1.="'".$last_name."',";
                $qrry_1.="'".$birthday."',";
                $qrry_1.="'".$age."',";
                $qrry_1.="'".$image1."',";
                $qrry_1.="'".$profile_type."',";
                $qrry_1.="'".$gender."'";
                $qrry_1.=")";
                if(mysqli_query($conn,$qrry_1))
                {
                 
                     $age="".calculateAge($birthday)."";
                     $array_out = array();
                     $array_out[] = 
                        //array("code" => "200");
                        array(
                            "fb_id" => $fb_id,
                            "action" => "signup",
                            "image1" => $image1,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "email" => $email,
                            "age" => $age,
                            "birthday" => $birthday,
                            "gender" => $gender
                        );
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    //echo mysqli_error();
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in signup");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    function loginWithEmail()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        
        if(isset($event_json['email']) && isset($event_json['password']))
        {
            $email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
            $password=htmlspecialchars(strip_tags($event_json['password'] , ENT_QUOTES));
            //echo $birthDate;
           
            $log_in="select * from users where email='".$email."' and password='".md5($password)."' ";
            $log_in_rs=mysqli_query($conn,$log_in);
            
            if(mysqli_num_rows($log_in_rs))
            {   
                $rd=mysqli_fetch_object($log_in_rs);  
                $age="".calculateAge($rd->birthday)."";
                
                $array_out = array();
                 $array_out[] = 
                    //array("code" => "200");
                    array(
                        "fb_id" => $rd->fb_id,
                        "action" => "login",
                        "image1" => $rd->image1,
                        "first_name" => $rd->first_name,
                        "last_name" => $rd->last_name,
                        "email" => $rd->email,
                        "age" => $age,
                        "birthday" => $rd->birthday,
                        "gender" => $rd->gender
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }   
            else
            {
                $log_in="select * from users where email='".$email."' ";
                $log_in_rs=mysqli_query($conn,$log_in);
                
                $log_in1="select * from users where email='".$email."' and password='".md5($password)."' ";
                $log_in_rs1=mysqli_query($conn,$log_in1);
                
                if(mysqli_num_rows($log_in_rs)==0)
                {   
                    //echo mysqli_error();
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"email not exist");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                if(mysqli_num_rows($log_in_rs1)==0)
                {   
                    //echo mysqli_error();
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"login information is wrong");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                
            }
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    
    function changeUserPassword()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['password']) && isset($event_json['fb_id']))
        {
            $password=htmlspecialchars(strip_tags($event_json['password'] , ENT_QUOTES));
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            
            $qrry_1="update users SET password ='".md5($password)."' WHERE fb_id ='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                
                $array_out = array();
                    
                 $array_out[] = 
                array(
                "response" =>"password changed");
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in change passwords");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    
    function flat_user()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['my_id']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $my_id=htmlspecialchars(strip_tags($event_json['my_id'] , ENT_QUOTES));
            
            $qrry_1="insert into flag_user(user_id,flag_by)values(";
            $qrry_1.="'".$fb_id."',";
            $qrry_1.="'".$my_id."'";
            $qrry_1.=")";
            if(mysqli_query($conn,$qrry_1))
            {
             
            
                 $array_out = array();
                 $array_out[] = 
                    //array("code" => "200");
                    array(
                    "response" =>"successful");
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                //echo mysqli_error();
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in signup");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    function edit_profile()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['about_me']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
            $job_title=htmlspecialchars(strip_tags($event_json['job_title'] , ENT_QUOTES));
            $company=htmlspecialchars(strip_tags($event_json['company'] , ENT_QUOTES));
            $school=htmlspecialchars(strip_tags($event_json['school'] , ENT_QUOTES));
            $living=htmlspecialchars(strip_tags($event_json['living'] , ENT_QUOTES));
            $children=htmlspecialchars(strip_tags($event_json['children'] , ENT_QUOTES));
            $smoking=htmlspecialchars(strip_tags($event_json['smoking'] , ENT_QUOTES));
            $drinking=htmlspecialchars(strip_tags($event_json['drinking'] , ENT_QUOTES));
            $relationship=htmlspecialchars(strip_tags($event_json['relationship'] , ENT_QUOTES));
            $sexuality=htmlspecialchars(strip_tags($event_json['sexuality'] , ENT_QUOTES));
        
            
            $image1=stripslashes(strip_tags($event_json['image1']));
            $image2=stripslashes(strip_tags($event_json['image2']));
            $image3=stripslashes(strip_tags($event_json['image3']));
            $image4=stripslashes(strip_tags($event_json['image4']));
            $image5=stripslashes(strip_tags($event_json['image5']));
            $image6=stripslashes(strip_tags($event_json['image6']));
            $gender=htmlspecialchars(strip_tags(strtolower($event_json['gender']) , ENT_QUOTES));
            $birthday=htmlspecialchars(strip_tags($event_json['birthday'] , ENT_QUOTES));
            
            $age=calculateAge($birthday);
            
            
            $qrry_1="update users SET about_me ='".$about_me."' , job_title ='".$job_title."', birthday ='".$birthday."' , age ='".$age."' , company ='".$company."' , school ='".$school."' , living ='".$living."' , children ='".$children."' , smoking ='".$smoking."' , drinking ='".$drinking."' , relationship ='".$relationship."' , sexuality ='".$sexuality."'  , image1 ='".$image1."' , image2 ='".$image2."' , image3 ='".$image3."' , image4 ='".$image4."' , image5 ='".$image5."' , image6 ='".$image6."', gender ='".$gender."'  WHERE fb_id ='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                $array_out = array();
                 
                $qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
                $log_in_rs=mysqli_query($conn,$qrry_1);
                
                if(mysqli_num_rows($log_in_rs))
                {   
                    
                    
                    $rd=mysqli_fetch_object($log_in_rs);
                    
                    $birthDate = $rd->birthday;
                    //explode the date to get month, day and year
                      $birthDate = explode("/", $birthDate);
                      //get age from date or birthdate
                      $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                        
                        
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "fb_id" => $rd->fb_id,
                        "about_me" => $rd->about_me,
                        "job_title" => $rd->job_title,
                        "gender" => $rd->gender,
                        "birthday" => $rd->birthday,
                        "age" => $age,
                        "company" => $rd->company,
                        "school" => $rd->school,
                        "first_name" => $rd->first_name,
                        "last_name" => $rd->last_name,
                        "living" => $rd->living,
                        "children" => $rd->children,
                        "smoking" => $rd->smoking,
                        "drinking" => $rd->drinking,
                        "relationship" => $rd->relationship,
                        "sexuality" => $rd->sexuality,
                        "image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
                        "image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
                        "image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
                        "image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
                        "image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
                        "image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
                        );
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            
                
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in updating");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    
    function getUserInfo()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            //$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
            
            
            $qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            if(mysqli_num_rows($log_in_rs))
            {   
                
                
                $rd=mysqli_fetch_object($log_in_rs);
                
                $birthDate = $rd->birthday;
                //explode the date to get month, day and year
                  $birthDate = explode("/", $birthDate);
                  //get age from date or birthdate
                  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));
                    
                    
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "fb_id" => $rd->fb_id,
                    "about_me" => $rd->about_me,
                    "job_title" => $rd->job_title,
                    "gender" => $rd->gender,
                    "verified" => $rd->verified,
                    "birthday" => $rd->birthday,
                    "age" => $age,
                    "company" => $rd->company,
                    "school" => $rd->school,
                    "first_name" => $rd->first_name,
                    "last_name" => $rd->last_name,
                    "living" => $rd->living,
                    "children" => $rd->children,
                    "smoking" => $rd->smoking,
                    "drinking" => $rd->drinking,
                    "relationship" => $rd->relationship,
                    "sexuality" => $rd->sexuality,
                    "image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
                    "image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
                    "image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
                    "image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
                    "image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
                    "image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in updating");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    
    function uploadImages()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['image_link']) )
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $image_link=stripslashes(strip_tags($event_json['image_link']));
        
            
            $qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            if(mysqli_num_rows($log_in_rs))
            {
                $rd=mysqli_fetch_object($log_in_rs);
                
                if($rd->image2=="0")
                {
                    $colum_name="image2";
                }
                else
                if($rd->image3=="0")
                {
                    $colum_name="image3";
                }
                else
                if($rd->image4=="0")
                {
                    $colum_name="image4";
                }
                else
                if($rd->image5=="0")
                {
                    $colum_name="image5";
                }
                else
                if($rd->image6=="0")
                {
                    $colum_name="image6";
                }
                
                
                $qrry_1="insert into user_images(fb_id,image_url,columName)values(";
                $qrry_1.="'".$fb_id."',";
                $qrry_1.="'".$image_link."',";
                $qrry_1.="'".$colum_name."'";
                $qrry_1.=")";
                mysqli_query($conn,$qrry_1);
                
                $qrry_1="update users SET $colum_name ='".$image_link."' WHERE fb_id ='".$fb_id."' ";
                if(mysqli_query($conn,$qrry_1))
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"success");
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in uploading");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }   
            
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    function changeProfilePicture()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['image_link']) )
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $image_link=stripslashes(strip_tags($event_json['image_link']));
        
            
            $qrry_1="update users SET image1 ='".$image_link."' WHERE fb_id ='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                
                $qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
                $log_in_rs=mysqli_query($conn,$qrry_1);
                
                $rd=mysqli_fetch_object($log_in_rs);
                
                $birthDate = $rd->birthday;
                //explode the date to get month, day and year
                  $birthDate = explode("/", $birthDate);
                  //get age from date or birthdate
                  $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));
                    
                    
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "fb_id" => $rd->fb_id,
                    "about_me" => $rd->about_me,
                    "job_title" => $rd->job_title,
                    "gender" => $rd->gender,
                    "birthday" => $rd->birthday,
                    "age" => $age,
                    "company" => $rd->company,
                    "school" => $rd->school,
                    "first_name" => $rd->first_name,
                    "last_name" => $rd->last_name,
                    "living" => $rd->living,
                    "children" => $rd->children,
                    "smoking" => $rd->smoking,
                    "drinking" => $rd->drinking,
                    "relationship" => $rd->relationship,
                    "sexuality" => $rd->sexuality,
                    "image1" => htmlspecialchars_decode(stripslashes($rd->image1)),
                    "image2" => htmlspecialchars_decode(stripslashes($rd->image2)),
                    "image3" => htmlspecialchars_decode(stripslashes($rd->image3)),
                    "image4" => htmlspecialchars_decode(stripslashes($rd->image4)),
                    "image5" => htmlspecialchars_decode(stripslashes($rd->image5)),
                    "image6" => htmlspecialchars_decode(stripslashes($rd->image6)),
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            
            }
            
            $output=array( "code" => "202", "msg" => $array_out);
            print_r(json_encode($output, true));
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    function Update_From_Firebase()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $headers = array(
        "Accept: application/json",
        "Content-Type: application/json"
        );
        
        $data = array();
        
        $ch = curl_init($firebaseDb_URL.'/.json');
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        foreach ($json_data as $key => $item) 
        {
            //      echo" this user >>   ";
            //      print_r($key);
                    
            //      //print_r($item);
            //      echo"<br>";
            
            
            foreach ($item as $key1 => $item1)
            {
                
              //  $data = array("fetch"=>"true");
        
        //      $ch = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                
        //      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        //      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        //      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                
        //      $return = curl_exec($ch);
                
        //      $json_data = json_decode($return, true);
                
                if(!isset($item1['fetch']))
                {
                   
                   //print_r($item1['match']);
                     if($item1['match']=="false")
                     {
                         $match= "false";
                     }
                     
                     if($item1['match']=="true")
                     {
                         $match= "true";
                     }
                     $effeted=$item1['effect'];
                    
                                  //  echo "<br>";
                                  //  print_r($key);
                            //         print_r($item1['type']);
                            //                  echo"  this user >>>>>>    ";
                            //                  print_r($key1);
                            //                  print_r($item1['name']);
                            //                  echo"<br>";
                                    
                    
                    $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected)values(";
                    $qrry_1.="'".$key."',";
                    $qrry_1.="'".$key1."',";
                    $qrry_1.="'".$item1['type']."',";
                    $qrry_1.="'".$match."',";
                    $qrry_1.="'".$effeted."'";
                    $qrry_1.=")";
                    if(mysqli_query($conn,$qrry_1))
                    {
                        //echo "insert done";
                       // echo $item1['effect']=="true";
                        if($item1['type']=="like" && $item1['effect']=="true")
                        {
                            $qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key."' ";
                            if(mysqli_query($conn,$qrry_1))
                            {
                                //echo "udpate";
                            }
                            
                            if($item1['status']=="1")
                            {
                                $ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                                curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                                curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                                
                                $return = curl_exec($ch1);
                                
                                $json_data = json_decode($return, true);
                                
                                
                                $curl_error = curl_error($ch1);
                                $http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                            }   
                            
                        }
                        else
                        if($item1['type']=="dislike" && $item1['effect']=="true")
                        {
                            $qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key."' ";
                            if(mysqli_query($conn,$qrry_1))
                            {
                                //echo "udpate";
                            }
                            
                            $ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                            curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                            curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                            
                            $return = curl_exec($ch1);
                            
                            $json_data = json_decode($return, true);
                            
                            
                            $curl_error = curl_error($ch1);
                            $http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                            
                            if($item1['status']=="1")
                            {
                                $ch1 = curl_init($firebaseDb_URL.'/'. $key .'/'.$key1.'/.json');
                                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
                                curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data));
                                curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
                                
                                $return = curl_exec($ch1);
                                
                                $json_data = json_decode($return, true);
                                
                                
                                $curl_error = curl_error($ch1);
                                $http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                            }   
                        }
                        
                       
                    } 
                    
                }
                 
                
            }
        }
        
        
        
        //Delete firebase db data after insert
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        
        
        
        
    }
    
    
    function userNearByMe()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
//      $my_file = 'file.txt';
//         $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
//         $data = $input;
//         fwrite($handle, $data);
        
        if(isset($event_json['fb_id']) && isset($event_json['lat_long']) )
        {
            
            
            //remove after fetch
                
            $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
            );
            
            $data = array();
            
            $ch = curl_init($firebaseDb_URL.'/.json');
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $return = curl_exec($ch);
            
            $json_data = json_decode($return, true);
            
            $datacount=@count($json_data);
            if($datacount!="0")
            {
                foreach ($json_data as $key => $item) 
                {
                    foreach ($item as $key1 => $item1)
                    {
                        
                     
                        if(!isset($item1['fetch']))
                        {
                           
                           //print_r($item1['match']);
                             if($item1['match']=="false")
                             {
                                 $match= "false";
                             }
                             
                             if($item1['match']=="true")
                             {
                                 $match= "true";
                             }
                             $effeted=$item1['effect'];
                            
                            $qrry_1="select * from like_unlike where action_profile ='".$key."' and effect_profile ='".$key1."' ";
                            $log_in_rs=mysqli_query($conn,$qrry_1);
                            if(mysqli_num_rows($log_in_rs))
                            {
                               mysqli_query($conn,"update like_unlike SET match_profile ='true' WHERE action_profile ='".$key."' and effect_profile ='".$key1."' ");
                               //echo "update 1";
                            }
                            else
                            {
                                $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected)values(";
                                $qrry_1.="'".$key."',";
                                $qrry_1.="'".$key1."',";
                                $qrry_1.="'".$item1['type']."',";
                                $qrry_1.="'".$match."',";
                                $qrry_1.="'".$effeted."'";
                                $qrry_1.=")";
                                if(mysqli_query($conn,$qrry_1))
                                {
                                    if($item1['type']=="like" && $item1['effect']=="true")
                                    {
                                        $qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key1."' ";
                                        if(mysqli_query($conn,$qrry_1))
                                        {
                                            //echo "udpate";
                                        }
                                        
                                     }
                                    else
                                    if($item1['type']=="dislike" && $item1['effect']=="true")
                                    {
                                        $qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key1."' ";
                                        if(mysqli_query($conn,$qrry_1))
                                        {
                                            //echo "udpate";
                                        }
                                        
                                        
                                    }
                                    
                                   
                                } 
                                
                                
                            }
                         
                            
                        }
                         
                        
                    }
                }
            }
            
            //Delete firebase db data after insert
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $return = curl_exec($ch);
            
            $json_data = json_decode($return, true);
            
            
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //end--------------------------------------------------------------------
            
            
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $lat_long=strip_tags($event_json['lat_long']);
            
            $distance=strip_tags($event_json['distance']);
            $age_range=strip_tags($event_json['age_range']);
            $gender=strip_tags($event_json['gender']);
            
            $age_min =strip_tags($event_json['age_min']);
            $age_max =strip_tags($event_json['age_max']);
            
            
            $version=strip_tags($event_json['version']);
            $device=strip_tags($event_json['device']);
            
            $device_token=$event_json['device_token'];
            
            if($distance=="")
            {
                $distance="10000000";
            }
            
            $mylocation=explode(",",$lat_long);
            //
            $qrry_1="update users SET lat_long ='".$lat_long."' , users.lat='".$mylocation[0]."' , users.long='".$mylocation[1]."' , version='".$version."' , device='".$device."' , device_token='".$device_token."'   WHERE fb_id ='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                //6371  for km query
                $mylocation=explode(",",$lat_long);
                
                if($gender=='all')
                {
                    $query=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and hide_me='0' HAVING distance < $distance ORDER BY distance LIMIT 50");
                }
                else
                {
                    $query=mysqli_query($conn,"SELECT *, ( 3959 * acos( cos( radians($mylocation[0]) ) * cos( radians( lat ) ) * cos( radians( users.long ) - radians($mylocation[1]) ) + sin( radians($mylocation[0]) ) * sin( radians( lat ) ) ) ) AS distance FROM users WHERE gender = '$gender' AND age BETWEEN $age_min AND $age_max and fb_id !='".$fb_id."' and hide_me='0' HAVING distance < $distance ORDER BY distance LIMIT 50");
                }
                
                //check if block or not
                $qrry_1="select * from users where fb_id ='".$fb_id."' ";
                $log_in_rs=mysqli_query($conn,$qrry_1);
                $rd=mysqli_fetch_object($log_in_rs); 
                $profile_block=$rd->block;
                //check if block or not
                
                
                $array_out = array();
                while($row=mysqli_fetch_array($query))
                {
                    $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' and effect_profile ='".$row['fb_id']."'  ";
                   //echo  $qrry_1="select * from like_unlike where action_profile ='".$fb_id."' ";
                   //echo"<br>";
                    $log_in_rs=mysqli_query($conn,$qrry_1);
                    
                    $rd=mysqli_fetch_object($log_in_rs);
                    //$match_profile= $rd->match_profile;
                    //echo $rd->effect_profile;
                    //echo"<br>";
                    //if($row['fb_id'] != $rd->action_type && $row['fb_id'] != $rd->effect_profile)
                    if(@$rd->effect_profile != @$row['fb_id'] || (@$rd->effected=="false" && @$rd->match_profile=="false"))
                    {
                        
                       
                        $action_type=@$rd->action_type;
                        if($action_type==null)
                        {
                            $action_type="false";
                        }
                        
                        
                        $mylocation=explode(",",$lat_long);
                        $other_profiles=explode(",",$row['lat_long']);
                        
                        
                        $INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
                        $underONE_KM=explode(".",$INoneKM);
                        
                        //if($underONE_KM[0]<=$distance)
                       // {
                              $birthDate = $row['birthday'];
                              //explode the date to get month, day and year
                              $birthDate = explode("/", $birthDate);
                              //get age from date or birthdate
                              $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[2]) - 1)
                                : (date("Y") - $birthDate[2]));
                            
                              
                              
                             $array_out[] = 
                                //array("code" => "200");
                                array(
                                    "fb_id" => $row['fb_id'],
                                    "first_name" => $row['first_name'],
                                    "last_name" => $row['last_name'],
                                    "birthday" => "$age",
                                    "verified" => $row['verified'],
                                    "about_me" => htmlentities($row['about_me']),
                                    "distance" => $underONE_KM[0]." miles away",
                                    "gender" => $row['gender'],
                                    "image1" => $row['image1'],
                                    "image2" => $row['image2'],
                                    "image3" => $row['image3'],
                                    "image4" => $row['image4'],
                                    "image5" => $row['image5'],
                                    "image6" => $row['image6'],
                                    "job_title" => $row['job_title'],
                                    "company" => $row['company'],
                                    "school" => $row['school'],
                                    "living" => $row['living'],
                                    "children" => $row['children'],
                                    "smoking" => $row['smoking'],
                                    "drinking" => $row['drinking'],
                                    "relationship" => $row['relationship'],
                                    "sexuality" => $row['sexuality'],
                                    "swipe" => $action_type,
                                    "block" =>  $profile_block  //0= normal  1=user blocked and auto logout
                                    
                                ); 
                       // }
                        
                    }
                    
                    
                }
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
                
                
                
                
                
                
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in api");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    
    
    function deleteImages()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['image_link']) )
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $image_link=stripslashes(strip_tags($event_json['image_link'] ));
            
            
            mysqli_query($conn,"update users where fb_id='".$fb_id."'   ");
                
            $qrry_1="select * from users WHERE fb_id ='".$fb_id."' and image2='".$image_link."' OR image3='".$image_link."' OR image4='".$image_link."' OR image5='".$image_link."' OR image6='".$image_link."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            if(mysqli_num_rows($log_in_rs))
            {
                $rd=mysqli_fetch_object($log_in_rs);
                
                if($rd->image2==$image_link)
                {
                    $colum_name="image2";
                }
                else
                if($rd->image3==$image_link)
                {
                    $colum_name="image3";
                }
                else
                if($rd->image4==$image_link)
                {
                    $colum_name="image4";
                }
                else
                if($rd->image5==$image_link)
                {
                    $colum_name="image5";
                }
                else
                if($rd->image6==$image_link)
                {
                    $colum_name="image6";
                }
                
                
                $qrry_1="update users SET $colum_name ='0' WHERE fb_id ='".$fb_id."' ";
                if(mysqli_query($conn,$qrry_1))
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"success");
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in delete");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            } 
            
            
        }
        else
        {
            $array_out = array();
                    
                     $array_out[] = 
                        array(
                        "response" =>"Json Parem are missing");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
        }
        
    }
    
    
    
    function show_or_hide_profile()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['status']) )
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
        
            $qrry_1="update users SET hide_me ='".$status."' WHERE fb_id ='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"success");
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in uploading");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
        }
        else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"json parem missing");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
        
    }
    
    
    
    
    
    //admin panel functions
    
    function banned_user()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
    
        
        if(isset($event_json['fb_id']) )
        {
            $fb_id=strip_tags($event_json['fb_id']);
            $block=strip_tags($event_json['block']);
        
            $qrry_1="update users SET block ='".$block."' where fb_id='".$fb_id."' ";
            if(mysqli_query($conn,$qrry_1))
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"success");
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in updating");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }       
    }
    
    
    function All_ReportedUsers()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $query=mysqli_query($conn,"select * from flag_user order by id DESC");
                
        $array_out = array();
        while($row=mysqli_fetch_array($query))
        {   
            
            $qrry_1="select * from users WHERE fb_id ='".$row['user_id']."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            $rd=mysqli_fetch_object($log_in_rs);
            
            $qrry_11="select * from users WHERE fb_id ='".$row['flag_by']."' ";
            $log_in_rs1=mysqli_query($conn,$qrry_11);
            
            $rd1=mysqli_fetch_object($log_in_rs1);
                
            $array_out[] = 
            array(
                "fb_id" => $rd->fb_id,
                "first_name" => htmlentities($rd->first_name),
                "last_name" => htmlentities($rd->last_name),
                "block" => $rd->block,
                "flag_by"=>
                    array(
                        "fb_id" => $rd1->fb_id,
                        "first_name" => htmlentities($rd1->first_name),
                        "last_name" => htmlentities($rd1->last_name),
                    ),
            );
            
        }
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
    }
    
    
    function All_Users()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $query=mysqli_query($conn,"select * from users order by id DESC");
                
        $array_out = array();
        while($row=mysqli_fetch_array($query))
        {   
            
             
             
             $array_out[] = 
                array(
                    "fb_id" => $row['fb_id'],
                    //"first_name" => htmlentities($row['first_name']),
                    "first_name" => $row['first_name'],
                    "last_name" => $row['last_name'],
                    "birthday" => $row['birthday'],
                    "about_me" => htmlentities($row['about_me']),
                    "location" => $row['lat_long'],
                    "purchased" => $row['purchased'],
                    "gender" => $row['gender'],
                    "image1" => $row['image1'],
                    "image2" => $row['image2'],
                    "image3" => $row['image3'],
                    "image4" => $row['image4'],
                    "image5" => $row['image5'],
                    "image6" => $row['image6'],
                    "like_count" => $row['like_count'],
                    "dislike_count" => $row['dislike_count'],
                    "created" => $row['created'],
                    
                );
            
        }
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
        
        
    }
    
    
    function fake_profiles()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $query=mysqli_query($conn,"select * from users where profile_type='fake' order by id DESC");
                
        $array_out = array();
        while($row=mysqli_fetch_array($query))
        {
             
             $array_out[] = 
                array(
                    "fb_id" => $row['fb_id'],
                    //"first_name" => htmlentities($row['first_name']),
                    "first_name" => $row['first_name'],
                    "last_name" => $row['last_name'],
                    "birthday" => $row['birthday'],
                    "about_me" => htmlentities($row['about_me']),
                    "location" => $row['lat_long'],
                    "purchased" => $row['purchased'],
                    "gender" => $row['gender'],
                    "image1" => $row['image1'],
                    "image2" => $row['image2'],
                    "image3" => $row['image3'],
                    "image4" => $row['image4'],
                    "image5" => $row['image5'],
                    "image6" => $row['image6'],
                    "like_count" => $row['like_count'],
                    "dislike_count" => $row['dislike_count'],
                    "created" => $row['created'],
                    
                );
            
        }
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
    }
    
    function Admin_Login()
    {   
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['email']) && isset($event_json['password']) )
        {
            $email=htmlspecialchars(strip_tags($event_json['email'] , ENT_QUOTES));
            $password=strip_tags($event_json['password']);
        
            
            $log_in="select * from admin where email='".$email."' and pass='".md5($password)."' ";
            $log_in_rs=mysqli_query($conn,$log_in);
            
            if(mysqli_num_rows($log_in_rs))
            {
                $array_out = array();
                 $array_out[] = 
                    //array("code" => "200");
                    array(
                        "response" => "login success"
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }   
            else
            {
                
                $array_out = array();
                        
                 $array_out[] = 
                    array(
                    "response" =>"Error in login");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    
    
    
    
    
    function All_Matched_Profile()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $query=mysqli_query($conn,"select * from like_unlike where match_profile='true' order by id DESC ");
                
        $array_out = array();
        while($row=mysqli_fetch_array($query))
        {
             $array_out[] = 
                array(
                    "id" => $row['id'],
                    "action_profile" => $row['action_profile'],
                    "effect_profile" => $row['effect_profile']
                );
            
        }
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
        
    }
    
    
    function changePassword()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        //print_r($event_json);
        
        if(isset($event_json['new_password']) && isset($event_json['old_password']))
        {
            $old_password=strip_tags($event_json['old_password']);
            $new_password=strip_tags($event_json['new_password']);
        
            $qrry_1="select * from admin where pass ='".md5($old_password)."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            $rd=mysqli_fetch_object($log_in_rs);
            
            if($rd->id!="")
            {
                //$qrry_1="update admin SET pass ='".md5($new_password)."' where id='".$rd->id."'  ";
                if(mysqli_query($conn,$qrry_1))
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"success");
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in updating");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in updating");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    
    function getProfilePictures()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            //$about_me=htmlspecialchars(strip_tags($event_json['about_me'] , ENT_QUOTES));
            
            
            $qrry_1="select * from users WHERE fb_id ='".$fb_id."' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            if(mysqli_num_rows($log_in_rs))
            {
                $rd=mysqli_fetch_object($log_in_rs);
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "first_name" => htmlentities($rd->first_name),
                    "last_name" => htmlentities($rd->last_name),
                    "birthday" => $rd->birthday,
                    "gender" => $rd->gender,
                    "purchased" => $rd->purchased,
                    "version" => $rd->version,
                    "block" => $rd->block,
                    "device" => $rd->device,
                    "hide_me" => $rd->hide_me,
                    "about_me" => htmlentities($rd->about_me),
                    "location" => $rd->location,
                    "profile_type" => $rd->profile_type,
                    "like_count" => $rd->like_count,
                    "dislike_count" => $rd->dislike_count,
                    "image1" => stripslashes($rd->image1),
                    "image2" => stripslashes($rd->image2),
                    "image3" => stripslashes($rd->image3),
                    "image4" => stripslashes($rd->image4),
                    "image5" => stripslashes($rd->image5),
                    "image6" => stripslashes($rd->image6),
                    "created" => $rd->created
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in updating");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    function getProfilelikes()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['status']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $status=htmlspecialchars(strip_tags($event_json['status'] , ENT_QUOTES));
            
            
            $qrry_1="select * from like_unlike WHERE effect_profile ='".$fb_id."' and action_type='".$status."' and effected='true' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            $array_out = array();
            while($row=mysqli_fetch_array($log_in_rs))
            {
                $qrry_11="select * from users WHERE fb_id ='".$row['action_profile']."' ";
                $log_in_rs1=mysqli_query($conn,$qrry_11);
                
                while($row1=mysqli_fetch_array($log_in_rs1))
                {
                    
                    $array_out[] = 
                    array(
                        "action_profile" => $row['action_profile'],
                        "profile_info" => 
                        array(
                                "fb_id" => $row1['fb_id'],
                                "first_name" => htmlentities($row1['first_name']),
                                "image1" => htmlspecialchars_decode(stripslashes($row1['image1'])),
                                "last_name" => htmlentities($row1['last_name']),
                                "like_count" => $row1['like_count'],
                                "dislike_count" => $row1['dislike_count']
                            ),
                        
                    );
                
                }
                
            }
            $output=array( "code" => "200", "msg" => $array_out);
            print_r(json_encode($output, true));
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    function getmatchedprofiles()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) )
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            
            $qrry_1="select * from like_unlike WHERE effect_profile ='".$fb_id."' and match_profile='true' ";
            $log_in_rs=mysqli_query($conn,$qrry_1);
            
            $array_out = array();
            while($row=mysqli_fetch_array($log_in_rs))
            {
                $qrry_11="select * from users WHERE fb_id ='".$row['action_profile']."' ";
                $log_in_rs1=mysqli_query($conn,$qrry_11);
                
                while($row1=mysqli_fetch_array($log_in_rs1))
                {
                    
                    $array_out[] = 
                    array(
                        "action_profile" => $row['action_profile'],
                        "profile_info" => 
                        array(
                                "fb_id" => $row1['fb_id'],
                                "image1" => htmlspecialchars_decode(stripslashes($row1['image1'])),
                                "first_name" => htmlentities($row1['first_name']),
                                "last_name" => htmlentities($row1['last_name']),
                                "like_count" => $row1['like_count'],
                                "dislike_count" => $row1['dislike_count']
                            ),
                        
                    );
                
                }
                
            }
            $output=array( "code" => "200", "msg" => $array_out);
            print_r(json_encode($output, true));
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }

    
    function update_purchase_Status()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        
        $qrry_1="update users SET purchased ='1' WHERE fb_id ='".$fb_id."' ";
        if(mysqli_query($conn,$qrry_1))
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"update succesfully");
        }
        
        $output=array( "code" => "202", "msg" => $array_out);
        print_r(json_encode($output, true));
        
    } 
    
    
    function get_profiles_nameByID()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=$event_json['fb_id'];
        
        
        $query="select * from users where fb_id IN (".$fb_id.") order by fb_id ";
        $log_in_rs1=mysqli_query($conn,$query);
        $array_out = array();
        while($row1=mysqli_fetch_array($log_in_rs1))
        {
            $array_out[] = 
                array(
                    "fb_id" => $row1['fb_id'],
                    "first_name" => htmlentities($row1['first_name']),
                    "last_name" => htmlentities($row1['last_name'])
                );
        }
        
        $output=array( "code" => "202", "msg" => $array_out);
        print_r(json_encode($output, true));
        
    } 
    
    function mylikies()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=$event_json['fb_id'];
        $lat_long=strip_tags($event_json['lat_long']);
        
        
        
        //remove after fetch
                
            $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
            );
            
            $data = array();
            
            $ch = curl_init($firebaseDb_URL.'/.json');
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $return = curl_exec($ch);
            
            $json_data = json_decode($return, true);
            
            $datacount=@count($json_data);
            if($datacount!="0")
            {
                foreach ($json_data as $key => $item) 
                {
                    foreach ($item as $key1 => $item1)
                    {
                        
                     
                        if(!isset($item1['fetch']))
                        {
                           
                           //print_r($item1['match']);
                             if($item1['match']=="false")
                             {
                                 $match= "false";
                             }
                             
                             if($item1['match']=="true")
                             {
                                 $match= "true";
                             }
                             
                             $effeted=$item1['effect'];
                             
                             
                             
                            $qrry_1="select * from like_unlike where action_profile ='".$key."' and effect_profile ='".$key1."' ";
                            $log_in_rs=mysqli_query($conn,$qrry_1);
                            if(mysqli_num_rows($log_in_rs))
                            {
                               mysqli_query($conn,"update like_unlike SET match_profile ='true' WHERE action_profile ='".$key."' and effect_profile ='".$key1."' ");
                               //echo "update 1";
                            }
                            else
                            {
                                $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected)values(";
                                $qrry_1.="'".$key."',";
                                $qrry_1.="'".$key1."',";
                                $qrry_1.="'".$item1['type']."',";
                                $qrry_1.="'".$match."',";
                                $qrry_1.="'".$effeted."'";
                                $qrry_1.=")";
                                if(mysqli_query($conn,$qrry_1))
                                {
                                    if($item1['type']=="like" && $item1['effect']=="true")
                                    {
                                        $qrry_1="update users SET like_count = like_count+1 WHERE fb_id ='".$key1."' ";
                                        if(mysqli_query($conn,$qrry_1))
                                        {
                                            //echo "udpate";
                                        }
                                        
                                     }
                                    else
                                    if($item1['type']=="dislike" && $item1['effect']=="true")
                                    {
                                        $qrry_1="update users SET dislike_count = dislike_count+1 WHERE fb_id ='".$key1."' ";
                                        if(mysqli_query($conn,$qrry_1))
                                        {
                                            //echo "udpate";
                                        }
                                        
                                        
                                    }
                                    
                                   
                                } 
                                
                                
                            }
                         
                            
                        }
                         
                        
                    }
                }
            }
            
            //Delete firebase db data after insert
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $return = curl_exec($ch);
            
            $json_data = json_decode($return, true);
            
            
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //end--------------------------------------------------------------------
            
            
        
        $query1="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and (action_type='superLike' or action_type='like')";
        
        $log_in_rs11=mysqli_query($conn,$query1);
        $array_out1 = array();
        while($row11=mysqli_fetch_array($log_in_rs11))
        {   
        
            
              
            $query="select * from users where fb_id ='".$row11['action_profile']."' ";
            $rows=mysqli_query($conn,$query);
            $rd1=mysqli_fetch_object($rows); 
            
            
            $mylocation=explode(",",$lat_long);
            $other_profiles=explode(",",$rd1->lat_long);
            
            
            $INoneKM= distance($mylocation[0],$mylocation[1],$other_profiles[0],$other_profiles[1], "K");
            $underONE_KM=explode(".",$INoneKM);
            
            
            
             $birthDate = $rd1->birthday;
              //explode the date to get month, day and year
              $birthDate = explode("/", $birthDate);
              //get age from date or birthdate
              $age = (date("md", date("U", @mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                ? ((date("Y") - $birthDate[2]) - 1)
                : (date("Y") - $birthDate[2]));
                
             $array_out1[] = 
                //array("code" => "200");
                array(
                    "fb_id" => $rd1->fb_id,
                    "first_name" => $rd1->first_name,
                    "last_name" => $rd1->last_name,
                    "birthday" => $age,
                    "about_me" => htmlentities($rd1->about_me),
                    "distance" => $underONE_KM[0]." miles away",
                    "gender" => $rd1->gender,
                    "image1" => $rd1->image1,
                    "image2" => $rd1->image2,
                    "image3" => $rd1->image3,
                    "image4" => $rd1->image4,
                    "image5" => $rd1->image5,
                    "image6" => $rd1->image6,
                    "job_title" => $rd1->job_title,
                    "company" => $rd1->company,
                    "swipe" =>$row11['action_type'],
                    "school" => $rd1->school
                );
            ////////    
                    
            /*$query_11="select * from users where fb_id ='".$row11['action_profile']."' ";
            $log_in_rs1_1_1=mysqli_query($conn,$query_11);
            $rd_1=mysqli_fetch_object($log_in_rs1_1_1); 
            
            $query1_2="select * from users where fb_id ='".$row11['effect_profile']."' ";
            $log_in_rs11_2=mysqli_query($conn,$query1_2);
            $rd1_2=mysqli_fetch_object($log_in_rs11_2); 
            
            $array_out1[] = 
                array(
                    "action_profile" => $row11['action_profile'],
                    "action_profile_name"=> array
                    (
                        "image1" => htmlentities($rd_1->image1),
                        "first_name" => htmlentities($rd_1->first_name),
                        "last_name" => htmlentities($rd_1->last_name)
                    )
                );*/
        }
        
        $output=array( "code" => "200", "msg" => $array_out1);
        print_r(json_encode($output, true));
        
    }
    
    function boostProfile()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $mins=$event_json['mins'];
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        $promoted=htmlspecialchars(strip_tags($event_json['promoted'] , ENT_QUOTES));
        
        $qrry_1="update users SET promoted_mins ='".$mins."' , promoted='".$promoted."' , promoted_date='".date('Y-m-d H:i:s', time())."' WHERE fb_id ='".$fb_id."' ";  
        
        if(mysqli_query($conn,$qrry_1))
        {
            $array_out = array();
                
             $array_out[] = 
                array(
                "response" =>"success");
            
            $output=array( "code" => "200", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        else
        {
            $array_out = array();
                
             $array_out[] = 
                array(
                "response" =>"problem in updating");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        
    }
    
    
    function myMatch()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=$event_json['fb_id'];
        
        $query1="select * from like_unlike where effect_profile ='".$fb_id."' and match_profile='false' and chat='false' and (action_type='superLike' or action_type='like') order by rand() ";
        
        $log_in_rs11=mysqli_query($conn,$query1);
        $array_out1 = array();
        while($row11=mysqli_fetch_array($log_in_rs11))
        {
            $query_11="select * from users where fb_id ='".$row11['action_profile']."' ";
            $log_in_rs1_1_1=mysqli_query($conn,$query_11);
            $rd_1=mysqli_fetch_object($log_in_rs1_1_1); 
            
            $query1_2="select * from users where fb_id ='".$row11['effect_profile']."' ";
            $log_in_rs11_2=mysqli_query($conn,$query1_2);
            $rd1_2=mysqli_fetch_object($log_in_rs11_2); 
            
            $array_out1[] = 
                array(
                    "action_profile" => $row11['action_profile'],
                    "action_profile_name"=> array
                    (
                        "image1" => htmlentities($rd_1->image1),
                        "first_name" => htmlentities($rd_1->first_name),
                        "last_name" => htmlentities($rd_1->last_name)
                    )
                );
        }
        
        $userWhoLikeMe=$arrryy[] = 
            array(
                "total" => count($array_out1),
                "image1" =>$array_out1[0]['action_profile_name']['image1']
            );
        
        $query="select * from like_unlike where action_profile ='".$fb_id."' and match_profile='true' and chat='false' ";
        $log_in_rs1=mysqli_query($conn,$query);
        $array_out = array();
        while($row1=mysqli_fetch_array($log_in_rs1))
        {
            $query="select * from users where fb_id ='".$row1['action_profile']."' ";
            $log_in_rs1_1=mysqli_query($conn,$query);
            $rd=mysqli_fetch_object($log_in_rs1_1); 
            
            $query1="select * from users where fb_id ='".$row1['effect_profile']."' ";
            $log_in_rs11=mysqli_query($conn,$query1);
            $rd1=mysqli_fetch_object($log_in_rs11); 
            
            $array_out[] = 
                array(
                    "action_profile" => $row1['action_profile'],
                    "action_profile_name"=> array
                    (
                        "image1" => htmlentities($rd->image1),
                        "first_name" => htmlentities($rd->first_name),
                        "last_name" => htmlentities($rd->last_name)
                    ),
                    "effect_profile" => htmlentities($row1['effect_profile']),
                    "effect_profile_name"=> array
                    (
                        "image1" => htmlentities($rd1->image1),
                        "first_name" => htmlentities($rd1->first_name),
                        "last_name" => htmlentities($rd1->last_name)
                    )
                );
        }
        
        $output=array( "code" => "200", "msg" => $array_out , "myLikes"=>$userWhoLikeMe);
        print_r(json_encode($output, true));
        
    }
    
    
    function firstchat()
    {
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        $effected_id=htmlspecialchars(strip_tags($event_json['effected_id'] , ENT_QUOTES));
        
        $qrry_1="update like_unlike SET chat ='true' WHERE action_profile ='".$fb_id."' and effect_profile ='".$effected_id."' ";
        mysqli_query($conn,"update like_unlike SET chat ='true' WHERE action_profile ='".$effected_id."' and effect_profile ='".$fb_id."'");
        if(mysqli_query($conn,$qrry_1))
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"update succesfully");
        }
        
        $output=array( "code" => "202", "msg" => $array_out);
        print_r(json_encode($output, true));
        
    }
    
    
    function unMatch()
    {
        
        
        
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=$event_json['fb_id'];
        $other_id=$event_json['other_id'];
        
        
        
        //remove from my inbox
                
        $headers = array(
        "Accept: application/json",
        "Content-Type: application/json"
        );
        
        $data = array();
        
    
        $url= $firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/'.$other_id.'/.json';
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        //delete from other user inbox as well
        $data = array();
        
        $url=$firebaseDb_URL_MainDb.'/Inbox/'.$other_id.'/'.$fb_id.'/.json';
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        
        mysqli_query($conn,"Delete from like_unlike where action_profile ='".$fb_id."' and effect_profile='".$other_id."'  ");
        mysqli_query($conn,"Delete from like_unlike where effect_profile ='".$fb_id."' and action_profile='".$other_id."'  ");
        
        $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"update succesfully");
            
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
        
        
    }
    
    function deleteAccount()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=$event_json['fb_id'];
       
        //remove from my inbox
                
        $headers = array(
        "Accept: application/json",
        "Content-Type: application/json"
        );
        
        $data = array();
        
    
        $url= $firebaseDb_URL_MainDb.'/Users/'.$fb_id.'/.json';
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        //delete from other user inbox as well
        $data = array();
        
        $url=$firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/.json';
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $return = curl_exec($ch);
        
        $json_data = json_decode($return, true);
        
        foreach ($json_data as $key => $item) 
        {
            //echo $key;
            //remove chat from my inbox
            $data = array();
            $url=$firebaseDb_URL_MainDb.'/chat/'.$fb_id.'-'.$key.'/.json';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $return = curl_exec($ch);
            $json_data = json_decode($return, true);
                
                    //remove from my Inbox
                        $data = array();
                        $url=$firebaseDb_URL_MainDb.'/Inbox/'.$fb_id.'/'.$key.'/.json';
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        $return = curl_exec($ch);
                        $json_data = json_decode($return, true);
                        
                    //remove from other person Inbox
                        $data = array();
                        $url=$firebaseDb_URL_MainDb.'/Inbox/'.$key.'/'.$fb_id.'/.json';
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        $return = curl_exec($ch);
                        $json_data = json_decode($return, true);        
                
            //remove chat from oter inbox
            $data = array();
            $url=$firebaseDb_URL_MainDb.'/chat/'.$key.'-'.$fb_id.'/.json';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $return = curl_exec($ch);
            $json_data = json_decode($return, true);
        }
        
        
        
        
        mysqli_query($conn,"Delete from like_unlike where action_profile ='".$fb_id."' ");
        mysqli_query($conn,"Delete from like_unlike where effect_profile ='".$fb_id."' ");
        mysqli_query($conn,"Delete from users where fb_id ='".$fb_id."' ");
        
        $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Delete succesfully");
            
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
    }
    
     
     function under_review_new_uploaded_pictures()
     {
         
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $query="select * from user_images ";
        $log_in_rs1=mysqli_query($conn,$query);
        $array_out = array();
        while($row1=mysqli_fetch_array($log_in_rs1))
        {
            
            $query1="select * from users where fb_id ='".$row1['fb_id']."' ";
            $log_in_rs11=mysqli_query($conn,$query1);
            $rd=mysqli_fetch_object($log_in_rs11); 
            
            $array_out[] = 
                array(
                    "id" => $row1['id'],
                    "fb_id" => $row1['fb_id'],
                    "image_url" => $row1['image_url'],
                    "created_time" => $row1['created_time'],
                    "first_name" => $rd->first_name,
                    "last_name" => $rd->last_name,
                    "columName" => $row1['columName']
                );
        }
        
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
     }
     
     
     function underReviewPictureStatusChange()
     {
         
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        $action=htmlspecialchars(strip_tags($event_json['action'] , ENT_QUOTES));
        $id=htmlspecialchars(strip_tags($event_json['id'] , ENT_QUOTES));
        $columName=htmlspecialchars(strip_tags($event_json['columName'] , ENT_QUOTES));
        $imgurl=urldecode($event_json['imgurl']);
        
        //print_r($event_json);
        
        if($action=="approve")
        {
           mysqli_query($conn,"Delete from user_images where id ='".$id."'  "); 
        }
        else
        if($action=="delete")
        {
            if($columName=="image1")
            {
                mysqli_query($conn,"update users SET image1 ='' WHERE fb_id ='".$fb_id."' ");
            }
            else
            if($columName=="image2")
            {
                mysqli_query($conn,"update users SET image2 ='' WHERE fb_id ='".$fb_id."' ");
            }
            else
            if($columName=="image3")
            {
                mysqli_query($conn,"update users SET image3 ='' WHERE fb_id ='".$fb_id."' ");
            }
            else
            if($columName=="image4")
            {
                mysqli_query($conn,"update users SET image4 ='' WHERE fb_id ='".$fb_id."' ");
            }
            else
            if($columName=="image5")
            {
                mysqli_query($conn,"update users SET image5 ='' WHERE fb_id ='".$fb_id."' ");
            }
            else
            if($columName=="image6")
            {
                mysqli_query($conn,"update users SET image6 ='' WHERE fb_id ='".$fb_id."' ");
            }
            
            
            mysqli_query($conn,"Delete from user_images where id ='".$id."'  "); 
        }
        
        $array_out = array();
         $array_out[] = 
            //array("code" => "200");
            array(
            "response" =>"successful");
        
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
       
     }
     
     function matchNow()
     {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        if(isset($event_json['fb_id']) && isset($event_json['my_id']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $my_id=htmlspecialchars(strip_tags($event_json['my_id'] , ENT_QUOTES));
            
            $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected,chat)values(";
            $qrry_1.="'".$my_id."',";
            $qrry_1.="'".$fb_id."',";
            $qrry_1.="'like',";
            $qrry_1.="'false',";
            $qrry_1.="'true',";
            $qrry_1.="'false'";
            $qrry_1.=")";
            if(mysqli_query($conn,$qrry_1))
            {
                
                $qrry_1="insert into like_unlike(action_profile,effect_profile,action_type,match_profile,effected,chat)values(";
                $qrry_1.="'".$fb_id."',";
                $qrry_1.="'".$my_id."',";
                $qrry_1.="'like',";
                $qrry_1.="'false',";
                $qrry_1.="'false',";
                $qrry_1.="'false'";
                $qrry_1.=")";
                if(mysqli_query($conn,$qrry_1))
                {
                     $array_out = array();
                     $array_out[] = 
                        //array("code" => "200");
                        array(
                        "response" =>"successful");
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }
            else
            {
                //echo mysqli_error();
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"problem in signup");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
     }
     
     
     function convertProfile()
     {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        $profile_type=htmlspecialchars(strip_tags($event_json['profile_type'] , ENT_QUOTES));
        
        mysqli_query($conn,"update users SET profile_type ='".$profile_type."' WHERE fb_id ='".$fb_id."' ");
        
        $array_out = array();
         $array_out[] = 
            //array("code" => "200");
            array(
            "response" =>"successful");
        
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
     }
     
     
     function addFakeProfile()
     {
         require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        
        if(isset($event_json['fb_id']) && isset($event_json['first_name']) && isset($event_json['last_name']))
        {
            $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
            $first_name=htmlspecialchars(strip_tags($event_json['first_name'] , ENT_QUOTES));
            $last_name=htmlspecialchars(strip_tags($event_json['last_name'] , ENT_QUOTES));
            $birthday=$event_json['birthday'];
            $gender=htmlspecialchars(strip_tags($event_json['gender'] , ENT_QUOTES));
            $image1=htmlspecialchars_decode(stripslashes($event_json['image1']));
            $image2=htmlspecialchars_decode(stripslashes($event_json['image2']));
            $image3=htmlspecialchars_decode(stripslashes($event_json['image3']));
            $profile_type=htmlspecialchars_decode(stripslashes($event_json['profile_type']));
            
            
             if($birthday=="")
             {
                 $birthday = "01/01/2000";
             }
             else
             {
                 $birthday = $birthday;
             }
             
             if($profile_type=="")
             {
                 $profile_type = "user";
             }
             else
             {
                 $profile_type = "fake";
             }
             
            //echo $birthDate;
           
            $log_in="select * from users where fb_id='".$fb_id."' ";
            $log_in_rs=mysqli_query($conn,$log_in);
            
            if(mysqli_num_rows($log_in_rs))
            {   
                $rd=mysqli_fetch_object($log_in_rs);  
                $age="".calculateAge($rd->birthday)."";
                
                $array_out = array();
                 $array_out[] = 
                    //array("code" => "200");
                    array(
                        "fb_id" => $fb_id,
                        "action" => "login",
                        "image1" => $image1,
                        "image2" => $image2,
                        "image3" => $image3,
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "age" => $age,
                        "birthday" => $rd->birthday,
                        "gender" => $gender
                    );
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }   
            else
            {
                $qrry_1="insert into users(fb_id,first_name,last_name,birthday,image1,image2,image3,profile_type,gender)values(";
                $qrry_1.="'".$fb_id."',";
                $qrry_1.="'".$first_name."',";
                $qrry_1.="'".$last_name."',";
                $qrry_1.="'".$birthday."',";
                $qrry_1.="'".$image1."',";
                $qrry_1.="'".$image2."',";
                $qrry_1.="'".$image3."',";
                $qrry_1.="'".$profile_type."',";
                $qrry_1.="'".$gender."'";
                $qrry_1.=")";
                if(mysqli_query($conn,$qrry_1))
                {
                 
                     $age="".calculateAge($birthday)."";
                     $array_out = array();
                     $array_out[] = 
                        //array("code" => "200");
                        array(
                            "fb_id" => $fb_id,
                            "action" => "signup",
                            "image1" => $image1,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "age" => $age,
                            "birthday" => $birthday,
                            "gender" => $gender
                        );
                    
                    $output=array( "code" => "200", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
                else
                {
                    //echo mysqli_error();
                    $array_out = array();
                        
                     $array_out[] = 
                        array(
                        "response" =>"problem in signup");
                    
                    $output=array( "code" => "201", "msg" => $array_out);
                    print_r(json_encode($output, true));
                }
            }
            
            
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"Json Parem are missing");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
     }
     
     
    function sendPushNotification()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        
        $tokon=$event_json['tokon'];
        $title=htmlspecialchars(strip_tags($event_json['title'] , ENT_QUOTES));
        $message=htmlspecialchars(strip_tags($event_json['message'] , ENT_QUOTES));
        $icon=htmlspecialchars(strip_tags($event_json['icon'] , ENT_QUOTES));
        $senderid=htmlspecialchars(strip_tags($event_json['senderid'] , ENT_QUOTES));
        $receiverid=htmlspecialchars(strip_tags($event_json['receiverid'] , ENT_QUOTES));
        $action_type=htmlspecialchars(strip_tags($event_json['action_type'] , ENT_QUOTES));
        
        
        
        $notification['to'] = $tokon;
        $notification['notification']['title'] = $title;
        $notification['notification']['body'] = $message;
        // $notification['notification']['text'] = $sender_details['User']['username'].' has sent you a friend request';
        $notification['notification']['badge'] = "1";
        $notification['notification']['sound'] = "default";
        $notification['notification']['icon'] = "";
         $notification['notification']['image'] = "";
        $notification['notification']['type'] = "";
        
        $notification['data']['title'] = $title;
        $notification['data']['body'] = $message;
        $notification['data']['icon'] = $icon;
        $notification['data']['senderid'] = $senderid;
        $notification['data']['receiverid'] = $receiverid;
        $notification['data']['action_type'] = $action_type;    
        
        sendPushNotificationToMobileDevice(json_encode($notification));  
    }
    
    
    function sendCustomNotification()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        sendPushNotificationToMobileDevice(json_encode($event_json));  
    }
      
      
    function verifyFaceThroughDeepengin()
    {
        require_once("config.php");
        
        $user_id=$_POST['fb_id'];
        $query=mysqli_query($conn,"select * from users where fb_id='".$user_id."' ");
        $row=mysqli_fetch_array($query);
        
        $photo_url=$row['image1'];
        
        if($photo_url!="")
        {
            
            $curl = curl_init();

            $payload = array(
                'api_key' => DEEPENGIN_KEY,
                'existing_photo_url' => $photo_url,
                'photo' => new CURLFile($_FILES["photo"]['tmp_name'])
            );
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => DEEPENGIN_URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_FAILONERROR =>true,
                CURLOPT_HTTPHEADER =>array('Content-Type:multipart/form-data'),
    
    
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            
            $response=json_decode($response, true);
            if($response['code']=="200")
            {
                mysqli_query($conn,"update users SET verified ='1' WHERE fb_id ='".$user_id."' ");
                
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"success");
                
                $output=array( "code" => "200", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            else
            {
                $array_out = array();
                    
                 $array_out[] = 
                    array(
                    "response" =>"not verified");
                
                $output=array( "code" => "201", "msg" => $array_out);
                print_r(json_encode($output, true));
            }
            
        }
        else
        {
            $array_out = array();
                    
             $array_out[] = 
                array(
                "response" =>"image not exist");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        

    }
    
    
    function purchaseSubscription()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        //print_r($event_json);
        //0= owner  1= company 2= ind mechanic
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        $subscription_id=htmlspecialchars(strip_tags($event_json['subscription_id'] , ENT_QUOTES));
        $duration=htmlspecialchars(strip_tags($event_json['duration'] , ENT_QUOTES));
        
        $qrry_1="insert into subscription(user_id,subscription_id,duration)values(";
        $qrry_1.="'".$fb_id."',";
        $qrry_1.="'".$subscription_id."',";
        $qrry_1.="'".$duration."'";
        $qrry_1.=")";
        if(mysqli_query($conn,$qrry_1))
        {
         
        
             $array_out = array();
             $array_out[] = 
                //array("code" => "200");
                array(
                    "response" =>"success");
            
            $output=array( "code" => "200", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
        else
        {
            //echo mysqli_error();
            $array_out = array();
                
             $array_out[] = 
                array(
                "response" =>"problem");
            
            $output=array( "code" => "201", "msg" => $array_out);
            print_r(json_encode($output, true));
        }
    }
    
    
    function checkSubscription()
    {
        require_once("config.php");
        $input = @file_get_contents("php://input");
        $event_json = json_decode($input,true);
        
        $fb_id=htmlspecialchars(strip_tags($event_json['fb_id'] , ENT_QUOTES));
        
        $query=mysqli_query($conn,"select * from subscription where user_id='".$fb_id."' ");
                
        $array_out = array();
        while($row=mysqli_fetch_array($query))
        {   
             $array_out[] = 
                array(
                    "fb_id" => $row['user_id'],
                    "subscription_id" => $row['subscription_id'],
                    "duration" => $row['duration'],
                    "created" => $row['created'],
                );
        }
        $output=array( "code" => "200", "msg" => $array_out);
        print_r(json_encode($output, true));
    }
    
?>

