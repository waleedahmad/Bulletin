@extends('layout')

@section('content')
    <div class="board-editor">
        <span id="new-block">
            <span class="glyphicon glyphicon-plus"
                  aria-hidden="true"
                  title="New Block">
            </span>
        </span>

        <span id="bk-change">
            <span class="glyphicon glyphicon-adjust"
                  aria-hidden="true"
                  title="Background Color">
        </span>
    </div>

    <div class="canvas">
        <div class="gridster">
            <ul style="width: 100%; position:relative;">
                @foreach($boards as $board)
                    <li class="card"
                        data-id="{{$board->id}}"
                        data-row="{{$board->info->row}}"
                        data-col="{{$board->info->col}}"
                        data-sizex="{{$board->info->size_x}}"
                        data-sizey="{{$board->info->size_y}}">
                        <div class="actions">
                            <span class="title">{{$board->name}}</span>
                            <span class="glyphicon glyphicon-edit edit-board"
                                  data-id="{{$board->id}}"
                                  data-name="{{$board->name}}">
                            </span>
                            <span class="glyphicon glyphicon-remove remove-board" data-id="{{$board->id}}"></span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endSection

@section('scripts')
    <script src="/js/gridster.js"></script>
    <script src="/lib/toastr/toastr.min.js"></script>
    <script src="/lib/bootbox.js/bootbox.js"></script>
    <script src="/js/colorpicker.js"></script>
@endSection

@section('post_scripts')
    <script>
        APP.BOARD_EDITOR();
    </script>
@endSection

@section('styles')
    <link rel="stylesheet" href="/css/jquery.gridster.min.css">
    <link rel="stylesheet" href="/css/colorpicker.css">
@endSection