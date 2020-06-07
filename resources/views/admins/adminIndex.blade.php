@extends('layouts.admin')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified col-12">
            <li class="nav-item">
                <a class="nav-link {{ $tab ==  'stats' ? 'active' : ''  }}" data-toggle="tab" href="#stats">Stats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $tab ==  'import' ? 'active' : ''  }}" data-toggle="tab" href="#import">Import</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $tab ==  'delete' ? 'active' : ''  }}" data-toggle="tab" href="#delete">Delete</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content col-12 mb-4 p-4">
            <div class="tab-pane container active" id="stats">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4 mb-4 mt-2 w-100">
                            <h2>Active items</h2>
                            <p>There are currently {{ $globals['itemCount'] }} active items on the website.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card p-4 mb-4 mt-2">
                            <h2>Rims</h2>
                            <p>{{ $rims['itemCount'] }} of the active items are rims.</p>
                            <p>FOOBAR rims has been sold in the last 30 days.</p>
                            <p>The most in demand brand is FOOBAR</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card p-4 mb-4 mt-2">
                            <h2>Tyres</h2>
                            <p>{{ $tyres['itemCount'] }} of the active items are tyres.</p>
                            <p>FOOBAR tyres has been sold in the last 30 days.</p>
                            <p>The most in demand brand is FOOBAR</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="import">
                <p>IMPORT HERE!</p>
                <p>TAB IS = {{$tab}}</p>
            </div>
            <div class="tab-pane container fade" id="delete">
                <p>DELETION HERE!</p>
                <p>TAB IS = {{$tab}}</p>
            </div>
        </div>
    </div>
@endsection