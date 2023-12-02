@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <header class="page-header">
        <h2>Subscription Management</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>
                <li><span>title</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class=""></i></a>
        </div>
    </header>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">

            </div>
            <h2 class="panel-title">title</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatable-ajax-banner">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr> --}}

                        @foreach($plans as $key=>$plan)
                           <tr>
                           <td>{{++$key}}</td>
                            <td>{{$plan->title}}</td>
                            <td>{{$plan->description}}</td>
                            <td>{{$plan->price}}</td>
                            <td>{{$plan->discount_price}}</td>
                            <td>
                            <a href="{{route('admin.package.edit.plan',Crypt::encrypt($plan->id))}}"><i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{route('admin.package.delete.plan',Crypt::encrypt($plan->id))}}"><i class="fa fa-trash"
                                    style="color: red"></i> </a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
