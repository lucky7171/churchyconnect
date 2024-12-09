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
      <h1>Show billboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Show billboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
        
            <!-- Billboard table -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

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

                <div class="card-body">
                  <h5 class="card-title">Church billboards <span>| All</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">User</th>
                        <th scope="col">Status</th>
                        <th scope="col">UserType</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($billboard as $billboard)
                    

                      <tr>
                        <th scope="row"><p class="text-primary">{{$billboard->id}}</p></th>
                        <td>{{$billboard->title}}</td>
                        <td><p class="text-primary">{{$billboard->description}}</p></td>
                        <td>{{$billboard->name}}</td>
                        <td><span class="badge bg-warning">{{$billboard->post_status}}</span></td>
                        <td>{{$billboard->user_type}}</td>
                        <td>
                            <img style="height: 90px; width:100px; padding:5px;" src="billboardimage/{{$billboard->image}}">
                        </td>
                        <td>
                          <a href="{{url('delete_billboard',$billboard->id)}}" class="btn btn-danger" 
                            onclick="confirmation(event)">
                            Delete
                          </a>
                        </td>
                        <td>
                          <a href="{{url('edit_billboard',$billboard->id)}}" class="btn btn-success">Edit</a>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                   

                  </table>

                </div>

              </div>
            </div><!-- Billboard -->

          
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



{{-- script for delete function confirmation  event
prevent browser from reloading 
get url and store it 
print url to the console
design for sweet alert 
--}}
<script>
  function confirmation(ev){
    
    ev.preventDefault();
    
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    
    console.log(urlToRedirect);

    swal({
      title:"Are you sure you want to delete this ?",
      text:"This delete will be permanent and can't be reverted!",
      icon:"warning",
      buttons:true,
      dangerMode:true,
    })
    .then((willCancel)=>{
        if(willCancel)
        {
          window.location.href=urlToRedirect;
        }
    });


  }
</script>


@include('admin.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>