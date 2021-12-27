<form method="POST" action="{{ route('commit.store', $status) }}" accept-charset="UTF-8">
    @csrf
        <input type="hidden" name="parent_id" value="{{$parent_id ?? 0}}">
    <div class="form-group">
        <textarea id="body" name="body"  class="form-control" required="required"></textarea>
    </div>
    <button type="submit" class="btn btn-success">回复</button>
</form>
