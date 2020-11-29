<?php declare(strict_types=1) ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
        <link href="css/main.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        
        <link href="index.php"/>
    </head>

    <body>
        <div class="s004">
            <form method="GET" action="result.php">
                <fieldset>
                    <legend>Github repositories</legend>
                    <div class="inner-form">
                        <div class="input-field">
                            <input name="lang" class="form-control" type="text" placeholder="Type a programming language..." />
                            <button class="btn btn-info btn-block" type="submit">Search</button>
                        </div>
                    </div>
                    <div><!-- tabela -->
                        <?php
                        $lang = $_GET['lang'];
                        $url = 'https://api.github.com/search/repositories?q=language:' . $lang . '&sort=stars&page=1';
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

                        curl_setopt($curl, CURLOPT_USERAGENT, 'lopesandy');
                        $content = curl_exec($curl);

                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        }

                        $resultado = json_decode($content);
                        //var_dump($resultado);
                        ?>
                    </div>
                    <div> <!-- **********TABLE********** -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Repository name</th>
                                    <th scope="col">Stars</th>
                                    <th scope="col">Forks</th>
                                    <th scope="col">Language</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
foreach ($resultado->items as $item) :
    ?>


                                    <tr>
                                        <th scope="row"><img src=" <?php //echo $item->avatar_url; ?>" style="height: 60px; width: 60px;" class="align-self-center mr-3 img-thumbnail"></th>
                                        <td><a href="<?php echo $item->html_url; ?>"><?php echo $item->name ?></a></td>
                                        <td><?php echo $item->stargazers_count; ?></td>
                                        <td><?php echo $item->forks; ?></td>
                                        <td><?php echo $item->language; ?></td>                                              
                                    </tr>
<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- **********END TABLE********** -->



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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
