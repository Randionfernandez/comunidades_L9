<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <!--Necesario para que figuren los iconos de los recuadros-->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Posiblemente, se pueda eliminar este css-->
        <!--        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}-->


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <title>@lang('Comunidades')</title>


<!--        <style>
            body {
                font-family: 'Nunito';
            }
            /*** hover portada principal ***/

            .zoom {
                transition: transform .2s;
                /* Animation */
                width: 100%;
                height: 100%;
                margin: 0 auto;
            }

            .zoom:hover {
                opacity: 0.5;
                -ms-transform: scale(1.05);
                /* IE 9 */
                -webkit-transform: scale(1.05);
                /* Safari 3-8 */
                transform: scale(1.05);
            }

            .texto {
                color: grey;
                opacity: 0.9;
                background-color: lightgrey;
                width: 80%;
                font-size: calc(1em + 1vh);

            }

            a,a:hover {
                color: grey;
                text-decoration: none;

            }
            a:focus{
                text-decoration: none;
            }

            a>.card{
                color: black;
            }

        </style>-->


    </head>
    <body class="antialiased">


        @yield('content')


        {{-- js --}}
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>
</html>
