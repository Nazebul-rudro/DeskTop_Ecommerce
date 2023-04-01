<x-backend.layouts.master>

    @if (session('message'))
        <script>
            window.addEventListener('load', function() {
                swal({
                    title: "Good job!",
                    text: "{{ session('message') }}",
                    icon: "success",
                    button: "Ok Done!",
                });
            })
        </script>
    @endif



    <div class="mb-2">

        <a href="{{route('slider.create')}}" class="btn sm btn-success ">Create</a>
        <a href="{{ route('slider.trast') }}" class="btn sm btn-danger ">Truste</a>


    </div>
    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Slider List</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus">SL</th>
                    <th>Slider Name</th>
                    <th>Slider Image</th>

                    <th class="datatable-nosort">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)

                <tr>
                    <td class="table-plus">
                        <div class="name-avatar d-flex align-items-center">
                            <div class="txt">
                                <div class="weight-600"> {{$sliders->firstItem() + $loop->index}}  </div>
                            </div>
                        </div>
                    </td>
                    <td>{{$slider->SliderName}} </td>
                    <td><img src="{{ asset('storage/slider/' . $slider->SliderImage) }}" alt="not Fount"
                        srcset="" style="height: 40px; width:80px;"></td>


<td>
<div class="table-actions">
    <a href="{{route('slider.edit', ['slider'=>$slider->id])}}"
        data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
    <form action="{{ route('slider.destroy', ['slider'=>$slider->id]) }}"
        method="post" style="display: inline" class="ml-3">
        @method('delete')
        @csrf
        {{-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> --}}
        <button type="submit" onclick="return confirm('Are You Sure !!')" data-color="#e95959" style="border: none"><i
                class="icon-copy dw dw-delete-3"></i></button>
    </form>
</div>
</td>



                </tr>


                @endforeach





            </tbody>
        </table>
        {{ $sliders->links() }}
    </div>



</x-backend.layouts.master>
