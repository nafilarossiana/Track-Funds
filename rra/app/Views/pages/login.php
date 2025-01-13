<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(93deg, rgba(48, 136, 207, 0.5) 0%, rgba(146, 192, 68, 0.5) 100%), url("https://ap1.co.id/contents/news/large/ori-banner-home-1.jpg");
            background-size: cover;
            background-position: center;
        }

        .logoap {
            width: 80px;
            height: 50px;
            margin-bottom: 20px;
            display: block;
            margin: 0 auto;
        }

        .text-biru {
            color: #157DC8;
            font-weight: 700;
            text-align: center;
            font-size: 20px;
           
        }

        .text-hijau {
            color: #92C044;
            font-weight: 700; 
            text-align: center;
            font-size: 20px;
        }
        
        h3 {
            padding-top: 15px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
       
        .btn {
    background: linear-gradient(93deg, #3088CF 0%, #92C044 100%, #B9B9B9 100%);
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 40px;
    width: 100%;
    font-weight: 600;
    font-size: 16px;
}

        
        .wrapper {
            width:400px;
            height: 500px;
            border-radius: 10px;
            background: #ffff;
            color: black;
            padding-left: 20px;
            padding-right: 20px;
        }
        
        .wrapper .inputbox {
            width: 100%;
            height: 50px;
            position: relative;
            margin: 30px 0;
          
            
        }
        
        
        .wrapper .form-value {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 30px;
        }

        .inputbox input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            padding: 20px 45px 20px 20px;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
           
        }

        .inputbox input::placeholder {
            color: #ffff;
        }
        
        .inputbox label{
            margin-top: 50px;
        }
        .inputbox.username label {
    margin-top: 0;
}
.alert {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

    </style>
</head>
<body>
    <div class="wrapper">
        <section>
            <div class="form-value">
           
                <form method ="POST" action="<?=site_url('pages/loginProcess') ?>" >
                <?=csrf_field()?>
                    <img class="logoap" src="https://png.pngtree.com/thumb_back/fh260/back_our/20190620/ourmid/pngtree-finance-app-page-geometric-background-banner-image_157396.jpg">
                    <h3><span class="text-biru">Youth</span> <span class="text-hijau">| Company</span></h3>
                    <br>
                    <?php if(session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="body">
                            <button class="close" onclick="closeAlert()">x</button>
                            <b>Error !</b>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="inputbox username">
                        <label for="user">Username</label>
                        <input type="text" id="user" class="form-control" name="user" tabindex="1" placeholder="Username" autocomplete="off" required>   
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="inputbox password">
                        <label for="pass">Password</label>
                        <input type="password" id="password" class="form-control" name="password" tabindex="1" placeholder="Password" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn" name="login" >Login</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<script>
        function closeAlert() {
            // Menghapus elemen alert dari DOM
            document.querySelector('.alert').remove();
        }
    </script>
