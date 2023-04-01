<x-backend.layouts.master>

{{-- {{dd($category);}} --}}
    <div class="mx-2">
        <form  action="{{route('categories.update', ['category'=>$category->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Category Name" name="CategoryName" value="{{ old('CategoryName', $category->CategoryName) }}">
                    <div class="my-2">
                        @error('CategoryName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Details</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="CategoryDatials" id="" cols="30" rows="10" class="form-control">{{ old('CategoryDatials', $category->CategoryDatials) }}</textarea>
                    <div class="my-2">
                        @error('CategoryDatials')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Image</label>
                <div class="col-sm-12 col-md-10">
                    <img src="{{ asset('storage/categories/'.$category->CategoryImage) }}" class="card" alt="" srcset="" style="height: 100px; width:150px; background:#fff; border-radius: 15px; padding:10px 15px; outline-color:#d1d1d1;">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="CategoryImage" type="file">
                    <div class="my-2">
                        @error('CategoryImage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>


</x-backend.layouts.master>
