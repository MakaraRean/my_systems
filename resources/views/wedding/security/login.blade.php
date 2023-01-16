<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            transition: 3s;
            background-size: 100% 100%;
            background-image: url({{ asset('img/bg.jpg') }});
        }

        .login-container {
            margin-top: 10%;
            border: 1px solid #CCD1D1;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            max-width: 50%;
        }

        .ads {
            background-color: #A569BD;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .ads h1 {
            margin-top: 20%;
        }

        #fl {
            font-weight: 600;
            font-family: 'Kh 14 March';
            color: #A569BD
        }

        #sl {
            font-weight: 100 !important;
        }

        .profile-img {
            text-align: center;
            object-fit: cover;
        }

        .profile-img img {
            border-radius: 50%;
            /* animation: mymove 2s infinite; */
        }

        @keyframes mymove {
            from {
                border: 1px solid #F2F3F4;
            }

            to {
                border: 8px solid #F2F3F4;
            }
        }

        .login-form {
            padding: 15px;
            background-color: #F2F3F4;
        }

        .login-form h3 {
            text-align: center;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .form-control {
            font-size: 14px;
        }

        .forget-password a {
            font-weight: 500;
            text-decoration: none;
            font-size: 14px;
        }

        .img-bg {
            background-image: url({{ asset('img/wedding_background.jpg') }});
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 ads img-bg">
                <img src="{{ asset('img/khmer-title.png') }}" height="15%" width="100%" class="mb-4 mt-4">
                <img src="{{ asset('img/name.png') }}" alt="Phanna and Thearath" height="75%" width="100%">
            </div>
            <div class="col-md-6 login-form">
                <div class="profile-img">

                    <img src="{{ asset('img/profile.jpg') }}" alt="profile_img" width="140px" height="140px">
                </div>
                <h3>Login</h3>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                    </div>
                    <div class="form-group forget-password">
                        <a href="#">Forget Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
