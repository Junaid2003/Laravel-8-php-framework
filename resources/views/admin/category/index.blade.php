<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            All Category
        </h2>
    </x-slot>

<!-- Start of Category CRUD -->
    <div class="py-12">

        <div class="container">
            <div class="row">

              <div class="col-md-8">
                <div class="card">

                @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      </button>
                  </div>
                @endif

                  <div class="card-header">All Category</div>
            
      <table class="table">
      <thead>
        <tr>
          <th scope="col">SL No</th>
          <th scope="col">Category Name</th>
          <th scope="col">User</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

          <!-- @php($i = 1) -->
        @foreach ($categories as $category)
          <tr>
            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->user->name }}</td>
            @if ($category->created_at == NULL)
            <span class="text-danger">No Date Set</span>
              @else
            <td>{{ $category->created_at->diffForHumans() }}  @endif</td>
            <td><a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-success">Edit</a></td>
            <td><a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>

      {{ $categories->links() }}

            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">Add Category</div>
                <div class="card-body">
            
            <form action="{{ route('store.category') }}" method="post">
            @csrf
              <div class="form-group mb-3">
                <label for="exampleInputEmail1"  class="form-label">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Add Category</button>
            </form>

            </div>
            </div>
          </div>


          </div>
        </div>

        <!-- Trash Delete Code -->
        
         <div class="container">
            <div class="row">

              <div class="col-md-8">
                <div class="card">

                  <div class="card-header">Trash List</div>
            
      <table class="table">
      <thead>
        <tr>
          <th scope="col">SL No</th>
          <th scope="col">Category Name</th>
          <th scope="col">User</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

          <!-- @php($i = 1) -->
        @foreach ($trashCat as $category)
          <tr>
            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->user->name }}</td>
            @if ($category->created_at == NULL)
            <span class="text-danger">No Date Set</span>
              @else
            <td>{{ $category->created_at->diffForHumans() }}  @endif</td>
            <td><a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-success">Restore</a></td>
            <td><a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">P Delete</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>

      {{ $trashCat->links() }}

            </div>
          </div>

          <div class="col-md-4">
          </div>


          </div>
        </div>
        <!-- End of Trash Delete -->

      </div>

      <!-- End of Category CRUD -->
</x-app-layout>
