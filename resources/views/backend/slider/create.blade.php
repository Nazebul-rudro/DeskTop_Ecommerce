<x-backend.layouts.master>


    <div class="mx-2">
        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">slider Name <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Slider Name" name="SliderName" value="{{ old('SliderName') }}">
                    <div class="my-2">
                        @error('SliderName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">slider Title <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Slider Title" name="SliderTitle" value="{{ old('SliderTitle') }}">
                    <div class="my-2">
                        @error('SliderTitle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Slider Details <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="SliderDatials" id="" cols="30" rows="10" class="form-control" placeholder="Something Writing.........min:50 words & max:100 words">{{ old('SliderDatials') }}</textarea>
                    <div class="my-2">
                        @error('SliderDatials')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Slider Image <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="SliderImage" type="file">
                    <div class="my-2">
                        @error('SliderImage')
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
