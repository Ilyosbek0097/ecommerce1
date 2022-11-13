<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                            <div wire:ignore.self class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true close-btn">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                            <button type="button" wire:click.prevent="deleteProduct()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            <img class="img-circle img-thumbnail" width="80" src="{{ URL::to('/assets/images/products') }}/{{$product->image}}">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a  class="btn btn-link" href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                            <button class="btn btn-link" type="button" style="margin-left: 10px" wire:click="delete_id({{$product->id}})"   data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-times-circle fa-2x text-danger"></i> </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                            {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
