<div class="card w-100 p-2 pl-3 pr-3 mb-2">
    <form action="{{ route('admin.index') }}" method="POST" class="d-flex align-items-center justify-content-between">
        @csrf
        @method('DELETE')
        <input type="hidden" name="supplier" id="supplier" value="{{ $supplier->id }}"/>
        <input type="hidden" name="type" id="type" value="{{ $type }}">
        <span>{{ $supplier->title }}</span>
        @if(isset($deleteAble))
            <input type="submit" value="delete" class="mr-0 btn btn-danger">
        @endif
    </form>
</div>