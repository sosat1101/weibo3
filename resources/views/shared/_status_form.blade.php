{{--<form action="{{ route('status.store') }}" method="POST">--}}
{{--    @include('shared._errors')--}}
{{--    @csrf--}}
{{--    <textarea class="form-control" rows="3" name="contents" placeholder="something ~"></textarea>--}}
{{--    <div style="float: right">--}}
{{--        <button class="btn-primary btn mt-2">POST</button>--}}
{{--    </div>--}}
{{--</form>--}}


<div>
    <script type="text/javascript" charset="utf-8" src="{{ asset('ueditor/utf8-php/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('ueditor/utf8-php/ueditor.all.min.js') }}"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->

    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    <script type="text/javascript">
        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
    </script>
</div>
