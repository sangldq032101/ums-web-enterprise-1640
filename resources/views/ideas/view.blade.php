@extends('layouts.main')
@section('title','View idea')
@section('content')
<h1 class="fw-bold">{{$idea->ideaName}}</h1>
<div>Category: <b>{{$categoryName}}</b></div>
<div class="mb-3">Upload by: <b>Anonymous</b> at
    <?php
    $date=date_create($idea->created_at);
    echo date_format($date,"h:i A d/m/Y");
    ?>
</div>
{!!$idea->ideaContent!!}
<div class="text-end">
    <span class="h3"><a href="" type="button" title="Thumb up"><i
                class="fa-solid fa-thumbs-up text-primary"></i></a></span>
    <span class="mx-2"></span>
    <span class="h3"><a href="" type="button" title="Thump down"><i
                class="fa-solid fa-thumbs-down text-danger"></i></a></span>
</div>
<hr>
<h3 class="fw-bold">Comment</h3>
@if($comments->isNotEmpty())
@foreach ($comments->where('ideaID',$idea->ideaID) as $comment)
<div class="card mb-3">
    <div class="card-body">
        <div class="card-title"><b>Anonymous:</b></div>
        <div class="card-text">{{$comment->commentContent}}</div>
        <div class="mt-2">Comment at
            <?php $date=date_create($comment->created_at);
        echo date_format($date," h:i A d/m/Y");
        ?>
        </div>
    </div>
</div>
@endforeach
@else
<div class="h5 text-center">This idea not have any comment !</div>
@endif
<form action="/ideas/comment" method="post">
    @csrf
    <div class="form-floating my-3">
        <input type="text" class="form-control" placeholder="Comment content" name="commentContent">
        <label>Comment</label>
    </div>
    <button type="submit" class="btn btn-success">Post comment</button>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('.ckeditor'), {
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    }
                ]
            }
        })
</script>
@endsection
