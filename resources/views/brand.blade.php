<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brand
        </h2>
    </x-slot>

    <div class="container-fluid">
    <div class="row">
        <!-- Brand Table -->
        <div class="col-lg-8">
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Uploaded Brand') }}
            </h3>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1
                            @endphp
                            @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$brand->brand_name}}</td>
                                <td>
                                <img src="{{ asset($brand->brand_image) }}" style="max-width: 100px; max-height: 100px; width: auto; height: auto;">
                                </td>
                                <td>{{$brand->created_at->diffforhumans()}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Brand Form -->
        <div class="col-lg-4">
            <div class="py-4 pl-lg-3">
                <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Brand') }}
            </h3>
                    <form method="post" action="{{route('add.brand')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name">
                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image" placeholder="Brand Image">
                            @error('brand_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>