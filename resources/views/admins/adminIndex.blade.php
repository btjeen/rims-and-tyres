@extends('layouts.admin')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified col-12">
            <li class="nav-item">
                <a class="nav-link {{ $tab ==  'stats' || $tab == '' ? 'active' : ''  }}" data-toggle="tab" href="#stats">Stats</a>
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
            <div class="tab-pane container {{ $tab ==  'stats' || $tab == '' ? 'active' : 'fade'  }}" id="stats">
                <div class="row">
                    <div class="col-12 p-4 mb-4 mt-2 w-100">
                        <h2>Active items</h2>
                        <p>There are currently {{ $globals['itemCount'] }} active items on the website.</p>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-12 col-md-6 p-4 mb-4 mt-2">
                        <h2>Rims</h2>
                        <p>{{ $rims['itemCount'] }} of the active items are rims.</p>
                        <p>FOOBAR rims has been sold in the last 30 days.</p>
                        <p>The most in demand brand is FOOBAR</p>
                    </div>
                    <div class="col-12 col-md-6 p-4 mb-4 mt-2">
                        <h2>Tyres</h2>
                        <p>{{ $tyres['itemCount'] }} of the active items are tyres.</p>
                        <p>FOOBAR tyres has been sold in the last 30 days.</p>
                        <p>The most in demand brand is FOOBAR</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane container {{ $tab ==  'import' ? 'active' : 'fade'  }}" id="import">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h2>Import items</h2>
                        <p>To import new items, or update existing items - simply fill in the form below!</p>
                        <form action="/admin" method="POST">
                            @csrf
                            <label for="supplier">Supplier title (case sensitive)</label>
                            <br />
                            <input id="supplier" name="supplier" type="text"/>
                            <br />
                            <br />
                            <label for="type">Product type</label>
                            <br />
                            <select id="type" name="type">
                                <option value="rim">Rims</option>
                                <option value="tyre">Tyres</option>
                                <option value="accessory">Accessories</option>
                            </select>
                            <br />
                            <br />
                            <label for="source">File</label>
                            <br />
                            <input id="source" name="source" type="file"/>
                            <br />
                            <br />
                            <br />
                            <input type="submit" value="Import items">
                            <br />
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <h2>Currently active suppliers</h2>
                        <h4>Rim suppliers</h4>
                        @if(count($suppliers['rimSuppliers']) > 0)
                            @foreach($suppliers['rimSuppliers'] as $supplier)
                                <p>{{ $supplier['title'] }}</p>
                            @endforeach
                        @else
                            <p>There are currently no existing rim suppliers</p>
                            <p>You can add items by using the import function</p>
                        @endif

                        <h4 class="pt-4">Tyre suppliers</h4>
                        @if(count($suppliers['tyreSuppliers']) > 0)
                            @foreach($suppliers['tyreSuppliers'] as $supplier)
                                <p>{{ $supplier['title'] }}</p>
                            @endforeach
                        @else
                            <p>There are currently no existing tyre suppliers</p>
                            <p>You can add items by using the import function</p>
                        @endif

                        <h4 class="pt-4">Accessory suppliers</h4>
                        @if(count($suppliers['accessorySuppliers']) > 0)
                            @foreach($suppliers['accessorySuppliers'] as $supplier)
                                <p>{{ $supplier['title'] }}</p>
                            @endforeach
                        @else
                            <p>There are currently no existing accessory suppliers</p>
                            <p>You can add items by using the import function</p>
                        @endif
                    </div>
                    </div>
            </div>
            <div class="tab-pane container {{ $tab ==  'delete' ? 'active' : 'fade'  }}" id="delete">
                <p>DELETION HERE!</p>
                <p>TAB IS = {{$tab}}</p>
            </div>
        </div>
    </div>
@endsection