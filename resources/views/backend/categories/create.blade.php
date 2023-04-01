<x-backend.layouts.master>


    <div class="mx-2">
        <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Name <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Category Name" name="CategoryName" value="{{ old('CategoryName') }}">
                    <div class="my-2">
                        @error('CategoryName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Details <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="CategoryDatials" id="" cols="30" rows="10" class="form-control">{{ old('CategoryDatials') }}</textarea>
                    <div class="my-2">
                        @error('CategoryDatials')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Image <span style="color:red">*</span></label>
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
