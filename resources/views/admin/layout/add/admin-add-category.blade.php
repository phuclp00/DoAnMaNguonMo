@extends('admin.index')
      @section('admin_section')
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               
               <div class="row">
                  <div class="col-sm-12">
                     
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Categories</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="{{route('admin.add_category')}}">
                              <div class="form-group">
                                 <label>Category ID:</label>
                                 <input type="text" name="cat_id" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                 <label>Category Name:</label>
                                 <input type="text" name="cat_name"class="form-control">
                              </div>
                              <div class="form-group">
                                 <label>Category Description:</label>
                                 <textarea class="form-control" rows="4" name="content" id="editor"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-danger"onclick="document.getElementById('edit_form').reset(); return false;">Reset</button>
                           </form>
                           @if(session()->has('info_warning'))
                                 {!!session()->get("info_warning")!!}
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endsection