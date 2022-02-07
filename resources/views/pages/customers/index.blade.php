<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="flex justify-between">
                    <x-jet-application-logo class="block h-12 w-auto" />
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('customer-create')}}">
                        <i class="fas fa-user-plus mr-1"></i>Tambah Customer
                    </a>
                </div>
            
                <div class="mt-6">
                    <table id="datatablesContent">
                    <thead>
                        <tr>
                            <th data-priority="1">{{ __('No') }}</th>
                            <th data-priority="2">{{ __('First Name') }}</th>
                            <th data-priority="3">{{ __('Middle Name') }}</th>
                            <th>{{ __('Last Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th data-priority="4">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
     <script>
         // Init datatables
         $(document).ready(function() {
            var table = $('#datatablesContent').DataTable({
                responsive: true,
                proccesing: true,
                serverSide: true,
                pagingType: "simple",
                lengthChange: false,
                rowCallback: function(row,data,index){
                    if(index % 2 == 0){
                        $('td', row).addClass('bg-blue-500 text-white shadow-md')
                    }else{
                        $('td', row).addClass('bg-yellow-500 text-white shadow-md')
                    }
                },
                columnDefs: [
                    {
                    targets: 0,
                    createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
                        $(cell).css('border-top-left-radius', '1rem');   //add style to cell
                        $(cell).css('border-bottom-left-radius', '1rem');
                    }
                    },
                    {
                    targets: 7,
                    createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
                        $(cell).css('border-top-right-radius', '1rem');   //add style to cell
                        $(cell).css('border-bottom-right-radius', '1rem');
                    }
                    }
                ],
                ajax: "{{ route('customer-index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'first_name',
                        name: 'first_name',
                    },
                    {
                        data: 'middle_name',
                        name: 'middle_name',
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ],
                language: {
                    searchPlaceholder: "search...",
                    sSearch: ""
                }
            });
        });
        // $('.display').dataTable();

        // delete function
        function deleteData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You wont be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "customer/"+id+"/delete",
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        error: function() {
                            alert('Something is wrong');
                        },
                        success: function(data) {
                            Swal.fire("Deleted!", "Your data has been deleted.", "success")
                            $('#datatablesContent').DataTable().ajax.reload();
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Okay, your data is safe", "error")
                }
            });
        }

        // go to edit page
        function editData(id) {
            window.location = 'customer/'+id+'/edit';
        }

     </script>
     {{-- success message alert --}}
     @if (session('success'))
     <script>
         Swal.fire("Success!", '{{ session('success') }}', "success");
     </script>
     @endif
     {{-- failed message alert --}}
    @if (session('failed'))
        <script>
            Swal.fire("Failed!", '{{ session('failed') }}', "error");
        </script>
    @endif
    @endpush
</x-app-layout>
