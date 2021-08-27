<!DOCTYPE html>
<html lang="en">
<head>

   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Martha Restaurant</title>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
               <h1>Martha Restaurant</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <!-- nav bar -->
              <nav class="navbar navbar-expand-lg navbar-light bg-info ">
                  <a class="navbar-brand text-light" href="{{url('/')}}">Martha Restaurant</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-item nav-link active text-light mr-3" href="{{url('/')}}">HOME</span></a>
                      <!-- model button -->
                      <a class="nav-item nav-link text-light mr-3" href="" data-toggle="modal" data-target="#exampleModal">ADD FOODS</a>
                      <a class="nav-item nav-link text-light mr-3" href="#">ADD ORDER</a>
                    </div>
                  </div>
              </nav>
              <!-- End nav bar -->
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
      <div class="row text-center">
        <div class="col-md-6">
          <div class="row">
            <div class="col-12">
             <h3>MOST SOLD MAIN DISHES</h3>
            </div>
            </div>
                @foreach($famousMainMeal as $famousMainMeals)
                 
                  <div class="card bg-info ml-5 mr-5">
                    <h5 class="mt-2 mb-2">ID:- {{$famousMainMeals->id}}</h5>
                    <h5 class="mt-2 mb-2">NAME:- {{$famousMainMeals->foodName}}</h5>
                    <h5 class="mt-2 mb-2">PRICE:- {{$famousMainMeals->foodPrice}}</h5>
                    <h5 class="mt-2 mb-2">SOLD TIME:- {{$famousMainMeals->SallersCount}}</h5>
                  </div>
                
                 @endforeach
            </div>
            <div class="col-md-6">
               <div class="row">
                   <div class="col-12">
                   <h3>MOST SOLD SIDE DISHES</h3>
                   </div>
              </div>
                 @foreach($famousSideMeal as $famousSideMeals)
                  <div class="card bg-info ml-5 mr-5">
                    <h5 class="mt-2 mb-2">ID:- {{$famousSideMeals->id}}</h5>
                    <h5 class="mt-2 mb-2">NAME:- {{$famousSideMeals->foodName}}</h5>
                    <h5 class="mt-2 mb-2">PRICE:- {{$famousSideMeals->foodPrice}}</h5>
                     <h5 class="mt-2 mb-2">SOLD TIME:- {{$famousSideMeals->SallersCount}}</h5>
                  </div>
                 @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
      <div class="row">
          <div class="col-md-4">
            <div class="row text-center">
              <div class="col-12">
                <h3>MAIN DISHES</h3>
              </div>
            </div>
            <table class="table table-dark">
              <th>Food ID</th>
              <th>Food Name</th>
              <th>Food Price</th>
              <!-- show the main dishes -->
              @foreach($mainDishes as $MainDishes)
                <tr>
                  <td>{{$MainDishes->id}}</td>
                  <td>{{$MainDishes->foodName}}</td>
                  <td>{{$MainDishes->foodPrice}}</td>
                </tr>
              @endforeach
            </table>
          </div>
          <div class="col-md-4">
              <div class="row text-center">
                <div class="col-12">
                  <h3>SIDE DISHES</h3>
                </div>
              </div>
              <table class="table table-dark">
              <th>Food ID</th>
              <th>Food Name</th>
              <th>Food Price</th>
               <!-- show the side dishes -->
              @foreach($sideDishes as $sideDishe)
                <tr>
                  <td>{{$sideDishe->id}}</td>
                  <td>{{$sideDishe->foodName}}</td>
                  <td>{{$sideDishe->foodPrice}}</td>
                </tr>
              @endforeach
            </table>
          </div>
          <div class="col-md-4">
              <div class="row text-center">
                <div class="col-12">
                  <h3>DESSERTS</h3>
                </div>
              </div>
              <table class="table table-dark">
              <th>Food ID</th>
              <th>Food Name</th>
              <th>Food Price</th>
               <!-- show the desserts -->
              @foreach($desserts as $dessert)
                <tr>
                  <td>{{$dessert->id}}</td>
                  <td>{{$dessert->foodName}}</td>
                  <td>{{$dessert->foodPrice}}</td>
                </tr>
              @endforeach
            </table>
          </div>
      </div>
    </div>
   

    <!-- Modal for add foods-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW FOOD ITEMS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form method="post" action="/saveFoods">
             {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleFormControlInput1">FOOD NAME</label>
                  <input type="name" name="FoodName" class="form-control" id="exampleFormControlInput1" placeholder="FOOD NAME" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">FOOD TYPE</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="FoodType">
                    <option>MAIN DISHES</option>
                    <option>SIDE DISHES</option>
                    <option>DESSERTS</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput3">FOOD PRICE</label>
                  <input type="number" name="FoodPrice" class="form-control" id="exampleFormControlInput3" placeholder="FOOD PRICE" required>
                </div>
                <div class="justify-content-center text-center">
                   <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>