<?php

function writeOutFiles() {
    foreach (scandir('.') as $file):
        $no_include = array(
            '.',
            '..',
            '.git',
            '.gitattributes',
            '.gitignore',
            'images',
            'styles',
            'nbproject',
            'index.php',
            'scripts'
        );
        if (in_array($file, $no_include)) {
            continue;
        } else {
            /* HTML OUTPUT */
            $string_extension = basename($file, '.html');
            $menu_text = str_replace('-', ' ', $string_extension);
            $menu_text = ucwords($menu_text);
            echo $outString = <<<HEREDOC
        
                                    <li><a href=$file>$menu_text</a></li>
HEREDOC;
        }
    endforeach;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
        <link href="styles/jumbotron-narrow.css" rel="stylesheet">        
        <style>
            body {
                background-color: #333;

            }
            #canvas {
                background-image: none;
                background-color: #bdf!important;
            }
            #example {
                margin: 0px auto;
                width: 400px;
                padding: 0;
                height: 400px;
                overflow: hidden!important;
                border: 0px;
            }
            .navbar-nav > li > a {
                padding: 5px 10px;

            }            
            .navbar {

                background-image: linear-gradient(90deg, rgba(0,0,0,0.2) 10%, rgba(0,0,177,0.5) 60%);
                border-color: #f00;
                min-height:30px;
                margin-bottom: 0px;
                border-bottom: 10px solid rgba(255,255,255,0.2);
            }            
            .navbar-brand {
                padding: 5px 0 5px;
                color: #000;
            }
            .navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus {
                color: #000;

            }            
        </style>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">steven-senkus.com</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">JS Animations <b class="caret"></b></a>
                                <ul id="files" class="dropdown-menu">
                                    <?php writeOutFiles(); ?>
                                </ul>
                            </li>                            
                            <li class=""><a href="//www.github.com/ssenkus">Github</a></li>
                            <li class="active"><a href="//www.jsfiddle.net/user/ssenkus">JSFiddle</a></li>
                            <li><a href="../navbar-fixed-top/">LinkedIn</a></li>
                            <li><a href="../navbar-fixed-top/">Blog</a></li>
                            <li><a href="../navbar-fixed-top/">Portfolio</a></li>
                        </ul>

                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->            
            <div class="jumbotron">

                <iframe id="example" src="pixel-play.html"></iframe>
            </div>


            <div class="footer">
                <p>&copy; Company 2013</p>
            </div>

        </div> <!-- /container -->

        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#files li a').on('click', function(e) {
                    e.preventDefault();
                    $src = $(this).attr('href');
                    $('#example').attr('src', $src);
                });
            });

        </script>
    </body>
</html>