{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.admins.header')
@endsection

@section('content-header')
    <h1>@lang('server.admins.header')<small>@lang('server.admins.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a></li>
        <li class="active">@lang('navigation.server.admin_management')</li>
    </ol>
@endsection

@section('content')
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span>Toplam Yetkili</span>
              <span class="info-box-number">49</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-flash"></i></span>

            <div class="info-box-content">
              <span>Toplam Admin</span>
              <span class="info-box-number">6</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span>Son 30 günde Eklenen Yetkili</span>
              <span class="info-box-number">12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-flash"></i></span>

            <div class="info-box-content">
              <span>Son 30 günde Eklenen Admin</span>
              <span class="info-box-number">1</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
</div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Son Yazılan Yetkiler</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="ara">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STEAM ID</th>
                  <th>Notlar</th>
                  <th>Tarih</th>
                  <th>Yetki Adı</th>
                </tr>
                <tr>
                  <td>STEAM_1:0:18505619</td>
                  <td>relre</td>
                  <td>28.11.2017</td>
                  <td><span class="label label-success">Admin</span></td>
                </tr>
                <tr>
                  <td>STEAM_1:0:15445459</td>
                  <td>kgns</td>
                  <td>27.11.2017</td>
                  <td><span class="label label-warning">Kurucu</span></td>
                </tr>
                <tr>
                  <td>STEAM_1:0:27878835</td>
                  <td>AirCrack</td>
                  <td>27.11.2017</td>
                  <td><span class="label label-primary">Slot</span></td>
                </tr>
                <tr>
                  <td>STEAM_1:0:87854535</td>
                  <td>Tuğçe abla</td>
                  <td>27.11.2017</td>
                  <td><span class="label label-danger">Kurucunun sahibi</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('server.admins.list')</h3>
                @can('create-admin', $server)
                    <div class="box-tools">
                        <a href="{{ route('server.admins.new', $server->uuidShort) }}"><button class="btn btn-primary btn-sm">@lang('strings.create_new')</button></a>
                    </div>
                @endcan
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>@lang('strings.steamid')</th>
                            <th>@lang('strings.permissions')</th>
                            <th class="text-center">@lang('strings.immunity')</th>
                            <th class="hidden-xs">@lang('strings.notes')</th>
                            @can('view-admin', $server)<th></th>@endcan
                            @can('delete-admin', $server)<th></th>@endcan
                        </tr>
                        @foreach($admins as $admin)
                            <tr>
                                <td class="middle">{{ $admin->steamid }}
                                <td class="middle"><code>{{ $admin->flags }}</code></td>
                                <td class="middle">{{ $admin->immunity }}</td>
                                <td class="middle hidden-xs">{{ $admin->notes }}</td>
                                @can('view-admin', $server)
                                    <td class="text-center middle">
                                        <a href="{{ route('server.admins.view', ['server' => $server->uuidShort, 'admin' => $admin->hashid]) }}">
                                            <button class="btn btn-xs btn-primary">@lang('server.users.configure')</button>
                                        </a>
                                    </td>
                                @endcan
                                @can('delete-admin', $server)
                                    <td class="text-center middle">
                                        <a href="#/delete/{{ $admin->hashid }}" data-action="delete" data-id="{{ $admin->hashid }}">
                                            <button class="btn btn-xs btn-danger">@lang('strings.revoke')</button>
                                        </a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    <script>
    </script>

@endsection
