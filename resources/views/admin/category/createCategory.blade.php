@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12 ">


    

       <div class="card">
        <div class="card-header">
            <h3>
                Add Category
             <a href="{{url('admin/category')}}" class="btn btn-primary btn-sml float-end"> BACK</a> 
             
            </h3>
        </div>
       </div>



       <div class="card-body">

        <form action="{{ url('admin/category')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

        <div class=" col-md-6    mb-3">
            <label  class="form-label"> Name:</label>
            <input type="text"  class=" border-1 border border-primary  form-control" name="catname" >
            @error('catname')<samll class="text-danger"> {{$message}} @enderror
        </div>
        <div class=" col-md-6   mb-3">
            <label  class="form-label"> Slug:</label>
            <input type="text"  class="border border-1 border border-primary form-control" name="slug" >
            @error('slug')<samll class="text-danger"> {{$message}} @enderror
        </div>
        <div class=" col-md-6   mb-3">
            <label  class="form-label"> Description:</label>
            <textarea  class="border border-1 border-primary form-control" name="description" rows="3" ></textarea>
            @error('description')<samll class="text-danger"> {{$message}} @enderror
        </div>
        <div class=" col-md-6   mb-3">
            <label  class="form-label"> Image:</label>
            <input type="file" class="border border-1 border-primary form-control" name="image" >
           
        </div>
        <div class=" col-md-6   mb-3">
            <label  class="form-label"> Status:</label>
            <input type="checkbox" class="border border-1 border-primary" name="status" ><br/>
            
        </div>
        <div class=" col-md-12   mb-3">
            <h4>SEO tags</h4>
        </div>
        <div class=" col-md-12   mb-3">
            <label  class="form-label"> Meta Title:</label>
            <textarea   class="border border-1 border-primary form-control" name="metatile" ></textarea>
            @error('metatile')<samll class="text-danger"> {{$message}} @enderror
        </div>
        <div class=" col-md-12   mb-3">
            <label  class="form-label"> Meta Keyword:</label>
            <textarea   class="border border-1 border-primary form-control" name="metakeyword" ></textarea>
            @error('metakeyword')<samll class="text-danger"> {{$message}} @enderror
        </div>
        <div class=" col-md-12   mb-3">
            <label  class="form-label"> Meta Description:</label>
            <textarea   class="border border-1 border-primary form-control" name="metadescription" rows="3" ></textarea>
            @error('metadescription')<samll class="text-danger"> {{$message}} @enderror
        </div>
        
        <div class=" col-md-12   mb-3">
        <button type="submit" class="btn btn-primary float-end">Save</button>
        </div>

        </div>
  
       </form>

       </div>



            </div>
</div>
@endsection