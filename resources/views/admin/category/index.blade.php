<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    All Blog
            </div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>



                            @foreach($categories as $category)


                           <tr>
                            <th scope="row"> {{ $categories->firstItem()+$loop->index}} </th>
                            <td> {{ $category-> title}}</td>
                            <td> {{ $category-> slug}}</td>
                            <td> {{ $category-> description}}</td>
                            <td>
                                <a href="{{ url('Category/Edit/'.$category->id) }}"
                                    class="btn btn-primary">Edit </a>
                                <a href="" class="btn btn-danger">delete </a>
                            </td>
                          </tr>

                 @endforeach


                        </tbody>
                      </table>



                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Blog
            </div>

                <div class="card-body">


                    <form action="{{ route('store.blog' )}}" method="POST">


                        @csrf


                        <div class="form-group">
                          <label> Enter Title </label>

                          <input type="text" class="form-control" name="blog_name"
                           placeholder="Enter title">




                        </div>
                        <div class="form-group">
                          <label>Enter Slug</label>
                          <input type="text" class="form-control" name="blog_slug"
                           placeholder="Slug">





                        </div>

                        <div class="form-group">
                            <label>Enter Description</label>
                            <input type="text" class="form-control"  name="blog_description"
                             placeholder="Description">



                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>




                </div>
            </div>








        </div>

        <div class="col-md-8 py-5 ">
            <div class="card " >
                <div class="card-header ">
                    Delete List
            </div>

                <div class="card-body">


                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>



                            @foreach($trashCat as $category)


                           <tr>
                            <th scope="row"> {{ $trashCat->firstItem()+$loop->index}} </th>
                            <td> {{ $category-> title}}</td>
                            <td> {{ $category-> slug}}</td>
                            <td> {{ $category-> description}}</td>
                            <td>
                                @if($category ->title==Null)
                                <span class="text danger">No Time set </span>
                                @else
                                {{ $category-> title->diffForHumans() }}

                                @endif

                                @if($category ->slug==Null)
                                <span class="text danger">No Time set </span>
                                @else
                                {{ $category-> slug->diffForHumans() }}

                                @endif

                                @if($category ->description==Null)
                                <span class="text danger">No Time set </span>
                                @else
                                {{ $category-> description->diffForHumans() }}

                                @endif

                                <a href="{{ url('softdelete/category/'.$category->id) }}"
                                    onclick=" return confirm ('are you sure to delete ')" class="btn btn-danger">Edit </a>



                                <a href="{{ url('softdelete/category/'.$category->id) }}"
                                   onclick=" return confirm ('are you sure to delete ')" class="btn btn-danger">Delete </a>
                            </td>
                          </tr>

                 @endforeach


                        </tbody>
                      </table>

                      {{ $trashCat->links() }}



            </div>
        </div>





        <div class=" pt-5 ">


            <div class="comment-area ">
                <div class="card card-body">
                    <h6 class="font-weight-bolder text-primary pl-4 card-title">Comments </h6>

               <form action="{{ route('store.blog') }}" method ="POST">
                    @csrf

                      <input type="hidden" name="comment_name" class="form-control">
                         {{--  <label  for="commentFormControlTextarea1"> </label>  --}}
                        <textarea name="comment_body " class= "form-control" rows="5" > </textarea>


                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
                  </div>
                </div>
            </div>



                           




                  @endsection



