<div class="m-0">
    <div class="bg-dark col-12" style="min-height: 100px; border-bottom-right-radius: 50px;">
        <div class="row">
            @if(in_array( 'add-supplier', json_decode($permissions)))
                {{--            add supplier modal--}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('add-supplier') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Company Name"  required="required">
                                        @error('company')
                                        <div class="bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Supplier Name" required="required">
                                        @error('name')
                                        <div class="bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Contact Email Address" required="required">
                                        @error('email')
                                        <div class="bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Contact Number">
                                        @error('mobile')
                                        <div class="bg-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-warning col-12" value="Add Supplier">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--            end add supplier modal--}}
            @endif
            <h3 class="text-light col-lg-10">Suppliers</h3>
            @if(in_array( 'add-supplier', json_decode($permissions)))
                <div class="col-lg-2  pt-2">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Suppliers</button>
                </div>
            @endif
        </div>
    </div>
    <div class="ms-3 me-3 table-responsive">
        @if(isset($suppliers) || in_array( 'view-supplier', json_decode($permissions)))
            <table class="table mt-3">
                <thead>
                <tr>
                    <th scope="col">supplier ID</th>
                    <th scope="col">Company</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile number</th>
                    <th scope="col">Since</th>
                    @if(in_array( 'edit-supplier', json_decode($permissions)) || in_array( 'delete-supplier', json_decode($permissions)))
                        <th scope="col">Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <th scope="row">{{ $supplier->supplier_id }}</th>
                            <td>{{ $supplier->company }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->mobile }}</td>
                            <td>{{ $supplier->created_at }}</td>
                            @if(in_array( 'edit-supplier', json_decode($permissions)) || in_array( 'delete-supplier', json_decode($permissions)))
                                <td>
                                    @if(in_array( 'edit-supplier', json_decode($permissions)))
                                        <button class="btn bg-white border-0" data-bs-toggle="modal" data-bs-target="#editsupplier-{{ $supplier->supplier_id }}"><i class="fas fa-edit text-primary"></i>Edit</button>
                                    @endif
                                    @if(in_array( 'delete-supplier', json_decode($permissions)))
                                            <span class="d-inline-flex">|</span>
                                        <form action="{{ route('delete-supplier') }}" method="post" class="d-inline-flex">
                                            @csrf
                                            <input type="hidden" name="supplier_id" value="{{ $supplier->supplier_id }}">
                                            <button type="submit" class="bg-white border-0">
                                                <i class="fas fa-trash-alt text-danger"></i>Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        @if(in_array( 'edit-supplier', json_decode($permissions)))
                            {{--            edit supplier modal--}}
                            <div class="modal fade" id="editsupplier-{{ $supplier->supplier_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('edit-supplier') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="email" value="{{ $supplier->email }}">
                                                <input type="hidden" name="supplier_id" value="{{ $supplier->supplier_id }}">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Company Name" required="required" value="{{ $supplier->company }}">
                                                    @error('company')
                                                    <div class="bg-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" required="required" value="{{ $supplier->name }}">
                                                    @error('name')
                                                    <div class="bg-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Contact Number"  value="{{ $supplier->mobile }}">
                                                    @error('mobile')
                                                    <div class="bg-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <input type="submit" class="btn btn-warning col-12" value="Update Supplier">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--            end edit supplier modal--}}
                        @endif
                    @endforeach
                </td>
                </tbody>
            </table>
        @else
            <h6 class="d-inline-flex mt-3 ms-3 ">Something went wrong...! Please refresh page now&nbsp;</h6>
            <a class="btn btn-warning d-inline-flex mt-0 mt-lg-3 ms-3 ms-lg-0" href="{{ route('dashboard', ['state' => 'suppliers']) }}">Refresh</a>
        @endif
    </div>
</div>
