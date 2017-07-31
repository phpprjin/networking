<!DOCTYPE html>
<html>
    <head>
        <meta characters="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Php Cruid Operation With XML Add </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="css/foundation.css" rel="stylesheet" media="screen">
        <style>
            body {padding-left:20px;padding-top:20px;}
            table {width: 100%;}
        </style>
    </head>
    <body>
        <?php
        $people = simplexml_load_file('data.xml');
        if (isset($_POST['submitSave'])) {
            if (strip_tags($_POST['firstname']) != "" && strip_tags($_POST['surname']) != "") {
                $person = $people->addChild('person');
                $person->addAttribute('id', strip_tags($_POST['id']));
                $person->addChild('firstname', strip_tags($_POST['firstname']));
                $person->addChild('surname', strip_tags($_POST['surname']));
                file_put_contents('data.xml', $people->asXML());
                header('location: index.php');
            } else {
                ?>
                <script>alert("The field cannot be empty");</script>
                <?php
            }
        }
        ?>
        <div class="row">

            <div class="column">
                <div class="large-12 columns">
                    <form method="post">
                        <table cellpadding="2" cellspacing="2">
                            <tr>
                                <td>id</td>
                                <td><input type="text" name="id"></td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><input type="text" name="firstname"></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input type="text" name="surname"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input class="primary button" type="submit" name="submitSave" value="Save"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    <body>
</html>
