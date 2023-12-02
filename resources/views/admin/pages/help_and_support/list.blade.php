@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <header class="page-header">
        <h2>Help & Support</h2>
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
            <div class="panel-check">
               <a href="{{ route('admin.user.addHelp.support') }}" class="btn btn-md btn-primary">Add+</a>
            </div>
            <h2 class="panel-title">title</h2>

        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatable-ajax-banner">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($helpAndSupports as $key=>$helpAndSupport)
                           <tr>
                           <td>{{++$key}}</td>
                            <td>{{$helpAndSupport->questions}}</td>
                            <td>{{$helpAndSupport->answers}}</td>
                            <td>
                            <a href="{{ route('admin.user.editHelp.Support' , $helpAndSupport->id) }}"><i class="fa fa-pencil"></i>
                            </a>
                            {{-- <a href="{{ route('admin.user.deleteHelp.Support' , $helpAndSupport->id) }}"><i class="fa fa-trash"
                                    style="color: red"></i> </a> --}}
                                    <a href="javascript:void(0)" data-table="help_and_supports" data-status="3" data-key="id"
                                        data-id="{{ $helpAndSupport->id }}" class="text-warning change-status"
                                        data-action="{{ route('admin.user.deleteHelp.Support', $helpAndSupport->id) }}"><i
                                            class="fa fa-trash text-danger"></i></a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
