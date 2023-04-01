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
        @can('categories-create')
        <a href="{{ route('categories.create') }}" class="btn sm btn-success ">Create</a>
        <a href="{{ route('categories.truste') }}" class="btn sm btn-danger ">Truste</a>
        @endcan

    </div>
    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Categories List</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus">SL</th>
                    <th>Categories Name</th>
                    <th>Categories Image</th>
                    @can('categories-create')
                    <th class="datatable-nosort">Actions</th>
                    @endcan

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">{{ $categories->firstItem() + $loop->index }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $category->CategoryName }}</td>
                        <td><img src="{{ asset('storage/categories/' . $category->CategoryImage) }}" alt="not Fount"
                                srcset="" style="height: 40px; width:80px;"></td>

                            @can('categories-create')
<td>
    <div class="table-actions">
        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
            data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
            method="post" style="display: inline" class="ml-3">
            @method('delete')
            @csrf
            {{-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> --}}
            <button type="submit" onclick="return confirm('Are You Sure !!')" data-color="#e95959" style="border: none"><i
                    class="icon-copy dw dw-delete-3"></i></button>
        </form>
    </div>
</td>
                            @endcan


                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $categories->links() }}
    </div>



</x-backend.layouts.master>
