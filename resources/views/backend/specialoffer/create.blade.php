<x-backend.layouts.master>


    <div class="mx-2">
        <form method="post" action="{{ route('specialoffer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="OfferName">Special O Name <span
                        style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Category Name" name="OfferName"
                        value="{{ old('OfferName') }}" id="OfferName">
                    <div class="my-2">
                        @error('OfferName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="OfferDiscount"> Offer Discount <span
                        style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" name="OfferDiscount" id="OfferDiscount" class="form-control"
                        placeholder="Enter discount price">
                    <div class="my-2">
                        @error('OfferDiscount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="OfferImage"> Offer Image <span
                        style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="OfferImage" type="file">
                    <div class="my-2">
                        @error('OfferImage')
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
