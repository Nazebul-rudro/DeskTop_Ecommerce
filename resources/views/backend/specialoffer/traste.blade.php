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




    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Truste List</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus">SL</th>
                    <th>Special Offer Name</th>
                    <th>Special Offer Image</th>
                    <th class="datatable-nosort">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trastData as $specialoffer)
                <tr>
                    <td class="table-plus">
                        <div class="name-avatar d-flex align-items-center">
                            <div class="txt">
                                <div class="weight-600">
                                    {{ $trastData->firstItem() + $loop->index }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $specialoffer->OfferName }}</td>
                    <td><img src="{{ asset('storage/specialoffer/'.$specialoffer->OfferImage) }}" alt="not Fount" srcset=""  style="height: 40px; width:80px;"></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('specialoffer.restore', ['specialoffer'=>$specialoffer->id]) }}" data-color="#265ed7"><i class="bi bi-arrow-clockwise"></i></a>
                            <form action="{{ route('specialoffer.delete',['specialoffer'=>$specialoffer->id] ) }}" method="post" style="display: inline" class="ml-3">
                              @method('delete')
                              @csrf
                                {{-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> --}}
                                <button type="submit" id="DeleteContent" data-color="#e95959" style="border: none"><i class="icon-copy dw dw-delete-3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $trastData->links() }}
    </div>

    <script>
        let DeleteContent = document.getElementById('DeleteContent');
        DeleteContent.addEventListener('click', function(){

            swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });

        })
        </script>

</x-backend.layouts.master>
