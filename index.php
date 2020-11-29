<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
            <link href="css/main.css" rel="stylesheet" />
            <link href="result.php"/> 
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        

    </head>

    <body>
        <div class="s004">
            <form method="GET" action="result.php">
                <fieldset>
                    <legend>Github repositories</legend>
                    <div class="inner-form">
                        <div class="input-field">
                                                    <div class="input-field">
                            <input name="lang" class="form-control" type="text" placeholder="Type a programming language..." />
                            <button class="btn btn-info btn-block" type="submit">Search</button>
                        </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <script src="js/extention/choices.js"></script>
        <script>
            var textPresetVal = new Choices('#choices-text-preset-values',
                    {
                        removeItemButton: true,
                    });

        </script>
    </body>
</html>
