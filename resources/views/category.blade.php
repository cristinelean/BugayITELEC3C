<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Categories') }}
            </h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $category->user_id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ url('/CategoryController/edit' . $category->id) }}" class="btn btn-info">Update</a>
                            <a href="{{ url('/CategoryController/remove' . $category->id) }}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Deleted List') }}
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach ($trashCat as $trash)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $trash->user_id }}</td>
                        <td>{{ $trash->category_name }}</td>
                        <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ url('CategoryController/restore' . $trash->id) }}" class="btn btn-info">Restore</a>
                            <a href="{{ url('CategoryController/delete' . $trash->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
