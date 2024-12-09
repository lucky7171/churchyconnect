<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.dashboardcss')
</head>

<body>

@include('admin.header')

@include('admin.sidebar')


<main id="main" class="main">
        
    <div class="pagetitle">
      <h1>Add billboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add billboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

           
          
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Billboard Form Elements</h5>
    
                  <!-- Billboard Form Elements -->
                  <form action="{{url('billboard_postadd')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="title">
                      </div>
                    </div>
                  
                    
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label" >Image Upload</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="image">
                      </div>
                    </div>
                   
                    <div class="row mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" name="description"></textarea>
                      </div>
                    </div>
                                  
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Submit Button</label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit Form</button>
                      </div>
                    </div>
    
                  </form><!-- End Billboard Form Elements -->
    
                </div>
              </div>




            
              </div>
            </div><!-- End Recent Sales -->

            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

        

        

      

        

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->





@include('admin.footer')

</body>

</html>