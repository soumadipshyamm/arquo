@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <header class="page-header">
        <h2>Banner Management</h2>
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
            <form data-action="banner/create" class="adminFrm" method="post" data-class="requiredCheck">
                <input type="hidden" name="updateId" value="">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Choose Screen</label>
                            <select class="form-control requiredCheck" data-check="Screen" name="screenName"
                                id="screenName">
                                <option value="HOME_SCREEN">Home
                                    Screen</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Choose Type</label>
                            <select class="form-control requiredCheck" data-check="Type" name="type" id="type">
                                <option value="banner">Banner</option>
                                <option value="promotion">Promotion</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label required-s">Choose Images</label>
                            <input type="file" class="form-control" data-check="Image" multiple name="images[]"
                                id="images" accept=".gif, .jpg, .png">
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
