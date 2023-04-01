<x-backend.layouts.master>
    <div class="mx-2">
        <form method="post" action="{{ route('products.update', ['product'=>$product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            {{-- @method('post') --}}
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ProductName">Product Name <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Product Name" name="ProductName"  id="ProductName" value="{{ old('ProductName', $product->ProductName) }}">
                    <div class="my-2">
                        @error('ProductName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ProductCode">Product Code <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Product Code" name="ProductCode" id="ProductCode" value="{{ old('ProductCode', $product->ProductCode) }}">
                    <div class="my-2">
                        @error('ProductCode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="categoriesId">Select Categories <span
                        style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <select class="form-select form-control" aria-label="Default select example" name="categoriesId" id="categoriesId">
                        <option disabled selected>Open this select menu</option>
                        @foreach ($categories as $category)
                        <option @selected($category->id ==$product->categoriesId) value="{{ $category->id }}">{{ $category->CategoryName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>




            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ProductPrice">Product Price <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Enter Product Price" name="ProductPrice" id="ProductPrice" value="{{ old('ProductPrice', $product->ProductPrice) }}">
                    <div class="my-2">
                        @error('ProductPrice')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="DiscountPrice">Discount Price <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Enter Discount Price" name="DiscountPrice" id="DiscountPrice" value="{{ old('DiscountPrice', $product->DiscountPrice) }}">
                    <div class="my-2">
                        @error('DiscountPrice')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="AfterDiscount">After Discount<span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Enter After Discount Price" name="AfterDiscount" id="AfterDiscount" value="{{ old('AfterDiscount', $product->AfterDiscount) }}">
                    <div class="my-2">
                        @error('AfterDiscount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ShortDescription">Product Short Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="ShortDescription" id="ShortDescription" cols="30" rows="10" class="form-control" placeholder="Somethig Writing........">{{ old('ShortDescription', $product->ShortDescription) }}</textarea>
                    <div class="my-2">
                        @error('ShortDescription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="LongDescription">Product Long Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="LongDescription" id="LongDescription" cols="30" rows="10" class="form-control" placeholder="Somethig Writing........">{{ old('LongDescription', $product->LongDescription) }}</textarea>
                    <div class="my-2">
                        @error('LongDescription')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ProductPrice">Product Quantity <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Enter Product Quantity" name="ProductQuantity" id="ProductQuantity" value="{{ old('ProductQuantity',$product->ProductQuantity) }}">
                    <div class="my-2">
                        @error('ProductQuantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="ProductImage">Product Image <span style="color:red">*</span></label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="ProductImage" id="ProductImage" type="file">
                    <div class="my-2">
                        @error('ProductImage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>


    <script>
        const ProductCode = document.getElementById('ProductCode');
        ProductCode.addEventListener('input', ()=>{

            ProductCode.value = ProductCode.value.toUpperCase();
        })
    </script>

</x-backend.layouts.master>
