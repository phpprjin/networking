<html>
<body>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular.min.js"></script>
<div ng-app="myApp" ng-controller="cntrl">
<h2>CRUD API</h2>
<form>

 <input type="hidden" ng-model="id" name="id" ng-disabled="obj.idisable">
 	<div>
		First Name: <input type="text" ng-model="firstname" name="firstname">
	</div><br>
	<div>
		Last Name: <input type="text" ng-model="lastname" name="lastname">
	</div>
	<input type="button" value="{{btnName}}" ng-click="insertdata()" >
<br>
<br>
{{msg}}

</form>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th colspan="2">Action</th>
		</tr>	
	</thead>
	<tbody>
		<tr ng-repeat="student in data">
			<td>{{student.id}}</td>
			<td>{{student.firstname}}</td>
			<td>{{student.lastname}}</td>
			<td><button ng-click="deleteStud(student.id);">Delete</button></td>
			<td><button ng-click="editStud(student.id)">Edit</button></td>
		</tr>
	</tbody>
</table>
</div>
<script>
var app=angular.module('myApp',[]);
app.controller('cntrl', function($scope,$http){
	$scope.obj={'idisable':false};
	$scope.btnName="Insert";
	//Insertion and Update function
	$scope.insertdata=function(){

		console.log({ 'id':$scope.id,  'firstname':$scope.firstname, 'lastname':$scope.lastname, 'btnName':$scope.btnName});
		$http.post("api.php",{ 'id':$scope.id,  'firstname':$scope.firstname, 'lastname':$scope.lastname, 'btnName':$scope.btnName})
		.success(function(){

			if ($scope.btnName !== "Insert") {
				$scope.msg="Data Updated successfully";
				$scope.btnName="Insert";
				$scope.id = '';
				$scope.firstname='';
				$scope.lastname='';
			}
			else {
				$scope.msg="Data Inserted successfully";
				$scope.id = '';
				$scope.firstname='';
				$scope.lastname='';
			}
			
			$scope.displayStud();

		})

	}
	// Listing function
	$scope.displayStud=function(){
		$http.post("api.php",{'btnName':'Select'})
		.success(function(data){
			$scope.data=data
		})
	}
	$scope.deleteStud=function(studid){
		$http.post("api.php",{'id':studid, 'btnName':'Delete'})
		.success(function(){
				$scope.msg="Data Deletion successfull";
				$scope.displayStud();
		})

	}
	// Select record for edit funtion
	$scope.editStud=function(studid)
	{ 
		$scope.id=studid;

		$http.post("api.php",{'id':studid, 'btnName':'Select'})
		.success(function(data){ 
			$scope.id = data.id;
			$scope.firstname=data.firstname;
			$scope.lastname=data.lastname;
			$scope.displayStud();
		})

		
		$scope.btnName="Update"; 

	}

	$scope.displayStud();

});


</script>
</body>

</html>
