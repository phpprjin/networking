<!DOCTYPE html>
<html>
    <head>
        <meta characters="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Php Cruid Operation With XML Edit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="css/foundation.css" rel="stylesheet" media="screen">
        <style>
            body {padding-left:20px;padding-top:20px;}
        </style>
    </head>
    <body>
        <?php
        $people = simplexml_load_file('data.xml') or die("xml not loading");

        if (isset($_POST['submitSave'])) {
            foreach ($people->person as $person) {
                if ($person['id'] == $_POST['id']) {
                    $person['id'] = strip_tags($_POST['id']);
                    $person->firstname = strip_tags($_POST['firstname']);
                    $person->surname = strip_tags($_POST['surname']);
                    break;
                }
            }
            file_put_contents('data.xml', $people->asXML());
            header('location: index.php');
        }

        foreach ($people->person as $person) {
            if ($person['id'] == $_GET['id']) {
                $id = $person['id'];
                $firstname = $person->firstname;
                $surname = $person->surname;
            }
        }
        ?>
        <form method="post" onsubmit="SpecialChars();">

            <table cellpadding="2" cellspacing="2">

                <tr>

                    <td>id</td>

                    <td><input type="text" name="id" value="<?php echo $id; ?>"readonly></td>

                </tr>

                <tr>

                    <td>firstname</td>

                    <td><input type="text" name="firstname" value="<?php echo $firstname; ?>"></td>

                </tr>

                <tr>

                    <td>surname</td>

                    <td><input type="text" name="surname" value="<?php echo $surname; ?>"></td>

                </tr>

                <tr>

                    <td>&nbsp;</td>

                    <td><input type="submit"  name="submitSave"></td>

                </tr>

            </table>

        </form>
    </body>
</html>
