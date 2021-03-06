<div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
    <div class="card p-3 mb-4 w-100">
        <a href="{{  route('items.show', $item->id) }}">
            <img class="card-img-top" src="{{ $item->image }}" alt="{{ $item->title }}"/>
        </a>
        @if(isset(json_decode($item->extras, true)['season']))
            <img class="position-absolute" src="/assets/images/{{ json_decode($item->extras, true)['season'] }}.png" alt="{{ ucfirst(json_decode($item->extras, true)['season']) }}"/>
        @endif
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $item->title }}</h5>
            @if(isset($item->extras))
                <div class="mt-auto">
                    <p class="card-text">Specifications</p>
                    <table class="specification-table w-100">
                        <!-- Rim data layout -->
                        @if($item->type === 'rim')
                            <tr>
                                <td>Diameter</td>
                                <td>{{ json_decode($item['extras'], true)['diameter'] }}</td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td>{{ json_decode($item['extras'], true)['width'] }}</td>
                            </tr>
                            <tr>
                                <td>Centre bore</td>
                                <td>{{ json_decode($item['extras'], true)['cb'] }}</td>
                            </tr>
                            <tr>
                                <td>PCD</td>
                                <td>{{ json_decode($item['extras'], true)['holesAmount'].'x'.json_decode($item['extras'], true)['holesDistance'] }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $item->retailprice }},-</td>
                            </tr>

                        <!-- Tyre data layout -->
                        @elseif($item->type === 'tyre')
                            <tr>
                                <td>Diameter</td>
                                <td>{{ json_decode($item['extras'], true)['diameter'] }}</td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td>{{ json_decode($item['extras'], true)['width'] }}</td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>{{ json_decode($item['extras'], true)['height'] }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $item->retailprice }},-</td>
                            </tr>


                        <!-- Reg. item data layout -->
                        @else
                            @foreach(json_decode($item['extras']) as $extraKey => $extraValue)
                                <tr>
                                    <td>{{ strtoupper($extraKey) }}</td>
                                    <td>{{ $extraValue }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            @endif
        </div>
        <form action="{{ route('orders.addToBasket') }}" method="POST">
            @csrf
            <input type="hidden" name="itemId" value="{{ $item->id }}"/>
            <input type="submit" value="Add to basket" class="btn btn-primary mb-2 mt-auto w-100">
        </form>
        @if($item['type'] === 'rim' || $item['type'] === 'tyre')
            <a href="/items/show/{{  $item['id'] }}" class="btn btn-primary p-1 mt-auto">
                @if($item['type'] === 'rim')
                    Buy with tyre
                @elseif($item['type'] === 'tyre')
                    Buy with rim
                @endif
            </a>
        @endif
    </div>
</div>
