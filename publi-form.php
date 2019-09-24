<?php

$form = <<<EOT
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
                background-color: #eeeeee;
            }
            .h7 {
                font-size: 0.8rem;
            }
            .gedf-wrapper {
                margin-top: 0.97rem;
            }
            @media (min-width: 992px) {
                .gedf-main {
                    padding-left: 4rem;
                    padding-right: 4rem;
                }
                .gedf-card {
                    margin-bottom: 2.77rem;
                }
            }
            /**Reset Bootstrap*/
            .dropdown-toggle::after {
                content: none;
                display: none;
            }
        </style>
    </head>
    <body> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
        <div class="container-fluid gedf-wrapper">
            <div class="row justify-content-center">               
                <div class="col-md-6 gedf-main justify-content-center">
                <div class="card gedf-card justify-content-center">
                <div class="card-header">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="ml-2">
                                <div class="h5 m-0">@{$linha["login"]}</div><!--Nome do usuario aqui-->
                            </div>
                        </div>
                        <div>
                    </div>
                </div>
                </div>
                    <div class="card-body">
                        <a class="card-link" href="#">
                                </a>
                                {$linha["texto"]}<!--textooooo-->
                                <div class="text-center">
                                    <img width=200 heigth=150 src='{$linha["caminho"]}' class='rounded mx-auto d-block'><!--fotoooooo-->
                                </div>
                                
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
EOT;
echo $form;