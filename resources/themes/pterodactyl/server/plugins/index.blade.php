{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.plugins.header')
@endsection

@section('content-header')
    <h1>@lang('server.plugins.header')<small>@lang('server.plugins.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a></li>
        <li class="active">@lang('navigation.server.plugin_management')</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('server.plugins.list')</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th style="min-width:200px;">@lang('strings.plugin')</th>
                            <th>@lang('strings.description')</th>
                            <th style="min-width:120px;"></th>
                        </tr>
                        @foreach($plugins as $plugin)
                            <tr>
                                <td class="middle">{{ $plugin->name }}
                                <td class="middle"><code>{{ $plugin->desc }}</code></td>
								<td class="middle" align="right">
                                    @if($plugin->is_enabled)
										@if($plugin->has_config)
											<a href="{{ route('server.plugins.config', ['server' => $server->uuidShort, 'plugin' => $plugin->hashid]) }}">
												<button class="btn btn-xs btn-info" style="min-width:50px;">@lang('server.plugins.configure')</button>
											</a>
										@endif
										<a class="btn btn-xs btn-danger" style="min-width:50px;" data-action="unload" data-plugin="{{ $plugin->hashid }}" role="button">@lang('server.plugins.unload_plugin')</a>
                                    @else
										<a class="btn btn-xs btn-success" style="min-width:50px;" data-action="load" data-plugin="{{ $plugin->hashid }}" role="button">@lang('server.plugins.load_plugin')</a>
                                    @endif
								</td>
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
    $(document).ready(function () {
        $('[data-action="unload"]').click(function (event) {
            event.preventDefault();
            var self = $(this);
            swal({
                type: 'warning',
                title: '@lang('server.plugins.unload.title')',
                text: '@lang('server.plugins.unload.text')',
                showCancelButton: true,
                showConfirmButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $.ajax({
                    method: 'PATCH',
                    url: Router.route('server.plugins.index', { server: Pterodactyl.server.uuidShort }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    }, 
					data: {
						'plugin': $(this).data('plugin')
					}
                }).done(function () {
                    self.parent().parent().slideUp();
                    swal({
                        type: 'success',
                        title: '',
                        text: '@lang('server.plugins.unload.success')'
                    });
                }).fail(function (jqXHR) {
                    console.error(jqXHR);
                    var error = '@lang('js.common.error')';
                    if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.error !== 'undefined') {
                        error = jqXHR.responseJSON.error;
                    }
                    swal({
                        type: 'error',
                        title: '@lang('js.common.whoops')',
                        text: error
                    });
                });
            });
        });
        $('[data-action="load"]').click(function (event) {
            event.preventDefault();
            var self = $(this);
            swal({
                type: 'warning',
                title: '@lang('server.plugins.load.title')',
                text: '@lang('server.plugins.load.text')',
                showCancelButton: true,
                showConfirmButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $.ajax({
                    method: 'PATCH',
                    url: Router.route('server.plugins.index', { server: Pterodactyl.server.uuidShort }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    }, 
					data: {
						'plugin': $(this).data('plugin')
					}
                }).done(function () {
                    self.parent().parent().slideUp();
                    swal({
                        type: 'success',
                        title: '',
                        text: '@lang('server.plugins.load.success')'
                    });
                }).fail(function (jqXHR) {
                    console.error(jqXHR);
                    var error = '@lang('js.common.error')';
                    if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.error !== 'undefined') {
                        error = jqXHR.responseJSON.error;
                    }
                    swal({
                        type: 'error',
                        title: '@lang('js.common.whoops')',
                        text: error
                    });
                });
            });
        });
    });
    </script>

@endsection
