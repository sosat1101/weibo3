<div class="row justify-content-center"  style="display: none">
    <form action="{{ route('commit.store', $status) }}" method="POST">
        @include('shared._errors')
        @csrf
        <textarea class="form-control" rows="3" name="commit" placeholder="commit something ~"></textarea>
        <button class="btn-primary btn btn-sm ">POST</button>
    </form>
</div>

