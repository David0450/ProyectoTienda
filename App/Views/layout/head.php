<?php ob_start(); ?>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='David Peral'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <title>Prueba</title>
    <link rel="stylesheet" href="../../../Public/styles/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
div.login-container {
    border: 5px solid black;
    border-radius: 15px;
    width: fit-content;
    height: fit-content;
    margin: 0 auto;
    & > article {
        width: 75vw;
        margin: 0 auto;
        display: flex;
    
        & section {
            height: 50vh;
            flex: 1;
            transition-property: transform, clip-path;
            transition-duration: 1s;
            transition-timing-function: ease-in-out;
            transition-delay: 0s;
    
            &.login-section {
                background-color: royalblue;
                border-radius: 10px 0 0 10px;
    
                &.login-hide {
                    transform: translateX(100%);
                    clip-path: inset(0 100% 0 0);
                }
    
                &.login-show {
                    transform: translateX(0);
                    clip-path: inset(0 0 0 0);
                }
    
                & input {
                    margin: 2.75vh auto;
                }
    
                & button.submit-button {
                    margin-top: 7.5vh;
                }
            }
    
            &.register-section {
                background-color:firebrick;
                border-radius: 0 10px 10px 0;
                
                &.register-hide {
                    transform: translateX(-100%);
                    clip-path: inset(0 0 0 100%);
                }
    
                &.register-show {
                    transform: translateX(0);
                    clip-path: inset(0 0 0 0);
                }
    
                & button.submit-button {
                    margin-top: 6vh;
                }
            }
    
            & h2 {
                color: #f5f5f5;
                text-align: center;
                font-size: 2.5vw;
                margin: 1vh 0;
            }
    
            & button,& input {
                display: block;
                margin: 1vh auto;
                width: 50%;
                height: 4vh;
                padding: 0 2.5%;
                font-size: 1vw;
                border: 2px grey solid;
                border-radius: 5px;
                font-weight: bold;
            }
    
            & input:focus {
                box-shadow: 
                    1px 1px 5px white,
                    1px -1px 5px white,
                    -1px 1px 5px white,
                    -1px -1px 5px white;
                outline: none;
            }
    
            & button {
                background-color: #f5f5f5;
                transition-property: transform, font-size;
                transition-duration: 0.5s;
                transition-timing-function: ease;
                transition-delay: 0s;
                
                &:hover {
                    font-size:1.1vw;
                    transform: scale(1.1);
                }
                &.login-button {
                    background-color:royalblue;
                    color: #f5f5f5;
    
                    &:active {
                        background-color: rgb(70, 140, 225);
                    }
                }
    
                &.register-button {
                    background-color: firebrick;
                    color: #f5f5f5;
    
                    &:active {
                        background-color: rgb(187, 82, 82);
                    }
                }
            }
        }
    }
}

.profile-card {
    max-width: 350px;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.profile-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.social-icons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f8f9fa;
    color: #6c757d;
    text-decoration: none;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background-color: #007bff;
    color: #fff;
}


    </style>
</head>
<?php $head = ob_get_clean(); ?>