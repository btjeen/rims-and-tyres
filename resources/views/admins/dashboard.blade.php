@extends('layouts.admin')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="row">
        <!-- Nav tabs start -->
        <ul class="nav nav-tabs nav-justified col-12 pr-0">
            <li class="nav-item">
                <a class="nav-link {{ $tab == 'stats' || $tab == '' ? 'active' : ''  }}" data-toggle="tab" href="#stats">Stats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $tab == 'import' ? 'active' : ''  }}" data-toggle="tab" href="#import">Import</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $tab == 'delete' ? 'active' : ''  }}" data-toggle="tab" href="#delete">Delete</a>
            </li>
        </ul>
        <!-- Nav tabs end -->

        <!-- Tab panes start -->
        <div class="tab-content col-12 mb-4 p-4">
            <!-- Stats tab start -->
            <div class="tab-pane container {{ $tab == 'stats' || $tab == '' ? 'active' : 'fade'  }}" id="stats">
                <div class="row">
                    <div class="col-12">
                        <h2>Active items</h2>
                        <p>There are currently {{ $globals['itemCount'] }} active items on the website.</p>
                        <hr class="pb-3"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h2>Rims</h2>
                        <p>{{ $rims['itemCount'] }} of the active items are rims.</p>
                        <p>FOOBAR rims has been sold in the last 30 days.</p>
                        <p>The most in demand brand is FOOBAR</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h2>Tyres</h2>
                        <p>{{ $tyres['itemCount'] }} of the active items are tyres.</p>
                        <p>FOOBAR tyres has been sold in the last 30 days.</p>
                        <p>The most in demand brand is FOOBAR</p>
                    </div>
                </div>
            </div>
            <!-- Stats tab end -->

            <!-- Import tab start -->
            <div class="tab-pane container {{ $tab ==  'import' ? 'active' : 'fade'  }}" id="import">
                <div class="row">
                    <!-- Import form start -->
                    <div class="col-12 col-md-6">
                        <h2>Import items</h2>
                        <p>To import new items, or update existing items - simply fill in the form below!</p>
                        <hr class="pb-3"/>
                        <form action="{{ route('admin.index') }}" method="POST"  enctype="multipart/form-data">
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
                    <!-- Import form start -->

                    <!-- Active suppliers start -->
                    <div class="col-12 col-md-6">
                        <h2>Currently active suppliers</h2>
                        <hr class="pb-3"/>
                        <h4>Rim suppliers</h4>
                        @if(count($suppliers['rimSuppliers']) > 0)
                            @foreach($suppliers['rimSuppliers'] as $supplier)
                                @include('partials.supplierRow', ['type' => 'rims'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing rim suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import function.</p>
                        @endif

                        <h4 class="pt-4">Tyre suppliers</h4>
                        @if(count($suppliers['tyreSuppliers']) > 0)
                            @foreach($suppliers['tyreSuppliers'] as $supplier)
                                @include('partials.supplierRow', ['type' => 'tyres'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing tyre suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import function.</p>
                        @endif

                        <h4 class="pt-4">Accessory suppliers</h4>
                        @if(count($suppliers['accessorySuppliers']) > 0)
                            @foreach($suppliers['accessorySuppliers'] as $supplier)
                                @include('partials.supplierRow', ['type' => 'accessories'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing accessory suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import function.</p>
                        @endif
                    </div>
                    <!-- Active suppliers end -->
                </div>
            </div>
            <!-- Import tab end -->

            <!-- Delete tab start -->
            <div class="tab-pane container {{ $tab ==  'delete' ? 'active' : 'fade'  }}" id="delete">
                <div class="row">
                    <div class="col-12">
                        <h2>Delete suppliers</h2>
                        <p>To delete all the items of a certain type from a supplier, click the 'delete' button next to the name of the supplier</p>
                        <hr class="pb-3"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 pb-2">
                        <h4>Rim suppliers</h4>
                        @if(count($suppliers['rimSuppliers']) > 0)
                            @foreach($suppliers['rimSuppliers'] as $supplier)
                                @include('partials.supplierRow', ['deleteAble' => true, 'type' => 'rim'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing rim suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import tab.</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-2">
                        <h4>Tyre suppliers</h4>
                        @if(count($suppliers['tyreSuppliers']) > 0)
                            @foreach($suppliers['tyreSuppliers'] as $supplier)
                                @include('partials.supplierRow', ['deleteAble' => true, 'type' => 'tyre'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing tyre suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import tab.</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-2">
                        <h4>Accessory suppliers</h4>
                        @if(count($suppliers['accessorySuppliers']) > 0)
                            @foreach($suppliers['accessorySuppliers'] as $supplier)
                                @include('partials.supplierRow', ['deleteAble' => true, 'type' => 'accessory'])
                            @endforeach
                        @else
                            <p class="p-2 pl-3 pr-3 m-1">There are currently no existing accessory suppliers.</p>
                            <p class="p-2 pl-3 pr-3 m-1">You can add items by using the import tab.</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Delete tab end -->
        </div>
        <!-- Tab panes start -->
    </div>
@endsection