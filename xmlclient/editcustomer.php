<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/QAPage">
   
        <?php include 'header.php'; ?>
     
    <body>
        ﻿<style type="text/css">
            .form-horizontal input.ng-invalid.ng-dirty {
                border-color: #FA787E;
            }

            .form-horizontal input.ng-valid.ng-dirty {
                border-color: #78FA89;
            }
        </style>
        <div class="view">
        <?php
        if (!isset($_GET['id'])) {
            ?>
            <div class="container">
                <div class="row">
                    <nav class= "navbar navbar-default" role= "navigation" >
                        <div class= "navbar-header" >
                            <a class= "navbar-brand" href= "listcustomer.php"><i class="glyphicon glyphicon-th-large"></i> Customers List </a> 
                        </div>
                    </nav>
                    
                    </div>
                    <header>
                        <h3>Create Customer</h3>
                    </header>
                    <div class="col-md-12">

                        <form role="form" id="insertformoid" action="listcustomer.php" name="myForm" class="form-horizontal">
                            <div class="row">
                                <div class= "form-group">
                                    <label class= "col-md-2"> Name </label>
                                    <div class="col-md-4">
                                        <input name="customerName" id="username" value="" type= "text" class= "form-control" placeholder="Your name" required/>
                                        
                                    </div>
                                </div>
                                <div class= "form-group">
                                    <label class= "col-md-2"> Email address </label>
                                    <div class="col-md-4">
                                        <input name="email" id="email" value="" type= "email" class= "form-control" placeholder="Enter email" required/>

                                    </div>
                                </div>
                                <div class= "form-group">
                                    <label class= "col-md-2">Address </label>
                                    <div class="col-md-4">
                                        <input name="address" id="address" value="" type= "text" class= "form-control" placeholder= "Present Address"/>
                                    </div>
                                </div>
                                 
                                <div class= "form-group">
                                    <label class= "col-md-2"></label>
                                    <div class="col-md-4">
                                        <a href="listcustomer.php" class="btn">Cancel</a>
                                        <input type="submit"   class="btn btn-primary" id="submitButton"  name="submitButton" value="Submit">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>            
            <?php
        }
        else {
            
        
        
        $id  = $_GET['id'];
        
        
        //PRINT_R($id);
        $myXMLData = file_get_contents("http://localhost/restapiserver/services/xmlcustomer?id=$id");

        $xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
        //print_r($xml);  
        $customer = (array)$xml->customer;
        ?>
        <textarea>
            <?php print $myXMLData; ?>
        </textarea>
        
            <div class="container">
                <div class="row">
                    <nav class= "navbar navbar-default" role= "navigation" >
                        <div class= "navbar-header" >
                            <a class= "navbar-brand" href= "listcustomer.php"><i class="glyphicon glyphicon-th-large"></i> Customers List </a>
                            <a class= "navbar-brand" href= "editcustomer.php"><i class="glyphicon glyphicon-plus"></i> Create Customer </a>
                            <a class= "navbar-brand pull-right"><i class="glyphicon glyphicon-edit"></i> Currently Editing Customer Number:</a>
                        </div>
                    </nav>
                    
                    </div>
                    <header>
                        <h3>Edit Customer</h3>
                    </header>
                    <div class="col-md-12">

                        <form role="form" id="formoid" action="listcustomer.php" name="myForm" class="form-horizontal">
                            <div class="row">
                                <div class= "form-group">
                                    <label class= "col-md-2"> Name </label>
                                    <div class="col-md-4">
                                        <input name="customerName" id="username" value="<?php echo $customer['username'] ?>" type= "text" class= "form-control" placeholder="Your name" required/>
                                        <input name="customerNumber" type="hidden" id="hiddenid" value="<?php echo $customer['@attributes']['id'] ?>" >
                                    </div>
                                </div>
                                <div class= "form-group">
                                    <label class= "col-md-2"> Email address </label>
                                    <div class="col-md-4">
                                        <input name="email" id="email" value="<?php echo $customer['email'] ?>" type= "email" class= "form-control" placeholder="Enter email" required/>

                                    </div>
                                </div>
                                <div class= "form-group">
                                    <label class= "col-md-2">Address </label>
                                    <div class="col-md-4">
                                        <input name="address" id="address" value="<?php echo $customer['address'] ?>" type= "text" class= "form-control" placeholder= "Present Address"/>
                                    </div>
                                </div>
                                 
                                <div class= "form-group">
                                    <label class= "col-md-2"></label>
                                    <div class="col-md-4">
                                        <a href="listcustomer.php" class="btn">Cancel</a>
                                        <input type="submit"   class="btn btn-primary" id="submitButton"  name="submitButton" value="Submit">
                                        
                                        <button type="button" id="deletecustomer" 
                                                class="btn btn-warning">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            
        <?php
        }
        ?>
            
        </div>
    </body>
    <script type='text/javascript'>
     
    $("#formoid").submit(function(event) { 
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url =  'http://localhost/restapiserver/services/xmlupdateCustomer?id='+$("#hiddenid").val() ;
       $.ajax({
           url:url,
           data: $form.serialize(),
           method:'post',
           dataType:'json',
           async:false,
           success:function(data) {
               alert('Updated successfully');
               window.location.href = 'http://localhost/xmlclient/listcustomer.php';
           }
       }); 
    });
    $("#insertformoid").submit(function(event) { 
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url =  'http://localhost/restapiserver/services/xmlinsertCustomer';
       $.ajax({
           url:url,
           data: $form.serialize(),
           method:'post',
           dataType:'json',
           async:false,
           success:function(data) {
               alert('Record Inserted successfully');
               window.location.href = 'http://localhost/xmlclient/listcustomer.php';
           }
       }); 
    });
    
    $('#deletecustomer').click(function(){
        var id=$('#hiddenid').val();
        url =  'http://localhost/restapiserver/services/xmldeleteCustomer?id='+id;
        $.ajax({
           url:url,
           method:'GET',
           async:false,
           success:function(data) {
               alert('Record Deleted successfully');
               window.location.href = 'http://localhost/xmlclient/listcustomer.php';
           }
        });
    });
    </script>
     
</html>