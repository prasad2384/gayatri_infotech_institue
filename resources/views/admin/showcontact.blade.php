@extends('admin.header')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body p-4">

                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <!-- <a href="../../category/create" class="btn btn-warning btn-sm float-end">Add Category</a> -->
                <h5 class="card-title fw-semibold mb-4">Contact Table</h5>
                <div class="col-lg-12 align-items-stretch">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Email</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Number</h6>
                                                </th>
                                                  <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Message</h6>
                                                </th>
                                            </th>
                                            <th class="border-bottom-0">
                                              <h6 class="fw-semibold mb-0">Delete</h6>
                                          </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $c)
                                                <tr>
                                                    <td class="border-bottom-   0">
                                                        <h6 class="fw-semibold mb-0">{{ $c->id }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $c->name }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $c->email }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $c->number }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $c->message }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                            <form action="/deletecontact/{{$c->id }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm" style="background-color:red;">Delete</button>
                                                            </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection