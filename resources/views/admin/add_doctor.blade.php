<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">

    label {
        display: inline-block;
        width: 200px;
    }

    </style>
    <!-- Required meta tags -->
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">


      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->
           @include('admin.navbar')
        <!-- partial -->
    <!-- container-scroller -->

    <!-- plugins:js -->
    <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding-top: 100px;">

        @if(session()->has('message'))
        <div class="alert alert->success">
            <button type="button" class="close" data-dismiss="alert">x</button>

        {{session()->get('message')}}

        </div>


    @endif
            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div style="padding:15px;">
                  <label>Doctor Name </label>
                  <input type="text" style="color: black;"  name="name" placeholder="Write The Name" required="">
    </div>
    <div style="padding:15px;">
        <label>Doctor Phone </label>
        <input type="number" style="color: black;"  name="number" placeholder="Write The Number"required="">
</div>
<div style="padding:15px;">
    <label>Speciality </label>
    <select name="Speciality" style="color: black; width :200px;"required="">
                <option>--select--</option>
                <option value="Skin">skin</option>
                <option value="Internist">Internist</option>
                <option value="cardiologist">cardiologist</option>
                <option value="Glands specialist /Endocrinologist">Glands specialist /Endocrinologist</option>
                <option value="Oncologist">Oncologist</option>
                <option value="Hematology /Hematologist">Hematology /Hematologist</option>
                <option value="Surgeon">Surgeon</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Haker">Haker</option>

    </select>
</div>
<div style="padding:15px;">
    <label>Room number </label>
    <input type="text" style="color: black;"  name="room" placeholder="Write The Room Number"required="">
</div>
 <div style="padding:15px;">
    <label>Doctor Image </label>
    <input type="file" name="file"required="">
</div>
<div style="padding:15px;">

    <input type="submit" class="btn btn-success">
</div>
        </form>
             </div>

    </div>
    @include('admin.script')
    </div>
  </body>
</html>
