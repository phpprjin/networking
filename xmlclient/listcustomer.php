<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <?php
         
        $myXMLData = file_get_contents("http://localhost/restapiserver/services/xmlcustomers");
        $xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
        //print_r($xml);  
        ?>
        <nav class= "navbar navbar-default" role= "navigation" >
            <div class= "navbar-header" >
                <a class="btn btn-lg btn-success" href="editcustomer.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add new Customer</a>
            </div>
        </nav>
        <?php
        if ($xml->customer) {
            ?>
        <textarea>
            <?php print $myXMLData; ?>
        </textarea>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Customer Name&nbsp;</th>
                        <th>Email&nbsp;</th>
                        <th>Address&nbsp;</th>                         
                        <th>Action&nbsp;</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($xml->customer as $customer) {
                                $customer = (array)$customer;
                                ?>
                                <tr>
                                    <td><?php echo $customer['username'] ?></td>
                                    <td><?php echo $customer['email'] ?></td>
                                    <td><?php echo $customer['address'] ?></td>                    
                                    <td><a href="editcustomer.php?id=<?php echo $customer['@attributes']['id'] ?>" class="btn">&nbsp;<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit Customer</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                ?>

                <div class="col-md-12">
                    <div class="col-md-12">
                        <h4>No customers found</h4>
                    </div>
                </div>
    <?php
}
?>
        </div>
    </body>
</html>
