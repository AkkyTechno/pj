<html>  
<head>  
<title>Shopping</title>  
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>  
<body> 
     <br /><br />  
<div class="container" style="width:600px;">  

    <h1 align="center">Product Return</h1>  
    <div ng-app="angularcrud" ng-controller="usercontroller" ng-init="displayData()">  

     <label>Product Id</label>  
     <input type="text" name="Pro_id" ng-model="Pro_id" class="form-control" placeholder="Axr432cDf" />  
        <br />  
        <label>Product Name</label>  
        <select type="text" name="txtname" ng-model="txtname" id="" class="form-control">select
        <option value="" disabled selected hidden>Choose your product</option>
          <option >Mobile</option>
          <option >TV</option>
          <option >Laptop</option>
          <option >Clothes</option>
          <option >Book</option>
          

        </select> 
       
        <input type=text name=txtname ng-model=txtname class=form-control readonly hidden/> 

        <label>Price</label>  
        <input type="number/int" name="price" ng-model="price" class="form-control" placeholder=40000 /> 

        <label>Qty Return</label>  
        <input type="text" name="qty" ng-model="qty" class="form-control" placeholder=1 /> 

        <label>reason</label> 
        <select type="text" name="reason" ng-model="reason" id="select" class="form-control" value="select">select
        <option value="" disabled selected hidden>Choose your reason</option>
          <option >Physically damaged</option>
          <option >Has missing parts or accessories</option>
          <option >Defective</option>
          <option >Different from its description on the product detail page</option>
          <option >You no longer want the item (return applicable only for eligible items)</option>
          

        </select> 
       
         <input type="text" name=reason ng-model=reason class=form-control readonly hidden>

        <label>Return Date</label>  
        <input type="text" name="det" ng-model="det" class="form-control" placeholder=11/01/2000/> 
        <br />  
        <input type="hidden" name="txtid" ng-model="txtid" /> 
        <input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="{{btnName}}"/>  
        
        <br /><br />  
         
        <table class="table table-bordered">  
            <tr>  
                <th>Product ID</th>  
                <th>Product Name</th>  
                <th>Price</th>
                <th>Qty</th>
                <th>Reason</th>
                <th>Return Date</th>
                <th>Update</th>  
                <th>Delete</th>  
            </tr>  
            <tr ng-repeat="x in names">  
                <td>{{x.Prod_id}}</td>  
                <td>{{x.Prod_name}}</td>  
                <td>{{x.price}}</td>  
                <td>{{x.qty}}</td>  
                <td>{{x.reason}}</td>  
                <td>{{x.retn_date}}</td>  
                <td><button ng-click="updateData(x.txtid ,x.Prod_id, x.Prod_name, x.price, x.qty, x.reason, x.retn_date)" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></td>  
                <td><button ng-click="deleteData(x.txtid )"class="btn btn-danger" ><i class="fa fa-trash"></i></button></td>  
            </tr>  
        </table>  
    </div>  
</div> 
<script>  
 var app = angular.module("angularcrud",[]);  
 app.controller("usercontroller", function($scope, $http){  
     $scope.btnName = "ADD";  
      $scope.txtid = 0;  
      $scope.insertData = function(){  
           if($scope.Pro_id == null)  
           {  
                alert("Product ID is required");  
           }  

           else if($scope.txtname == null)  
           {  
                alert("name is required");  
           }  

           else if($scope.price == null)  
           {  
                alert("Price is required");  
           }  

           else if($scope.qty == null)  
           {  
                alert("qty is required");  
           } 
           
           else if($scope.reason == null)  
           {  
                alert("Reason is required");  
           }  

           else if($scope.det == null)  
           {  
                alert("Return date is required");  
           }  

           
           else 
           {  
                $http.post(  
                     "insert_update.php",  
                     {'Pro_id':$scope.Pro_id, 'txtname':$scope.txtname, 'price':$scope.price, 'qty':$scope.qty, 'reason':$scope.reason, 'det':$scope.det, 'txtid':$scope.txtid, 'btnName':$scope.btnName}  
                ).success(function(data){  
                     alert(data);  
                     $scope.Pro_id = null;  
                     $scope.txtname = null;
                     $scope.price = null;  
                     $scope.qty = null;  
                     $scope.reason = null;  
                     $scope.det = null;  
                     $scope.txtid = null;  
                     $scope.btnName = "ADD";  
                     $scope.displayData();  
                });  
           }  
      }  
      $scope.displayData = function(){  
           $http.get("list.php")  
           .success(function(data){  
                $scope.names = data;  
           });  
      }  
      $scope.updateData = function(txtid,Prod_id, Prod_name, price, qty, reason,retn_date){  
          if($scope.txtid>0)
          {
               $scope.txtid=0;
          }    
          $scope.txtid=txtid; 
                    $scope.Pro_id = Prod_id;  
                     $scope.txtname = Prod_name;
                     $scope.price = price;  
                     $scope.qty = qty;  
                     $scope.reason = reason;  
                     $scope.det = retn_date;  
           $scope.btnName = "update";  
      }  
      $scope.deleteData = function(id){  
           if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("delete.php", {'id':id})  
                .success(function(data){  
                     alert(data);  
                     $scope.displayData();  
                });  
           }  
           else 
           {  
                return false;  
           }  
      }  
 });  
</script>            
</body>  
</html>  
