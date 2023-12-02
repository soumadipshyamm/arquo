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
            <form class="adminFrm" data-action="{{ route('admin.package.create-plan') }}" id="addPlanForm" method="post"
                data-class="requiredCheck">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Title</label>
                            <input type="text" class="form-control" multiple name="title" id="title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Payment Mode</label>
                            <select class="form-control requiredCheck" data-check="Type" name="payment_mode"
                                id="payment_mode">
                                <option value="">Select</option>
                                <option value="1">Monthly</option>
                                <option value="2">Yearly</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Duration</label>
                            <select class="form-control requiredCheck" data-check="Type" name="duration" id="duration">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Price</label>
                            <input type="text" class="form-control" multiple name="price" id="price">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Discount Price</label>
                            <input type="text" class="form-control" multiple name="discount_price" id="discount_price">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="control-label required-s">Description</label>
                            <textarea class="form-control id="description" name="description" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mt-sm">
                        <button type="submit" class="btn btn-primary hidden-xs">Save</button>
                        <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/custom/package.js') }}"></script>
@endpush
