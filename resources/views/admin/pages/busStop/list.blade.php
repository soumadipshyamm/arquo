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
                            <th>Route</th>
                            <th>Location</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($busStops as $key => $busStop)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $busStop->name }}</td>
                                <td>{{ $busStop?->route?->name }}</td>
                                <td>{{ $busStop->location }}</td>
                                <td>{{ $busStop->latitude }}</td>
                                <td>{{ $busStop->longitude }}</td>
                                <td>
                                    <a href="{{ route('admin.bus.stop.edit', Crypt::encrypt($busStop->id)) }}"><i
                                            class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('admin.bus.stop.delete', Crypt::encrypt($busStop->id)) }}"><i
                                            class="fa fa-trash" style="color: red"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
