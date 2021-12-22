<form action="{{ route('status.store') }}" method="POST">
    @include('shared._errors')
    @csrf
    <textarea class="form-control" rows="3" name="contents" placeholder="something ~"></textarea>
    <div style="float: right">
        <button class="btn-primary btn mt-2">POST</button>
    </div>
</form>

